<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\JabatanEnum;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            sprintf('role:%s', JabatanEnum::Administrator->value)
        );
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pelanggan::latest()->get();

        return view('pelanggan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'alamat' => 'required|max:255',
            'email' => 'required|email|unique:pelanggan',
            'no_hp' => 'required|max:20',
        ]);

        $pelanggan = new Pelanggan();
        $pelanggan->fill($request->all());
        $pelanggan->save();

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        return view('pelanggan.show', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'alamat' => 'required|max:255',
            'email' => 'required|email|unique:pelanggan,email,'.$pelanggan->id_pelanggan.',id_pelanggan',
            'no_hp' => 'required|max:20',
        ]);

        $pelanggan->fill($request->all());
        $pelanggan->save();

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan deleted successfully.');
    }
}
