<?php

namespace App\Livewire;

use App\Models\artikel;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class SearchArtikel extends Component
{
    use WithPagination;

    public string $search = '';

    /**
     * Mount the component and retrieve the search query from the URL.
     */
    public function mount(Request $request): void
    {
        $this->search = $request->query('query', '');
    }

    /**
     * Render the component.
     */
    public function render()
    {
        $artikels = trim($this->search)
            ? artikel::with('kategori') // TAMBAHKAN .with('kategori') DI SINI
                ->where('judul', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(9)
            : collect(); // Return an empty collection if search is empty

        return view('livewire.search-artikel', [
            'artikels' => $artikels,
        ]);
    }
}