@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Pesanan Pelanggan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Transaksi</li>
                <li class="breadcrumb-item"><a href="{{ route('pesanan.index') }}">Pesanan Pelanggan</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pesanan.show', $pesanan) }}">{{ $pesanan->id_pesanan }}</a></li>
                <li class="breadcrumb-item active">Tambah Detail Pesanan Pelanggan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Detail Pesanan Pelanggan</h5>

                <form action="{{ route('detail-pesanan.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="id_pesanan" value="{{ $pesanan->id_pesanan }}">

                    <div class="row mb-3">
                        <label for="id_produk" class="col-sm-3 col-form-label">Produk</label>
                        <div class="col-sm-9">
                            <select name="id_produk" id="id_produk"
                                class="form-control @error('id_produk') is-invalid @enderror">
                                <option selected value>Pilih Produk</option>

                                @foreach ($produk as $item)
                                    <option value="{{ $item->id_produk }}" @selected($item->id_produk == old('id_produk'))>
                                        {{ $item->nama_produk }}
                                    </option>
                                @endforeach
                            </select>

                            @error('id_produk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="jumlah_order" class="col-sm-3 col-form-label">Jumlah</label>
                        <div class="col-sm-9">
                            <input type="number" name="jumlah_order" value="{{ old('jumlah_order') }}"
                                class="form-control @error('jumlah_order') is-invalid @enderror">

                            @error('jumlah_order')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="satuan" class="col-sm-3 col-form-label">Satuan</label>
                        <div class="col-sm-9">
                            <select name="satuan" id="satuan"
                                class="form-control @error('satuan') is-invalid @enderror">
                                <option selected value>Pilih Satuan</option>

                                @foreach (App\Enums\SatuanEnum::toArray() as $satuan)
                                    <option value="{{ $satuan }}" @selected($satuan == old('satuan'))>
                                        {{ $satuan }}
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
                        <label for="processing_time" class="col-sm-3 col-form-label">Perkiraan Waktu Produksi (Hari)</label>
                        <div class="col-sm-9">
                            <input type="number" name="processing_time" value="{{ old('processing_time') }}"
                                class="form-control @error('processing_time') is-invalid @enderror">

                            @error('processing_time')
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
