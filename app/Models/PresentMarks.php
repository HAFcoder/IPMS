<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Internship;

class PresentMarks extends Model
{
    use HasFactory;

        public function internship()
    {
    	return $this->belongsTo(Internship::class);
    }
}
