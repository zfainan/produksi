@extends('layouts.app')

@section('title', 'Detail Pesanan Pelanggan')

@section('content')
    <div class="pagetitle">
        <h1>Pesanan Pelanggan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Transaksi</li>
                <li class="breadcrumb-item"><a href="{{ route('pesanan.index') }}">Pesanan Pelanggan</a></li>
                <li class="breadcrumb-item active">{{ $pesanan->id_pesanan }}</li>
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

        @session('error')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ $value }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession

        <div class="card">
            <div class="card-body">

                <div class="mb-5">
                    <h5 class="card-title">Data Pesanan Pelanggan</h5>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">Pelanggan</div>
                        <div class="col-lg-9 col-md-8">{{ $pesanan->pelanggan->nama }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">Tanggal Pesan</div>
                        <div class="col-lg-9 col-md-8">{{ $pesanan->tanggal_pesan }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">Tanggal Permintaan</div>
                        <div class="col-lg-9 col-md-8">{{ $pesanan->tanggal_permintaan }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">Tipe Pesanan</div>
                        <div class="col-lg-9 col-md-8">{{ $pesanan->tipe_pesanan }}</div>
                    </div>

                    <div class="d-flex">
                        <h5 class="card-title">Detail Pesanan</h5>
                        <a href="{{ route('detail-pesanan.create', [
                            'id_pesanan' => $pesanan->id_pesanan,
                        ]) }}"
                            class="btn btn-primary my-auto ms-auto">
                            Tambah Detail Pesanan
                        </a>
                    </div>

                    <div class="table-responsive rounded border p-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Perkiraan waktu produksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan->detail as $detail)
                                    <tr>
                                        <td>{{ $detail->produk?->nama_produk }}</td>
                                        <td>{{ $detail->jumlah_order }}</td>
                                        <td>{{ $detail->processing_time }} Hari</td>
                                        <td>
                                            <form action="{{ route('detail-pesanan.destroy', $detail) }}"
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

                                @if (!count($pesanan->detail))
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

                    <div class="d-flex">
                        <h5 class="card-title">Pengajuan Bahan Baku</h5>
                        <a href="{{ route('pengajuan-bahan.create', [
                            'id_pesanan' => $pesanan->id_pesanan,
                        ]) }}"
                            class="btn btn-primary my-auto ms-auto">
                            Buat Pengajuan Bahan
                        </a>
                    </div>

                    <div class="table-responsive rounded border p-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID Pengajuan</th>
                                    <th>Bahan</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan->pengajuanBahan as $item)
                                    <tr>
                                        <td><a
                                                href="{{ route('pengajuan-bahan.show', $item) }}">{{ $item->id_pengajuan }}</a>
                                        </td>
                                        <td>{{ $item->bahan?->nama_bahan_baku }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->bahan?->satuan }}</td>
                                        <td>{{ $item->approved ? 'Disetujui' : 'Belum Disetujui' }}</td>
                                    </tr>
                                @endforeach

                                @if (!count($pesanan->pengajuanBahan))
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
                    <a class="btn btn-primary" href="{{ route('pesanan.index') }}"> Back</a>
                </div>
            </div>
        </div>
    </section>
@endsection
