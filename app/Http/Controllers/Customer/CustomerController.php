<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Services\Customer\CustomerService;
use App\Services\Image\ImageService;
use App\Services\Vendor\VendorService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;
    protected $imageService;

    public function __construct(CustomerService $customerService, ImageService $imageService)
    {
        $this->customerService = $customerService;
        $this->imageService = $imageService;
    }
}
