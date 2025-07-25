<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class StatistikPrestasi extends Component
{
    public $tahun;
    public $chartData;

    // Method ini dijalankan saat komponen pertama kali dimuat
    public function mount()
    {
        $this->tahun = Carbon::now()->year;
        $this->loadChartData();
    }

    // Fungsi untuk pindah ke tahun sebelumnya
    public function previousYear()
    {
        $this->tahun--;
        $this->loadChartData();
    }

    // Fungsi untuk pindah ke tahun berikutnya
    public function nextYear()
    {
        $this->tahun++;
        $this->loadChartData();
    }

    // Fungsi untuk memuat data grafik (saat ini masih contoh/dummy)
    public function loadChartData()
    {
        // --- NANTINYA, LOGIKA PENGAMBILAN DATA ASLI ANDA AKAN DI SINI ---
        // Contoh: $data = artikel::where('kategori_id', id_prestasi)->whereYear('created_at', $this->tahun)->...->get();
        
        // Data dummy untuk contoh agar grafik terlihat dinamis
        $this->chartData = [
            'labels' => ['Akademik', 'Olahraga', 'Seni', 'Riset', 'Pengabdian'],
            'datasets' => [
                [
                    'label' => 'Jumlah Prestasi',
                    // Angka acak agar grafik berubah setiap kali tahun diganti
                    'data' => [rand(10, 50), rand(20, 60), rand(5, 30), rand(15, 45), rand(10, 25)],
                    'backgroundColor' => 'rgba(220, 38, 38, 0.7)', // Warna merah dominan
                    'borderColor' => 'rgba(220, 38, 38, 1)',
                    'borderWidth' => 1,
                ]
            ]
        ];

        // Mengirim event ke browser untuk memberitahu bahwa data chart telah diperbarui
        $this->dispatch('chartDataUpdated', $this->chartData);
    }

    public function render()
    {
        return view('livewire.statistik-prestasi');
    }
}