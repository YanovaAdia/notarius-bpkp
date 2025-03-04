<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'ARIS A.Md',
            'email' => 'aris@gmail.com',
            'password' => Hash::make('aris99'),
            'role' => 'USER',
        ]);
        
        User::factory()->create([
            'name' => 'Mulawarman',
            'email' => 'mulawarman@gmail.com',
            'password' => Hash::make('kutaiJaya22'),
            'role' => 'MANAGER',
        ]);
    }
}
