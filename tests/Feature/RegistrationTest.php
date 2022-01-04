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

    /** @test */
    public function it_required_a_name()
    {
        $this->register(['name' => ''])->assertInvalid(['name']);;
    }

    /** @test */
    public function it_required_a_phone()
    {
        $this->register(['phone' => ''])->assertInvalid(['phone']);;
    }

    /** @test */
    public function phone_must_be_11_digits()
    {
        $this->register(['phone' => 111111111])->assertInvalid(['phone']);;
    }

    /** @test */
    public function it_required_a_location()
    {
        $this->register(['location' => ''])->assertInvalid(['location']);;
    }

    /** @test */
    public function location_only_accept_3_values()
    {
        $this->register(['location' => 'ABC'])->assertInvalid(['location']);;
    }

    /** @test */
    public function it_required_password()
    {
        $this->register(['password' => ''])->assertInvalid(['password']);;
    }

    /** @test */
    public function password_must_be_at_least_6_long()
    {
        $this->register(['password' => 12345])->assertInvalid(['password']);;
    }

    /** @test */
    public function it_required_a_street()
    {
        $this->register(['street' => ''])->assertInvalid(['street']);;
    }

    /** @test */
    public function it_required_an_option()
    {
        $this->register(['optional' => ''])->assertInvalid(['optional']);;
    }

    /** @test */
    public function option_must_be_a_valid_option()
    {
        $this->register(['optional' => 'ssssss'])->assertInvalid(['optional']);;
    }

    protected function register($data = [])
    {
        return $this->postJson('/api/register',  $this->validFields($data));
    }


//    /**
//     * @test
//     * @dataProvider validationProvider
//     */
//    public function test_form_validation($formInput, $formInputValue)
//    {
//        $response = $this->register([
//            $formInput => $formInputValue,
//        ]);
//
//        $response->assertStatus(422);
//        $response->assertInvalid($formInput);
//    }
//
//    public function validationProvider()
//    {
//        return [
//            ['name', ''],
//            ['phone', ''],
//            ['phone', 111111111],
//            ['location', ''],
//            ['location', 'ABC'],
//            ['password', ''],
//            ['password', '12345'],
//            ['street', ''],
//            ['optional', ''],
//            ['optional', 'sssssssss'],
//        ];
//    }


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
