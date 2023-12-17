<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = DB::table('users')
            ->join('alamat', 'alamat.user_id', '=', 'users.id')
            
            ->select('users.*', 'alamat.detail', )
            ->where('users.role', '=', 'customer')
            ->groupBy('users.id')->get();

        return view('admin.pelanggan.index', compact('pelanggan'));
    }
}
