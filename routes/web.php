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

Route::get('/','App\Http\Controllers\WelcomePageController@index');
Route::get('welcome/{motionID}','App\Http\Controllers\WelcomePageController@showMotion');

// show motions of a genre dashboard/genre'sMotion/
Route::get('dashboard/genresMotion/{genreName}', 'App\Http\Controllers\GenreController@showMotionsOfTheGenre')->name('dashboard.showMotionsOfTheGenre'); 

// show a motion
Route::get('dashboard/showMotion/{Motion}', 'App\Http\Controllers\MotionController@showMotion')->name('dashboard.showMotion'); 

// Authenticated Routes

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
    
        //Moderator Motion CRUD Routes
        Route::delete('dashboard/moderatorManageMotion/Motion/{Motion}', 'App\Http\Controllers\ModeratorMotionController@destroy')->name('dashboard.moderatorMotionDelete');

        Route::post('dashboard/moderatorManageMotion/Motion/{Motion}', 'App\Http\Controllers\ModeratorMotionController@update')->name('dashboard.moderatorMotionUpdate');
        Route::get('dashboard/moderatorManageMotion/Motion/{Motion}', 'App\Http\Controllers\ModeratorMotionController@edit');
    
        Route::post('dashboard/moderatorManageMotion/createMotion', 'App\Http\Controllers\ModeratorMotionController@store')->name('dashboard.moderatorMotionCreate');
        Route::get('dashboard/moderatorManageMotion/createMotion', 'App\Http\Controllers\ModeratorMotionController@create');
    
        Route::get('dashboard/moderatorManageMotion/', 'App\Http\Controllers\ModeratorMotionController@list')->name('dashboard.moderatorMotionList');
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

    //User Profile manage Routes
    Route::get('dashboard/manageUsers', 'App\Http\Controllers\UserController@list')->name('dashboard.userProfileList');
    Route::get('dashboard/showUser/{id}', 'App\Http\Controllers\UserController@showUserProfile')->name('dashboard.showUserProfile');
    Route::delete('dashboard/manageUser/User/{id}', 'App\Http\Controllers\UserController@destroyUserProfile')->name('dashboard.destroyUserProfile');


});





require __DIR__ . '/auth.php';
