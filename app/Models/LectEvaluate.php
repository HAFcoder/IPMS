<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Internship;

class LectEvaluate extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function internship()
    {
        return $this->belongsTo(Internship::class, 'intern_id');
    }
}
