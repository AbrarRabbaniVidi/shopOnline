@extends('admin.layout.app')
@section('content')
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Kategori </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col">
                      <h4 class="card-title">Laporan Barang</h4>
                      </div>
                      <div class="col text-right">
                      <a href="{{ route('laporan.barang.cetak') }}" class="btn btn-primary">Cetak</a>
                      </div>
                    </div>
                    <center><h3 class="m-4">Laporan Barang</h3></center>
                    <div class="table-responsive">
                      <table class="table table-bordered table-hovered" id="table">
                        <thead>
                          <tr>
                            <th width="5%">No</th>
                            <th>Nama Produk</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Berat</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($products as $product)
                            <tr>
                                <td align="center">{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td><img src="{{ asset('storage/'.$product->image) }}" alt="" ></td>
                                <td>{{ $product->harga }}</td>
                                <td>{{ $product->weigth }}gr</td>
                                <td>{{ $product->nama_kategori }}</td>
                                <td>{{ $product->stok }}</td>
                               
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
@endsection
