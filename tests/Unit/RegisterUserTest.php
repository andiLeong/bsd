<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\RegistrationData;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    use LazilyRefreshDatabase;
    use RegistrationData;

    /** @test */
    public function it_can_make_the_username_in_location_option_format()
    {

        $data = $this->validFields();
        unset($data['street']);
        $user = User::create($data);

        $this->assertEquals('air_EM_ronald_tan',$user->username);
    }
}
