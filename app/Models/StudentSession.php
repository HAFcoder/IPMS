<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Session;
use App\Models\Programme;
use App\Models\Student;
use App\Models\Internship;
use App\Models\StudentInfo;

class StudentSession extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'student_sessions';

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    // public function studentInfo()
    // {
    //     return $this->hasOne(StudentInfo::class, 'stud_id' ,'student_id');
    // }

    public function programme()
    {
        return $this->belongsTo(Programme::class, 'programme_id');
    }

    public function internship()
    {
        return $this->hasMany(Internship::class, 'session_id', 'id');
    }
}
