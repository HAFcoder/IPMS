<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentInfo;

class Programme extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function studentInfo()
    {
        return $this->hasOne(StudentInfo::class);
    }

    public function sessionProgramme()
    {
        return $this->hasMany(SessionProgramme::class);
    }
}
