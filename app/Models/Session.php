<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentSession;
use App\Models\Lecturer;
use App\Models\LecturerInfo;
use App\Models\SessionProgramme;
use App\Models\Programme;

class Session extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'sessions';

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class, 'lecturer_id');
    }

    public function lecturerInfo()
    {
        return $this->belongsTo(LecturerInfo::class, 'lecturer_id');
    }

    public function studSession()
    {
        return $this->hasMany(StudentSession::class);
    }

    public function sessionProgramme()
    {
        return $this->hasMany(SessionProgramme::class);
    }

    public function programmes()
    {
        return $this->belongsToMany(Programme::class, 'session_programmes', 'session_id')->wherePivot('status','active');
    }

}
