<?php

namespace App\Http\Controllers;

use App\Enums\KemasanEnum;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Produk::latest()->get();

        return view('produk.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|max:100',
            'kemasan' => ['required', new Enum(KemasanEnum::class)],
            'harga' => 'required|integer',
        ]);

        $produk = new Produk();
        $produk->fill($request->all());
        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Produk created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        return view('produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_produk' => 'required|max:100',
            'kemasan' => 'required|max:50',
            'harga' => 'required|integer',
        ]);

        $produk->fill($request->all());
        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Produk updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk deleted successfully.');
    }
}
