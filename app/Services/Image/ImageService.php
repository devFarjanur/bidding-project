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
            $photoName = now()->format('YmdHi') . '_' . $photo->getClientOriginalName();
            $path = 'upload/admin_images/';

            if (!File::exists(public_path($path))) {
                File::makeDirectory(public_path($path), 0775, true);
            }

            $photo->move(public_path($path), $photoName);

            return $photoName;
        }
        return null;
    }
}
