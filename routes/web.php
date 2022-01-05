<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\CrapIndex;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//dashboard Route
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

// user Routes
Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('dashboard/userProfile', 'App\Http\Controllers\DashboardController@showUserProfile')->name('dashboard.userProfile');
});

// moderator Routes
Route::group(['middleware' => ['auth', 'role:moderator']], function () {
    Route::get('dashboard/moderatorProfile', 'App\Http\Controllers\DashboardController@showModeratorProfile')->name('dashboard.moderatorProfile');
});

// admin Routes
Route::group(['middleware' => ['auth', 'role:admin']], function () {

    Route::get('dashboard/adminProfile', 'App\Http\Controllers\DashboardController@showAdminProfile')->name('dashboard.adminProfile');

    //Genre CRUD Routes
    Route::delete('dashboard/manageGenre/Genre/{genre}', 'App\Http\Controllers\GenreController@destroy')->name('dashboard.genreDelete');

    Route::post('dashboard/manageGenre/Genre/{genre}', 'App\Http\Controllers\GenreController@update')->name('dashboard.genreUpdate');
    Route::get('dashboard/manageGenre/Genre/{genre}', 'App\Http\Controllers\GenreController@edit');

    Route::post('dashboard/manageGenre/createGenre', 'App\Http\Controllers\GenreController@store')->name('dashboard.genreCreate');
    Route::get('dashboard/manageGenre/createGenre', 'App\Http\Controllers\GenreController@create');

    Route::get('dashboard/manageGenre', 'App\Http\Controllers\GenreController@list')->name('dashboard.genreList');

    //Motion CRUD Routes
    Route::delete('dashboard/manageMotion/Motion/{Motion}', 'App\Http\Controllers\MotionController@destroy')->name('dashboard.motionDelete');

    Route::post('dashboard/manageMotion/Motion/{Motion}', 'App\Http\Controllers\MotionController@update')->name('dashboard.motionUpdate');
    Route::get('dashboard/manageMotion/Motion/{Motion}', 'App\Http\Controllers\MotionController@edit');

    Route::post('dashboard/manageMotion/createMotion', 'App\Http\Controllers\MotionController@store')->name('dashboard.motionCreate');
    Route::get('dashboard/manageMotion/createMotion', 'App\Http\Controllers\MotionController@create');

    Route::get('dashboard/manageMotion', 'App\Http\Controllers\MotionController@list')->name('dashboard.motionList');


});



// genre views
//createGenre.blade.php
//editGenre.blade.php
//manageGenre.blade.php

//createMotion.blade.php -
//editMotion.blade.php -
//manageMotion.blade.php -


require __DIR__ . '/auth.php';
