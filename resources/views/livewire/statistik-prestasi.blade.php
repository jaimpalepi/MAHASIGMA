<div class="bg-white p-6 rounded-lg shadow-lg">
    {{-- Bagian Header dengan Judul dan Tombol Navigasi --}}
    <div class="flex justify-between items-center mb-4">
        <button wire:click="previousYear" title="Tahun Sebelumnya" class="p-2 rounded-full hover:bg-gray-200 transition">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </button>
        <h2 class="text-2xl font-bold text-gray-800">Prestasi <span x-text="$wire.tahun">{{ $tahun }}</span></h2>
        <button wire:click="nextYear" title="Tahun Berikutnya" class="p-2 rounded-full hover:bg-gray-200 transition">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </button>
    </div>

    {{-- Tempat untuk Grafik Chart.js --}}
    <div class="w-full h-80">
        <canvas id="prestasiChart"></canvas>
    </div>
</div>

{{-- Script untuk menginisiasi dan mengupdate grafik --}}
@script
<script>
    // Memuat library Chart.js dari CDN (jika belum ada di app.js)
    const script = document.createElement('script');
    script.src = 'https://cdn.jsdelivr.net/npm/chart.js';
    script.onload = () => {
        const ctx = document.getElementById('prestasiChart').getContext('2d');
        
        // Inisiasi grafik pertama kali
        let chart = new Chart(ctx, {
            type: 'bar', // Jenis grafik
            data: @json($chartData),
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false // Menyembunyikan legenda/label dataset
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Mendengarkan event 'chartDataUpdated' dari backend Livewire
        Livewire.on('chartDataUpdated', (data) => {
            chart.data = data; // Ganti data grafik dengan yang baru
            chart.update();   // Perbarui tampilan grafik
        });
    };
    document.head.appendChild(script);
</script>
@endscript