<div>
    {{-- Bagian ini dipindahkan dari resources/views/artikel/index.blade.php --}}
    @if($artikels->isEmpty())
        <div class="bg-yellow-100 text-yellow-700 p-4 rounded text-center">
            Tidak ada artikel lain untuk ditampilkan.
        </div>
    @else
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($artikels as $artikel)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transition-transform duration-300 hover:-translate-y-2">
                @if ($artikel->cover)
                    <a href="{{ route('artikel.show', $artikel->id) }}">
                        <img src="{{ asset('storage/' . $artikel->cover) }}" alt="Cover" class="w-full h-48 object-cover">
                    </a>
                @endif
                <div class="p-6 flex flex-col flex-grow">
                    @if ($artikel->kategori)
                        <span class="inline-block bg-red-100 text-red-700 text-xs font-semibold mb-2 px-2.5 py-0.5 rounded-full self-start">
                            {{ $artikel->kategori->name }}
                        </span>
                    @endif
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">
                        <a href="{{ route('artikel.show', $artikel->id) }}" class="hover:text-red-700 transition-colors duration-300">
                            {{ Str::limit($artikel->judul, 60) }}
                        </a>
                    </h3>
                    <p class="text-sm text-gray-500 mb-4">{{ $artikel->created_at->format('d M Y') }}</p>
                    <div class="text-gray-600 text-sm line-clamp-3 flex-grow">{!! Str::limit(strip_tags($artikel->isi), 100) !!}</div>
                    <div class="mt-4 pt-4 border-t flex items-center justify-between">
                        <a href="{{ route('artikel.show', $artikel->id) }}" class="text-blue-600 hover:underline text-sm font-medium">
                            Baca Selengkapnya →
                        </a>
                        @auth
                            <a href="{{ route('artikel.edit', $artikel->id) }}" class="text-gray-500 hover:text-yellow-600 text-sm font-medium transition-colors duration-300">
                                ✎ Edit
                            </a>
                        @endauth

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif

    {{-- Link paginasi akan bekerja secara otomatis tanpa reload --}}
    <div class="mt-12">
        {{ $artikels->links() }}
    </div>
</div>