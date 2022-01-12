<?php

namespace  Tests\Unit;

use App\Http\Controllers\GenreController;
use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class GenreControllerTest extends TestCase
{
    
    use RefreshDatabase;

    public function test_list()
    {
        
        $genre = Genre::orderByDesc('genreName')->get();

        $genres = (new GenreController())->list();

        $checker=false;

        foreach($genres as $genres){

            if($genres->genreName != $genre->genreName){

                break;

                $checker=false;

            }

            $checker=true;

        }

        $this->assertEquals('true',$checker);

        $genres->assertRedirect('manageGenre');

    }

  
    public function test_create()
    {
        
        $createGenre=(new GenreController())->create();

        $this->assertRedirect('createGenre');

    }


    public function test_store()
    {
        
        $response = $this->post(['middleware' => ['auth', 'role:admin','true']],['dashboard/manageGenre/createGenre'], [
            'genreName' => 'TestGenre',
            'genreSlug' => 'testgenre',
        ]);

        $response->assertValidate();
        
        $response->assertRedirect('manageGenre');

    }
    
    
    public function  test_edit()
    {
        
        $response = $this->get(
        ['middleware' => ['auth', 'role:admin','true']],
        ['dashboard/manageGenre/Genre/{TestGenre}'], 
        [
            'genreName' => 'TestGenre',
        ]);
        
        $response->assertRedirect('editGenre',['genreName' => 'TestGenre']);

    }
    
    
    public function test_update()
    {
        
        $genreID=1;

        $response = $this->post(['middleware' => ['auth', 'role:admin','true']],['dashboard/manageGenre/Genre/$genreID'], [
            'genreName' => 'TestGenreUpdate',
            'genreSlug' => 'testgenreupdate',
        ]);

        $response->assertValidate();
        
        $response->assertRedirect('manageGenre');

    }
    
    
    public function test_destroy()
    {
        
        $genreID=1;

        $response = $this->delete(['middleware' => ['auth', 'role:admin','true']],['dashboard/manageGenre/Genre/$genreID']);
        
        $this->assertEquals('true',Storage::disk('genres')->assertMissing('genreID',$genreID));

        $response->assertRedirect('manageGenre');
        
    }
    
    
    public function test_showMotionsOfTheGenre()
    {
        
        $genreName='testgenreupdate';

        $response = $this->get('dashboard/genresMotion/$genreName');
        
        $response->assertRedirect('genresMotions',['genre'=>$genreName,'motion'=>$response->motion]);
        
    }
    
}
