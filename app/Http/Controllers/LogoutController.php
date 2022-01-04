<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store()
    {
        if(request('source') == 'api'){
            auth('api')->logout();
            return ['success'];
        }
        auth('web')->logout();
        return redirect('/');
    }
}
