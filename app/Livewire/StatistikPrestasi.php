<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Fakultas;
use App\Models\artikel;
use App\Models\kategori;
use Illuminate\Support\Facades\DB;

class StatistikPrestasi extends Component
{
    public $tahun;
    public $chartData;

    public function mount()
    {
        $this->tahun = Carbon::now()->year;
        $this->loadChartData();
    }

    public function previousYear()
    {
        $this->tahun--;
        $this->loadChartData();
    }

    public function nextYear()
    {
        // Batasi agar tidak bisa ke tahun depan jika belum ada datanya
        if ($this->tahun < Carbon::now()->year) {
            $this->tahun++;
            $this->loadChartData();
        }
    }

    public function loadChartData()
    {
        // 1. Ambil ID kategori 'Prestasi'
        $prestasiId = kategori::where('name', 'Prestasi')->value('id');

        // 2. Ambil semua fakultas untuk dijadikan label grafik
        $fakultas = Fakultas::pluck('nama', 'id');

        // 3. Query untuk menghitung prestasi per fakultas pada tahun yang dipilih
        $dataPrestasi = Artikel::query()
            ->select('fakultas_id', DB::raw('count(*) as total'))
            ->where('kategori_id', $prestasiId)
            ->whereYear('created_at', $this->tahun)
            ->whereNotNull('fakultas_id')
            ->groupBy('fakultas_id')
            ->pluck('total', 'fakultas_id');

        // 4. Siapkan data agar sesuai format Chart.js
        $labels = $fakultas->values()->all(); // ['Fakultas Pertanian', 'Fakultas Biologi', ...]
        $data = $fakultas->map(function ($nama, $id) use ($dataPrestasi) {
            return $dataPrestasi->get($id, 0); // Ambil total prestasi, jika tidak ada maka 0
        })->values()->all();

        // 5. Susun data final untuk chart
        $this->chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Jumlah Prestasi',
                    'data' => $data,
                    'backgroundColor' => [
                        'rgba(220, 38, 38, 0.6)',
                        'rgba(251, 146, 60, 0.6)',
                        'rgba(250, 204, 21, 0.6)',
                        'rgba(74, 222, 128, 0.6)',
                        'rgba(96, 165, 250, 0.6)',
                        'rgba(167, 139, 250, 0.6)',
                    ],
                    'borderColor' => [
                        'rgba(220, 38, 38, 1)',
                        'rgba(251, 146, 60, 1)',
                        'rgba(250, 204, 21, 1)',
                        'rgba(74, 222, 128, 1)',
                        'rgba(96, 165, 250, 1)',
                        'rgba(167, 139, 250, 1)',
                    ],
                    'borderWidth' => 1,
                ]
            ]
        ];

        // Kirim event ke frontend untuk update grafik
        $this->dispatch('chartDataUpdated', $this->chartData);
    }

    public function render()
    {
        return view('livewire.statistik-prestasi');
    }
}