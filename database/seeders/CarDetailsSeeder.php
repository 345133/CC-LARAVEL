<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = [
            [
                'user_id' => 1,
                'carname' => 'Car 1',
                'carprice' => '10000',
                'carmodel' => 'Model 1',
                'carseats' => '4',
                'address' => '123 Street, City',
                'personnumber' => '1234567890',
                'posttype' => 'Type 1',
                'location' => 'Location 1',
                'carpic' => 'car1',
            ],
            [
                'user_id' => 1,
                'carname' => 'Car 2',
                'carprice' => '10000',
                'carmodel' => 'Model 2',
                'carseats' => '4',
                'address' => '123 Street, City',
                'personnumber' => '1234567890',
                'posttype' => 'Type 2',
                'location' => 'Location 2',
                'carpic' => 'car2',
            ],
            [
                'user_id' => 1,
                'carname' => 'Car 3',
                'carprice' => '10000',
                'carmodel' => 'Model 3',
                'carseats' => '4',
                'address' => '123 Street, City',
                'personnumber' => '1234567890',
                'posttype' => 'Type 3',
                'location' => 'Location 3',
                'carpic' => 'car3',
            ],
            [
                'user_id' => 1,
                'carname' => 'Car 4',
                'carprice' => '10000',
                'carmodel' => 'Model 4',
                'carseats' => '4',
                'address' => '123 Street, City',
                'personnumber' => '1234567890',
                'posttype' => 'Type 4',
                'location' => 'Location 4',
                'carpic' => 'car4',
            ],
            [
                'user_id' => 1,
                'carname' => 'Car 5',
                'carprice' => '10000',
                'carmodel' => 'Model 5',
                'carseats' => '4',
                'address' => '123 Street, City',
                'personnumber' => '1234567890',
                'posttype' => 'Type 5',
                'location' => 'Location 5',
                'carpic' => 'car5',
            ],
        ];

        foreach ($cars as $car) {
            DB::table('car_details')->insert($car);
        }
    }
}
