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

    public function customerList()
    {
        $customers = $this->vendorService->customer();
        return view('vendor.customer.customer-list', compact('customers'));
    }

    public function categoryList()
    {
        $category = $this->vendorService->category();
        return view('vendor.category.category-list', compact('category'));
    }

    public function subcategoryList()
    {
        $subcategory = $this->vendorService->subcategory();
        return view('vendor.subcategory.subcategory-list', compact('subcategory'));
    }

    public function addSubcategory()
    {
        return view('vendor.subcategory.add-subcategory');
    }

    public function bidRequestList()
    {
        $bidRequest = $this->vendorService->bidRequest();
        return view('vendor.bid.bid-request-list', compact('bidRequest'));
    }

    public function bidRequestDetails($id)
    {
        $bidRequest = $this->vendorService->bidRequestFind($id);
        $bid = $this->vendorService->bidFind($id);
        return view('vendor.bid.vendor-bid-submit', compact('bidRequest', 'bid'));
    }

    // public function bidRequestDetails()
    // {
    //     // $bidRequest = $this->vendorService->bidRequestFind($id);
    //     // $bid = $this->vendorService->bidFind($id);
    //     return view('vendor.bid.vendor-bid-submit');
    // }

    public function acceptBid()
    {
        $acceptBid = $this->vendorService->acceptBid();
        return view('vendor.bid.vendor-accept-bid-list', compact('acceptBid'));
    }
}
