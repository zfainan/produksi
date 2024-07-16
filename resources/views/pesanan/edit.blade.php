@extends('layouts.app')

@section('title', 'Edit Data Pesanan Pelanggan')

@section('content')
    <div class="pagetitle">
        <h1>Pesanan Pelanggan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Transaksi</li>
                <li class="breadcrumb-item"><a href="{{ route('pesanan.index') }}">Data Pesanan Pelanggan</a></li>
                <li class="breadcrumb-item active">Edit Data Pesanan Pelanggan {{ $pesanan->pelanggan?->nama }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Data Pesanan Pelanggan</h5>

                <form action="{{ route('pesanan.update', $pesanan) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="id_pelanggan" class="col-sm-2 col-form-label">Pelanggan</label>
                        <div class="col-sm-10">
                            <select name="id_pelanggan" id="id_pelanggan"
                                class="form-control @error('id_pelanggan') is-invalid @enderror">
                                <option selected value>Pilih Pelanggan</option>

                                @foreach ($pelanggan as $pelanggan)
                                    <option value="{{ $pelanggan->id_pelanggan }}" @selected($pelanggan->id_pelanggan == (old('id_pelanggan') ?? $pesanan->id_pelanggan))>
                                        {{ $pelanggan->nama }}
                                    </option>
                                @endforeach
                            </select>

                            @error('id_pelanggan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tanggal_pesan" class="col-sm-2 col-form-label">Tanggal Pesan</label>
                        <div class="col-sm-10">
                            <input type="date" name="tanggal_pesan"
                                value="{{ old('tanggal_pesan') ?? $pesanan->tanggal_pesan }}"
                                class="form-control @error('tanggal_pesan') is-invalid @enderror">

                            @error('tanggal_pesan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tanggal_permintaan" class="col-sm-2 col-form-label">Tanggal Permintaan</label>
                        <div class="col-sm-10">
                            <input type="date" name="tanggal_permintaan"
                                value="{{ old('tanggal_permintaan') ?? $pesanan->tanggal_permintaan }}"
                                class="form-control @error('tanggal_permintaan') is-invalid @enderror">

                            @error('tanggal_permintaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tipe_pesanan" class="col-sm-2 col-form-label">Tipe</label>
                        <div class="col-sm-10 d-flex flex-wrap gap-4">
                            @foreach (\App\Enums\TipePesananEnum::toArray() as $type)
                                <div class="form-check my-auto">
                                    <input type="radio" @checked($type == (old('tipe_pesanan') ?? $pesanan->tipe_pesanan))
                                        class="form-check-input @error('tipe_pesanan') is-invalid @enderror"
                                        id="type{{ $loop->index }}" name="tipe_pesanan" value="{{ $type }}">
                                    <label class="form-check-label"
                                        for="type{{ $loop->index }}">{{ $type }}</label>

                                    @error('tipe_pesanan')
                                        @if ($loop->first)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @endif
                                    @enderror
                                </div>
                            @endforeach
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
