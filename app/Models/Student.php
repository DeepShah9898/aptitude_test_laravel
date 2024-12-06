<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Attributes that are mass assignable
    protected $fillable = [
        'name',
        'email',
        'number',
        'score',
    ];
}