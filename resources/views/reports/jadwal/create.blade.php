@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Laporan Jadwal Produksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Laporan</li>
                <li class="breadcrumb-item active">Laporan Jadwal Produksi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Generate Laporan Jadwal Produksi</h5>

                <form action="{{ route('reports.jadwal') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <label for="since" class="col-sm-2 col-form-label">Sejak</label>
                        <div class="col-sm-10">
                            <input type="date" name="since" value="{{ old('since') }}"
                                class="form-control @error('since') is-invalid @enderror">

                            @error('since')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="until" class="col-sm-2 col-form-label">Hingga</label>
                        <div class="col-sm-10">
                            <input type="date" name="until" value="{{ old('until') }}"
                                class="form-control @error('until') is-invalid @enderror">

                            @error('until')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10 ms-auto">
                            <button type="submit" class="btn btn-primary">Download</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
