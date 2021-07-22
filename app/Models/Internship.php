<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\StudentSession;
use App\Models\Supervisor;
use App\Models\Company;
use App\Models\Lecturer;
use App\Models\CompanyEvaluate;
use App\Models\CompanyFeedback;
use App\Models\LectEvaluate;
use App\Models\StudentFeedback;
use App\Models\Logbook;

class Internship extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class, 'lecturer_id');
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class, 'supervisor_id');
    }

    public function studSession()
    {
        return $this->belongsTo(StudentSession::class, 'session_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function lectEvaluate()
    {
        return $this->hasOne(LectEvaluate::class);
    }

    public function compEvaluate()
    {
        return $this->hasOne(CompanyEvaluate::class);
    }

    public function compFeedback()
    {
        return $this->hasOne(CompanyFeedback::class);
    }

    public function studFeedback()
    {
        return $this->hasOne(StudentFeedback::class);
    }

    public function logbook()
    {
        return $this->hasOne(Logbook::class);
    }
}