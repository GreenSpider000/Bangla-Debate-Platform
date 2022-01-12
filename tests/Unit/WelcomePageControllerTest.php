<?php

namespace Tests\Unit;

use App\Http\Controllers\MotionController;
use App\Models\Cons;
use App\Models\Motion;
use App\Models\Pros;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WelcomePageControllerTest extends TestCase
{

    use RefreshDatabase;
    public function test_index()
    {


        $allMotion = Motion::all();

        $motion = (new MotionController())->list();

        $checker = false;

        foreach ($motion as $motion) {

            if ($motion->motionName != $allMotion->motionName) {

                break;

                $checker = false;
            }

            $checker = true;
        }

        $this->assertEquals('true', $checker);

        $motion->assertRedirect('welcome', ['motion' => $allMotion]);
    }



    public function test_showMotion()
    {

        $motionID = 1;

        $response = $this->get(['dashboard/showMotion/$motionID'], [
            'motionID' => $motionID,
        ]);

        $motion = Motion::where('motionID', $motionID)->get();

        $pros = Pros::where('motionID', $motionID)->orderByDesc('prosNumber')->get();

        $cons = Cons::where('motionID', $motionID)->orderByDesc('consNumber')->get();

        $response->assertRedirect('guestShowMotion', ['motion' => $motion, 'pros' => $pros, 'cons' => $cons]);
    }
}
