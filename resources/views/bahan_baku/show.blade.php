@extends('layouts.app')

@section('title', 'Detail Pengguna')

@section('content')
    <div class="pagetitle">
        <h1>Bahan Baku</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item"><a href="{{ route('bahan-baku.index') }}">Data Bahan Baku</a></li>
                <li class="breadcrumb-item active">Detail Bahan Baku</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">

                <div class="mb-5">
                    <h5 class="card-title">Detail Bahan Baku</h5>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">Nama</div>
                        <div class="col-lg-9 col-md-8">{{ $bahanBaku->nama_bahan_baku }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">Satuan</div>
                        <div class="col-lg-9 col-md-8">{{ $bahanBaku->satuan }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">Stok</div>
                        <div class="col-lg-9 col-md-8">{{ $bahanBaku->stok }} {{ $bahanBaku->satuan }}</div>
                    </div>

                </div>

                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('bahan-baku.index') }}"> Back</a>
                </div>
            </div>
        </div>
    </section>
@endsection
