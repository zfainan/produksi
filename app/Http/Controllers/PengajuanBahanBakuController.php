<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\JabatanEnum;
use App\Models\BahanBaku;
use App\Models\DetailProduk;
use App\Models\PengajuanBahanBaku;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengajuanBahanBakuController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            sprintf('role:%s', JabatanEnum::ProductionManager->value)
        );
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PengajuanBahanBaku::latest()->get();

        return view('pengajuan-bahan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (! $request->filled('id_pesanan')) {
            return redirect()->route('pesanan.index');
        }

        $pesanan = Pesanan::findOrFail($request->input('id_pesanan'));
        $detailProduk = DetailProduk::whereIn(
            'id_produk',
            $pesanan->detail->pluck('id_produk')->toArray()
        )
            ->get();
        $bahan = BahanBaku::whereIn('id_bahan', $detailProduk->pluck('id_bahan')->toArray())
            ->get();

        return view('pengajuan-bahan.create', compact('pesanan', 'bahan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pesanan' => 'required|exists:pesanan,id_pesanan',
            'id_bahan' => 'required|exists:bahan_baku,id_bahan',
            'jumlah' => 'required|integer|min:0',
        ]);

        $pengajuanBahan = new PengajuanBahanBaku();
        $pengajuanBahan->fill($validated);
        $pengajuanBahan->id_user = auth()->user()->id;
        $pengajuanBahan->tanggal_pengajuan = now();
        $pengajuanBahan->save();

        return redirect()
            ->route('pesanan.show', $request->id_pesanan)
            ->with('success', 'Pengajuan bahan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(PengajuanBahanBaku $pengajuanBahan)
    {
        return view('pengajuan-bahan.show', compact('pengajuanBahan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengajuanBahanBaku $pengajuanBahan)
    {
        $pesanan = Pesanan::findOrFail($pengajuanBahan->id_pesanan);
        $detailProduk = DetailProduk::whereIn(
            'id_produk',
            $pesanan->detail->pluck('id_produk')->toArray()
        )
            ->get();
        $bahan = BahanBaku::whereIn('id_bahan', $detailProduk->pluck('id_bahan')->toArray())
            ->get();

        return view('pengajuan-bahan.edit', compact('pengajuanBahan', 'bahan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengajuanBahanBaku $pengajuanBahan)
    {
        $validated = $request->validate([
            'id_bahan' => 'required|exists:bahan_baku,id_bahan',
            'jumlah' => 'required|integer|min:0',
        ]);

        $pengajuanBahan->fill($validated);
        $pengajuanBahan->id_user = auth()->user()->id;
        $pengajuanBahan->save();

        return redirect()
            ->route('pengajuan-bahan.show', $pengajuanBahan)
            ->with('success', 'Pengajuan bahan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengajuanBahanBaku $pengajuanBahan)
    {
        if ($pengajuanBahan->approved) {
            return redirect()
                ->route('pesanan.show', $pengajuanBahan->id_pesanan)
                ->with('error', 'Pengajuan bahan telah disetujui.');
        }

        $pengajuanBahan->delete();

        return redirect()->route('pengajuan-bahan.index')->with('success', 'Pengajuan bahan berhasil dihapus.');
    }

    public function approve(PengajuanBahanBaku $pengajuanBahan)
    {
        if ($pengajuanBahan->approved) {
            return redirect()
                ->route('pesanan.show', $pengajuanBahan->id_pesanan)
                ->with('error', 'Pengajuan bahan telah disetujui.');
        }

        if ($pengajuanBahan->bahan->stok < $pengajuanBahan->jumlah) {
            return redirect()
                ->route('pengajuan-bahan.show', $pengajuanBahan->id_pengajuan)
                ->with('error', sprintf('Stok bahan %s kurang dari %s.', $pengajuanBahan->bahan->nama_bahan_baku, $pengajuanBahan->jumlah));
        }

        $pengajuanBahan->approved = true;

        DB::transaction(function () use ($pengajuanBahan) {
            $pengajuanBahan->save();

            $pengajuanBahan->bahan->update([
                'stok' => $pengajuanBahan->bahan->stok - $pengajuanBahan->jumlah,
            ]);
        });

        return redirect()
            ->route('pengajuan-bahan.show', $pengajuanBahan)
            ->with('success', 'Pengajuan bahan berhasil disetujui');
    }
}
