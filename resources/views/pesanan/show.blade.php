@extends('layouts.app')

@section('title', 'Detail Pesanan Pelanggan')

@section('content')
    <div class="pagetitle">
        <h1>Pesanan Pelanggan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Transaksi</li>
                <li class="breadcrumb-item"><a href="{{ route('pesanan.index') }}">Data Pesanan Pelanggan</a></li>
                <li class="breadcrumb-item active">Detail Pesanan Pelanggan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">

                <div class="mb-5">
                    <h5 class="card-title">Detail Pesanan Pelanggan</h5>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Pelanggan</div>
                        <div class="col-lg-9 col-md-8">{{ $pesanan->pelanggan->nama }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Tanggal Pesan</div>
                        <div class="col-lg-9 col-md-8">{{ $pesanan->tanggal_pesan }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Tanggal Permintaan</div>
                        <div class="col-lg-9 col-md-8">{{ $pesanan->tanggal_permintaan }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Tipe Pesanan</div>
                        <div class="col-lg-9 col-md-8">{{ $pesanan->tipe_pesanan }}</div>
                    </div>

                </div>

                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('pesanan.index') }}"> Back</a>
                </div>
            </div>
        </div>
    </section>
@endsection
