<?php

namespace App\Livewire;

use App\Models\artikel;
use Livewire\Component;
use Livewire\WithPagination; 
use Livewire\Attributes\On;

class ArtikelIndex extends Component
{
    use WithPagination;


    protected $paginationTheme = 'tailwind';

    public function updatedPaginators(): void
    {
        $this->dispatch('scroll-to-top-of-component');
    }

    public function render()
    {
        $artikels = artikel::with('kategori')
                        ->latest()
                        ->skip(4)
                        ->paginate(6);

        return view('livewire.artikel-index', [
            'artikels' => $artikels,
        ]);
    }
}