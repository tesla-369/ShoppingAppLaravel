<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        
        $faker = Faker::create();

        for ($i =1; $i <= 20; $i++){
                $faker = Faker::create();
                $product = new Product;
                $product->id = $faker->id;
                $product->title =  $faker->title;
                $product->description = $faker->description;
                $product->price =  $faker->price;
                // 'email' => $faker->unique()->email,
                $product->discount =  $faker->discount;
                $product->quantity =  $faker->quantity;
                $product->category = $faker->category;
                $product->image=  $faker->image;
                $product->password = $faker->password;
                $product->save();

            
        }
    }
    
}
