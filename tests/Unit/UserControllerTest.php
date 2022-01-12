<?php

namespace Tests\Unit;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
   
    use RefreshDatabase;

    public function test_list()
    {


        $user = User::all();

        $response = $this->get(['middleware' => ['auth', 'role:admin', 'true']], ['dashboard/manageUsers']);

        $response->assertRedirect('manageUser', ['user' => $user]);

        $checker = false;

        foreach ($response as $response) {

            if ($response->id != $user->id) {

                break;

                $checker = false;
            }

            $checker = true;
        }

        $this->assertEquals('true', $checker);
    }


    public function test_showUserProfile()
    {


        $id = 1;

        $user = User::where('id', $id)->get();

        $role_id = DB::table('role_user')->where('user_id', '=', $id)->value('role_id');

        $response = $this->get(['middleware' => ['auth', 'role:admin', 'true']], ['dashboard/showUser/$id'], [
            'id' => $id,
        ]);

        $this->assertEquals($id, $response->id);

        $this->assertEquals($role_id, $response->role_id);

        $response->assertRedirect('showProfileForAdmin', ['user' => $user]);
    }


    public function test_destroyUserProfile()
    {


        $id = 1;

        $response = $this->delete(['middleware' => ['auth', 'role:admin', 'true']], ['dashboard/manageUser/User/$id'], [
            'id' => $id,
        ]);

        $this->assertEquals('true', Storage::disk('users')->assertMissing('id', $id));

        $response->assertRedirect('manageUser', ['user' => User::all()]);
    }
 
}
