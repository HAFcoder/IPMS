<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Internship;

class Logbook extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'logbooks';

    public function internship()
    {
        return $this->belongsTo(Internship::class, 'internship_id');
    }
}
