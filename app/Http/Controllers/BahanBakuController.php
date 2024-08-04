<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\JabatanEnum;
use App\Enums\SatuanEnum;
use App\Models\BahanBaku;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class BahanBakuController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            sprintf('role:%s', JabatanEnum::Administrator->value)
        )->only(['create', 'store', 'edit', 'update', 'destroy']);

        $this->middleware(
            sprintf('role:%s|%s', JabatanEnum::Administrator->value, JabatanEnum::WarehouseHead->value)
        )->only(['index', 'show']);

        $this->middleware(
            sprintf('role:%s', JabatanEnum::WarehouseHead->value)
        )->only('updateStok');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BahanBaku::latest()->get();

        return view('bahan_baku.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bahan_baku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_bahan_baku' => 'required|max:100',
            'stok' => 'required|integer|min:0',
            'satuan' => ['required', new Enum(SatuanEnum::class)],
        ]);

        $bahanBaku = new BahanBaku();
        $bahanBaku->fill($request->all());
        $bahanBaku->save();

        return redirect()->route('bahan-baku.index')->with('success', 'Bahan Baku created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BahanBaku $bahanBaku)
    {
        return view('bahan_baku.show', compact('bahanBaku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BahanBaku $bahanBaku)
    {
        return view('bahan_baku.edit', compact('bahanBaku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BahanBaku $bahanBaku)
    {
        $request->validate([
            'nama_bahan_baku' => 'required|max:100',
            'stok' => 'required|integer',
            'satuan' => 'required|max:50',
        ]);

        $bahanBaku->fill($request->all());
        $bahanBaku->save();

        return redirect()->route('bahan-baku.index')->with('success', 'Bahan Baku updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BahanBaku $bahanBaku)
    {
        $bahanBaku->delete();

        return redirect()->route('bahan-baku.index')->with('success', 'Bahan Baku deleted successfully.');
    }

    public function updateStok(Request $request, BahanBaku $bahanBaku)
    {
        $request->validate([
            'stok' => 'required|integer',
        ]);

        $bahanBaku->stok = $request->stok;
        $bahanBaku->save();

        return redirect()->route('bahan-baku.show', $bahanBaku)->with('success', 'Bahan Baku updated successfully.');
    }
}
