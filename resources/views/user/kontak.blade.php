@extends('layouts.home')
@section('content')

<div class="bg-light py-3">
    <div class="container">
    <div class="row">
        <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Contact</strong></div>
    </div>
    </div>
</div>  

<div class="site-section">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
        <h2 class="h3 mb-3 text-black">Akun</h2>
        </div>
        <div class="col-md-7">

       <table class="table ">
            <tr>
                <td width="20%">Nama :</td>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td width="20%">Email :</td>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <td width="20%">alamat :</td>
                <td>{{ $user->detail }}</td>
                <td><a href="{{ url('/alamat/ubah/'.$user->idalamat) }}"class="btn btn-primary btn-sm">ubah</a></td>
            </tr>
       </table>
        </div>
       
    </div>
    </div>
</div>
@endsection