<?php

namespace App\Livewire;

use App\Models\artikel;
use Livewire\Component;
use Livewire\WithPagination; 

class ArtikelIndex extends Component
{
    use WithPagination;


    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $artikels = artikel::latest()->skip(4)->paginate(6);

        return view('livewire.artikel-index', [
            'artikels' => $artikels,
        ]);
    }
}