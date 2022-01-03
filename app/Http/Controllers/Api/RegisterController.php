<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'phone' => 'required|digits:11',
            'location' => ['required', Rule::in(config('user.location_prefix')),],
            'password' => 'required|min:6',
            'street' => 'required',
            'option' => [
                'required',
                Rule::in(['ship', 'air']),
            ],
        ]);
        return tap(
            User::create(request()->except('street')) ,
            fn($user) => $user->address()->create(request()->only('street'))
        );
    }
}
