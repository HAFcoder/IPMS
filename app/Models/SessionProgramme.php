<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Session;
use App\Models\Programme;

class SessionProgramme extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function session()
    {
        return $this->belongsTo(Lecturer::class, 'session_id');
        //return $this->hasManyThrough(Session::class,Programme::class);
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class, 'programme_id');
        //return $this->morphedByMany(Programme::class, 'sessionable');
    }
    
}
