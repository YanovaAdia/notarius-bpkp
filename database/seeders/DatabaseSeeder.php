<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $currentTimestamp = Carbon::now();

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
            'nip' => '201712368428',
            'name' => 'Hasanudin',
            'email' => 'hasanudin@gmail.com',
            'password' => Hash::make('Timur22'),
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
        
        User::factory()->create([
            'nip' => '201671236427',
            'name' => 'Reno',
            'email' => 'rano11@gmail.com',
            'password' => Hash::make('rano11'),
            'jabatan' => 'ahli madya',
            'role' => 'MANAGER',
            'foto_profil' => 'user-2.jpg',
        ]);
        
        DB::table('tim')->insert([
            [
                'nama_tim' => 'MM1',
                'nip_atasan' => '201871236427',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
        ]);

        DB::table('keanggotaan')->insert([
            [
                'id_tim' => '1',
                'nip_anggota' => '201791238223',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
        ]);
        
        DB::table('keanggotaan')->insert([
            [
                'id_tim' => '1',
                'nip_anggota' => '201712368428',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
        ]);
        
        DB::table('aktivitas')->insert([
            [
                'tanggal' => '2025-06-05',
                'nama_aktivitas' => 'Review Dokumen',
                'instruksi_aktivitas' => 'Format hasil review dalam bentuk PDf. Times New Roman 12',
                'detail_aktivitas' => 'Saya telah menyelesaikan review dokumen dengan menerapkan Reference Review dan Grammar Check',
                'issue' => 'Dokumen terlalu besar sehingga PC saya sedikit mengalami lag performa',
                'solusi' => 'Saya menutup aplikasi yang belum dibutuhkan dan memastikan RAM cukup',
                'status' => 'belum',
                'nip' => '201791238223',
                'id_tim' => '1',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
        ]);
    }
}
