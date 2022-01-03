<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {

//        return Tracking::with(['package','user'])->latest()->paginate(10);
        return view('trackings.index',[
            'trackings' => Tracking::with(['package','user'])->latest()->paginate(10)
        ]);
    }
}
