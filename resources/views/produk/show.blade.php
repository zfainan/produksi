@extends('layouts.app')

@section('title', 'Detail Pengguna')

@section('content')
    <div class="pagetitle">
        <h1>Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Data Produk</a></li>
                <li class="breadcrumb-item active">Detail Produk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">

                <div class="mb-5">
                    <h5 class="card-title">Detail Produk</h5>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Nama</div>
                        <div class="col-lg-9 col-md-8">{{ $produk->nama_produk }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Kemasan</div>
                        <div class="col-lg-9 col-md-8">{{ Str::title($produk->kemasan) }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Harga</div>
                        <div class="col-lg-9 col-md-8">Rp {{ $produk->harga }}</div>
                    </div>

                </div>

                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('produk.index') }}"> Back</a>
                </div>
            </div>
        </div>
    </section>
@endsection
