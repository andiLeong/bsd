<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use LazilyRefreshDatabase;

    /** @test */
    public function it_can_register_user()
    {
        $response = $this->postJson('/api/register',$data = [
            'name' => 'ronald',
            'phone' => 13798050851,
            'location' => 'east_malaysia',
            'password' => '123456',
            'option' => 'air',
            'street' => 'my street',
        ]);

        $this->assertDatabaseCount('users',1);
        $this->assertNotEquals('123456',User::first()->password);
    }

    /** @test */
    public function it_can_register_user_address()
    {
        $response = $this->postJson('/api/register',$data = [
            'name' => 'ronald',
            'phone' => 13798050851,
            'location' => 'east_malaysia',
            'password' => '123456',
            'option' => 'air',
            'street' => 'air',
        ]);
        $this->assertDatabaseCount('addresses',1);
    }
}
