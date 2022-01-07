<?php

namespace App\Http\Controllers;

use App\Models\Cons;
use App\Models\Motion;
use App\Models\Pros;
use Illuminate\Http\Request;

class WelcomePageController extends Controller
{
    public function index(){
        $motion=Motion::all();
        return view('welcome',['motion'=>$motion]);
    }

    public function showMotion($motionID){
        $motion=Motion::where('motionID',$motionID)->get();
        $pros = Pros::where('motionID', $motionID)->orderBy('prosNumber')->get();
        $cons = Cons::where('motionID', $motionID)->orderBy('consNumber')->get();
        return view('guestShowMotion',['motion' => $motion, 'pros' => $pros, 'cons' => $cons]);
    }
}
