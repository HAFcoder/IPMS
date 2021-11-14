<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\LecturerInfo;
use App\Models\Internship;
use App\Models\Session;

class Lecturer extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guarded = [];
    protected $table = 'lecturers';

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

    public function lecturerInfo()
    {
        return $this->hasOne(LecturerInfo::class, 'lect_id');
    }

    public function intership()
    {
        return $this->hasMany(Internship::class);
    }

    public function session()
    {
        return $this->hasMany(Session::class);
    }


}
