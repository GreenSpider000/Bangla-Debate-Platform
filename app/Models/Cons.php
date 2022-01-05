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
    ];
    protected $guarded = [
        'motionID',
        'consID',
    ];
}
