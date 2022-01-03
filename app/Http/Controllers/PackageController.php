<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
//        return Package::with(['tracking','tracking.user'])->latest()->paginate(10);
        return view('packages.index',[
            'packages' => Package::latest()->paginate(10)
        ]);
    }

    public function show(Package $package)
    {
        $package->load(['tracking','tracking.user']);
//                return $package;

        return view('packages.show',[
            'package' => $package
        ]);
    }
}
