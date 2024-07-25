@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Pengajuan Bahan Baku</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pengajuan-bahan.index') }}">Pengajuan Bahan Baku</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('pengajuan-bahan.show', $pengajuanBahan) }}">{{ $pengajuanBahan->id_pengajuan }}</a>
                </li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Pengajuan Bahan Baku</h5>

                <form action="{{ route('pengajuan-bahan.update', $pengajuanBahan) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="id_bahan" class="col-sm-3 col-form-label">Bahan Baku</label>
                        <div class="col-sm-9">
                            <select name="id_bahan" id="id_bahan"
                                class="form-control @error('id_bahan') is-invalid @enderror">
                                <option selected value>Pilih bahan baku</option>

                                @foreach ($bahan as $item)
                                    <option value="{{ $item->id_bahan }}" @selected($item->id_bahan == (old('id_bahan') ?? $pengajuanBahan->id_bahan))>
                                        {{ $item->nama_bahan_baku }} - {{ $item->satuan }}
                                    </option>
                                @endforeach
                            </select>

                            @error('id_bahan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                        <div class="col-sm-9">
                            <input type="number" name="jumlah" value="{{ old('jumlah') ?? $pengajuanBahan->jumlah }}"
                                class="form-control @error('jumlah') is-invalid @enderror">

                            @error('jumlah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-9 ms-auto">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
