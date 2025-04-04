<?php

namespace App\Services\Customer;

use App\Models\Bid;
use App\Models\BidRequest;
use App\Models\BidTrack;
use App\Models\Vendor;
use App\Services\Image\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CustomerService
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function activeVendor()
    {
        return Vendor::with(['user'])
            ->where('status', 1)
            ->get();
    }

    public function bidCustomerRequest(Request $request)
    {
        try {

            if (!Auth::check()) {
                return redirect()->route('login')->with(notify('Please log in to place a bid request.', 'error'));
            }

            $customer = Auth::user();

            $existingBid = BidRequest::where([
                'customer_id' => $customer->id,
            ])->where('status', 0)->first();

            if ($existingBid) {
                return redirect()->back()->with(notify('You already have a pending bid request', 'error'));
            }

            // dd($request->all());

            $imagePath = $this->imageService->uploadImage($request);

            $bidRequest = BidRequest::create([
                'customer_id' => $customer->id,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'bid_type' => 1,
                'target_price' => $request->price,
                'image' => $imagePath,
                'status' => 0,
            ]);

            if (!$bidRequest) {
                return redirect()->back()->with(notify('Failed to store bid request.', 'error'));
            }

            return redirect()->back()->with(notify('Your bid request has been placed successfully.', 'success'));

        } catch (Exception $e) {
            Log::error('Error placing bid request: ' . $e->getMessage());
            return redirect()->back()->with(notify('Failed to place bid request.', 'error'));
        }
    }

    public function customerFindBidRequest($id)
    {
        return BidRequest::with(['customer', 'category', 'subcategory'])
            ->where('customer_id', Auth::id())
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

    public function acceptBid(Request $request, $bidRequestId, $bidId)
    {
        DB::beginTransaction();

        try {

            $bidRequest = $this->customerFindBidRequest($bidRequestId);
            if ($bidRequest->customer_id !== auth()->id()) {
                return redirect()->back()->with(notify('You are not authorized to view this bid request.', 'error'));
            }

            $findBid = Bid::findOrFail($bidId);
            $bidRequest->update(['status' => 3]);

            $findBid->update(['status' => 4]);

            $updated = $findBid->update(['status' => 4]);

            if ($updated) {
                $bidNumber = substr(time() . rand(100, 999), -9);

                BidTrack::create([
                    'bid_request_id' => $bidRequest->id,
                    'vendor_id' => $findBid->vendor_id,
                    'customer_id' => auth()->id(),
                    'bid_number' => $bidNumber,
                    'price' => $findBid->proposed_price,
                    'status' => 0
                ]);
            }

            $updatedBids = Bid::where('bid_request_id', $bidRequestId)
                ->where('id', '!=', $findBid->id)
                ->update(['status' => 5]);

            DB::commit();
            return redirect()->back()->with(notify('Bid accepted successfully.', 'success'));
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Bid Accept Error: ' . $e->getMessage());

            return redirect()->back()->with(notify('Something went wrong. Please try again.', 'error'));
        }
    }

    public function requestVendor(Request $request)
    {
        try {

            if (!Auth::check()) {
                return redirect()->route('login')->with(notify('Please log in to place a bid request.', 'error'));
            }

            $customer = Auth::user();

            $existingBid = BidRequest::where([
                'customer_id' => $customer->id,
            ])->where('status', 0)->first();

            if ($existingBid) {
                return redirect()->back()->with(notify('You already have a pending bid request', 'error'));
            }

            $imagePath = $this->imageService->uploadImage($request);

            $bidRequest = BidRequest::create([
                'customer_id' => $customer->id,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'vendor_id' => $request->vendor_id,
                'bid_type' => 1,
                'target_price' => $request->price,
                'image' => $imagePath,
                'status' => 0,
            ]);

            if (!$bidRequest) {
                return redirect()->back()->with(notify('Failed to store bid request.', 'error'));
            }

            return redirect()->back()->with(notify('Your bid request has been placed successfully.', 'success'));
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Bid request Error: ' . $e->getMessage());
            return redirect()->back()->with(notify('Something went wrong. Please try again.', 'error'));
        }
    }

}
