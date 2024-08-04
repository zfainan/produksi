<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Jadwal Produksi</title>

        <style>
            .table {
                width: 100%;
            }

            .table-border {
                border: 1px solid black;
                border-collapse: collapse;
                border-spacing: 0;
            }

            .table-border td,
            .table-border th {
                border: 1px solid black;
                margin: 0;
                padding: 8px 10px;
            }

            .company-details {
                margin: auto;
            }

            .company-details h1 {
                margin: 0;
                font-size: 24px;
                text-align: center;
            }

            .company-details p {
                margin: 5px 0;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <table style="width: 100%">
            <tr>
                <td class="company-details">
                    <h1>CV. Dwi Manunggal</h1>
                    <p>Jl. Petung no. 21 A, Depok, Sleman, Yogyakarta, 55281.</p>
                </td>
            </tr>
        </table>

        <hr>

        <h3>Data Jadwal Produksi</h3>

        <p>Dengan hormat,</p>
        <p>Berikut ini adalah daftar data jadwal produksi:</p>

        <table class="table">
            <tr>
                <td>Sejak</td>
                <td>:</td>
                <td>{{ $since->isoFormat('D MMMM YYYY') }}</td>
            </tr>
            <tr>
                <td>Sampai</td>
                <td>:</td>
                <td>{{ $until->isoFormat('D MMMM YYYY') }}</td>
            </tr>
            <tr>
                <td>Tanggal Cetak</td>
                <td>:</td>
                <td>{{ now()->isoFormat('D MMMM YYYY - HH:mm') }}</td>
            </tr>
        </table>

        <br>

        @foreach ($data as $jadwal)
            <p>{{ $loop->iteration }}. Jadwal <strong>#{{ $jadwal->id_jadwal }}</strong> -
                {{ $jadwal->start->isoFormat('D MMMM YYYY') }}
            </p>
            <table class="table-border table">
                <thead>
                    <tr>
                        <th>Start</th>
                        <th>End</th>
                        <th>Produk</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal?->detail as $detail)
                        <tr>
                            <td>{{ \Carbon\Carbon::create($jadwal->tanggal_mulai)->addDays($detail->flow_time - $detail->processing_time)->isoFormat('D MMMM YYYY') }}
                            </td>
                            <td>{{ \Carbon\Carbon::create($jadwal->tanggal_mulai)->addDays($detail->flow_time)->isoFormat('D MMMM YYYY') }}
                            </td>
                            <td>
                                <ul>
                                    @foreach ($detail->pesanan?->detail as $detailPesanan)
                                        <li>{{ $detailPesanan->produk?->nama_produk }}
                                            - {{ $detailPesanan->jumlah_order }} {{ $detailPesanan->satuan }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <br>
        @endforeach

        <p>Hormat kami,</p>

        <br>

        <div style="max-width: 300px">
            <br><br><br><br>
            <p style="">{{ auth()->user()->nama }}</p>
        </div>
    </body>

</html>
