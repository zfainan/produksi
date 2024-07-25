@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Pengajuan Bahan Baku</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Pengajuan Bahan Baku</li>
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
            <div class="alert alert-error alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ $value }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Pengajuan Bahan Baku</h5>

                <div class="table-responsive">
                    <table class="datatable table">
                        <thead>
                            <tr>
                                <th>ID Bahan</th>
                                <th>ID Pesanan</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td><a href="{{ route('pengajuan-bahan.show', $item) }}">{{ $item->id_pengajuan }}</a>
                                    </td>
                                    <td><a href="{{ route('pesanan.show', $item->id_pesanan) }}">{{ $item->id_pesanan }}</a>
                                    </td>
                                    <td>{{ $item->tanggal_pengajuan }}</td>
                                    <td>{{ $item->approved ? 'Disetujui' : 'Belum Disetujui' }}</td>
                                </tr>
                            @endforeach

                            @if (!count($data))
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
        </div>
    </section>
@endsection
