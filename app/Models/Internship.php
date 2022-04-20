<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\StudentInfo;
use App\Models\Session;
use App\Models\StudentSession;
use App\Models\Supervisor;
use App\Models\Company;
use App\Models\Lecturer;
use App\Models\LecturerInfo;
use App\Models\CompanyEvaluate;
use App\Models\CompanyFeedback;
use App\Models\LectEvaluate;
use App\Models\StudentFeedback;
use App\Models\Logbook;
use App\Models\CompanySv;
use App\Models\GradSurveyAnswer;
use App\Models\SvEvaluationMarks;
use App\Models\EmpIndustrySurveyAnswer;
use App\Models\FinalEvaluationMarks;
use App\Models\OrfForm;
use App\Models\RdnForm;

class Internship extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class, 'lecturer_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class, 'supervisor_id');
    }

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }

    public function studSession()
    {
        return $this->hasOne(StudentSession::class, 'session_id' ,'session_id');
    }

    public function sessionProgramme()
    {
        return $this->hasMany(SessionProgramme::class, 'session_id' ,'session_id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'id' ,'student_id');
    }

    public function studentInfo()
    {
        return $this->belongsTo(StudentInfo::class, 'student_id');
    }

    public function lecturerInfo()
    {
        return $this->hasOne(LecturerInfo::class, 'lect_id' ,'lecturer_id');
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

    public function graduateAnswer()
    {
        return $this->hasOne(GradSurveyAnswer::class, 'internship_id' ,'id');
    }

    public function svEvaluation()
    {
        return $this->hasOne(SvEvaluationMarks::class, 'internship_id' ,'id');
    }

    public function empIndustrySurvey()
    {
        return $this->hasOne(EmpIndustrySurveyAnswer::class, 'internship_id' ,'id');
    }

    public function finalEvaluation()
    {
        return $this->hasOne(FinalEvaluationMarks::class, 'internship_id' ,'id');
    }

    public function presentMarks()
    {
        return $this->hasOne(FinalEvaluationMarks::class, 'internship_id' ,'id');
    }

    public function orfForm()
    {
        return $this->hasOne(OrfForm::class, 'internship_id' ,'id');
    }

    public function rdnForm()
    {
        return $this->hasOne(RdnForm::class, 'internship_id' ,'id');
    }

}
