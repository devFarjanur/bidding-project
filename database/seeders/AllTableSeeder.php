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

        // Insert 30 users with fake data
        for ($i = 0; $i < 30; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'password' => Hash::make('123456789'),
                'role' => $faker->randomElement(['admin', 'customer', 'vendor']),  // Random role
                'profile_image' => $faker->imageUrl(),
                'status' => rand(1, 2),
            ]);
        }

        // Generate 10 categories (you can adjust this number)
        for ($i = 0; $i < 10; $i++) {
            DB::table('categories')->insert([
                'name' => $faker->word,
                'image' => $faker->imageUrl(),
                'status' => rand(1, 2),  // Random status
            ]);
        }

        // Generate 30 vendors with fake data
        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        for ($i = 0; $i < 30; $i++) {
            DB::table('vendors')->insert([
                'user_id' => $faker->randomElement($categoryIds),  // Random user ID from the 'users' table
                'business_name' => $faker->company,
                'description' => $faker->paragraph,
                'location' => $faker->address,
                'status' => rand(0, 2),
            ]);
        }

        // Generate 30 subcategories with fake data
        $vendorIds = DB::table('vendors')->pluck('id')->toArray();
      
        for ($i = 0; $i < 30; $i++) {
            DB::table('subcategories')->insert([
                'vendor_id' => $faker->randomElement($vendorIds),
                'category_id' => $faker->randomElement($categoryIds),
                'name' => $faker->word,
                'image' => $faker->imageUrl(),
                'status' => rand(1, 2),
            ]);
        }

        // Generate 30 bid_requests with fake data
        $customerIds = DB::table('users')->where('role', 'customer')->pluck('id')->toArray();
        
        $subcategoryIds = DB::table('subcategories')->pluck('id')->toArray();
        for ($i = 0; $i < 30; $i++) {
            DB::table('bid_requests')->insert([
                'customer_id' => $faker->randomElement($customerIds),
                'subcategory_id' => $faker->randomElement($subcategoryIds),
                'description' => $faker->paragraph,
                'target_price' => $faker->randomFloat(2, 100, 1000),
                'image' => $faker->imageUrl(),
                'status' => rand(0, 2),
            ]);
        }

        // Generate 30 bids with fake data
        $bidRequestIds = DB::table('bid_requests')->pluck('id')->toArray();
        $vendorIds = DB::table('vendors')->pluck('id')->toArray();
        for ($i = 0; $i < 30; $i++) {
            DB::table('bids')->insert([
                'vendor_id' => $faker->randomElement($vendorIds),
                'bid_request_id' => $faker->randomElement($bidRequestIds),
                'proposed_price' => $faker->randomFloat(2, 100, 1000),
                'status' => rand(0, 2),
            ]);
        }
    }
}
