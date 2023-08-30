<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'username'  => 'admin',
            'full_name' => 'Admin',
            'email'     => 'admin@gmail.com',
            'password'  => Hash::make('123456789'),
            'role'      => 'admin',
            'no_handphone'  => '0987654321'
        ]);
    }
}
