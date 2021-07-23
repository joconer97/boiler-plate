<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */

     /** @test */
    public function get_user_not_found()
    {
        $response = $this->getJson('/api/user/100');

        $response
            ->assertStatus(404);
    }

    /** @test */

    public function new_user()
    {
        $response = $this->postJson('/api/user',
        [
            'name' => 'Sample New',
            'email' => 'sample@gmail.com',
            'password' => '123456789'
                            
        ]);

        $response
            ->assertStatus(201);
    }

     /** @test */
     public function name_is_required()
     {
        $response = $this->postJson('/api/user',
        [
            'name' => '',
            'email' => 'sample@gmail.com',
            'password' => '123456789'
                            
        ]);

        $response
            ->assertStatus(500);
     }

    /** @test */
     public function email_is_required()
     {
        $response = $this->postJson('/api/user',
        [
            'name' => 'sample name',
            'email' => '',
            'password' => '123456789'
                            
        ]);

        $response
            ->assertStatus(500);
     }

     /** @test */
     public function email_format()
     {
        $response = $this->postJson('/api/user',
        [
            'name' => 'sample name',
            'email' => 'samplegg',
            'password' => '123456789'
                            
        ]);

        $response
            ->assertStatus(500);
     }


}
