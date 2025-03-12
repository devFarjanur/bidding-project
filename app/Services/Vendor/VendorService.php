<?php

namespace App\Services\Vendor;

use App\Models\Bid;
use App\Models\BidRequest;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

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
            ->whereIn('status', [0, 1])
            ->orderBy('id', 'desc')
            ->paginate(10);
    }

    public function bidRequestFind($id)
    {
        return BidRequest::with(['customer', 'subcategory'])
            ->findOrFail($id);
    }

    public function getBid($id)
    {
        return Bid::with(['vendor', 'bidRequest'])
            ->where('bid_request_id', $id)
            ->get();
    }

    public function bidSubmit(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $bidRequest = $this->bidRequestFind($id);

            Bid::create([
                'vendor_id' => Auth::id(),
                'bid_request_id' => $bidRequest->id,
                'proposed_price' => $request->proposed_price,
                'status' => 1
            ]);

            $bidRequest->update([
                'status' => 1
            ]);

            DB::commit();
            return true;

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Bid Accept Error: ' . $e->getMessage());
            return redirect()->back()->with(notify('Something went wrong. Please try again.', 'error'));
        }
    }

    public function acceptBid()
    {
        return Bid::with(['vendor', 'bidRequest'])
            ->where('vendor_id', auth::id())
            ->where('status', 2)
            ->get();
    }
}
