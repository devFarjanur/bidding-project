<?php

namespace App\Services\Admin;

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
        try {
            $customer = $this->findCustomer($id);
            $customer->update(['status' => 1]);

            return redirect()->back()->with('success', 'Customer activated successfully.');
        } catch (Exception $e) {
            Log::error('An error occurred while updating customer status', [
                'customer_id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function updateToDeactiveCustomer(Request $request, $id)
    {
        try {
            $customer = $this->findCustomer($id);
            $customer->update(['status' => 2]);

            return redirect()->back()->with('success', 'Customer deactivated successfully.');
        } catch (Exception $e) {
            Log::error('An error occurred while updating customer status', [
                'customer_id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
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


}
