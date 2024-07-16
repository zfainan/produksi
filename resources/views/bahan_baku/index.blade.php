@extends('layouts.app')

@section('content')
    <div class="d-flex flex-wrap">
        <div class="pagetitle">
            <h1>Bahan Baku</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item active">Data Bahan Baku</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <a class="btn btn-success mb-auto ms-auto" href="{{ route('bahan-baku.create') }}"> Tambah Bahan Baku</a>
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
                <h5 class="card-title">Data Bahan Baku</h5>

                <div class="table-responsive">
                    <table class="datatable table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Satuan</th>
                                <th>Stok</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->nama_bahan_baku }}</td>
                                    <td>{{ $item->satuan }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a class="btn btn-sm btn-outline-info me-1"
                                            href="{{ route('bahan-baku.show', $item) }}"><i class="bi bi-eye"></i></a>
                                        <a class="btn btn-sm btn-outline-warning me-1"
                                            href="{{ route('bahan-baku.edit', $item) }}"><i class="bi bi-pen"></i></a>

                                        <form
                                            onsubmit="return confirm('Do you really want to delete user {{ $item->nama }}?');"
                                            action="{{ route('bahan-baku.destroy', $item) }}" method="POST">
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
