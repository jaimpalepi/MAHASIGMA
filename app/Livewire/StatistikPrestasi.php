<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Fakultas;
use App\Models\artikel;
use Illuminate\Support\Facades\DB;

class StatistikPrestasi extends Component
{
    public $chartsData = [];

    public function mount()
    {
        // 1. Ambil semua tahun unik yang memiliki data prestasi
        $daftarTahun = Artikel::query()
            ->whereHas('kategori', function ($query) {
                $query->where('name', 'Prestasi');
            })
            ->whereNotNull('fakultas_id')
            ->selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // 2. Ambil daftar semua fakultas sekali saja
        $semuaFakultas = Fakultas::pluck('nama', 'id');
        $labels = $semuaFakultas->values()->all();

        // 3. Siapkan palet warna
        $backgroundColors = [
            '#ef4444', '#f97316', '#eab308', '#22c55e', '#3b82f6', '#8b5cf6',
            '#ec4899', '#14b8a6', '#64748b', '#f43f5e', '#d946ef', '#0ea5e9'
        ];

        // 4. Loop untuk setiap tahun dan siapkan data grafiknya
        foreach ($daftarTahun as $tahun) {
            $dataPrestasiPerTahun = Artikel::query()
                ->whereHas('kategori', function ($query) {
                    $query->where('name', 'Prestasi');
                })
                ->whereYear('created_at', $tahun)
                ->whereNotNull('fakultas_id')
                ->groupBy('fakultas_id')
                ->select('fakultas_id', DB::raw('count(*) as total'))
                ->pluck('total', 'fakultas_id');

            $data = $semuaFakultas->map(function ($nama, $id) use ($dataPrestasiPerTahun) {
                return $dataPrestasiPerTahun->get($id, 0);
            })->values()->all();
            
            // Simpan data grafik untuk tahun ini ke dalam array
            $this->chartsData[$tahun] = [
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
        }
    }

    public function render()
    {
        return view('livewire.statistik-prestasi');
    }
}