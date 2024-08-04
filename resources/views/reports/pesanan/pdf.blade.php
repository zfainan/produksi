<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Pesanan</title>

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

        <h3>Data Pesanan</h3>

        <p>Dengan hormat,</p>
        <p>Berikut ini adalah daftar data pesanan:</p>

        <table class="table">
            <tr>
                <td>Sejak</td>
                <td>:</td>
                <td>{{ $since->isoFormat('D MMMM YYYY - HH:mm') }}</td>
            </tr>
            <tr>
                <td>Sampai</td>
                <td>:</td>
                <td>{{ $until->isoFormat('D MMMM YYYY - HH:mm') }}</td>
            </tr>
            <tr>
                <td>Tanggal Cetak</td>
                <td>:</td>
                <td>{{ now()->isoFormat('D MMMM YYYY - HH:mm') }}</td>
            </tr>
        </table>

        <br>

        @foreach ($data as $pesanan)
            <p><strong>{{ $loop->iteration }}. {{ $pesanan->tanggal_pesan }}</strong></p>

            <table class="table">
                <tr>
                    <td>Pelanggan</td>
                    <td>:</td>
                    <td>{{ $pesanan->pelanggan?->nama }}</td>
                </tr>
                <tr>
                    <td>Tanggal Pesan</td>
                    <td>:</td>
                    <td>{{ $pesanan->tanggal_pesan }}</td>
                </tr>
                <tr>
                    <td>Tanggal Permintaan</td>
                    <td>:</td>
                    <td>{{ $pesanan->tanggal_permintaan }}</td>
                </tr>
            </table>

            <p>Daftar Produk:</p>
            <table class="table-border table">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Kemasan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan?->detail as $detail)
                        <tr>
                            <td>{{ $detail->produk?->nama_produk }}</td>
                            <td>{{ $detail->jumlah_order }}</td>
                            <td>{{ Str::title($detail->produk->kemasan) }}</td>
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
