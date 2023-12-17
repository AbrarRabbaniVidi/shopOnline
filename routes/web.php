<?php

use App\Http\Controllers\{ProfileController,
DashboardController, KategoriController, LaporanController};
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\PelangganController;
use App\Http\Controllers\admin\PengaturanController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\RekeningController;
use App\Http\Controllers\admin\TransaksiController;
use App\Http\Controllers\user\AlamatController;
use App\Http\Controllers\user\CheckoutController;
use App\Http\Controllers\user\KeranjangController;
use App\Http\Controllers\user\OrderController;
use App\Http\Controllers\user\ProdukController;
use App\Http\Controllers\user\WelcomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[WelcomeController::class,'index'])->name('home');
Route::get('/home',[WelcomeController::class,'index'])->name('home2');
Route::get('/produk',[ProdukController::class,'index'])->name('user.produk');
Route::get('/produk/cari',[ProdukController::class,'cari'])->name('user.produk.cari');
Route::get('/kategori/{id}',[KategoriController::class,'produkByKategori'])->name('user.kategori');
Route::get('/produk/{id}',[ProdukController::class,'detail'])->name('user.produk.detail');

Route::get('/dashboard', function () {
    if(Auth::user()->role == 'admin'){
        return redirect('admin');
    } 
    else if(Auth::user()->role == 'customer'){
       return redirect('/'); 
    }   
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::get('/','user\WelcomeController@index')->name('home');
// Route::get('/home','user\WelcomeController@index')->name('home2');
// Route::get('/kontak','user\WelcomeController@kontak')->name('kontak');
// Route::get('/produk','user\ProdukController@index')->name('user.produk');
// Route::get('/produk/cari','user\ProdukController@cari')->name('user.produk.cari');
// Route::get('/kategori/{id}','KategoriController@produkByKategori')->name('user.kategori');
// Route::get('/produk/{id}','user\ProdukController@detail')->name('user.produk.detail');

// Route::get('/pelanggan',function(){
    //     return 'Pelanggan';
    // });

    Route::prefix('admin')->middleware(['auth','admin'])->group(function(){    
        Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
        Route::get('/pengaturan/alamat',[PengaturanController::class,'aturalamat'])->name('admin.pengaturan.alamat');
    Route::get('/pengaturan/ubahalamat/{id}',[PengaturanController::class,'ubahalamat'])->name('admin.pengaturan.ubahalamat');
    Route::get('/pengaturan/alamat/getcity/{id}','admin\PengaturanController@getCity')->name('admin.pengaturan.getCity');
    Route::post('pengaturan/simpanalamat',[PengaturanController::class,'simpanalamat'])->name('admin.pengaturan.simpanalamat');
    Route::post('pengaturan/updatealamat/{id}',[PengaturanController::class,'updatealamat'])->name('admin.pengaturan.updatealamat');

    Route::get('/categories',[CategoriesController::class,'index'])->name('admin.categories');
    Route::get('/categories/tambah',[CategoriesController::class,'tambah'])->name('admin.categories.tambah');
    Route::post('/categories/store',[CategoriesController::class,'store'])->name('admin.categories.store');
    Route::post('/categories/update/{id}',[CategoriesController::class,'update'])->name('admin.categories.update');
    Route::get('/categories/edit/{id}',[CategoriesController::class,'edit'])->name('admin.categories.edit');
    Route::get('/categories/delete/{id}',[CategoriesController::class,'delete'])->name('admin.categories.delete');

    Route::get('/product',[ProductController::class,'index'])->name('admin.product');
    Route::get('/product/tambah',[ProductController::class,'tambah'])->name('admin.product.tambah');
    Route::post('/product/store',[ProductController::class,'store'])->name('admin.product.store');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit');
    Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('admin.product.delete');
    Route::post('/product/update/{id}',[ProductController::class,'update'])->name('admin.product.update');
    
    Route::get('/transaksi',[TransaksiController::class,'index'])->name('admin.transaksi');
    Route::get('/transaksi/perludicek',[TransaksiController::class,'perludicek'])->name('admin.transaksi.perludicek');
    Route::get('/transaksi/perludikirim',[TransaksiController::class,'perludikirim'])->name('admin.transaksi.perludikirim');
    Route::get('/transaksi/dikirim',[TransaksiController::class,'dikirim'])->name('admin.transaksi.dikirim');
    Route::get('/transaksi/detail/{id}',[TransaksiController::class,'detail'])->name('admin.transaksi.detail');
    Route::get('/transaksi/konfirmasi/{id}',[TransaksiController::class,'konfirmasi'])->name('admin.transaksi.konfirmasi');
    Route::post('/transaksi/inputresi/{id}',[TransaksiController::class,'inputresi'])->name('admin.transaksi.inputresi');
    Route::get('/transaksi/selesai',[TransaksiController::class,'selesai'])->name('admin.transaksi.selesai');
    Route::get('/transaksi/dibatalkan',[TransaksiController::class,'dibatalkan'])->name('admin.transaksi.dibatalkan');

    Route::get('/rekening',[RekeningController::class,'index'])->name('admin.rekening');
    Route::get('/rekening/edit/{id}',[RekeningController::class,'edit'])->name('admin.rekening.edit');
    Route::get('/rekening/tambah',[RekeningController::class,'tambah'])->name('admin.rekening.tambah');
    Route::post('/rekening/store',[RekeningController::class,'store'])->name('admin.rekening.store');
    Route::get('/rekening/delete/{id}',[RekeningController::class,'delete'])->name('admin.rekening.delete');
    Route::post('/rekening/update/{id}',[RekeningController::class,'update'])->name('admin.rekening.update');

    Route::get('/pelanggan',[PelangganController::class,'index'])->name('admin.pelanggan');
    Route::get('/laporan/barang',[LaporanController::class,'barang'])->name('laporan.barang');
    Route::get('/laporan/barang/cetak',[LaporanController::class,'cetakBarang'])->name('laporan.barang.cetak');
    Route::get('/laporan/penjualan',[LaporanController::class,'penjualan'])->name('laporan.penjualan');
    Route::get('/laporan/penjualan/cetak',[LaporanController::class,'cetakPenjualan'])->name('laporan.penjualan.cetak');

});

Route::middleware(['auth','customer'])->group(function(){
    Route::get('/akun',[WelcomeController::class,'kontak'])->name('kontak');
    Route::post('/keranjang/simpan',[KeranjangController::class,'simpan'])->name('user.keranjang.simpan');
    Route::get('/keranjang',[KeranjangController::class,'index'])->name('user.keranjang');
    Route::post('/keranjang/update',[KeranjangController::class,'update'])->name('user.keranjang.update');
    Route::get('/keranjang/delete/{id}',[KeranjangController::class,'delete'])->name('user.keranjang.delete');
    Route::get('/alamat',[AlamatController::class,'index'])->name('user.alamat');
   
    Route::post('/alamat/simpan',[AlamatController::class,'simpan'])->name('user.alamat.simpan');
    Route::post('/alamat/update/{id}',[AlamatController::class,'update'])->name('user.alamat.update');
    Route::get('/alamat/ubah/{id}',[AlamatController::class,'ubah'])->name('user.alamat.ubah');
    Route::get('/checkout',[CheckoutController::class,'index'])->name('user.checkout');
    Route::post('/order/simpan',[OrderController::class,'simpan'])->name('user.order.simpan');
    Route::get('/order/sukses',[OrderController::class,'sukses'])->name('user.order.sukses');
    Route::get('/order',[OrderController::class,'index'])->name('user.order');
    Route::get('/order/detail/{id}',[OrderController::class,'detail'])->name('user.order.detail');
    Route::get('/order/pesananditerima/{id}',[OrderController::class,'pesananditerima'])->name('user.order.pesananditerima');
    Route::get('/order/pesanandibatalkan/{id}',[OrderController::class,'pesanandibatalkan'])->name('user.order.pesanandibatalkan');
    Route::get('/order/pembayaran/{id}',[OrderController::class,'pembayaran'])->name('user.order.pembayaran');
    Route::post('/order/kirimbukti/{id}',[OrderController::class,'kirimbukti'])->name('user.order.kirimbukti');
});

require __DIR__.'/auth.php';
