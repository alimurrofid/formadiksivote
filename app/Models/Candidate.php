<?php

namespace App\Models;

use App\Models\Hope;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidate extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected  $fillable =[
        'voting_number',
        'name',
        'photo',
        'major',
        'department',
        'vision',
        'vote_count',
    ];
    protected $table = 'candidates';

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function hopes()
    {
        return $this->hasMany(Hope::class);
    }
}
