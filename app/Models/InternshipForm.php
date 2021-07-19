<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternshipForm extends Model
{
    use HasFactory;

    protected $fillable = ['form_name', 'intern_form'];

}
