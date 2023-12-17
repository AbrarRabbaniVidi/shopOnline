<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Alamat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlamatController extends Controller
{
    public function index()
    {
        //ambil session id user
        $id_user = Auth::user()->id;
        //ambil data alamat
       
        $cekAlamat = Alamat::where('user_id', $id_user)
            ->count();
        //cek jika user sudah mengatur alamat maka jalankan ini
       
            $data['alamat'] = DB::table('alamat')
               
                ->where('user_id', $id_user)
                ->get();
            

        //jika belum maka tampilkan form untuk mengatur alamat
        return view('user.alamat', $data);
    }

    public function ubah($id)
    {
        //menampilkan form edit alamat
       
        $data['id'] = $id;

        return view('user.ubahalamat', $data);
    }

    public function update($id, Request $request)
    {
        //mengupdate alamat
        $alamat = Alamat::where('id', $id)
            ->update([
               
                'detail' => $request->detail
            ]);

        return redirect('/akun');
    }

   
    public function simpan(Request $request)
    {
        //menyimpan alamat user
        Alamat::create([
           
            'detail'    => $request->detail,
            'user_id'   => Auth::user()->id
        ]);

        return redirect('/akun');
    }
}
