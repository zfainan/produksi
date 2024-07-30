@extends('layouts.app')

@section('title', 'Edit Data Produk')

@section('content')
    <div class="pagetitle">
        <h1>Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Data Produk</a></li>
                <li class="breadcrumb-item active">Edit Data Produk {{ $produk->nama_produk }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Data Produk</h5>

                <form action="{{ route('produk.update', $produk) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="nama_produk" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_produk"
                                value="{{ old('nama_produk') ?? $produk->nama_produk }}"
                                class="form-control @error('nama_produk') is-invalid @enderror">

                            @error('nama_produk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="kemasan" class="col-sm-2 col-form-label">Kemasan</label>
                        <div class="col-sm-10">
                            <select name="kemasan" id="kemasan"
                                class="form-control @error('kemasan') is-invalid @enderror">
                                <option selected value>Pilih kemasan</option>
                                @foreach (\App\Enums\KemasanEnum::toArray() as $role)
                                    <option value="{{ $role }}" @selected($role == (old('kemasan') ?? $produk->kemasan))>{{ Str::title($role) }}
                                    </option>
                                @endforeach
                            </select>

                            @error('kemasan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="addon-rp">Rp</span>
                                <input type="number" name="harga" value="{{ old('harga') ?? $produk->harga }}"
                                    class="form-control @error('harga') is-invalid @enderror">

                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="production_per_day" class="col-sm-2 col-form-label">Kapasitas Produksi Per Hari</label>
                        <div class="col-sm-10">
                            <input type="number" name="production_per_day" value="{{ old('production_per_day') ?? $produk->production_per_day }}"
                                class="form-control @error('production_per_day') is-invalid @enderror">

                            @error('production_per_day')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10 ms-auto">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
