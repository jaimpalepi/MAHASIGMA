<div class="p-4 border-2 border-dashed rounded-lg dark:border-gray-700">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4 text-center">Statistik Prestasi Fakultas</h3>

    {{-- Kontrol Navigasi Tahun --}}
    <div class="flex items-center justify-between mb-4">
        <button wire:click="previousYear" class="p-2 bg-gray-200 dark:bg-gray-600 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </button>
        <span class="text-lg font-bold text-gray-700 dark:text-gray-300">{{ $tahun }}</span>
        <button wire:click="nextYear" @if($tahun >= now()->year) disabled @endif class="p-2 bg-gray-200 dark:bg-gray-600 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500 transition disabled:opacity-50 disabled:cursor-not-allowed">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </button>
    </div>

    {{-- Elemen Canvas untuk Grafik --}}
    <div
        wire:ignore
        x-data="{
            chart: null,
            init() {
                let initialData = {{ Illuminate\Support\Js::from($chartData) }};
                let ctx = this.$refs.canvas.getContext('2d');

                this.chart = new Chart(ctx, {
                    // 1. Ubah tipe grafik menjadi 'pie'
                    type: 'pie',
                    data: initialData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: false,  // Sembunyikan legenda default
                        }
                    }
                    
                });
            },
            updateChart(newChartData) {
                this.chart.data = newChartData;
                this.chart.update();
            }
        }"
        @chart-data-updated.window="updateChart($event.detail[0])"
    >
        <div class="w-full h-96">  {{-- Sedikit lebih tinggi untuk memberi ruang legenda --}}
            <canvas x-ref="canvas"></canvas>
        </div>
</div>