<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Moderator extends Authenticatable
{
    use HasFactory;

    protected $guard = 'moderator';

    protected $fillable = [
        'userID',
        'moderatorInitial',
    ];
    protected $guarded = [
        'moderatorID',
    ];
}
