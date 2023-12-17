<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        //menampilkan data produk dihalamam utama user dengan limit 10 data
        //untuk di carousel
        $data = array(
            'produks' => DB::table('products')
            ->join('harga','harga.id','=', 'products.harga_id')
            ->select('products.*','harga.harga')->limit(8)->get(),
        );
        return view('user.welcome', $data);
    }

    public function kontak()
    {
        $data['user'] = User::join('alamat','alamat.user_id','=', 'users.id')->where('users.id',Auth::user()->id)->select('users.*','alamat.detail','alamat.id as idalamat')->first();
        if(!$data['user']){
            return redirect('/alamat');
        }
        return view('user.kontak',$data);
    }
}
