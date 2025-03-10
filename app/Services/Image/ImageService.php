<?php

namespace App\Services\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImageService
{
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $photoName = now()->format('YmdHi') . $photo->getClientOriginalName();
            $path = public_path('upload/admin_images');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0775, true);
            }
            $photo->move($path, $photoName);
            return $photoName;
        }
        return null;
    }
}
