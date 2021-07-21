<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Faculty;
use App\Models\Lecturer;
use App\Models\Session;

class LecturerInfo extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'lecturer_info';
    protected $primaryKey = 'id';

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class, 'lect_id');
    }

    public function session()
    {
        return $this->hasMany(Session::class);
    }
}
