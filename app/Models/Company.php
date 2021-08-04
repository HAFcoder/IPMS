<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supervisor;
use App\Models\Internship;
use App\Models\LecturerInfo;
use App\Models\StudentInfo;

class Company extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function supervisor()
    {
        return $this->hasMany(Supervisor::class);
    }

    public function intership()
    {
        return $this->hasMany(Internship::class);
    }

    public function lecturerInfo()
    {
        return $this->hasOne(LecturerInfo::class,'lect_id');
    }

    public function studentInfo()
    {
        return $this->hasOne(StudentInfo::class,'stud_id');
    }
}
