<div class="p-4 border-2 border-dashed rounded-lg dark:border-gray-700">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4 text-center">Statistik Prestasi Fakultas</h3>
    <div class="mb-4">
        <label for="tahun-statistik" class="sr-only">Pilih Tahun</label>
        <select id="tahun-statistik" wire:model.live="tahun" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500">
            @forelse ($daftarTahun as $year)
                <option value="{{ $year }}">{{ $year }}</option>
            @empty
                <option value="{{ now()->year }}">{{ now()->year }}</option>
            @endforelse
        </select>
    </div>

    <div
        wire:ignore
        x-data="{
            chart: null,
            createChart(chartData) {
                let ctx = this.$refs.canvas.getContext('2d');
                this.chart = new Chart(ctx, {
                    type: 'pie',
                    data: chartData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });
            },
            init() {
                this.createChart({{ Illuminate\Support\Js::from($chartData) }});
            },
            updateChart(newChartData) {
                if (this.chart) {
                    this.chart.destroy();
                }
                this.createChart(newChartData);
            }
        }"
        @chart-data-updated.window="updateChart($event.detail[0])"
    >
        <div class="w-full h-96">
            <canvas x-ref="canvas"></canvas>
        </div>
    </div>
</div>