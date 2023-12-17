<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use PDF;
use App\Models\Detailorder;

class LaporanController extends Controller
{
    public function barang(){
         $data['products'] = Product::join('categories', 'categories.id', '=', 'products.categories_id')
            ->join('harga','harga.id','=', 'products.harga_id')
            ->select('products.*', 'categories.name as nama_kategori','harga.harga')
            ->orderBy('products.id','desc')
            ->get();
        return view('admin.laporan.barang',$data);
        
    }
    public function cetakBarang(){
         $products = Product::join('categories', 'categories.id', '=', 'products.categories_id')
            ->join('harga','harga.id','=', 'products.harga_id')
            ->select('products.*', 'categories.name as nama_kategori','harga.harga')
            ->orderBy('products.id','desc')
            ->get();
            //  return view('admin.laporan.cetakBarang',$data);
       $pdf = PDF::loadview('admin.laporan.cetakBarang',['products'=>$products])->setPaper( 'landscape');
	    return $pdf->stream();
        
    }
    public function penjualan(){
        $data['products'] = Detailorder::join('products', 'products.id', '=', 'detail_order.product_id')
            ->join('order', 'order.id', '=', 'detail_order.order_id')
            ->join('harga','harga.id', '=', 'detail_order.harga_id')
            ->select('products.name as nama_produk', 'products.image', 'detail_order.qty', 'harga.harga', 'order.*')
            ->get();
             return view('admin.laporan.penjualan',$data);
    }
    public function cetakPenjualan(){
         $products = Detailorder::join('products', 'products.id', '=', 'detail_order.product_id')
            ->join('order', 'order.id', '=', 'detail_order.order_id')
            ->join('harga','harga.id', '=', 'detail_order.harga_id')
            ->select('products.name as nama_produk', 'products.image', 'detail_order.qty', 'harga.harga', 'order.*')
            ->get();
            //  return view('admin.laporan.cetakBarang',$data);
       $pdf = PDF::loadview('admin.laporan.cetakPenjualan',['products'=>$products])->setPaper( 'landscape');
	    return $pdf->stream();
        
    }
}
