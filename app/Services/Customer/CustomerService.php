<?php

namespace App\Services\Customer;

use App\Models\BidRequest;
use App\Services\Image\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Support\Facades\Log;

class CustomerService
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function bidCustomerRequest(Request $request)
    {
        try {
            if (!Auth::check()) {
                return redirect()->route('customer.login')->with(notify('Please log in to place a bid request.', 'error'));
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
}
