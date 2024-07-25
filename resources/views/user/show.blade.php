@extends('layouts.app')

@section('title', 'Detail Pengguna')

@section('content')
    <div class="pagetitle">
        <h1>Pengguna</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Data Pengguna</a></li>
                <li class="breadcrumb-item active">Detail Pengguna</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">

                <div class="mb-4">
                    <h5 class="card-title">Detail Pengguna</h5>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">Nama</div>
                        <div class="col-lg-9 col-md-8">{{ $user->nama }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">Email</div>
                        <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">Alamat</div>
                        <div class="col-lg-9 col-md-8">{{ $user->alamat }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">No. HP</div>
                        <div class="col-lg-9 col-md-8">{{ $user->no_hp }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">Jabatan</div>
                        <div class="col-lg-9 col-md-8">{{ $user->jabatan }}</div>
                    </div>

                </div>

                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                </div>
            </div>
        </div>
    </section>
@endsection
