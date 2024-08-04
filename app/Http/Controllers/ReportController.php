<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\JabatanEnum;
use App\Models\JadwalProduksi;
use App\Models\PengajuanBahanBaku;
use App\Models\Pesanan;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            sprintf('role:%s', JabatanEnum::Administrator->value)
        )->only(['createPesanan', 'generatePesanan']);

        $this->middleware(
            sprintf('role:%s', JabatanEnum::ProductionManager->value)
        )->only(['createJadwal', 'generateJadwal']);

        $this->middleware(
            sprintf('role:%s', JabatanEnum::WarehouseHead->value)
        )->only(['createPengajuanBahan', 'generatePengajuanBahan']);
    }

    public function createPesanan()
    {
        return view('reports.pesanan.create');
    }

    public function createJadwal()
    {
        return view('reports.jadwal.create');
    }

    public function createPengajuanBahan()
    {
        return view('reports.pengajuan-bahan.create');
    }

    public function generatePesanan(Request $request)
    {
        $request->validate([
            'since' => 'required|date',
            'until' => 'required|date',
        ]);

        $since = Carbon::create($request->since);
        $until = Carbon::create($request->until);

        $data = Pesanan::with(['pelanggan', 'detail.produk'])
            ->whereBetween('tanggal_permintaan', [
                $since, $until,
            ])->get();

        $pdf = Pdf::loadView('reports.pesanan.pdf', compact('data', 'since', 'until'));

        return $pdf->download('pesanan.pdf');
    }

    public function generateJadwal(Request $request)
    {
        $request->validate([
            'since' => 'required|date',
            'until' => 'required|date',
        ]);

        $since = Carbon::create($request->since);
        $until = Carbon::create($request->until);

        $data = JadwalProduksi::with(['detail.pesanan.detail.produk'])
            ->whereBetween('tanggal_mulai', [
                $since, $until,
            ])->get();

        $pdf = Pdf::loadView('reports.jadwal.pdf', compact('data', 'since', 'until'));

        return $pdf->download('jadwal.pdf');
    }

    public function generatePengajuanBahan(Request $request)
    {
        $request->validate([
            'since' => 'required|date',
            'until' => 'required|date',
        ]);

        $since = Carbon::create($request->since);
        $until = Carbon::create($request->until);

        $data = PengajuanBahanBaku::with(['bahan'])
            ->whereBetween('created_at', [
                $since, $until,
            ])->get();

        $pdf = Pdf::loadView('reports.pengajuan-bahan.pdf', compact('data', 'since', 'until'));

        return $pdf->download('pengajuan-bahan.pdf');
    }
}
