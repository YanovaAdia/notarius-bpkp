<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aktivitas;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $aktivitass = DB::table('aktivitas')
            ->join('users', 'aktivitas.nip', '=', 'users.nip')
            ->select('aktivitas.*', 'users.nip', 'users.name', 'users.email', 'users.jabatan', 'users.role', 'users.foto_profil');

        if(Auth::user()->role=='USER'){
            $aktivitass = $aktivitass->where('aktivitas.nip', Auth::user()->nip);
        }

        $aktivitass = $aktivitass->orderBy('tanggal', 'asc')
            ->get();

        return view('home', compact('aktivitass'));
    }

    public function daftar()
    {
        $id_tim = DB::table('keanggotaan')->where('nip_anggota', Auth::user()->nip)->pluck('id_tim');
        
        $aktivitas_user = DB::table('aktivitas')
            ->join('users', 'aktivitas.nip', '=', 'users.nip')
            ->join('keanggotaan', 'users.nip', '=', 'keanggotaan.nip_anggota')
            ->select('aktivitas.*', 'users.nip', 'users.name', 'users.email', 'users.jabatan', 'users.role', 'users.foto_profil', 'keanggotaan.id_tim');

        if(Auth::user()->role=='USER'){
            $aktivitas_user = $aktivitas_user->where('keanggotaan.id_tim', $id_tim);
        }

        $aktivitas_user = $aktivitas_user->orderBy('tanggal', 'asc')
            ->get();

        return view('daftar', compact('aktivitas_user'));
    }

    public function profil()
    {
        return view('profil');
    }
}
