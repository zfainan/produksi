<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Pengajuan Bahan Baku</title>

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

        <h3>Data Pengajuan Bahan Baku</h3>

        <p>Dengan hormat,</p>
        <p>Berikut ini adalah daftar data pengajuan bahan baku:</p>

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

        <table class="table-border table">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>ID Pesanan</th>
                    <th>Bahan</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $pengajuan)
                    <tr>
                        <td>{{ \Carbon\Carbon::create($pengajuan->created_at)->isoFormat('D MMMM YYYY - HH:mm') }}
                        </td>
                        <td>{{ $pengajuan->id_pesanan }}</td>
                        <td>{{ $pengajuan->bahan->nama_bahan_baku }}</td>
                        <td>{{ $pengajuan->jumlah }}</td>
                        <td>{{ $pengajuan->approved ? 'Disetujui' : 'Belum Disetujui' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br>

        <p>Hormat kami,</p>

        <br>

        <div style="max-width: 300px">
            <br><br><br><br>
            <p style="">{{ auth()->user()->nama }}</p>
        </div>
    </body>

</html>
