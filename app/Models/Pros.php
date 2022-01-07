<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pros extends Model
{
    use HasFactory;

    protected $table = 'pros';

    protected $fillable = [
        'prosTitle',
        'prosDescription',
        'prosNumber',
        'motionID',
    ];
    protected $guarded = [
        'prosID',
    ];
}
