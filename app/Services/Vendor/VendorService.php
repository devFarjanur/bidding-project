<?php

namespace App\Services\Vendor;

use App\Models\Bid;
use App\Models\BidRequest;
use App\Models\BidTrack;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use App\Services\Image\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class VendorService
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function customer()
    {
        return User::where('role', 'customer')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function category()
    {
        return Category::orderBy('id', 'desc')
            ->get();
    }

    public function activeCategory()
    {
        return Category::where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function deactiveCategory()
    {
        return Category::where('status', 2)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function subcategory()
    {
        return Subcategory::with(['vendor', 'category'])
            ->where('vendor_id', auth::id())
            ->orderBy('id', 'desc')
            ->get();
    }

    public function storeSubcategory(Request $request)
    {
        try {

            $imagePath = $this->imageService->uploadImage($request);

            Subcategory::create([
                'category_id' => $request->category_id,
                'vendor_id' => Auth::id(),
                'name' => $request->name,
                'image' => $imagePath
            ]);

            return redirect()->route('vendor.subcategory.list')->with(notify('Add successfully', 'success'));
        } catch (Exception $e) {
            Log::error('error: ' . $e->getMessage());
            return redirect()->back()->with(notify('Failed', 'error'));
        }
    }

    public function activeSubcategory()
    {
        return Subcategory::with(['vendor', 'category'])
            ->where('status', 1)
            ->orderBy('id', 'desc')
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
            ->orderBy('id', 'desc')
            ->findOrFail($id);
    }

    public function getBid($id)
    {
        return Bid::with(['vendor', 'bidRequest'])
            ->where('bid_request_id', $id)
            ->orderBy('id', 'desc')
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
            ->orderBy('id', 'desc')
            ->get();
    }

    public function bidTrack()
    {
        return BidTrack::with(['vendor', 'customer', 'bidRequest'])
            ->where('vendor_id', Auth::id())
            ->orderBy('id', 'desc')
            ->get();
    }
}
