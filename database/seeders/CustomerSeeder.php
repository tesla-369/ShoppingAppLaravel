<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0;$i <= 9; $i++){
        $customer = new Customer;
        // $customer->id= '2';
        // $customer->user_name = 'harry';
        // $customer->email=('email');
        // $customer->phone=('phone');
        // $customer->save();
        $customer->user_name = $faker->name;
        $customer->email=$faker->email;
        $customer->phone=$faker->phoneNumber;
        $customer->save();
        }

    }
}
