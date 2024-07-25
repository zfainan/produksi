@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Pesanan Pelanggan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Transaksi</li>
                <li class="breadcrumb-item"><a href="{{ route('pesanan.index') }}">Pesanan Pelanggan</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pesanan.show', $pesanan) }}">{{ $pesanan->id_pesanan }}</a>
                </li>
                <li class="breadcrumb-item active">Buat Pengajuan Bahan Baku</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Buat Pengajuan Bahan Baku</h5>

                <form action="{{ route('pengajuan-bahan.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="id_pesanan" value="{{ $pesanan->id_pesanan }}">

                    <div class="row mb-3">
                        <label for="id_bahan" class="col-sm-3 col-form-label">Bahan Baku</label>
                        <div class="col-sm-9">
                            <select name="id_bahan" id="id_bahan"
                                class="form-control @error('id_bahan') is-invalid @enderror">
                                <option selected value>Pilih bahan baku</option>

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
