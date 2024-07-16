@extends('layouts.app')

@section('content')
    <div class="d-flex flex-wrap">
        <div class="pagetitle">
            <h1>Produk</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item active">Data Produk</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <a class="btn btn-success mb-auto ms-auto" href="{{ route('produk.create') }}"> Create New Produk</a>
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
                <h5 class="card-title">Data Produk</h5>

                <div class="table-responsive">
                    <table class="datatable table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kemasan</th>
                                <th>Harga</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>{{ Str::title($item->kemasan) }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a class="btn btn-sm btn-outline-info me-1"
                                            href="{{ route('produk.show', $item) }}"><i class="bi bi-eye"></i></a>
                                        <a class="btn btn-sm btn-outline-warning me-1"
                                            href="{{ route('produk.edit', $item) }}"><i class="bi bi-pen"></i></a>

                                        <form
                                            onsubmit="return confirm('Do you really want to delete user {{ $item->nama }}?');"
                                            action="{{ route('produk.destroy', $item) }}" method="POST">
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
