<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbooktest extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'logbooktests';

    public function sessions()
    {
        return $this->belongsTo(Sessions::class, 'intern_id');
    }
}
