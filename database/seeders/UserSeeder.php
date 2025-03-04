<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'ARIS A.Md',
            'email' => 'aris@gmail.com',
            'password' => Hash::make('aris99'),
            'role' => 'USER',
        ]);

        User::create([
            'name' => 'Mulawarman',
            'email' => 'mulawarman@gmail.com',
            'password' => Hash::make('kutaiJaya22'),
            'role' => 'MANAGER',
        ]);
    }
}
