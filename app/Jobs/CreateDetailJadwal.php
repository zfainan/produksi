<?php

declare(strict_types=1);

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
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $startDate = Carbon::create($this->jadwal->tanggal_mulai);
        $processingTimes = collect();

        $this->pesanan->each(function (Pesanan $item) use ($startDate, $processingTimes) {
            $itemDueDate = Carbon::create($item->tanggal_permintaan);

            $processingTime = $item->total_processing_time ?? 0;
            $flowtime = $processingTimes->sum() + $processingTime;
            $dueDate = $startDate->diffInDays($itemDueDate);
            $lateness = $flowtime - $dueDate;

            DetailJadwalProduksi::create([
                'id_pesanan' => $item->id_pesanan,
                'id_jadwal' => $this->jadwal->id_jadwal,
                'flow_time' => $flowtime,
                'lateness' => $lateness < 0 ? 0 : $lateness,
                'processing_time' => $processingTime,
                'due_date' => $dueDate,
            ]);

            $processingTimes->push($item->total_processing_time ?? 0);
        });
    }
}
