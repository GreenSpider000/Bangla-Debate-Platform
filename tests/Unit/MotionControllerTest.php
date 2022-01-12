<?php

namespace Tests\Unit;

use App\Http\Controllers\MotionController;
use App\Models\Cons;
use App\Models\Motion;
use App\Models\Pros;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class MotionControllerTest extends TestCase
{

    use RefreshDatabase;

    public function test_showMotion()
    {


        $motionID = 1;

        $response = $this->get(
            ['dashboard/showMotion/$motionID'],
            [
                'motionID' => $motionID,
            ]
        );

        $motion = Motion::where('motionID', $motionID)->get();

        $pros = Pros::where('motionID', $motionID)->orderByDesc('prosNumber')->get();

        $cons = Cons::where('motionID', $motionID)->orderByDesc('consNumber')->get();



        $response->assertRedirect('showMotion', ['motion' => $motion, 'pros' => $pros, 'cons' => $cons]);
    }


    public function test_list()
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

        $motion->assertRedirect('manageMotion', ['motion' => $allMotion]);
    }


    public function test_create()
    {

        $createMotion = (new MotionController())->create();

        $createMotion->assertRedirect('createMotion');
    }


    public function test_store()
    {

        $response = $this->post(['middleware' => ['auth', 'role:admin', 'true']], ['dashboard/manageMotion/createMotion'], [
            'motionName' => 'test motion title',
            'motionDescription' => 'test motion description',
            'userName' => 'rafi',
            'prosTitle' => 'test pros title',
            'prosNumber' => '1',
            'prosDescription' => 'test pros description',
            'consTitle' => 'test cons title',
            'consNumber' => '1',
            'consDescription' => 'test cons description',
        ]);

        $response->assertValidate();

        $response->assertRedirect('manageMotion');
    }


    public function test_edit()
    {

        $motionID = 1;

        $response = $this->get(
            ['middleware' => ['auth', 'role:admin', 'true']],
            ['dashboard/manageMotion/Motion/$motionID'],
            [
                'motionID' => $motionID,
            ]
        );

        $pros = Pros::where('motionID', $motionID)->orderByDesc('prosNumber')->get();

        $cons = Cons::where('motionID', $motionID)->orderByDesc('consNumber')->get();

        $response->assertRedirect('editMotion', ['motion' => $motionID, 'pros' => $pros, 'cons' => $cons]);
    }


    public function test_update()
    {


        $motionID = 1;

        $response = $this->post(['middleware' => ['auth', 'role:admin', 'true']], ['dashboard/manageMotion/Motion/$motionID'], [
            'motionName' => 'test motion title update',
            'motionDescription' => 'test motion description update',
            'userName' => 'rafi',
            'prosTitle' => 'test pros title update',
            'prosNumber' => '1',
            'prosDescription' => 'test pros description update',
            'consTitle' => 'test cons title update',
            'consNumber' => '1',
            'consDescription' => 'test cons description update',
        ]);

        $response->assertValidate();

        $response->assertRedirect('manageMotion');

        $pros = Pros::where('motionID', $motionID)->orderByDesc('prosNumber')->get();

        $cons = Cons::where('motionID', $motionID)->orderByDesc('consNumber')->get();

        $checker = false;


        foreach ($pros as $pros) {

            if (
                $pros->prosTitle != $response->prosTitle &&
                $pros->prosNumber != $response->prosNumber &&
                $pros->prosDescription != $response->prosDescription
            ) {

                break;

                $checker = false;
            }

            $checker = true;
        }


        foreach ($cons as $cons) {

            if (
                $cons->consTitle != $response->consTitle &&
                $cons->consNumber != $response->consNumber &&
                $cons->consDescription != $response->consDescription
            ) {

                break;

                $checker = false;
            }

            $checker = true;
        }

        //if reach here then motion,pros and cons has updated

        $this->assertEquals('true', $checker);
    }


    public function test_destroy()
    {

        //delete motion where motionID 1

        $motionID = 1;

        $response = $this->delete(['middleware' => ['auth', 'role:admin', 'true']], ['dashboard/manageMotion/Motion/$motionID']);

        $this->assertEquals('true', Storage::disk('motions')->assertMissing('motionID', $motionID));

        $response->assertRedirect('manageMotion');
    }
    
}
