<?php

namespace App\Jobs;

use App\Models\DetailJadwalProduksi;
use App\Models\JadwalProduksi;
use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateDetailJadwal
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public JadwalProduksi $jadwal,
        public Collection $pesanan,
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $startDate = Carbon::create($this->jadwal->tanggal_mulai);
        /** @var Carbon $lastItemDueDate */
        $lastItemDueDate = Carbon::create($this->jadwal->tanggal_mulai);

        $this->pesanan->each(function (Pesanan $item) use ($startDate, $lastItemDueDate) {
            // $itemDueDate = Carbon::create($item->tanggal_permintaan);

            // $processingTime = Carbon::create($item->total_processing_time);
            // $flowtime = $startDate->diffInDays($itemDueDate);
            // $lateness = 1;

            // DetailJadwalProduksi::create([
            //     'id_pesanan' => $item->id_pesanan,
            //     'id_jadwal' => $this->jadwal->id_jadwal,
            //     'flowtime' => $flowtime,
            //     'lateness' => $lateness,
            //     'processing_time' => $processingTime,
            // ]);
        });
    }
}
