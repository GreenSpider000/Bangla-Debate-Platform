<?php

namespace Tests\Unit;

use App\Http\Controllers\ModeratorMotionController;
use App\Models\Cons;
use App\Models\Motion;
use App\Models\Pros;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ModeratorMotionControllerTest extends TestCase
{

    use RefreshDatabase;

    public function test_list()
    {

        //get all the motions for 'david_wood'

        $userName = 'david_wood';

        Auth::user()->userName->$userName;

        $motion = Motion::where('userName', $userName)->get();

        $usersMotion = (new ModeratorMotionController())->list();

        $checker = false;

        foreach ($usersMotion as $usersMotion) {

            if ($usersMotion->motionName != $motion->motionName) {

                break;

                $checker = false;
            }

            $checker = true;
        }

        $this->assertEquals('true', $checker);

        $usersMotion->assertRedirect('moderatorManageMotion');
    }


    public function test_create()
    {

        $createMotion = (new ModeratorMotionController())->create();

        $createMotion->assertRedirect('ModeratorCreateMotion');
    }


    public function test_store()
    {

        $response = $this->post(['middleware' => ['auth', 'role:moderator', 'true']], ['dashboard/moderatorManageMotion/createMotion'], [
            'motionName' => 'test motion title',
            'motionDescription' => 'test motion description',
            'userName' => 'david_wood',
            'prosTitle' => 'test pros title',
            'prosNumber' => '1',
            'prosDescription' => 'test pros description',
            'consTitle' => 'test cons title',
            'consNumber' => '1',
            'consDescription' => 'test cons description',
        ]);

        $response->assertValidate();

        $response->assertRedirect('moderatorManageMotion');
    }


    public function test_edit()
    {

        // get moderatorEditMotion view for motionID 1

        $motionID = 1;

        $response = $this->get(
            ['middleware' => ['auth', 'role:moderator', 'true']],
            ['dashboard/moderatorManageMotion/Motion/$motionID'],
            [
                'motionID' => $motionID,
            ]
        );

        $pros = Pros::where('motionID', $motionID)->orderByDesc('prosNumber')->get();

        $cons = Cons::where('motionID', $motionID)->orderByDesc('consNumber')->get();

        $response->assertRedirect('moderatorEditMotion', ['motion' => $motionID, 'pros' => $pros, 'cons' => $cons]);
    }


    public function  test_update()
    {

        // update motion for motionID 1

        $motionID = 1;

        $response = $this->post(['middleware' => ['auth', 'role:moderator', 'true']], ['dashboard/moderatorManageMotion/Motion/$motionID'], [
            'motionName' => 'test motion title update',
            'motionDescription' => 'test motion description update',
            'userName' => 'david_wood',
            'prosTitle' => 'test pros title update',
            'prosNumber' => '1',
            'prosDescription' => 'test pros description update',
            'consTitle' => 'test cons title update',
            'consNumber' => '1',
            'consDescription' => 'test cons description update',
        ]);

        $response->assertValidate();

        $response->assertRedirect('moderatorManageMotion');

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

        $response = $this->delete(['middleware' => ['auth', 'role:moderator', 'true']], ['dashboard/moderatorManageMotion/Motion/$motionID']);

        $this->assertEquals('true', Storage::disk('motions')->assertMissing('motionID', $motionID));

        $response->assertRedirect('moderatorManageMotion');
    }
    
}
