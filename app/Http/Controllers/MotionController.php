<?php

namespace App\Http\Controllers;

use App\Models\Cons;
use App\Models\Genre;
use App\Models\Motion;
use App\Models\MotionGenre;
use App\Models\Pros;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MotionController extends Controller
{
    public function list()
    {
        $motion = Motion::all();
        return  view('manageMotion',['motion' => $motion]);
        
    }

    public function create()
    {
        //return view('createGenre');
    }
}
