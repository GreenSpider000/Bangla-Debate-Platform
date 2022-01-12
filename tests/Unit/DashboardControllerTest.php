<?php

namespace Tests\Unit;

use App\Http\Controllers\DashboardController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class DashboardControllerTest extends TestCase
{

    use RefreshDatabase;

    public function test_index()
    {
        
        $role_id=3;

        $id=1;

        $user=User::factory()->auth($id);

        $response = $this->get('/dashboard', [
            'user' => $user,
            'role_id' => $role_id,
        ]); 

        $response->assertAuthenticated();
        
        $response->assertRedirect('userDashboard');
        
    }
    
    
    public function test_showUserProfile()
    {

        $role_id=1;

        $id=3;
        
        $response = $this->get('dashboard/userProfile', [
            'id' => $id,
            'role_id' => $role_id,
        ]); 

        $response->assertRedirect('userProfile');

    }
    
    
    public function test_showModeratorProfile()
    { 
        
        $role_id=2;

        $id=2;
        
        $response = $this->get('dashboard/moderatorProfile', [
            'id' => $id,
            'role_id' => $role_id,
        ]); 

        $response->assertRedirect('moderatorProfile');
        
    }


    public function test_showAdminProfile()
    {  
        
        $role_id=1;

        $id=3;
        
        $response = $this->get('dashboard/adminProfile', [
            'id' => $id,
            'role_id' => $role_id,
        ]); 

        $response->assertRedirect('adminProfile'); 
        
    }
}
