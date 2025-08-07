<?php

namespace App\Livewire;

use App\Models\Beasiswa;
use Livewire\Component;
use Livewire\WithPagination;

class BeasiswaTable extends Component
{
    use WithPagination;

    public $title = '';
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

    public function render()
    {
        $titleList = Beasiswa::select('title')->distinct()->pluck('title');

        $beasiswas = Beasiswa::query()
            ->when($this->title, fn($q) => $q->where('title', $this->title))
            ->when($this->search, fn($q) => $q->where('title', 'like', '%' . $this->search . '%'))
            ->latest()
            ->paginate(6);

        return view('livewire.beasiswa-table', compact('beasiswas', 'titleList'));
    }
}
