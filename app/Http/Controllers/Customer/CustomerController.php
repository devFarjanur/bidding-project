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

        // Fetch all addresses of the logged-in user
        // $shippingAddresses = Address::where('user_id', $id)->get();

        // Fetch only the user's orders with associated items and products
        // $orders = Order::where('user_id', $id)->with('items.product')->get();

        // Total number of orders for this user
        // $totalOrders = $orders->count();

        // Count orders by status for the logged-in user
        // $ordersPending = $orders->where('status', Order::STATUS_PENDING)->count();
        // $ordersDelivered = $orders->where('status', Order::STATUS_DELIVERED)->count();
        // $ordersReturned = $orders->where('status', Order::STATUS_RETURNED)->count();
        // $ordersProcessing = $orders->where('status', Order::STATUS_PROCESSING)->count();
        // $ordersShipped = $orders->where('status', Order::STATUS_SHIPPED)->count();
        // $ordersCancelled = $orders->where('status', Order::STATUS_CANCELLED)->count();

        // Pass all data to the view
        return view(
            'layouts.pages.myaccount',
            compact(
                // 'orders',
                // 'shippingAddresses',
                'profileData',
                'categories',
                'bidHistory',
                'bidTrack'
                // 'ordersPending',
                // 'ordersProcessing',
                // 'ordersShipped',
                // 'ordersDelivered',
                // 'ordersCancelled',
                // 'ordersReturned',
                // 'totalOrders'
            )
        );
    }


    // public function CustomerCategoryProduct($id)
    // {
    //     $category = Category::with('products')->findOrFail($id);
    //     $categories = Category::with('products')->get();
    //     $products = $category->products;

    //     // Debugging: Log the fetched data
    //     \Log::info('Category: ' . $category);
    //     \Log::info('Products: ' . $products);

    //     return view('layouts.pages.categoryproductlist', compact('category', 'products', 'categories'));
    // }



    // // ----------------- product page


    // public function CustomerProduct()
    // {
    //     $categories = Category::with('products')->get();
    //     $products = Product::with('category')->get();
    //     return view('layouts.pages.product', compact('categories', 'products'));
    // }


    // // ------------------ customer products details


    // public function CustomerProductDetials($id)
    // {
    //     $product = Product::findOrFail($id);
    //     $categories = Category::with('products')->get();
    //     return view('layouts.pages.product_details', compact('categories', 'product'));
    // }

    // // ------------------ about page


    // // ------------------- contact page

    // public function CustomerContact()
    // {
    //     $categories = Category::with('products')->get();
    //     return view('layouts.pages.contact', compact('categories'));
    // }


    // public function CustomerWishList()
    // {

    //     $categories = Category::with('products')->get();
    //     return view('layouts.pages.wishlist', compact('categories'));
    // }

    // public function getProductStock(Request $request)
    // {
    //     $productIds = $request->input('productIds', []);
    //     $products = Product::whereIn('id', $productIds)->get(['id', 'stock']);
    //     $stockStatus = $products->mapWithKeys(function ($product) {
    //         return [$product->id => $product->stock];
    //     });

    //     return response()->json($stockStatus);
    // }


    // // ------------------ cart page

    // public function CustomerCart()
    // {

    //     $categories = Category::with('products')->get();
    //     return view('layouts.pages.cart', compact('categories'));
    // }

    // // ------------------ checkout page

    // public function CustomerCheckout()
    // {
    //     $id = Auth::user()->id;
    //     $profileData = User::find($id);
    //     $addresses = Address::where('user_id', Auth::id())->with('user')->get();
    //     $categories = Category::with('products')->get();
    //     return view('layouts.pages.checkout', compact('categories', 'profileData', 'addresses'));
    // }


    // public function addAddress(Request $request)
    // {
    //     Address::create([
    //         'user_id' => Auth::id(),
    //         'division' => $request->division,
    //         'city' => $request->city,
    //         'road_no' => $request->road_no,
    //         'house_no' => $request->house_no,
    //     ]);

    //     return redirect()->back()->with('success', 'Address added successfully');
    // }

    // public function editAddress(Request $request, $id)
    // {
    //     $request->validate([
    //         'division' => 'required|string|max:255',
    //         'city' => 'required|string|max:255',
    //         'road_no' => 'required|string|max:255',
    //         'house_no' => 'required|string|max:255',
    //     ]);

    //     $address = Address::findOrFail($id);
    //     $address->update([
    //         'division' => $request->division,
    //         'city' => $request->city,
    //         'road_no' => $request->road_no,
    //         'house_no' => $request->house_no,
    //     ]);

    //     return redirect()->back()->with('success', 'Address updated successfully');
    // }

    // public function deleteAddress($id)
    // {
    //     $address = Address::findOrFail($id);
    //     if ($address) {
    //         $address->delete();
    //         return redirect()->back()->with('success', 'Address deleted successfully');
    //     }

    //     return redirect()->back()->with('error', 'Failed to delete address');
    // }


    // public function OrderStore(Request $request)
    // {
    //     $validated = $request->validate([
    //         'user_id' => 'required|exists:users,id',
    //         'address_id' => 'required|exists:addresses,id',
    //         'total_price' => 'required|numeric',
    //         'payment_method' => 'required|string',
    //         'items' => 'required|array',
    //         'items.*.product_id' => 'required|exists:products,id',
    //         'items.*.quantity' => 'required|integer|min:1',
    //         'items.*.unit_price' => 'required|numeric|min:0',
    //     ]);

    //     $order = Order::create([
    //         'user_id' => $validated['user_id'],
    //         'address_id' => $validated['address_id'],
    //         'total_price' => $validated['total_price'],
    //         'payment_method' => $validated['payment_method'],
    //         'status' => Order::STATUS_PENDING,
    //         'payment_status' => Order::PAYMENT_PENDING,
    //     ]);

    //     foreach ($validated['items'] as $item) {
    //         OrderItem::create([
    //             'order_id' => $order->id,
    //             'product_id' => $item['product_id'],
    //             'quantity' => $item['quantity'],
    //             'unit_price' => $item['unit_price'],
    //             'total_price' => $item['unit_price'] * $item['quantity'],
    //         ]);
    //     }

    //     // Make sure to pass the 'orderNumber' to the route
    //     return redirect()->route('order.success', ['orderNumber' => $order->order_number]);
    // }



    // public function OrderSuccess($orderNumber)
    // {

    //     $categories = Category::with('products')->get();
    //     $order = Order::where('order_number', $orderNumber)->firstOrFail();

    //     return view('layouts.pages.OrderSuccess', compact('order', 'categories'));
    // }




    // // ----------------------- customer account page  







    // // -------------------------- customer update profile

    // public function updateProfile(Request $request)
    // {
    //     $id = Auth::user()->id;
    //     $data = User::find($id);
    //     $data->firstname = $request->firstname;
    //     $data->lastname = $request->lastname;
    //     $data->email = $request->email;
    //     $data->phone = $request->phone;
    //     $data->birthday = $request->birthday;
    //     $data->username = $request->username;

    //     if ($request->file('photo')) {
    //         $file = $request->file('photo');
    //         @unlink(public_path('upload/admin_images/' . $data->photo));
    //         $filename = date('YmdHi') . $file->getClientOriginalName();
    //         $file->move(public_path('upload/admin_images'), $filename);
    //         $data->photo = $filename;
    //     }

    //     $data->save();

    //     $notification = array(
    //         'message' => 'Profile Updated Successfully',
    //         'alter-type' => 'success'
    //     );


    //     return redirect()->back()->with($notification);
    // }

    // // --------------------- customer change account password

    // public function changePassword(Request $request)
    // {

    //     $rules = [
    //         'email' => 'required|string|email|max:255',
    //         'old_password' => 'required|string',
    //         'new_password' => 'required|string|min:8|confirmed',
    //     ];

    //     $request->validate($rules);


    //     if (!Hash::check($request->old_password, Auth::user()->password)) {
    //         return redirect()->back()->withErrors(['old_password' => 'The provided current password does not match your password']);
    //     }


    //     Auth::user()->update(['password' => Hash::make($request->new_password)]);

    //     $notification = array(
    //         'message' => 'Password changed successfully',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->back()->with($notification);
    // }










}
