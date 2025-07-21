<?php

namespace App\Livewire;

use App\Models\Beasiswa;
use Livewire\Component;
use Livewire\WithPagination;

class BeasiswaList extends Component
{
    use WithPagination;

    public $jenjang = '';
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingJenjang()
    {
        $this->resetPage();
    }

    public function render()
    {
        $jenjangList = Beasiswa::select('jenjang')->distinct()->pluck('jenjang');

        $beasiswas = Beasiswa::query()
            ->when($this->jenjang, fn($q) => $q->where('jenjang', $this->jenjang))
            ->when($this->search, fn($q) => $q->where('title', 'like', '%' . $this->search . '%'))
            ->latest()
            ->paginate(6);

        return view('livewire.beasiswa-list', compact('beasiswas', 'jenjangList'));
    }
}
