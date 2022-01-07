<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Motion;
use App\Models\MotionGenre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    public function list()
    {
        $genre = Genre::orderByDesc('genreName')
            ->get();

        return  view('manageGenre', ['genre' => $genre]);
    }

    public function create()
    {
        return view('createGenre');
    }

    public function store()
    {
        $data = request()->validate([
            'genreName' => ['required', 'string', 'max:80', 'unique:genres,genreName'],
        ]);

        $data = [
            'genreName' => request()->input('genreName'),
            'genreSlug' => strtolower(request()->input('genreName')),
        ];

        Genre::create($data);

        return redirect()->intended(route('dashboard.genreList'));
    }

    public function edit($genre)
    {

        $genre = DB::table('genres')->where('genreID', $genre)->get();

        return view('editGenre', ['genre' => $genre]);
    }

    public function update($genre)
    {

        // check if provided genreID exists
        if (DB::table('genres')
            ->where('genreID', $genre)->exists()
        ) {

            // if change in genre name 
            //then do validation and other stuffs
            if (
                request()->input('genreName') != DB::table('genres')
                ->where('genreID', $genre)->value('genreName')
            ) {

                $data = request()->validate([
                    'genreName' => ['required', 'string', 'max:80', 'unique:genres,genreName'],
                ]);
                
                $data = [
                    'genreName' => request()->input('genreName'),
                    'genreSlug' => strtolower(request()->input('genreName')),
                ];

                Genre::where('genreID', $genre)
                    ->update(
                        ['genreName' => $data['genreName']],
                        ['genreSlug' => $data['genreSlug']],
                    );
            }

            return redirect()->intended(route('dashboard.genreList'));
        } else {
            //if given genreID doesn't exists in DB
            //will add success message later
            return redirect()->intended(route('dashboard.genreList'));
        }
    }

    public function destroy($genre)
    {


        if (DB::table('genres')
            ->where('genreID', $genre)->exists()
        ) {

            DB::table('genres')->where('genreID', $genre)->delete();

            return redirect()->intended(route('dashboard.genreList'));
        } else {

            //will add success message later
            return redirect()->intended(route('dashboard.genreList'));
        }
    }

    public function showMotionsOfTheGenre($genreName){
        $genre=Genre::where('genreName',$genreName)->get();
        $motion=Motion::all()->take(2);
        return view('genresMotions',['genre'=>$genre,'motion'=>$motion]);

    }
}
