<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\BidRequest;
use App\Models\BidTrack;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use App\Services\Customer\CustomerService;
use App\Services\Image\ImageService;
use App\Services\Vendor\VendorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    protected $customerService;
    protected $imageService;

    public function __construct(CustomerService $customerService, ImageService $imageService)
    {
        $this->customerService = $customerService;
        $this->imageService = $imageService;
    }

    public function CustomerIndex()
    {
        $categories = Category::get();
        return view('layouts.pages.home', compact('categories'));
    }

    public function CustomerProduct()
    {
        $categories = Category::get();
        return view('layouts.pages.product', compact('categories'));
    }

    public function getSubcategories($category_id)
    {
        $subcategories = Subcategory::where('category_id', $category_id)->get();
        return response()->json($subcategories);
    }

    public function customerBidRequest(Request $request)
    {
        try {
            return $this->customerService->bidCustomerRequest($request);
        } catch (Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            return redirect()->back()->with(notify('Failed', 'error'));
        }
    }

    public function customerBidDetails($id)
    {
        $categories = Category::get();
        $bidRequest = $this->customerService->customerFindBidRequest($id);
        $getBid = $this->customerService->getBid($id);
        return view('layouts.pages.bid-details', compact('categories', 'bidRequest', 'getBid'));
    }

    public function customerAcceptBid(Request $request, $bidRequestId, $bidId)
    {
        try {
            return $this->customerService->acceptBid($request, $bidRequestId, $bidId);
        } catch (Exception $e) {
            Log::error('Error in Bid Acceptance: ' . $e->getMessage());
            return redirect()->back()->with(notify('Failed to accept the bid.', 'error'));
        }
    }

    public function customerBrowseVendor()
    {
        $categories = Category::get();
        $vendorList = $this->customerService->activeVendor();
        return view('layouts.pages.browse-vendor', compact('vendorList', 'categories'));
    }

    public function customerToVendorRequest($id)
    {
        $categories = Category::get();
        $vendor_id = $id;
        return view('layouts.pages.request-vendor', compact('categories', 'vendor_id'));
    }

    public function customerToVendorRequestPost(Request $request)
    {
        return $this->customerService->requestVendor($request);
    }

    public function CustomerAbout()
    {
        $categories = Category::get();
        return view('layouts.pages.about', compact('categories'));
    }

    public function CustomerContact()
    {
        $categories = Category::get();
        return view('layouts.pages.contact', compact('categories'));
    }

    public function CustomerMyaccount()
    {
        $id = Auth::user()->id;
        $profileData = User::findOrFail($id);
        $categories = Category::get();

        $bidHistory = BidRequest::with(['customer', 'subcategory'])
            ->where('customer_id', $id)
            ->get();

        $bidTrack = BidTrack::with(['vendor', 'customer', 'bidrequest'])
            ->where('customer_id', $id)
            ->get();

        return view(
            'layouts.pages.myaccount',
            compact(
                'profileData',
                'categories',
                'bidHistory',
                'bidTrack'
            )
        );
    }
}
