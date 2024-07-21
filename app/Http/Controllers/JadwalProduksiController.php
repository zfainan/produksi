<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Jobs\CreateDetailJadwal;
use App\Models\JadwalProduksi;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = JadwalProduksi::latest()->get();

        return view('jadwal.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pesanan = Pesanan::with('pelanggan')->latest()->get();

        return view('jadwal.create', compact('pesanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'date',
            'pesanan' => 'array|required',
            'pesanan.*' => 'exists:pesanan,id_pesanan',
        ]);

        $pesanan = Pesanan::whereIn('id_pesanan', $request->pesanan)
            ->orderBy('tanggal_permintaan')
            ->get();

        DB::transaction(function () use ($request, $pesanan) {
            $jadwal = JadwalProduksi::create([
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $pesanan->last()->tanggal_permintaan,
            ]);

            dispatch_sync(new CreateDetailJadwal($jadwal, $pesanan));
        });

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal produksi berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalProduksi $jadwal)
    {
        $jadwal->load('detail.pesanan');

        return view('jadwal.show', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalProduksi $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalProduksi $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalProduksi $jadwal)
    {
        $jadwal->delete();

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal produksi berhasil dihapus');
    }
}
