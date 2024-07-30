<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class ReportController extends Controller
{
    public function createPesanan()
    {
        return view('reports.pesanan.create');
    }

    public function createJadwal()
    {
        return view('reports.jadwal.create');
    }

    public function createConsumption()
    {
        return view('reports.consumption.create');
    }

    public function generatePesanan()
    {
        return 'Soon..';
    }

    public function generateJadwal()
    {
        return 'Soon..';
    }

    public function generateConsumption()
    {
        return 'Soon..';
    }
}
