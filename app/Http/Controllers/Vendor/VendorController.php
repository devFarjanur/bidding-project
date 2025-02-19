<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Services\Image\ImageService;
use App\Services\Vendor\VendorService;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    protected $vendorService;

    public function __construct(VendorService $vendorService, ImageService $imageService)
    {
        $this->vendorService = $vendorService;
        $this->imageService = $imageService;
    }
}
