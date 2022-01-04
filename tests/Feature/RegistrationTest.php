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
        $this->register();

        $this->assertDatabaseCount('addresses',1);
        $this->assertDatabaseCount('users',1);
    }

    protected function register($data = [])
    {
        return $this->postJson('/api/register',  $this->validFields($data));
    }


    /**
     * @test
     * @dataProvider validationProvider
     */
    public function test_form_validation($formInput, $formInputValue)
    {
        $response = $this->register([
            $formInput => $formInputValue,
        ]);

        $response->assertStatus(422);
        $response->assertInvalid($formInput);
    }

    public function validationProvider()
    {
        return [
            ['name', ''],
            ['phone', ''],
            ['phone', 111111111],
            ['location', ''],
            ['location', 'ABC'],
            ['password', ''],
            ['password', '12345'],
            ['street', ''],
            ['option', ''],
            ['option', 'sssssssss'],
        ];
    }


    /**
     * @param array $overrides
     * @return array
     */
    protected function validFields($overrides = [])
    {
        return array_merge([
            'name' => 'ronald',
            'phone' => 13798050851,
            'location' => 'EM',
            'password' => '123456',
            'option' => 'air',
            'street' => 'my street',
        ],$overrides);
}


}
