<?php


namespace Tests;


trait RegistrationData
{

    /**
     * @param array $overrides
     * @return array
     */
    protected function validFields($overrides = [])
    {
        return array_merge([
            'name' => 'ronald tan',
            'phone' => 13798050851,
            'location' => 'EM',
            'password' => '123456',
            'option' => 'air',
            'street' => 'my street',
        ], $overrides);
    }
}
