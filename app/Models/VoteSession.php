<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;

class VoteSession extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'vote_sessions';

    public function actionCheck(){
        if($this->session_run == 0){
            $this->update([
                'session_run'=>1
            ]);
            Alert::success('Berhasil', 'Sesi voting telah dimulai');
            return redirect()->back();
        }elseif($this->session_run == 1){
            $this->update([
                'session_run'=>0
            ]);
            Alert::success('Berhasil', 'Sesi voting telah dihentikan');
            return redirect()->back();
        }
    }
}
