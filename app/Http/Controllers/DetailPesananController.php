<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\SatuanEnum;
use App\Models\DetailJadwalProduksi;
use App\Models\DetailPesanan;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;

class DetailPesananController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (! $request->filled('id_pesanan')) {
            return redirect()->route('pesanan.index');
        }

        $produk = Produk::latest()->get();
        $pesanan = Pesanan::findOrFail($request->input('id_pesanan'));

        return view('detail-pesanan.create', compact('produk', 'pesanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pesanan' => 'required|exists:pesanan,id_pesanan',
            'id_produk' => 'required|exists:produk,id_produk',
            'jumlah_order' => 'required|integer|min:0',
            'processing_time' => 'required|integer|min:0',
            'satuan' => ['required', new Enum(SatuanEnum::class)],
        ]);

        if (DetailJadwalProduksi::where('id_pesanan', $request->id_pesanan)->count()) {
            abort(422, 'Pesanan telah masuk jadwal produksi');
        }

        DB::transaction(function () use ($validated, $request) {
            $detail = DetailPesanan::create($validated);

            $detail->pesanan->update([
                'total_processing_time' => ($detail->pesanan->total_processing_time + $request->integer('processing_time')),
            ]);
        });

        return redirect()
            ->route('pesanan.show', $request->id_pesanan)
            ->with('success', 'Detail pesanan berhasil dibuat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailPesanan $detailPesanan)
    {
        if (count($detailPesanan->pesanan->detailJadwal)) {
            abort(422, 'Pesanan telah masuk jadwal produksi');
        }

        $pesanan = $detailPesanan->pesanan;

        DB::transaction(function () use ($pesanan, $detailPesanan) {
            $pesanan->update([
                'total_processing_time' => ($detailPesanan->pesanan->total_processing_time - $detailPesanan->processing_time),
            ]);

            $detailPesanan->delete();
        });

        return redirect()
            ->route('pesanan.show', $pesanan)
            ->with('success', 'Detail pesanan berhasil dihapus');
    }
}
