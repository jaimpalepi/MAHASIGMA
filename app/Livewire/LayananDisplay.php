<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Layanan;

class LayananDisplay extends Component
{
    public $serv;
    public $search = '';

    public function mount()
    {
        $this->layananList = Layanan::select('layanan')->distinct()->pluck('layanan');
        $firstLayanan = Layanan::first();
        $this->serv = $firstLayanan ? $firstLayanan->layanan : null;
    }

    public function render()
    {
        $layananList = Layanan::select('layanan')->distinct()->pluck('layanan');
        $layananDetail = Layanan::query()
            ->when($this->serv, fn($q) => $q->where('layanan', $this->serv))
            ->when($this->search, fn($q) => $q->where('layanan', 'like', '%' . $this->search . '%'))
            ->latest()
            ->first();
        return view('livewire.layanan-display', compact(['layananList', 'layananDetail']));
    }
}
