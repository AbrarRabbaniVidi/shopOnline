<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Province;
use App\City;

class PengaturanController extends Controller
{
    public function aturalamat()
    {
         $data['alamat']=[];
        //cek apa alamat toko sudah di set atau belum
        $data['cekalamat'] = $cek = DB::table('alamat_toko')->count();

        //jika belum di setting maka ambil data provinsi untuk di tampilkan di form alamat
        if ($cek < 1) {
           
        } else {
            //jika sudah di setting maka tidak menampilkan form tapi tampilkan data alamat toko
            $data['alamat'] = DB::table('alamat_toko')
                ->first();
        }
        return view('admin.pengaturan.alamat', $data);
    }
    public function getCity($id)
    {
        return City::where('province_id', $id)->get();
    }

    public function ubahalamat($id)
    {
        //function untuk menampilkan form edit alamat
       
        $data['id'] = $id;
        return view('admin.pengaturan.ubahalamat', $data);
    }

    public function simpanalamat(Request $request)
    {
        //menyimpan alamat baru pada toko

        DB::table('alamat_toko')->insert([
            'city_id' => $request->cities_id,
            'detail'  => $request->detail
        ]);

        return redirect()->route('admin.pengaturan.alamat')->with('status', 'Berhasil Mengatur Alamat');
    }

    public function updatealamat($id, Request $request)
    {

        //mengupdate alamat toko
        DB::table('alamat_toko')
            ->where('id', $id)
            ->update([
                'city_id' => $request->cities_id,
                'detail'  => $request->detail
            ]);

        return redirect()->route('admin.pengaturan.alamat')->with('status', 'Berhasil Mengubah Alamat');
    }
}
