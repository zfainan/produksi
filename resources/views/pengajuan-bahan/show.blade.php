@extends('layouts.app')

@section('title', 'Detail Pelanggan')

@section('content')
    <div class="pagetitle">
        <h1>Pengajuan Bahan Baku</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pengajuan-bahan.index') }}">Pengajuan Bahan Baku</a></li>
                <li class="breadcrumb-item active">{{ $pengajuanBahan->id_pengajuan }}</li>
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
                {{ $value }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession

        <div class="card">
            <div class="card-body">

                <div class="mb-5">
                    <div class="d-flex">
                        <h5 class="card-title">Detail Pengajuan Bahan Baku</h5>

                        @if (!$pengajuanBahan->approved)
                            <div class="dropdown my-auto ms-auto">
                                <button class="btn btn-light border-dark border" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    @if (hasRole(App\Enums\JabatanEnum::WarehouseHead->value))
                                        <li>
                                            <form action="{{ route('pengajuan-bahan.approve', $pengajuanBahan) }}"
                                                method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin untuk menyetujui pengajuan ini?');">
                                                @csrf

                                                <button type="submit" class="dropdown-item border-0">Setujui</button>
                                            </form>
                                        </li>
                                    @else
                                        <li><a class="dropdown-item"
                                                href="{{ route('pengajuan-bahan.edit', $pengajuanBahan) }}"><i
                                                    class="bi bi-pen"></i> Edit</a></li>
                                        <li>
                                            <form action="{{ route('pengajuan-bahan.destroy', $pengajuanBahan) }}"
                                                onsubmit="return confirm('Do you really want to delete the pengajuan?');"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button class="dropdown-item border-0">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">ID Pengajuan</div>
                        <div class="col-lg-9 col-md-8">{{ $pengajuanBahan->id_pengajuan }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">Status</div>
                        <div class="col-lg-9 col-md-8">{{ $pengajuanBahan->approved ? 'Disetujui' : 'Belum Disetujui' }}
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">ID Pesanan</div>
                        <div class="col-lg-9 col-md-8"><a
                                href="{{ route('pesanan.show', $pengajuanBahan->id_pesanan) }}">{{ $pengajuanBahan->id_pesanan }}
                            </a></div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">Bahan</div>
                        <div class="col-lg-9 col-md-8"><a
                                href="{{ route('bahan-baku.show', $pengajuanBahan->id_bahan) }}">{{ $pengajuanBahan->bahan?->nama_bahan_baku }}
                            </a></div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">Jumlah</div>
                        <div class="col-lg-9 col-md-8">{{ $pengajuanBahan->jumlah }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label">Satuan</div>
                        <div class="col-lg-9 col-md-8">{{ $pengajuanBahan->bahan?->satuan }}</div>
                    </div>

                </div>

                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('pengajuan-bahan.index') }}"> Back</a>
                </div>
            </div>
        </div>
    </section>
@endsection
