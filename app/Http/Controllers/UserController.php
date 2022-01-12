<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function list()
    {

        $user = User::all();

        return  view('manageUser', ['user' => $user]);

    }

    public function showUserProfile($id)
    {
        
        $user = User::where('id', $id)->get();
        
        $role_id = DB::table('role_user')->where('user_id', '=', $id)->value('role_id');

        return view('showProfileForAdmin', ['user' => $user]);

    }

    public function destroyUserProfile($id)
    {
        
        if (DB::table('users')
            ->where('id', $id)->exists()
        ) {

            DB::table('users')->where('id', $id)->delete();

            return redirect()->intended(route('dashboard.userProfileList'));
        } else {

            //will add success message later
            return redirect()->intended(route('dashboard.userProfileList'));
        }

    }
}
