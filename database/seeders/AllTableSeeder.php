<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AllTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Set custom locale for Bangladeshi names and data
        $faker->locale = 'bn_BD'; // Bengali language (Bangladesh)

        // Insert 50 users with fake Bangladeshi data
        for ($i = 0; $i < 50; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => '+8801' . rand(300000000, 999999999), // Bangladeshi phone number format
                'password' => Hash::make('123456789'),
                'role' => $faker->randomElement(['admin', 'customer', 'vendor']),  // Random role
                'profile_image' => $faker->imageUrl(640, 640, 'people'),
                'status' => rand(1, 2),
            ]);
        }

        // Generate 50 vendors with fake Bangladeshi data first
        $categoryIds = DB::table('categories')->pluck('id')->toArray();
        $vendorIds = [];
        for ($i = 0; $i < 50; $i++) {
            $vendorId = DB::table('vendors')->insertGetId([ // Save the inserted vendor ID
                'user_id' => $faker->randomElement([1, 2, 3, 4, 5]),  // Random user ID from the 'users' table
                'business_name' => $faker->company,
                'description' => $faker->paragraph,
                'location' => $faker->city . ', Bangladesh',  // Example: Dhaka, Bangladesh
                'status' => rand(0, 2),
            ]);
            $vendorIds[] = $vendorId; // Store vendor ID for later use in subcategory insertion
        }

        // Categories and Subcategories for Bangladeshi e-commerce
        $categories = [
            'Electronics' => ['Mobile Phones', 'Laptops & Computers', 'Cameras & Photography', 'Home Audio & Theater', 'Mobile Accessories'],
            'Clothing & Apparel' => ['Men\'s Clothing', 'Women\'s Clothing', 'Children\'s Clothing', 'Footwear', 'Lingerie & Sleepwear'],
            'Groceries' => ['Fresh Vegetables & Fruits', 'Rice & Pulses', 'Snacks & Beverages', 'Spices & Condiments', 'Bakery Items'],
            'Beauty & Health' => ['Skincare', 'Haircare', 'Makeup', 'Perfumes & Deodorants', 'Personal Care'],
            'Home Appliances' => ['Refrigerators', 'Air Conditioners', 'Washing Machines', 'Microwave Ovens', 'Kitchen Appliances'],
            'Furniture' => ['Living Room Furniture', 'Bedroom Furniture', 'Office Furniture', 'Kitchen & Dining Furniture', 'Storage Furniture'],
            'Sports & Fitness' => ['Gym Equipment', 'Sports Apparel', 'Bicycles', 'Outdoor Sports', 'Fitness Accessories'],
            'Books & Stationery' => ['Academic Books', 'Novels & Literature', 'School Supplies', 'Office Supplies', 'Art & Craft Materials'],
            'Toys & Games' => ['Educational Toys', 'Action Figures', 'Puzzles & Board Games', 'Outdoor Play Equipment', 'Video Games'],
            'Automobiles & Accessories' => ['Car Accessories', 'Motorcycle Accessories', 'Car Care & Maintenance', 'Car Audio & Electronics', 'Automotive Parts'],
            'Jewelry & Watches' => ['Gold & Silver Jewelry', 'Watches', 'Necklaces & Pendants', 'Earrings & Rings', 'Bracelets & Bangles'],
            'Baby Products' => ['Diapers & Wipes', 'Baby Clothing', 'Baby Furniture', 'Toys & Books for Babies', 'Feeding Bottles & Accessories'],
            'Food & Beverages' => ['Fresh Produce', 'Beverages', 'Sweets & Chocolates', 'Organic Foods', 'Canned & Packaged Food'],
            'Home Decor' => ['Wall Art & Posters', 'Rugs & Carpets', 'Lighting & Lamps', 'Decorative Accessories', 'Curtains & Blinds'],
            'Gardening & Outdoors' => ['Outdoor Furniture', 'Gardening Tools', 'Plants & Seeds', 'Lawn Care', 'Outdoor Decor'],
        ];

        foreach ($categories as $categoryName => $subcategories) {
            // Insert category
            $categoryId = DB::table('categories')->insertGetId([
                'name' => $categoryName,
                'image' => $faker->imageUrl(),
                'status' => rand(1, 2),  // Random status
            ]);

            // Insert subcategories for each category
            foreach ($subcategories as $subcategoryName) {
                DB::table('subcategories')->insert([
                    'vendor_id' => $faker->randomElement($vendorIds),
                    'category_id' => $categoryId,
                    'name' => $subcategoryName,
                    'image' => $faker->imageUrl(),
                    'status' => rand(1, 2),
                ]);
            }
        }

        // Generate 50 bid_requests with fake data for Bangladeshi customers
        $customerIds = DB::table('users')->where('role', 'customer')->pluck('id')->toArray();
        $categoryIds = DB::table('categories')->pluck('id')->toArray();
        $subcategoryIds = DB::table('subcategories')->pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            DB::table('bid_requests')->insert([
                'customer_id' => $faker->randomElement($customerIds),
                'category_id' => $faker->randomElement($categoryIds),
                'subcategory_id' => $faker->randomElement($subcategoryIds),
                'description' => $faker->paragraph,
                'target_price' => $faker->randomFloat(2, 100, 10000),
                'image' => $faker->imageUrl(),
                'status' => rand(0, 2),
            ]);
        }
    }
}
