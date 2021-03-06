<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Programme;
use App\Models\Student;
use App\Models\Internship;
use App\Models\Company;

class StudentInfo extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'student_info';

    public function programmes()
    {
        return $this->belongsTo(Programme::class, 'programme_id', 'id');
    }

    public function students()
    {
        return $this->belongsTo(Student::class, 'stud_id', 'id');
    }

    public function internship()
    {
        return $this->hasMany(Internship::class);
    }

    public function company()
    {
        return $this->hasMany(Company::class);
    }
}
