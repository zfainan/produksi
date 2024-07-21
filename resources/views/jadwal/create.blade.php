@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Jadwal Produksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('jadwal.index') }}">Jadwal Produksi</a></li>
                <li class="breadcrumb-item active">Buat Jadwal Produksi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Buat Jadwal Produksi</h5>

                <form action="{{ route('jadwal.store') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <label for="tanggal_mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                        <div class="col-sm-10">
                            <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}"
                                class="form-control @error('tanggal_mulai') is-invalid @enderror">

                            @error('tanggal_mulai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tanggal_mulai" class="col-sm-2 col-form-label">Daftar Pesanan</label>
                        <div class="col-sm-10">
                            <div class="d-flex">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#pesanan">
                                    Tambah Pesanan
                                </button>
                            </div>

                            <div class="table-responsive my-2 rounded border p-2">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nomor Pesanan</th>
                                            <th>Pelanggan</th>
                                            <th>Tanggal Pesan</th>
                                            <th>Tanggal Permintaan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="selectedPesanan">
                                        <tr>
                                            <td class="border-0 p-3" colspan="5">
                                                <p class="text-center">Pesanan Masih Kosong</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @error('pesanan')
                                <span class="text-danger text-xs" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="pesanan" tabindex="-1" aria-labelledby="pesananLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="pesananLabel">Daftar Pesanan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="datatable table">
                                            <thead>
                                                <th></th>
                                                <th>Nomor Pesanan</th>
                                                <th>Pelanggan</th>
                                                <th>Tanggal Pesan</th>
                                                <th>Tanggal Permintaan</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($pesanan as $item)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="pesanan[]"
                                                                value="{{ $item->id_pesanan }}"
                                                                onchange="handleCheck({{ $item->toJson() }}, this)">
                                                        </td>
                                                        <td>{{ $item->id_pesanan }}</td>
                                                        <td>{{ $item->pelanggan?->nama }}</td>
                                                        <td>{{ $item->tanggal_pesan }}</td>
                                                        <td>{{ $item->tanggal_permintaan }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10 ms-auto">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        let pesanan = [];

        function handleCheck(item, checkbox) {
            if (checkbox.checked) {
                pesanan.push(item);
            } else {
                pesanan = pesanan.filter((el) => el.id_pesanan != item.id_pesanan)
            }

            const tableBody = document.querySelector('#selectedPesanan');
            tableBody.textContent = '';

            if (pesanan.length > 0) {
                pesanan.forEach((elemen, index) => {
                    const row = document.createElement('tr');

                    const no = document.createElement('td');
                    no.textContent = index + 1;
                    row.appendChild(no);

                    const pesananId = document.createElement('td');
                    pesananId.textContent = elemen.id_pesanan;
                    row.appendChild(pesananId);

                    const pelanggan = document.createElement('td');
                    pelanggan.textContent = elemen.pelanggan?.nama;
                    row.appendChild(pelanggan);

                    const date = document.createElement('td');
                    date.textContent = elemen.tanggal_pesan;
                    row.appendChild(date);

                    const dueDate = document.createElement('td');
                    dueDate.textContent = elemen.tanggal_pesan;
                    row.appendChild(dueDate);

                    tableBody.appendChild(row);
                });
            } else {
                const row = document.createElement('tr');
                const col = document.createElement('td');
                const p = document.createElement('p');

                col.classList.add('border-0')
                col.classList.add('p-3')
                col.setAttribute('colspan', 5)
                p.classList.add('text-center')
                p.innerText = 'Pesanan Masih Kosong'

                col.appendChild(p)
                row.appendChild(col)
                tableBody.appendChild(row)
            }
        }
    </script>
@endsection
