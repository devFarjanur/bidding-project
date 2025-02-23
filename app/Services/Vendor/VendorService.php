<?php

namespace App\Services\Vendor;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;

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

    public function activeSubcategory()
    {
        return Subcategory::with('category')
            ->where('status', 1)
            ->get();
    }

}
