<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\StudentInfo;
use App\Models\Internship;
use App\Models\StudentSession;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guarded = [];

    protected $fillable = [
        'email',
        'role',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function student_info()
    {
        return $this->hasOne(StudentInfo::class, 'stud_id');
    }

    public function intership()
    {
        return $this->hasMany(Internship::class, 'student_id', 'id');
    }

    public function student_session()
    {
        return $this->hasMany(StudentSession::class, 'student_id', 'id');
    }
}
