<?php

namespace App\Livewire;

use App\Models\artikel;
use Livewire\Component;
use Livewire\WithPagination; // 1. Import trait paginasi

class ArtikelIndex extends Component
{
    use WithPagination; // 2. Gunakan trait ini di dalam kelas

    // Mengatur tema tampilan paginasi agar terlihat bagus tanpa CSS tambahan
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        // 3. Pindahkan logika query dari controller ke sini
        // Kita ambil semua artikel selain 4 teratas, dan paginasi 6 per halaman
        $artikels = artikel::latest()->skip(4)->paginate(6);

        return view('livewire.artikel-index', [
            'artikels' => $artikels,
        ]);
    }
}