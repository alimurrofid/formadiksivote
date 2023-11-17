<?php

namespace App\Models;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hope extends Model
{
    use HasFactory;
    protected  $guarded = ['id'];


    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
