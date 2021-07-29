<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentInfo;
use App\Models\Session;

class Programme extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'programmes';

    public function studentInfo()
    {
        return $this->hasOne(StudentInfo::class);
    }

    public function sessionProgramme()
    {
        return $this->hasMany(SessionProgramme::class);
    }

    public function sessions()
    {
        return $this->belongsToMany(Session::class, 'session_programmes')->wherePivot('status','active');
    }
}
