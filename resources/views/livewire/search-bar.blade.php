<div class="p-4">
    <input type="text"
           wire:model.debounce.300ms="query"
           placeholder="Search beasiswa..."
           class="border p-2 w-full rounded-md shadow-sm">

    @if(!empty($query))
        <ul class="mt-2 space-y-1">
            @forelse($beasiswas as $b)
                <li class="p-2 bg-white border rounded-md">
                    {{ $b->name }} — {{ $b->email }}
                </li>
            @empty
                <li class="p-2 text-gray-500 italic">No results found.</li>
            @endforelse
        </ul>
    @endif
</div>
