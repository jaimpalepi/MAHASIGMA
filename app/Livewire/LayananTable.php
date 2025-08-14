<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Layanan;

class LayananTable extends Component
{
    public function render()
    {
        $layanans = Layanan::all();
        return view('livewire.layanan-table', compact(['layanans']));
    }
}
