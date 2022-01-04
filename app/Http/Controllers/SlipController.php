<?php

namespace App\Http\Controllers;

use App\Models\Slip;
use Illuminate\Http\Request;

class SlipController extends Controller
{
    public function index()
    {
        return Slip::with('package','user')->latest()->paginate(10);
    }
}
