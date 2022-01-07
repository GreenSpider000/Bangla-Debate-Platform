<?php

namespace App\Http\Controllers;

use App\Models\Cons;
use App\Models\Motion;
use App\Models\Pros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ModeratorMotionController extends Controller
{
    public function list()
    {
        $motion = Motion::where('userName',Auth::user()->userName)->get();

        return  view('moderatorManageMotion', ['motion' => $motion]);
    }

    public function create()
    {
        return view('moderatorCreateMotion');
    }

    public function store()
    {
        $data = request()->validate([
            'motionName' => ['required', 'string', 'unique:motions,motionName'],
            'motionDescription' => ['string'],
            'prosTitle' => ['required', 'string',],
            'prosNumber' => ['required', 'integer', 'max:100'],
            'prosDescription' => ['required', 'string'],
            'consTitle' => ['required', 'string',],
            'consNumber' => ['required', 'integer', 'max:100'],
            'consDescription' => ['required', 'string'],
        ]);
        
        Motion::create([
            'motionName' => $data['motionName'],
            'motionDescription' => $data['motionDescription'],
            'userName' => Auth::user()->userName,
        ]);

        $motionID = Motion::where('motionName', $data['motionName'])->value('motionID');

        Pros::create([
            'motionID' => $motionID,
            'prosTitle' => $data['prosTitle'],
            'prosDescription' => $data['prosDescription'],
            'prosNumber' => $data['prosNumber'],
        ]);

        Cons::create([
            'motionID' => $motionID,
            'consTitle' => $data['consTitle'],
            'consDescription' => $data['consDescription'],
            'consNumber' => $data['consNumber'],
        ]);

        return redirect()->intended(route('dashboard.moderatorMotionList'));
    }

    public function edit($motionID)
    {

        $motion = Motion::where('motionID', $motionID)->get();
        $pros = Pros::where('motionID', $motionID)->orderByDesc('prosNumber')->get();
        $cons = Cons::where('motionID', $motionID)->orderByDesc('consNumber')->get();

        return view('moderatorEditMotion', ['motion' => $motion, 'pros' => $pros, 'cons' => $cons]);
    }

    public function update($motion)
    {

        // check if provided motionID exists
        // and it's ur motion
        if (DB::table('motions')
            ->where('motionID', $motion)->exists()
        ) {

            // if change in motion name 
            //then do validation and other stuffs
            if (
                request()->input('motionName') != DB::table('motions')
                ->where('motionID', $motion)->value('motionName')
            ) {

                $data = request()->validate([
                    'motionName' => ['required', 'string', 'unique:motions,motionName'],
                    'motionDescription' => ['string'],
                    'prosTitle' => ['required', 'string',],
                    'prosNumber' => ['required', 'integer', 'max:100'],
                    'prosDescription' => ['required', 'string'],
                    'consTitle' => ['required', 'string',],
                    'consNumber' => ['required', 'integer', 'max:100'],
                    'consDescription' => ['required', 'string'],
                ]);

                Motion::where('motionID', $motion)
                    ->update(
                        ['motionName' => $data['motionName']],
                        ['motionDescription' => $data['motionDescription']],
                    );

                Pros::where('motionID', $motion)
                    ->update(
                        ['prosTitle' => $data['prosTitle']],
                        ['prosDescription' => $data['prosDescription']],
                        ['prosNumber' => $data['prosNumber']],
                    );

                Cons::where('motionID', $motion)
                    ->update(
                        ['consTitle' => $data['consTitle']],
                        ['consDescription' => $data['consDescription']],
                        ['consNumber' => $data['consNumber']],
                    );
            }

            return redirect()->intended(route('dashboard.moderatorMotionList'));
        } else {
            //if given motionID doesn't exists in DB
            //will add success message later
            return redirect()->intended(route('dashboard.moderatorMotionList'));
        }
    }

    public function destroy($motionID)
    {
        if (DB::table('motions')
            ->where('motionID', $motionID)->exists()
        ) {

            DB::table('motions')->where('motionID', $motionID)->delete();

            return redirect()->intended(route('dashboard.moderatorMotionList'));
        } else {

            //will add success message later
            return redirect()->intended(route('dashboard.moderatorMotionList'));
        }
    }
}
