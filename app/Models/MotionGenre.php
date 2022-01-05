<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotionGenre extends Model
{
    use HasFactory;
    protected $fillable = [
        'motionID',
        'genreID',
    ];
}
