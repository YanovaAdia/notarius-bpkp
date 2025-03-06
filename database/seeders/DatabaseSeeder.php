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
            'nip' => '201791238223',
            'name' => 'ARIS A.Md',
            'email' => 'aris@gmail.com',
            'password' => Hash::make('aris99'),
            'jabatan' => 'terampil',
            'role' => 'USER',
            'foto_profil' => 'user-1.jpg',
        ]);
        
        User::factory()->create([
            'nip' => '201871236427',
            'name' => 'Mulawarman',
            'email' => 'mulawarman@gmail.com',
            'password' => Hash::make('kutaiJaya22'),
            'jabatan' => 'ahli madya',
            'role' => 'MANAGER',
            'foto_profil' => 'user-3.jpg',
        ]);
    }
}
