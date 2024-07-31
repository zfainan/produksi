@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Agenda Produksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Agenda Produksi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        @session('error')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ $value }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession

        <div class="card">
            <div class="card-body">
                <div class="d-flex mb-4 py-3">
                    <h5 class="card-title my-auto">Agenda Produksi</h5>

                    <form class="d-flex ms-auto">
                        <p class="my-auto me-2">Sejak</p>
                        <input type="date" name="since" class="form-control my-auto me-3" value="{{ $since->format('Y-m-d') }}">
                        <p class="my-auto me-2">Hingga</p>
                        <input type="date" name="until" class="form-control my-auto me-2" value="{{ $until->format('Y-m-d') }}">
                        <button class="btn btn-primary my-auto">Tampil</button>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="datatable table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Jumlah Produksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>{{ $item->quantity }} {{ $item->kemasan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
