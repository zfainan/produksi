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
        @session('success')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ $value }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession

        <div class="card">
            <div class="card-body">

                <div class="mb-5">
                    <div class="d-flex">
                        <h5 class="card-title">Detail Bahan Baku</h5>

                        @if (hasRole(App\Enums\JabatanEnum::WarehouseHead->value))
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary my-auto ms-auto" data-bs-toggle="modal"
                                data-bs-target="#stokModal">
                                Ubah Stok
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="stokModal" tabindex="-1" aria-labelledby="stokModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('bahan-baku.update-stok', $bahanBaku) }}" class="modal-content"
                                        method="POST">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="stokModalLabel">Ubah Stok</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @csrf

                                            <div class="row mb-3">
                                                <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="stok"
                                                        value="{{ old('stok') ?? $bahanBaku->stok }}"
                                                        class="form-control @error('stok') is-invalid @enderror">

                                                    @error('stok')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>

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
