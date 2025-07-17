<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Beasiswa;
class SearchBar extends Component
{
    public $query = '';

    public function render()
    {
        $beasiswas = [];

        if (strlen($this->query) >= 2) {
            $beasiswas = Beasiswa::where('title', 'like', '%' . $this->query . '%')
                         ->orWhere('provider', 'like', '%' . $this->query . '%')
                         ->get();
        }

        return view('livewire.search-bar', [
            'beasiswas' => $beasiswas,
        ]);
    }
}