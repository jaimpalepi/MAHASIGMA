<?php

namespace App\Livewire;

use App\Models\Beasiswa;
use Livewire\Component;
use Livewire\WithPagination;

class BeasiswaTable extends Component
{
    use WithPagination;

    public $jenjang = '';
    public $status = '';
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function testPing()
    {
        dd('Livewire works!');
    }

    public function updatingTitle()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function render()
    {
        $jenjangList = Beasiswa::select('jenjang')->distinct()->pluck('jenjang');
        $statusList = Beasiswa::select('status')->distinct()->pluck('status');

        $beasiswas = Beasiswa::query()
            ->when($this->jenjang, fn($q) => $q->where('jenjang', $this->jenjang))
            ->when($this->status, fn($q) => $q->where('status', $this->status))
            ->when($this->search, fn($q) => $q->where('title', 'like', '%' . $this->search . '%'))
            ->latest()
            ->paginate(6);

        return view('livewire.beasiswa-table', compact('beasiswas', 'jenjangList', 'statusList'));
    }
}
