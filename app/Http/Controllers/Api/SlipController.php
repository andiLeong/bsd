<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slip;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;

class SlipController extends Controller
{
    public function store(Filesystem $fileManager)
    {
        $data = request()->validate([
            'file' => 'required|file|image',
            'package_id' => 'required|exists:packages,id',
        ]);

        $file = $data['file'];
        $data = collect($data)->merge([
            'url' => $fileManager->putFileAs('bsd', $file, "bsd_". $file->getClientOriginalName() ,'public'),
        ])->except('file')->all();
//        dd($data);
        return Slip::create($data);
    }
}
