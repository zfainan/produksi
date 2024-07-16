@extends('layouts.app')

@section('title', 'Edit Data Produk')

@section('content')
    <div class="pagetitle">
        <h1>Bahan Baku</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Data Bahan Baku</a></li>
                <li class="breadcrumb-item active">Edit Data Bahan Baku {{ $bahanBaku->nama_bahan_baku }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Data Bahan Baku</h5>

                <form action="{{ route('bahan-baku.update', $bahanBaku) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="nama_bahan_baku" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_bahan_baku"
                                value="{{ old('nama_bahan_baku') ?? $bahanBaku->nama_bahan_baku }}"
                                class="form-control @error('nama_bahan_baku') is-invalid @enderror">

                            @error('nama_bahan_baku')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                        <div class="col-sm-10">
                            <select name="satuan" id="satuan"
                                class="form-control @error('satuan') is-invalid @enderror">
                                <option selected value>Pilih satuan</option>
                                @foreach (\App\Enums\SatuanEnum::toArray() as $satuan)
                                    <option value="{{ $satuan }}" @selected($satuan == (old('satuan') ?? $bahanBaku->satuan))>{{ $satuan }}
                                    </option>
                                @endforeach
                            </select>

                            @error('satuan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="number" name="stok" value="{{ old('stok') ?? $bahanBaku->stok }}"
                                class="form-control @error('stok') is-invalid @enderror">

                            @error('stok')
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
