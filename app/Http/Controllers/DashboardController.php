<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Motion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $role_id = DB::table('role_user')->where('user_id', '=', Auth::user()->id)->value('role_id');
        $user=User::where('id',Auth::user()->id)->get();

        $genre=Genre::all();
        $motion=Motion::all();


        // if the user is general user

        if ($role_id == 3) {

            session(['user_role' => 'user']);
            
            return view('userDashboard',['genre'=>$genre,'motion'=>$motion]);
        }

        // if the user is moderator

        elseif ($role_id == 2) {

            session(['user_role' => 'moderator']);

            return view('moderatorDashboard',['genre'=>$genre,'motion'=>$motion]);
        }

        // if the user is admin

        elseif ($role_id == 1) {

            session(['user_role' => 'admin']);

            return view('adminDashboard',['genre'=>$genre,'motion'=>$motion]);
        }

        // otherwise unknown user
        else {

            return redirect()->route('/');
        }
    }

    public function showUserProfile()
    {
        return view('userProfile');
    }

    public function showModeratorProfile()
    {   
        return view('moderatorProfile');
    }

    public function showAdminProfile()
    {   
        return view('adminProfile');
    }
}
