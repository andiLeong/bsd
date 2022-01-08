<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;


    public function jsonAs($method, $endpoint, User $user = null ,$data = [], $headers = [])
    {
        $userId = $this->user($user)->id;
        return $this->json($method, $endpoint, $data, array_merge($headers, [
            'Authorization' => 'Bearer ' . auth('api')->tokenById($userId)
        ]));
    }

    public function user(User $user = null)
    {
        return $user ??  User::factory()->create();
    }
}
