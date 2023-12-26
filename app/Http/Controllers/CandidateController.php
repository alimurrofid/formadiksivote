<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\VoteSession;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

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
        $candidates = Candidate::all();
        $title = 'Hapus Kandidat!';
        $text = "Apakah anda yakin ingin menghapus kandidat ini?";
        confirmDelete($title, $text);
        $VoteSession = VoteSession::latest()->first();
        return view('dashboard.candidate.index', compact('candidates', 'VoteSession'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $VoteSession = VoteSession::latest()->first();
        return view('dashboard.candidate.create', compact('VoteSession'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'voting_number' => 'required|integer',
            'name' => 'required|string',
            'photo' => 'required|string',
            'major' => 'required|string',
            'department' => 'required|string',
            'vision' => 'required',
        ]);


        $tempFile = TemporaryFile::where('folder', $request->photo)->first();

        //delete if fails to save to database
        if ($validatedData->fails() && $tempFile) {
            Storage::deleteDirectory('tmp/' . $tempFile->folder);
            $tempFile->delete();
            return redirect()->route('candidate.index')->withErrors($validatedData)->withInput();
        } else if ($validatedData->fails()) {
            return redirect()->route('candidate.index')->withErrors($validatedData)->withInput();
        }


        if ($tempFile) {
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
            Alert::success('Success', 'Candidate berhasil ditambahkan');
            return response()->redirectTo(route('candidate.index'));
        }
        Alert::error('Error', 'Candidate gagal ditambahkan');
        return redirect()->back();
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
        $VoteSession = VoteSession::latest()->first();
        $candidate = Candidate::find($candidate->id);
        return view('dashboard.candidate.edit', compact('candidate', 'VoteSession'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidate $candidate)
    {
        $validatedData = Validator::make($request->all(), [
            'voting_number' => 'required|integer',
            'name' => 'required|string',
            'photo' => 'required|string',
            'major' => 'required|string',
            'department' => 'required|string',
            'vision' => 'required',
        ]);


        $tempFile = TemporaryFile::where('folder', $request->photo)->first();
        //delete if fails to save to database
        if ($validatedData->fails() && $tempFile) {
            Storage::deleteDirectory('tmp/' . $tempFile->folder);
            $tempFile->delete();
            return redirect()->route('candidate.index')->withErrors($validatedData)->withInput();
        } else if ($validatedData->fails()) {
            return redirect()->route('candidate.index')->withErrors($validatedData)->withInput();
        }


        if ($tempFile) {
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
            Alert::success('Success', 'Candidate berhasil ditambahkan');
            return response()->redirectTo(route('candidate.index'));
        }
        Alert::error('Error', 'Candidate gagal ditambahkan');
        return redirect()->back();
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
}
