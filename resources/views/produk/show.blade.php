@extends('layouts.app')

@section('title', 'Detail Pengguna')

@section('content')
    <div class="pagetitle">
        <h1>Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Data Produk</a></li>
                <li class="breadcrumb-item active">Detail Produk</li>
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
                    <h5 class="card-title">Detail Produk</h5>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Nama</div>
                        <div class="col-lg-9 col-md-8">{{ $produk->nama_produk }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Kemasan</div>
                        <div class="col-lg-9 col-md-8">{{ Str::title($produk->kemasan) }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Harga</div>
                        <div class="col-lg-9 col-md-8">Rp {{ $produk->harga }}</div>
                    </div>

                    <div class="d-flex">
                        <h5 class="card-title">Detail Bahan Baku</h5>
                        <a href="{{ route('detail-produk.create', [
                            'id_produk' => $produk->id_produk,
                        ]) }}"
                            class="btn btn-primary my-auto ms-auto">
                            Tambah Bahan Baku
                        </a>
                    </div>

                    <div class="table-responsive rounded border p-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Bahan Baku</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produk->detail as $detail)
                                    <tr>
                                        <td>{{ $detail->bahan?->nama_bahan_baku }}</td>
                                        <td>{{ $detail->jumlah }}</td>
                                        <td>{{ $detail->bahan?->satuan }}</td>
                                        <td>
                                            <form action="{{ route('detail-produk.destroy', $detail) }}"
                                                onsubmit="return confirm('Do you really want to delete the detail?');"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                @if (!count($produk->detail))
                                    <tr>
                                        <td colspan="4" class="border-0">
                                            <p class="text-center">
                                                Belum ada data
                                            </p>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('produk.index') }}"> Back</a>
                </div>
            </div>
        </div>
    </section>
@endsection
