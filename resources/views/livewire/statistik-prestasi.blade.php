<div class="space-y-10">
    @forelse ($chartsData as $tahun => $data)
        <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">
                Statistik Prestasi Tahun {{ $tahun }}
            </h3>
            
            {{-- Komponen Alpine.js untuk setiap grafik --}}
            <div
                x-data="{
                init() {
                        let chartData = {{ Illuminate\Support\Js::from($data) }};

                        const totalData = chartData.datasets[0].data.reduce((a, b) => a + b, 0);
                        if (totalData === 0) {
                            this.$refs.canvas.parentElement.innerHTML = '<div class=\'text-center text-gray-500 py-16\'>Tidak ada data prestasi di tahun ini.</div>';
                            return;
                        }

                        const chart = new Chart(this.$refs.canvas, {
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

                        const observer = new IntersectionObserver(
                            ([entry]) => {
                                if (entry.intersectionRatio < 1) {
                                    this.$refs.chartWrapper.style.opacity = 0.4;
                                } else {
                                    this.$refs.chartWrapper.style.opacity = 1;
                                }
                            },
                            {
                                threshold: [0.5, 1.0] // Mulai bereaksi saat sebagian kecil tidak terlihat
                            }
                        );

                            observer.observe(this.$refs.chartWrapper);
                        }
                }"
            >
                <div class="relative w-full h-80 transition-opacity duration-500" x-ref="chartWrapper">
                    <canvas x-ref="canvas"></canvas>
                </div>
            </div>
        </div>
    @empty
        <div class="p-4 border-2 border-dashed rounded-lg dark:border-gray-700">
            <p class="text-center text-gray-500">
                Belum ada data statistik prestasi untuk ditampilkan.
            </p>
        </div>
    @endforelse
</div>