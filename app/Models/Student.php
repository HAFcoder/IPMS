<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'stuID',
        'name',
        'icNo',
        'email',
        'programme',
        'mentor',
        'session',
        'phone',
        'address',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
