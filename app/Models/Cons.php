<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cons extends Model
{
    use HasFactory;

    protected $table = 'cons';

    protected $fillable = [
        'consTitle',
        'consDescription',
        'consNumber',
        'motionID',
    ];
    protected $guarded = [
        'consID',
    ];
}
