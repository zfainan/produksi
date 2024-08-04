@extends('layouts.app')

@section('content')
    <div class="d-flex flex-wrap">
        <div class="pagetitle">
            <h1>Pesanan Pelanggan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Transaksi</li>
                    <li class="breadcrumb-item active">Pesanan Pelanggan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        @if (hasRole(App\Enums\JabatanEnum::Administrator->value))
            <a class="btn btn-success mb-auto ms-auto" href="{{ route('pesanan.create') }}"> Tambah Pesanan</a>
        @endif
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
                <h5 class="card-title">Pesanan Pelanggan</h5>

                <div class="table-responsive">
                    <table class="datatable table">
                        <thead>
                            <tr>
                                <th>Pelanggan</th>
                                <th>Tanggal Pesan</th>
                                <th>Tanggal Permintaan</th>
                                <th>Tipe</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->pelanggan?->nama }}</td>
                                    <td>{{ $item->tanggal_pesan }}</td>
                                    <td>{{ $item->tanggal_permintaan }}</td>
                                    <td>{{ $item->tipe_pesanan }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a class="btn btn-sm btn-outline-info me-1"
                                            href="{{ route('pesanan.show', $item) }}"><i class="bi bi-eye"></i></a>

                                        @if (hasRole(App\Enums\JabatanEnum::Administrator->value))
                                            <a class="btn btn-sm btn-outline-warning me-1"
                                                href="{{ route('pesanan.edit', $item) }}"><i class="bi bi-pen"></i></a>

                                            <form onsubmit="return confirm('Do you really want to delete order?');"
                                                action="{{ route('pesanan.destroy', $item) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-outline-danger me-1"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                        @endif
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
