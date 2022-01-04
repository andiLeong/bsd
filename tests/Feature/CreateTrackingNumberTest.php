<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class CreateTrackingNumberTest extends TestCase
{

    use LazilyRefreshDatabase;


    /** @test */
    public function it_can_register_many_express_tracking_number()
    {
//        $user = User::factory()->create();
        $data = [
            'data' => [
                [
                    'company' => 'shunfeng',
                    'number' => 'amkiop',
                ],
                [
                    'company' => 'shunfeng',
                    'number' => 'amkiop111111',
                ],
            ]
        ];

        $response =  $this->jsonAs('POST', '/api/tracking', null ,$data);
//        $response =  $this->postJson('/api/tracking',[
//            'data' =>[
//                [
//                    'company' => 'shunfeng',
//                    'number' => 'amkiop',
//                ],
//                [
//                    'company' => 'shunfeng',
//                    'number' => 'amkiop111111',
//                ],
//            ]
//        ]);

//        dd($response->getContent());
        $this->assertDatabaseCount('trackings',2);
        $this->assertDatabaseCount('packages',1);
        $response->assertStatus(200);
    }
}
