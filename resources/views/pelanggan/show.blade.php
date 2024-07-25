@extends('layouts.app')

@section('title', 'Detail Pelanggan')

@section('content')
    <div class="pagetitle">
        <h1>Pelanggan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item"><a href="{{ route('pelanggan.index') }}">Data Pelanggan</a></li>
                <li class="breadcrumb-item active">Detail Pelanggan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">

                <div class="mb-5">
                    <h5 class="card-title">Detail Pelanggan</h5>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">Nama</div>
                        <div class="col-lg-9 col-md-8">{{ $pelanggan->nama }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">No. Telp</div>
                        <div class="col-lg-9 col-md-8">{{ $pelanggan->no_hp }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">Email</div>
                        <div class="col-lg-9 col-md-8">{{ $pelanggan->email }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">Alamat</div>
                        <div class="col-lg-9 col-md-8">{{ $pelanggan->alamat }}</div>
                    </div>

                </div>

                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('pelanggan.index') }}"> Back</a>
                </div>
            </div>
        </div>
    </section>
@endsection
