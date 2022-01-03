<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackagePriceController extends Controller
{

    public function edit(Package $package)
    {
        return view('packages.price.edit',compact('package'));
    }


    public function update(Package $package)
    {
        request()->validate([
            'price' => 'required|int'
        ]);
        $package->update(['price' => request('price')]);
        return redirect('/packages');
    }
}
