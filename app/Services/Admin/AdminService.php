<?php

namespace App\Services\Admin;

use App\Models\Bidrequest;
use App\Models\Category;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Client\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Support\Facades\Log;

class AdminService
{
    public function customer()
    {
        return User::where('role', 'customer')
            ->get();
    }

    public function activeCustomer()
    {
        return User::where('role', 'customer')
            ->status('status', 1)
            ->get();
    }

    public function deactiveCustomer()
    {
        return User::where('role', 'customer')
            ->status('status', 2)
            ->get();
    }

    public function findCustomer($id)
    {
        return User::where('role', 'customer')
            ->findOrFail($id);
    }

    public function updateToActiveCustomer(Request $request, $id)
    {
        $customer = $this->findCustomer($id);
        $updateActive = $customer->update(['status' => 1]);
        return $updateActive;
    }

    public function updateToDeactiveCustomer(Request $request, $id)
    {
        $customer = $this->findCustomer($id);
        $updateDeactive = $customer->update(['status' => 2]);
        return $updateDeactive;
    }

    public function findVendor($id)
    {
        return Vendor::with('user')
            ->findOrFail($id);
    }

    public function pendingVendor()
    {
        return Vendor::with('vendor')
            ->where('status', 0)
            ->get();
    }

    public function activeVendor()
    {
        return Vendor::with('vendor')
            ->where('status', 1)
            ->get();
    }

    public function deactiveVendor()
    {
        return Vendor::with('vendor')
            ->where('status', 2)
            ->get();
    }

    public function rejectVendor()
    {
        return Vendor::with('vendor')
            ->where('status', 3)
            ->get();
    }

    public function updateToActiveVendor(Request $request, $id)
    {
        $vendor = $this->findVendor($id);
        $vendorActive = $vendor->update([
            'status' => 1
        ]);
        return $vendorActive;
    }

    public function updateToDeactiveVendor(Request $request, $id)
    {
        $vendor = $this->findVendor($id);
        $vendorDeactive = $vendor->update([
            'status' => 2
        ]);
        return $vendorDeactive;
    }

    public function updateToRejectVendor(Request $request, $id)
    {
        $vendor = $this->findVendor($id);
        $vendorReject = $vendor->update([
            'status' => 3
        ]);
        return $vendorReject;
    }

    public function categoryList()
    {
        return Category::get();
    }

    public function findCategory($id)
    {
        return Category::findOrFail($id);
    }

    public function activeCategory()
    {
        return Category::where('status', 1)
            ->get();
    }

    public function deactiveCategory()
    {
        return Category::where('status', 2)
            ->get();
    }

    public function updateToActiveCategory(Request $request, $id)
    {
        $findCategory = $this->findCategory($id);
        $activeCategory = $findCategory->update([
            'status' => 1
        ]);
        return $activeCategory;
    }

    public function updateToDeactiveCategory(Request $request, $id)
    {
        $findCategory = $this->findCategory($id);
        $deactiveCategory = $findCategory->update([
            'status' => 2
        ]);
        return $deactiveCategory;
    }

    public function pendingBid()
    {
        return BidRequest::with(['vendor', 'bidRequest'])
            ->where('status', 0)
            ->get();
    }

    public function acceptBid()
    {
        return BidRequest::with(['vendor', 'bidRequest'])
            ->where('status', 1)
            ->get();
    }

    public function rejectBid()
    {
        return BidRequest::with(['vendor', 'bidRequest'])
            ->where('status', 3)
            ->get();
    }



}
