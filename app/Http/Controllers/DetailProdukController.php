<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\JabatanEnum;
use App\Models\BahanBaku;
use App\Models\DetailProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class DetailProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            sprintf('role:%s', JabatanEnum::Administrator->value)
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (! $request->filled('id_produk')) {
            return redirect()->route('pesanan.index');
        }

        $bahan = BahanBaku::latest()->get();
        $produk = Produk::findOrFail($request->input('id_produk'));

        return view('detail-produk.create', compact('produk', 'bahan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_produk' => 'required|exists:produk,id_produk',
            'id_bahan' => 'required|exists:bahan_baku,id_bahan',
            'jumlah' => 'required|integer|min:0',
        ]);

        DetailProduk::create($validated);

        return redirect()
            ->route('produk.show', $request->id_produk)
            ->with('success', 'Detail produk berhasil dibuat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailProduk $detailProduk)
    {
        $produk = $detailProduk->produk;

        $detailProduk->delete();

        return redirect()
            ->route('produk.show', $produk)
            ->with('success', 'Detail produk berhasil dihapus');
    }
}
