<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Images;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Create specific users with hashed passwords
        User::create([
            'name' => 'admin1',
            'role' => 'admin',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('adminadmin1'),
        ]);

        User::create([
            'name' => 'user1',
            'role' => 'user',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('useruser1'),
        ]);

        User::create([
            'name' => 'user2',
            'role' => 'admin',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('useruser2'),
        ]);

        // Create a fixed category (not 20 identical ones)
        Category::create([
            'CatName' => 'Fashion'
        ]);

        // Create 20 products with same attributes, linked to the first category
        Product::create([
            'SellerID' => 2,
            'Title' => 'Massimo Dutti Shirt',
            'Description' => 'Good Shirt For Dad',
            'Price' => 500000,
            'Category' => 1, // assuming Category ID 1 is 'Fashion'
            'Condition' => 'New',
            'Stock' => 5,
        ]);

        // Create 20 images for Product ID 1
        Images::create([
            'ProductID' => 1,
            'Images' => 'storage/images/ZrRd3e27B092mmVZZVKHk2Vkn6NgY7Qpq1FKdp2h.jpg'
        ]);
    }
}
