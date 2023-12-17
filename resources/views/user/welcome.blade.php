@extends('layouts.home')
@section('content')
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="tab-class text-center">
                <div class="row g-4">
                    <div class="col-lg-4 text-start">
                        <h1>Our Products</h1>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                            @foreach ($produks as $produk)
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="{{ asset('storage/'.$produk->image) }}" class="img-fluid w-100 rounded-top"
                                                alt="">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                            style="top: 10px; left: 10px;">Fruits</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4>{{ $produk->name }}</h4>
                                            <p>{{ $produk->description }}</p>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-0">@currency($produk->harga)</p>
                                                <a href="#"
                                                    class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                        class="fa fa-shopping-bag me-2 text-primary"></i> Tambah
                                                    Keranjang</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                           
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- <div class="site-blocks-cover" style="background-image: url({{ asset('shopper') }}/images/hero_1.jpg);" data-aos="fade">
    <div class="container">
    <div class="row align-items-start align-items-md-center justify-content-end">
        <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
        <h1 class="mb-2">Cari Kebutuhan Olahraga Kamu Di Sini</h1>
        <div class="intro-text text-center text-md-left">
            <p class="mb-4">Alat olahraga disini terjamin kualitasnya dan tentunya barangnya juga original bukan kw. </p>
            <p>
            <a href="{{ route('user.produk') }}" class="btn btn-sm btn-primary">Belanja Sekarang</a>
            </p>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="site-section site-section-sm site-blocks-1">
    <div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
        <div class="icon mr-4 align-self-start">
            <span class="icon-truck"></span>
        </div>
        <div class="text">
            <h2 class="text-uppercase">Pengiriman</h2>
            <p>Pengiriman bisa ke seluruh wilayah indonesia dengan kurir JNE</p>
        </div>
        </div>
        <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
        <div class="icon mr-4 align-self-start">
            <span class="icon-star"></span>
        </div>
        <div class="text">
            <h2 class="text-uppercase">Kualitas Oke</h2>
            <p>Kualitas barangnya terjamin karena semuanya disini original bukan kw.</p>
        </div>
        </div>
        <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
        <div class="icon mr-4 align-self-start">
            <span class="icon-security"></span>
        </div>
        <div class="text">
            <h2 class="text-uppercase">Keamanan</h2>
            <p>Kami menjamin keamanan dalam pengiriman barang sampai diterima oleh anda.</p>
        </div>
        </div>
    </div>
    </div>
</div>
<div class="site-section block-3 site-blocks-2 bg-light"  data-aos="fade-up">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 site-section-heading text-center pt-4">
        <h2>Produk Terlaris</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="nonloop-block-3 owl-carousel" >
            @foreach ($produks as $produk)
            <div class="item">
            <div class="block-4 text-center">
                <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}">
                <figure class="block-4-image">
                <img src="{{ asset('storage/'.$produk->image) }}" alt="Image placeholder" class="img-fluid" width="100%" style="height:300px">
                </figure>
                </a>
                <div class="block-4-text p-4">
                <h3><a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}">{{ $produk->name }}</a></h3>
                <p class="mb-0">{{ $produk->price }}</p>
                <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}" class="btn btn-primary mt-2">Detail</a>
                </div>
            </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>
    </div>
</div> --}}
@endsection
