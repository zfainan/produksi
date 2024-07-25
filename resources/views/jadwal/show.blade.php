@extends('layouts.app')

@section('title', 'Detail Pesanan Pelanggan')

@section('content')
    <div class="pagetitle">
        <h1>Jadwal Produksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('jadwal.index') }}">Jadwal Produksi</a></li>
                <li class="breadcrumb-item active">{{ $jadwal->id_jadwal }}</li>
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
                    <h5 class="card-title">Data Jadwal Produksi</h5>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">Tanggal Mulai</div>
                        <div class="col-lg-9 col-md-8">{{ $jadwal->tanggal_mulai }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">Tanggal Selesai</div>
                        <div class="col-lg-9 col-md-8">{{ $jadwal->tanggal_selesai }}</div>
                    </div>

                    <div class="d-flex">
                        <h5 class="card-title">Detail Jadwal</h5>
                    </div>

                    <div class="table-responsive rounded border p-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID pesanan</th>
                                    <th>Processing time</th>
                                    <th>Flow time</th>
                                    <th>Time to due</th>
                                    <th>Lateness</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jadwal->detail as $detail)
                                    <tr>
                                        <td><a
                                                href="{{ route('pesanan.show', $detail->id_pesanan) }}">{{ $detail->id_pesanan }}</a>
                                        </td>
                                        <td>{{ $detail->processing_time }}</td>
                                        <td>{{ $detail->flow_time }}</td>
                                        <td>{{ $detail->due_date }}</td>
                                        <td>{{ $detail->lateness }}</td>
                                    </tr>
                                @endforeach
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
