<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class UserManagementTest extends TestCase
{

    use RefreshDatabase;
    use WithoutMiddleware;
    
    /** @test */
    public function store_user()
    {
        $response = $this->post('/user', [
            'address' => 'Prueba funcional',
            'email' => 'prueba@prueba.com',
            'username' => 'Prueba',
            'phonenumber' => '3155722034',
            'password' => 'pruo',
        ]);

        $response->assertStatus(201);
    }
}
