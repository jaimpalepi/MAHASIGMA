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
    public $daftarTahun; // Properti baru untuk menampung daftar tahun

    public function mount()
    {
        // Mengambil semua tahun unik dari artikel prestasi yang ada
        $this->daftarTahun = Artikel::query()
            ->whereHas('kategori', function ($query) {
                $query->where('name', 'Prestasi');
            })
            ->whereNotNull('fakultas_id')
            ->selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // Set tahun aktif ke tahun terbaru, atau tahun ini jika tidak ada data
        $this->tahun = $this->daftarTahun->first() ?? now()->year;

        $this->loadChartData();
    }

    // Fungsi ini adalah 'hook' dari Livewire.
    // Akan otomatis berjalan setiap kali properti publik $tahun diperbarui dari frontend.
    public function updatedTahun()
    {
        $this->loadChartData();
    }

    public function loadChartData()
    {
        $prestasiId = kategori::where('name', 'Prestasi')->value('id');
        $fakultas = Fakultas::pluck('nama', 'id');

        $dataPrestasi = Artikel::query()
            ->select('fakultas_id', DB::raw('count(*) as total'))
            ->where('kategori_id', $prestasiId)
            ->whereYear('created_at', $this->tahun)
            ->whereNotNull('fakultas_id')
            ->groupBy('fakultas_id')
            ->pluck('total', 'fakultas_id');

        $labels = $fakultas->values()->all();
        $data = $fakultas->map(function ($nama, $id) use ($dataPrestasi) {
            return $dataPrestasi->get($id, 0);
        })->values()->all();

        $backgroundColors = [
            '#ef4444', '#f97316', '#eab308', '#22c55e', '#3b82f6', '#8b5cf6',
            '#ec4899', '#14b8a6', '#64748b', '#f43f5e', '#d946ef', '#0ea5e9'
        ];

        $this->chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Jumlah Prestasi',
                    'data' => $data,
                    'backgroundColor' => array_slice($backgroundColors, 0, count($labels)),
                    'hoverOffset' => 4
                ]
            ]
        ];

        $this->dispatch('chartDataUpdated', $this->chartData);
    }

    public function render()
    {
        return view('livewire.statistik-prestasi');
    }
}