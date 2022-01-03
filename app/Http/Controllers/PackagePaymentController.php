<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackagePaymentController extends Controller
{
    public function update(Package $package)
    {
        $package->pay();
        return back();
    }
}
