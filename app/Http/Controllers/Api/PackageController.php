<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $user = auth('api')->user();
        return Package::where('user_id',$user->id)->withCount('tracking')->latest('id')->paginate(10);
//        $user->load('package');
//        return $user;
    }

    public function show(Package $package)
    {
        //to do authorize the package owner
        $package->load(['slips','tracking']);
        return $package;
    }
}
