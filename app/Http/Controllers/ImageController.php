<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadImageRequest;
use Storage;

class ImageController extends Controller
{
    public function upload(UploadImageRequest $request)
    {
        $s = $request->file('image')->store('public');

        return Storage::url($s);
    }

}
