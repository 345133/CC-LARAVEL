<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'number' => '1234567890',
            'city' => 'FEZ',
            'password' => Hash::make('admin1234'),
            'created_at' => now(),
            'updated_at' => now(),
            'role' =>'admin',
        ]);
    }
}
