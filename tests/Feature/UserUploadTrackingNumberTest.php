<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UserUploadTrackingNumberTest extends TestCase
{

    use LazilyRefreshDatabase;


    /** @test */
    public function it_can_register_many_express_tracking_number()
    {
        $user = User::factory()->create();

//        Auth::loginUsingId($user->id);
        $response =  $this->postJson('/api/tracking',[
            'data' =>[
                [
                    'company' => 'shunfeng',
                    'number' => 'amkiop',
                    'user_id' => $user->id
                ],
                [
                    'company' => 'shunfeng',
                    'number' => 'amkiop111111',
                    'user_id' => $user->id
                ],
            ]
        ]);

//        dd($response->getContent());
        $this->assertDatabaseCount('trackings',2);
        $this->assertDatabaseCount('packages',1);
        $response->assertStatus(200);
    }
}
