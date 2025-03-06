<?php

namespace App\Services\Vendor;

use App\Models\Bid;
use App\Models\BidRequest;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VendorService
{
    public function customer()
    {
        return User::where('role', 'customer')
            ->get();
    }

    public function category()
    {
        return Category::get();
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

    public function subcategory()
    {
        return Subcategory::with(['vendor', 'category'])
            ->where('vendor_id', auth::id())
            ->get();
    }

    public function activeSubcategory()
    {
        return Subcategory::with(['vendor', 'category'])
            ->where('status', 1)
            ->get();
    }

    public function bidRequest()
    {
        return BidRequest::with(['customer', 'subcategory'])
            ->where('status', 0)
            ->orderBy('id', 'desc')
            ->paginate(10);
    }

    public function bidRequestFind($id)
    {
        return BidRequest::with(['customer', 'subcategory'])
            ->findOrFail($id);
    }

    public function bidFind($id)
    {
        return Bid::with(['vendor', 'bidRequest'])
            ->where('bid_request_id', $id)
            ->findOrFail($id);
    }

    public function acceptBid()
    {
        return Bid::with(['vendor', 'bidRequest'])
        ->where('vendor_id', auth::id())
        ->where('status', 1)
        ->get();
    }
}
