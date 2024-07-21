@extends('layouts.app')

@section('content')
    <div class="d-flex flex-wrap">
        <div class="pagetitle">
            <h1>Jadwal Produksi</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Jadwal Produksi</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <a class="btn btn-success mb-auto ms-auto" href="{{ route('jadwal.create') }}"> Buat Jadwal</a>
    </div>

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
                <h5 class="card-title">Jadwal Produksi</h5>

                <div class="table-responsive">
                    <table class="datatable table">
                        <thead>
                            <tr>
                                <th>Nomor Jadwal Produksi</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $jadwal)
                                <tr>
                                    <td>{{ $jadwal->id_jadwal }}</td>
                                    <td>{{ $jadwal->tanggal_mulai }}</td>
                                    <td>{{ $jadwal->tanggal_selesai }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a class="btn btn-sm btn-outline-info me-1"
                                            href="{{ route('jadwal.show', $jadwal) }}"><i class="bi bi-eye"></i></a>

                                        <form onsubmit="return confirm('Do you really want to delete schedule?');"
                                            action="{{ route('jadwal.destroy', $jadwal) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger me-1"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
