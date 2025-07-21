<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>{{ $artikel->judul }} | MAHASIGMA</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.umd.min.js"></script>

</head>

<body class="bg-gray-50 min-h-screen flex flex-col">
  <!-- Navbar -->
  <x-navbar />

  <!-- Konten Utama -->
  <main class="flex-1 max-w-7xl mx-auto p-6 grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <!-- Artikel Utama -->
    <article class="lg:col-span-2 bg-white p-6 rounded-lg shadow">
      <h1 class="text-3xl font-bold mb-4">{{ $artikel->judul }}</h1>
      <p class="text-gray-500 text-sm mb-6">
        Dipublikasikan: {{ $artikel->created_at->format('d M Y') }}
      </p>

      <div class="mb-6">
        <a href="{{ route('artikel.index') }}"
          class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors duration-200 text-sm font-medium">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
          Kembali ke Semua Artikel
        </a>
      </div>

      @if ($artikel->cover)
        <img src="{{ asset('storage/' . $artikel->cover) }}"
             alt="Cover {{ $artikel->judul }}"
             class="w-full h-64 object-cover rounded mb-6">
      @endif

      <div class="prose max-w-none">
    {!! $artikel->isi !!}
</div>

    </article>

    <!-- Sidebar Artikel Lainnya -->
    <aside class="bg-white p-6 rounded-lg shadow">
      <h2 class="text-xl font-semibold border-b pb-2 mb-4">Artikel Lainnya</h2>

      @foreach ($randomArtikel as $rand)
        <a href="{{ route('artikel.show', $rand->id) }}"
           class="flex items-start mb-4 hover:bg-gray-100 p-2 rounded transition">
          @if ($rand->cover)
            <img src="{{ asset('storage/' . $rand->cover) }}"
                 alt="Cover {{ $rand->judul }}"
                 class="w-16 h-16 object-cover rounded-lg mr-4 flex-shrink-0">
          @endif
          <div>
            <h3 class="font-medium text-gray-800">{{ Str::limit($rand->judul, 50) }}</h3>
            <p class="text-xs text-gray-500">{{ $rand->created_at->format('d M Y') }}</p>
          </div>
        </a>
      @endforeach
    </aside>

  </main>

  <x-footer />
</body>

</html>
