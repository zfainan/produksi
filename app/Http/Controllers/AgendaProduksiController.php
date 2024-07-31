<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgendaProduksiController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Ambil tanggal dari request
        $since = $request->filled('since') ? Carbon::create($request->input('since')) : now();
        $until = $request->filled('until') ? Carbon::create($request->input('until')) : now()->addDays(7);

        if (($request->filled('since') || $request->filled('until')) && $until->lessThan($since)) {
            return redirect()->back()->with('error', 'Tanggal mulai tidak dapat melebihi tanggal selesai.');
        }

        // Query untuk mendapatkan data produk berdasarkan filter tanggal
        $data = DB::table('detail_jadwal_produksi as djp')
            ->join('pesanan as p', 'djp.id_pesanan', '=', 'p.id_pesanan')
            ->join('detail_pesanan as dp', 'dp.id_pesanan', '=', 'p.id_pesanan')
            ->join('produk as p2', 'p2.id_produk', '=', 'dp.id_produk')
            ->join('detail_jadwal_produksi as djp2', 'p.id_pesanan', '=', 'djp2.id_pesanan')
            ->join('jadwal_produksi as jp', 'djp2.id_jadwal', '=', 'jp.id_jadwal')
            ->select('p2.id_produk', 'p2.nama_produk', 'p2.kemasan', DB::raw('SUM(dp.jumlah_order) as quantity'))
            ->whereDate('jp.tanggal_mulai', '<=', $until->format('Y-m-d'))
            ->whereDate('jp.tanggal_selesai', '>=', $since->format('Y-m-d'))
            ->groupBy('p2.id_produk', 'p2.nama_produk')
            ->get();

        return view('agenda-produksi.index', compact('data', 'since', 'until'));
    }
}
