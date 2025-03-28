<?php

namespace App\Services\Admin;

use App\Models\Bidrequest;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subcatgory;
use App\Models\User;
use App\Models\Vendor;
use App\Services\Image\ImageService;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Support\Facades\Log;

class AdminService
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

    public function activeCustomer()
    {
        return User::where('role', 'customer')
            ->status('status', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function deactiveCustomer()
    {
        return User::where('role', 'customer')
            ->status('status', 2)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function findCustomer($id)
    {
        return User::where('role', 'customer')
            ->orderBy('id', 'desc')
            ->findOrFail($id);
    }

    public function updateToActiveCustomer(Request $request, $id)
    {
        try {
            $customer = $this->findCustomer($id);
            $updateActive = $customer->update(['status' => 1]);
            return redirect()->back()->with(notify('Update successfully', 'success'));
        } catch (Exception $e) {
            Log::error('error: ' . $e->getMessage());
            return redirect()->back()->with(notify('Failed', 'error'));
        }
    }

    public function updateToDeactiveCustomer(Request $request, $id)
    {
        try {
            $customer = $this->findCustomer($id);
            $updateDeactive = $customer->update(['status' => 2]);
            return redirect()->back()->with(notify('Update successfully', 'success'));
        } catch (Exception $e) {
            Log::error('error: ' . $e->getMessage());
            return redirect()->back()->with(notify('Failed', 'error'));
        }
    }

    public function vendor()
    {
        return Vendor::with('user')
            ->whereIn('status', [1, 2])
            ->orderBy('id', 'desc')
            ->get();
    }

    public function findVendor($id)
    {
        return Vendor::with('user')
            ->orderBy('id', 'desc')
            ->findOrFail($id);
    }

    public function pendingVendor()
    {
        return Vendor::with('user')
            ->where('status', 0)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function activeVendor()
    {
        return Vendor::with('user')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function deactiveVendor()
    {
        return Vendor::with('user')
            ->where('status', 2)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function rejectVendor()
    {
        return Vendor::with('user')
            ->where('status', 3)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function updateToActiveVendor(Request $request, $id)
    {
        try {
            $vendor = $this->findVendor($id);
            $vendorActive = $vendor->update([
                'status' => 1
            ]);
            return redirect()->back()->with(notify('Update successfully', 'success'));
        } catch (Exception $e) {
            Log::error('error: ' . $e->getMessage());
            return redirect()->back()->with(notify('Failed', 'error'));
        }
    }

    public function updateToDeactiveVendor(Request $request, $id)
    {
        try {
            $vendor = $this->findVendor($id);
            $vendorDeactive = $vendor->update([
                'status' => 2
            ]);
            return redirect()->back()->with(notify('Update successfully', 'success'));
        } catch (Exception $e) {
            Log::error('error: ' . $e->getMessage());
            return redirect()->back()->with(notify('Failed', 'error'));
        }
    }

    public function updateToRejectVendor(Request $request, $id)
    {
        try {
            $vendor = $this->findVendor($id);
            $vendorReject = $vendor->update([
                'status' => 3
            ]);
            return redirect()->back()->with(notify('Update successfully', 'success'));
        } catch (Exception $e) {
            Log::error('error: ' . $e->getMessage());
            return redirect()->back()->with(notify('Failed', 'error'));
        }
    }

    public function categoryList()
    {
        return Category::orderBy('id', 'desc')->get();
    }

    public function storeCategory(Request $request)
    {
        try {

            $imagePath = $this->imageService->uploadImage($request);

            Category::create([
                'name' => $request->name,
                'image' => $imagePath
            ]);

            return redirect()->route('admin.category.list')->with(notify('Add successfully', 'success'));
        } catch (Exception $e) {
            Log::error('error: ' . $e->getMessage());
            return redirect()->back()->with(notify('Failed', 'error'));
        }
    }

    public function findCategory($id)
    {
        return Category::findOrFail($id);
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

    public function updateToActiveCategory(Request $request, $id)
    {
        try {
            $findCategory = $this->findCategory($id);
            $activeCategory = $findCategory->update([
                'status' => 1
            ]);
            return redirect()->back()->with(notify('Update successfully', 'success'));
        } catch (Exception $e) {
            Log::error('error: ' . $e->getMessage());
            return redirect()->back()->with(notify('Failed', 'error'));
        }
    }

    public function updateToDeactiveCategory(Request $request, $id)
    {
        try {
            $findCategory = $this->findCategory($id);
            $deactiveCategory = $findCategory->update([
                'status' => 2
            ]);
            return redirect()->back()->with(notify('Update successfully', 'success'));
        } catch (Exception $e) {
            Log::error('error: ' . $e->getMessage());
            return redirect()->back()->with(notify('Failed', 'error'));
        }
    }

    public function subcateGoryList()
    {
        return Subcategory::with(['vendor', 'category'])
            ->orderBy('id', 'desc')
            ->get();
    }

    public function findSubcategory($id)
    {
        return Subcategory::find($id);
    }

    public function activeSubcategory()
    {
        return Subcategory::with(['vendor', 'category'])
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function deactiveSubcategory()
    {
        return Subcategory::with(['vendor', 'category'])
            ->where('status', 2)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function updateToActiveSubcategory(Request $request, $id)
    {
        try {
            $findSubcategory = $this->findSubcategory($id);
            $activeSubcategory = $findSubcategory->update([
                'status' => 1
            ]);
            return redirect()->back()->with(notify('Update successfully', 'success'));
        } catch (Exception $e) {
            Log::error('error: ' . $e->getMessage());
            return redirect()->back()->with(notify('Failed', 'error'));
        }
    }

    public function updateToDeactiveSubcategory(Request $request, $id)
    {
        try {
            $findSubcategory = $this->findSubcategory($id);
            $deactiveSubcategory = $findSubcategory->update([
                'status' => 2
            ]);
            return redirect()->back()->with(notify('Update successfully', 'success'));
        } catch (Exception $e) {
            Log::error('error: ' . $e->getMessage());
            return redirect()->back()->with(notify('Failed', 'error'));
        }
    }

    public function bidList()
    {
        return Bidrequest::with(['customer', 'subcategory'])
            ->orderBy('id', 'desc')
            ->get();
    }

    public function pendingBid()
    {
        return BidRequest::with(['customer', 'subcategory'])
            ->where('status', 0)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function processingBid()
    {
        return BidRequest::with(['customer', 'subcategory'])
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function acceptBid()
    {
        return BidRequest::with(['customer', 'subcategory'])
            ->where('status', 2)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function rejectBid()
    {
        return BidRequest::with(['customer', 'subcategory'])
            ->where('status', 3)
            ->orderBy('id', 'desc')
            ->get();
    }
}
