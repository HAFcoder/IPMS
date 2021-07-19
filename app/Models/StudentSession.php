<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Session;
use App\Models\Programme;
use App\Models\Student;
use App\Models\Internship;

class StudentSession extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class, 'programme_id');
    }

    public function internship()
    {
        return $this->hasMany(Internship::class, 'session_id', 'id');
    }
}
