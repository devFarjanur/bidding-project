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

    public function customerList()
    {
        $customers = $this->adminService->customer();
        return view('admin.customer.customer-list', compact('customers'));
    }

    public function vendorRequestList()
    {
        $requestVendor = $this->adminService->pendingVendor();
        return view('admin.vendor.vendor-request-list', compact('requestVendor'));
    }

    public function vendorActiveList()
    {
        $activeVendor = $this->adminService->activeVendor();
        return view('admin.vendor.vendor-active-list', compact('activeVendor'));
    }

    public function vendorInactiveList()
    {
        $inactiveVendor = $this->adminService->deactiveVendor();
        return view('admin.vendor.vendor-inactive-list', compact('inactiveVendor'));
    }

    public function vendorRejectList()
    {
        $rejectVendor = $this->adminService->rejectVendor();
        return view('admin.vendor.vendor-reject-list', compact('rejectVendor'));
    }

    public function categoryList()
    {
        $category = $this->adminService->categoryList();
        return view('admin.category.category-list', compact('category'));
    }

    public function subcategoryList()
    {
        $subcategory = $this->adminService->subcateGoryList();
        return view('admin.subcategory.subcategory-list', compact('subcategory'));
    }

    public function acceptBidList()
    {
        $acceptBid = $this->adminService->acceptBid();
        return view('admin.bid.accept-bidding-list', compact('acceptBid'));
    }

    public function pendingBidList()
    {
        $pendingBid = $this->adminService->pendingBid();
        return view('admin.bid.pending-bid-list', compact('pendingBid'));
    }

    public function rejectBidList()
    {
        $rejectBid = $this->adminService->rejectBid();
        return view('admin.bid.reject-bid-list', compact('rejectBid'));
    }
}
