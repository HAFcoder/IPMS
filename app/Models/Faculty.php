<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LecturerInfo;

class Faculty extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function lecturerInfo()
    {
        return $this->hasOne(LecturerInfo::class);
    }
}
