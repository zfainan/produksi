<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\JabatanEnum;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            sprintf('role:%s|%s', JabatanEnum::Administrator->value, JabatanEnum::ProductionManager->value)
        )->only(['index', 'show']);

        $this->middleware(
            sprintf('role:%s', JabatanEnum::Administrator->value)
        )->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pesanan::with('pelanggan')->latest()->get();

        return view('pesanan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();

        return view('pesanan.create', compact('pelanggan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'tanggal_pesan' => 'required|date',
            'tanggal_permintaan' => 'required|date',
            'tipe_pesanan' => 'required|max:50',
        ]);

        $pesanan = new Pesanan();
        $pesanan->fill($request->all());
        $pesanan->save();

        return redirect()->route('pesanan.show', $pesanan)->with('success', 'Pesanan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        $pesanan->load(['detail', 'pengajuanBahan.bahan']);

        return view('pesanan.show', compact('pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        $pelanggan = Pelanggan::all();

        return view('pesanan.edit', compact('pesanan', 'pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'tanggal_pesan' => 'required|date',
            'tanggal_permintaan' => 'required|date',
            'tipe_pesanan' => 'required|max:50',
        ]);

        $pesanan->fill($request->all());
        $pesanan->save();

        return redirect()->route('pesanan.index')->with('success', 'Pesanan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();

        return redirect()->route('pesanan.index')->with('success', 'Pesanan deleted successfully.');
    }
}
