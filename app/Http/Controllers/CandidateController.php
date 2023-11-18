<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    /**
     * Validate temporary uploaded file.
     */
    public function tmpUpload(Request $request)
    {
        // validate request
        $request->validate([
            'photo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $folderName = uniqid() . '-' . now()->timestamp;
        //upload file
        $request->file('photo')->store('tmp/' . $folderName);
        TemporaryFile::create([
            'folder' => $folderName,
            'filename' => $request->file('photo')->hashName(),
        ]);
        return $folderName;
    }
    /**
     * Delete temporary uploaded file.
     */
    public function tmpDelete(Request $request)
    {
        Storage::deleteDirectory('tmp/' . $request->getContent());
        TemporaryFile::where('folder', $request->getContent())->delete();
        return '';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $candidates = Candidate::all();
        return view('dashboard.kandidat', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandidateRequest $request)
    {
        // dd($request->all());
        $tempFile = TemporaryFile::where('folder', $request->photo)->first();

        //copy file from tmp to public
        Storage::copy('tmp/' . $tempFile->folder . '/' . $tempFile->filename, 'public/Candidate/' . $tempFile->filename);
        //save to database
        Candidate::create([
            'voting_number' => $request->voting_number,
            'name' => $request->name,
            'photo' => $tempFile->filename,
            'major' => $request->major,
            'department' => $request->department,
            'vision' => $request->vision,
        ]);
        //after upload delete
        Storage::deleteDirectory('tmp/' . $tempFile->folder);
        TemporaryFile::where('folder', $tempFile->folder)->delete();
        //redirect to index
        return response()->redirectTo(route('candidate.index'))->with('success', 'Candidate created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        $candidate = Candidate::find($candidate->id);
        return view('dashboard.kandidat', [
            'candidate' => $candidate,
            'candidates' => Candidate::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        
        //ambil data file yang baru diupload
        $tempFile = TemporaryFile::where('folder', $request->photo)->first();
        //simpan foto yang lama
        $oldPhoto = $candidate->photo;
        //copy file from tmp to public
        Storage::copy('tmp/' . $tempFile->folder . '/' . $tempFile->filename, 'public/Candidate/' . $tempFile->filename);
        //save to database
        $candidate->update([
            'voting_number' => $request->voting_number,
            'name' => $request->name,
            'photo' => $tempFile->filename,
            'major' => $request->major,
            'department' => $request->department,
            'vision' => $request->vision,
        ]);

        //hapus foto lama
        Storage::disk('public')->delete('public/Candidate/' . $oldPhoto);
        //after upload delete
        Storage::deleteDirectory('tmp/' . $tempFile->folder);
        TemporaryFile::where('folder', $tempFile->folder)->delete();
        //redirect to index
        return response()->redirectTo(route('candidate.index'))->with('success', 'Candidate created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        if ($candidate->photo) {
            Storage::delete('public/Candidate/' . $candidate->photo);
        }
        $candidate->delete();
        return response()->redirectTo(route('candidate.index'))->with('success', 'Candidate deleted successfully.');
    }

    /**
     * Truncate all data.
     */

    public function deleteAll()
    {
        Candidate::truncate();
        return response()->redirectTo(route('candidate.index'))->with('success', 'Candidate truncated successfully.');
    }
}
