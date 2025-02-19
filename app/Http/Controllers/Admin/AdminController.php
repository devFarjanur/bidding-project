<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AdminService;
use App\Services\Image\ImageService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService, ImageService $imageService)
    {
        $this->adminService = $adminService;
        $this->imageService = $imageService;
    }
}
