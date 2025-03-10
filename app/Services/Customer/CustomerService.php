<?php

namespace App\Services\Customer;

class CustomerService
{
    public function sayHello()
    {
        return "Hello from AdminService!";
    }

    public function bidCustomRequestStore(Request $request)
    {
        if (!auth()->check()) {
            auth()->logout();
            \Log::info('User is not authenticated. Redirecting to login.');
            $this->helperService->setFlashMessage($request, 'Please log in to place a bid request.', 'error');
            return redirect()->route('customer.login');
        }

        try {
            $customer = Auth::user();
            $existingBidRequest = BidRequest::where('customer_id', $customer->id)
                ->where('category_id', $request->category_id)
                ->where('subcategory_id', $request->subcategory_id)
                ->where('bid_status', 'pending')
                ->exists();

            if ($existingBidRequest) {
                $this->helperService->setFlashMessage($request, 'You already have a pending bid request for this product.', 'error');
                return redirect()->back();
            }

            $imageName = $this->imageService->uploadImage($request);
            BidRequest::create([
                'customer_id' => $customer->id,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'target_price' => $request->price,
                'type' => 'Custom Bid',
                'image_path' => $imageName,
                'bid_status' => 'pending',
            ]);
            $this->helperService->setFlashMessage($request, 'Your bid request has been placed successfully.', 'success');
            return redirect()->route('customer.bid.list', $customer->id);
        } catch (Exception $e) {
            \Log::error("Failed to place bid: " . $e->getMessage());
            $this->helperService->setFlashMessage($request, 'Failed to place your bid request.', 'error');
            return redirect()->back();
        }
    }
}
