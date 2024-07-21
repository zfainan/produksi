@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Data Produk</a></li>
                <li class="breadcrumb-item">{{ $produk->id_produk }}</li>
                <li class="breadcrumb-item active">Tambah Detail Produk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Detail Pesanan Pelanggan</h5>

                <form action="{{ route('detail-produk.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="id_produk" value="{{ $produk->id_produk }}">

                    <div class="row mb-3">
                        <label for="id_bahan" class="col-sm-3 col-form-label">Bahan Baku</label>
                        <div class="col-sm-9">
                            <select name="id_bahan" id="id_bahan"
                                class="form-control @error('id_bahan') is-invalid @enderror">
                                <option selected value>Pilih Bahan Baku</option>

                                @foreach ($bahan as $item)
                                    <option value="{{ $item->id_bahan }}" @selected($item->id_bahan == old('id_bahan'))>
                                        {{ $item->nama_bahan_baku }} - {{ $item->satuan }}
                                    </option>
                                @endforeach
                            </select>

                            @error('id_bahan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                        <div class="col-sm-9">
                            <input type="number" name="jumlah" value="{{ old('jumlah') }}"
                                class="form-control @error('jumlah') is-invalid @enderror">

                            @error('jumlah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-9 ms-auto">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
