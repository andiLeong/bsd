<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Package;

class TrackingController extends Controller
{
    public function store()
    {
        request()->validate([
            'data.*.company' => 'required',
            'data.*.number' => 'required|unique:trackings,number',
        ]);

        return Package::create()->tracking()->createMany(
            collect(request('data'))->map(
                fn($data) =>  array_merge($data,['user_id' => auth('api')->user()->id ])
            )->all()
        );
    }
}
