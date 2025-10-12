@extends('layouts.app')

@section('title', 'Statistik - SIPEPO')

@section('content')
<header class="bg-green-500 text-white py-6 shadow-md">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="flex items-center back-button">
                <i data-feather="arrow-left" class="mr-2"></i>
                <span class="font-semibold back-text">Kembali</span>
            </a>
            <h1 class="text-2xl font-bold">Statistik <span class="sipepo-title" style="color: #f784c5;">SIPEPO</span></h1>
            <div class="w-8"></div> <!-- Spacer for balance -->
        </div>
    </div>
</header>

<main class="flex-grow container mx-auto px-4 py-8">
    <div class="bg-white rounded-xl shadow-md p-6 max-w-5xl mx-auto" data-aos="fade-up">
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Visualisasi Data Posyandu</h2>
            
            <div class="mb-6">
                <div class="flex flex-wrap mb-4">
                    <button onclick="showStatistikTab('balita', event)" class="tab-btn bg-emerald-100 text-emerald-700 px-4 py-2 rounded-lg mr-2 mb-2 hover:bg-emerald-200 active-tab">
                        Statistik Balita
                    </button>
                    <button onclick="showStatistikTab('ibu-hamil', event)" class="tab-btn bg-pink-100 text-pink-700 px-4 py-2 rounded-lg mr-2 mb-2 hover:bg-pink-200">
                        Statistik Ibu Hamil
                    </button>
                    <button onclick="showStatistikTab('lansia', event)" class="tab-btn bg-green-100 text-green-700 px-4 py-2 rounded-lg mr-2 mb-2 hover:bg-green-200">
                        Statistik Lansia
                    </button>
                </div>
            </div>
            
            <!-- Balita Statistik Tab -->
            <div id="balita-statistik" class="statistik-tab">
                <h3 class="text-lg font-medium text-gray-800 mb-3">Statistik Data Balita</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <h4 class="font-medium text-gray-700 mb-3">Jumlah Balita per Bulan</h4>
                        <div class="aspect-w-16 aspect-h-9 bg-white p-4">
                            <canvas id="balitaChart" width="400" height="300"></canvas>
                        </div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <h4 class="font-medium text-gray-700 mb-3">Status Imunisasi</h4>
                        <div class="aspect-w-16 aspect-h-9 bg-white p-4">
                            <canvas id="imunisasiChart" width="400" height="300"></canvas>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-4">
                    <h4 class="font-medium text-gray-700 mb-3">Statistik Data Balita</h4>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Lahir</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lingkar Kepala (cm)</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Badan (kg)</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tinggi Badan (cm)</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imunisasi</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Orang Tua</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kontak Orang Tua</th>
                                </tr>
                            </thead>
                            <tbody id="balitaStatsTable">
                                @forelse($balitas as $balita)
                                <tr>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $balita->nama_lengkap }}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $balita->tanggal_lahir->format('d/m/Y') }}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $balita->lingkar_kepala ?? '-' }}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $balita->berat_badan ?? '-' }}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $balita->tinggi_badan ?? '-' }}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">
                                        @if($balita->imunisasi && count($balita->imunisasi) > 0)
                                            {{ implode(', ', $balita->imunisasi) }}
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $balita->nama_orang_tua ?? '-' }}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $balita->kontak_orang_tua ?? '-' }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="py-4 px-6 text-center text-gray-500">Belum ada data balita</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-sm text-gray-500 mt-2">
                    <p>* Data statistik diperbarui secara otomatis saat ada pendataan baru</p>
                </div>
            </div>
            
            <!-- Ibu Hamil Statistik Tab -->
            <div id="ibu-hamil-statistik" class="statistik-tab" style="display:none">
                <h3 class="text-lg font-medium text-gray-800 mb-3">Statistik Data Ibu Hamil</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <h4 class="font-medium text-gray-700 mb-3">Jumlah Ibu Hamil per Bulan</h4>
                        <div class="aspect-w-16 aspect-h-9 bg-white p-4">
                            <canvas id="ibuHamilChart" width="400" height="300"></canvas>
                        </div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <h4 class="font-medium text-gray-700 mb-3">Distribusi Usia Kehamilan</h4>
                        <div class="aspect-w-16 aspect-h-9 bg-white p-4">
                            <canvas id="usiaKehamilanChart" width="400" height="300"></canvas>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-4">
                    <h4 class="font-medium text-gray-700 mb-3">Statistik Ibu Hamil</h4>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usia Kehamilan (minggu)</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Badan (kg)</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tinggi Badan (cm)</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lingkar Perut (cm)</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lingkar Lengan (cm)</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tekanan Darah</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor WA</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                                </tr>
                            </thead>
                            <tbody id="ibuHamilStatsTable">
                                @forelse($ibuHamils as $ibuHamil)
                                <tr>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $ibuHamil->nama_lengkap }}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $ibuHamil->usia_kehamilan }}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $ibuHamil->berat_badan ?? '-' }}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $ibuHamil->tinggi_badan ?? '-' }}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $ibuHamil->lingkar_perut ?? '-' }}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $ibuHamil->lingkar_lengan ?? '-' }}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $ibuHamil->tekanan_darah ?? '-' }}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $ibuHamil->nomor_wa ?? '-' }}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $ibuHamil->alamat ?? '-' }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="py-4 px-6 text-center text-gray-500">Belum ada data ibu hamil</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-sm text-gray-500 mt-2">
                    <p>* Data statistik diperbarui secara otomatis saat ada pendataan baru</p>
                </div>
            </div>
            
            <!-- Lansia Statistik Tab -->
            <div id="lansia-statistik" class="statistik-tab" style="display:none">
                <h3 class="text-lg font-medium text-gray-800 mb-3">Statistik Data Lansia</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <h4 class="font-medium text-gray-700 mb-3">Jumlah Lansia per Bulan</h4>
                        <div class="aspect-w-16 aspect-h-9 bg-white p-4">
                            <canvas id="lansiaChart" width="400" height="300"></canvas>
                        </div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <h4 class="font-medium text-gray-700 mb-3">Distribusi Tekanan Darah</h4>
                        <div class="aspect-w-16 aspect-h-9 bg-white p-4">
                            <canvas id="tekananDarahChart" width="400" height="300"></canvas>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-4">
                    <h4 class="font-medium text-gray-700 mb-3">Statistik Lansia</h4>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tekanan Darah</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tinggi Badan (cm)</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Badan (kg)</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor WA</th>
                                </tr>
                            </thead>
                            <tbody id="lansiaStatsTable">
                                @forelse($lansias as $lansia)
                                <tr>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $lansia->nama_lengkap }}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $lansia->tekanan_darah ?? '-' }}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $lansia->tinggi_badan ?? '-' }}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $lansia->berat_badan ?? '-' }}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $lansia->alamat ?? '-' }}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $lansia->nomor_wa ?? '-' }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="py-4 px-6 text-center text-gray-500">Belum ada data lansia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-sm text-gray-500 mt-2">
                    <p>* Data statistik diperbarui secara otomatis saat ada pendataan baru</p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
    // Statistik page tab functionality
    function showStatistikTab(tabName, e) {
        // Hide all tabs
        document.querySelectorAll('.statistik-tab').forEach(tab => {
            tab.style.display = 'none';
        });
        
        // Show the selected tab
        document.getElementById(tabName + '-statistik').style.display = 'block';
        
        // Update tab buttons
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('active-tab', 'bg-emerald-200', 'bg-pink-200', 'bg-green-200');
        });
        
        // Set active tab style based on tab name
        if (e && e.target) {
            if (tabName === 'balita') {
                e.target.classList.add('bg-emerald-200', 'text-emerald-800', 'active-tab');
            } else if (tabName === 'ibu-hamil') {
                e.target.classList.add('bg-pink-200', 'text-pink-800', 'active-tab');
            } else if (tabName === 'lansia') {
                e.target.classList.add('bg-green-200', 'text-green-800', 'active-tab');
            }
        }
        
        // Load charts when tab is shown
        loadAllCharts();
    }

    // Load all charts
    function loadAllCharts() {
        // Check if Chart.js is loaded
        if (typeof Chart === 'undefined') {
            console.error('Chart.js is not loaded!');
            return;
        }
        
        // Get data from PHP
        const balitaData = @json($balitas);
        const ibuHamilData = @json($ibuHamils);
        const lansiaData = @json($lansias);
        
        // Debug: Log data to console
        console.log('Balita Data:', balitaData);
        console.log('Ibu Hamil Data:', ibuHamilData);
        console.log('Lansia Data:', lansiaData);
        
        // Load Balita Charts
        loadBalitaCharts(balitaData);
        
        // Load Ibu Hamil Charts
        loadIbuHamilCharts(ibuHamilData);
        
        // Load Lansia Charts
        loadLansiaCharts(lansiaData);
    }
    
    function loadBalitaCharts(data) {
        console.log('Loading Balita Charts with data:', data);
        
        // Check if canvas elements exist
        const balitaChartEl = document.getElementById('balitaChart');
        if (!balitaChartEl) {
            console.error('balitaChart canvas not found!');
            return;
        }
        
        // Monthly count chart
        const balitaMonthlyCtx = balitaChartEl.getContext('2d');
        const monthlyData = getMonthlyCount(data);
        
        try {
            new Chart(balitaMonthlyCtx, {
                type: 'bar',
                data: {
                    labels: monthlyData.labels,
                    datasets: [{
                        label: 'Jumlah Balita',
                        data: monthlyData.data,
                        backgroundColor: 'rgba(16, 185, 129, 0.6)',
                        borderColor: 'rgba(16, 185, 129, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    }
                }
            });
        } catch (error) {
            console.error('Error creating balita monthly chart:', error);
        }
        
        // Imunisasi chart
        const imunisasiChartEl = document.getElementById('imunisasiChart');
        if (!imunisasiChartEl) {
            console.error('imunisasiChart canvas not found!');
            return;
        }
        const imunisasiCtx = imunisasiChartEl.getContext('2d');
        const imunisasiData = getImunisasiStats(data);
        
        try {
            new Chart(imunisasiCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Sudah Imunisasi', 'Belum Imunisasi'],
                    datasets: [{
                        data: [imunisasiData.completed, imunisasiData.incomplete],
                        backgroundColor: [
                            'rgba(16, 185, 129, 0.6)',
                            'rgba(239, 68, 68, 0.6)'
                        ],
                        borderColor: [
                            'rgba(16, 185, 129, 1)',
                            'rgba(239, 68, 68, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });
        } catch (error) {
            console.error('Error creating imunisasi chart:', error);
        }
        
        // Chart pertumbuhan balita sudah diganti dengan tabel statistik
    }
    
    function loadIbuHamilCharts(data) {
        console.log('Loading Ibu Hamil Charts with data:', data);
        
        // Check if canvas elements exist
        const ibuHamilChartEl = document.getElementById('ibuHamilChart');
        if (!ibuHamilChartEl) {
            console.error('ibuHamilChart canvas not found!');
            return;
        }
        
        // Monthly count chart
        const ibuHamilMonthlyCtx = ibuHamilChartEl.getContext('2d');
        const monthlyData = getMonthlyCount(data);
        
        try {
            new Chart(ibuHamilMonthlyCtx, {
                type: 'bar',
                data: {
                    labels: monthlyData.labels,
                    datasets: [{
                        label: 'Jumlah Ibu Hamil',
                        data: monthlyData.data,
                        backgroundColor: 'rgba(236, 72, 153, 0.6)',
                        borderColor: 'rgba(236, 72, 153, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    }
                }
            });
        } catch (error) {
            console.error('Error creating ibu hamil monthly chart:', error);
        }
        
        // Usia kehamilan distribution
        const usiaKehamilanChartEl = document.getElementById('usiaKehamilanChart');
        if (!usiaKehamilanChartEl) {
            console.error('usiaKehamilanChart canvas not found!');
            return;
        }
        const usiaKehamilanCtx = usiaKehamilanChartEl.getContext('2d');
        const usiaKehamilanData = getUsiaKehamilanDistribution(data);
        
        try {
            new Chart(usiaKehamilanCtx, {
                type: 'pie',
                data: {
                    labels: ['Trimester 1 (0-12 minggu)', 'Trimester 2 (13-27 minggu)', 'Trimester 3 (28+ minggu)'],
                    datasets: [{
                        data: [
                            usiaKehamilanData.trimester1,
                            usiaKehamilanData.trimester2,
                            usiaKehamilanData.trimester3
                        ],
                        backgroundColor: [
                            'rgba(236, 72, 153, 0.6)',
                            'rgba(124, 58, 237, 0.6)',
                            'rgba(239, 68, 68, 0.6)'
                        ],
                        borderColor: [
                            'rgba(236, 72, 153, 1)',
                            'rgba(124, 58, 237, 1)',
                            'rgba(239, 68, 68, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });
        } catch (error) {
            console.error('Error creating usia kehamilan chart:', error);
        }
        
        // Chart berat badan ibu hamil sudah diganti dengan tabel statistik
    }
    
    function loadLansiaCharts(data) {
        console.log('Loading Lansia Charts with data:', data);
        
        // Check if canvas elements exist
        const lansiaChartEl = document.getElementById('lansiaChart');
        if (!lansiaChartEl) {
            console.error('lansiaChart canvas not found!');
            return;
        }
        
        // Monthly count chart
        const lansiaMonthlyCtx = lansiaChartEl.getContext('2d');
        const monthlyData = getMonthlyCount(data);
        
        try {
            new Chart(lansiaMonthlyCtx, {
                type: 'bar',
                data: {
                    labels: monthlyData.labels,
                    datasets: [{
                        label: 'Jumlah Lansia',
                        data: monthlyData.data,
                        backgroundColor: 'rgba(34, 197, 94, 0.6)',
                        borderColor: 'rgba(34, 197, 94, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    }
                }
            });
        } catch (error) {
            console.error('Error creating lansia monthly chart:', error);
        }
        
        // Tekanan darah chart
        const tekananDarahChartEl = document.getElementById('tekananDarahChart');
        if (!tekananDarahChartEl) {
            console.error('tekananDarahChart canvas not found!');
            return;
        }
        const tekananDarahCtx = tekananDarahChartEl.getContext('2d');
        const tekananDarahData = getTekananDarahDistribution(data);
        
        try {
            new Chart(tekananDarahCtx, {
                type: 'pie',
                data: {
                    labels: ['Normal', 'Pra-Hipertensi', 'Hipertensi', 'Hipotensi', 'Tidak Tercatat'],
                    datasets: [{
                        data: [
                            tekananDarahData.normal,
                            tekananDarahData.prehypertension,
                            tekananDarahData.hypertension,
                            tekananDarahData.hypotension,
                            tekananDarahData.unrecorded
                        ],
                        backgroundColor: [
                            'rgba(34, 197, 94, 0.6)',
                            'rgba(234, 179, 8, 0.6)',
                            'rgba(239, 68, 68, 0.6)',
                            'rgba(59, 130, 246, 0.6)',
                            'rgba(107, 114, 128, 0.6)'
                        ],
                        borderColor: [
                            'rgba(34, 197, 94, 1)',
                            'rgba(234, 179, 8, 1)',
                            'rgba(239, 68, 68, 1)',
                            'rgba(59, 130, 246, 1)',
                            'rgba(107, 114, 128, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });
        } catch (error) {
            console.error('Error creating tekanan darah chart:', error);
        }
        
        // Chart berat dan tinggi badan lansia sudah diganti dengan tabel statistik
    }
    
    // Helper functions for charts
    function getMonthlyCount(data) {
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        const currentYear = new Date().getFullYear();
        
        const monthlyCounts = Array(12).fill(0);
        
        data.forEach(item => {
            const date = new Date(item.created_at);
            if (date.getFullYear() === currentYear) {
                monthlyCounts[date.getMonth()]++;
            }
        });
        
        return {
            labels: months,
            data: monthlyCounts
        };
    }
    
    function getImunisasiStats(data) {
        let completed = 0;
        let incomplete = 0;
        
        data.forEach(item => {
            if (item.imunisasi && item.imunisasi.length > 0) {
                completed++;
            } else {
                incomplete++;
            }
        });
        
        return {
            completed: completed,
            incomplete: incomplete
        };
    }
    
    // Fungsi getGrowthTrend sudah tidak digunakan karena diganti dengan tabel statistik
    
    function getUsiaKehamilanDistribution(data) {
        let trimester1 = 0;
        let trimester2 = 0;
        let trimester3 = 0;
        
        data.forEach(item => {
            if (item.usia_kehamilan) {
                const usia = parseInt(item.usia_kehamilan);
                if (usia <= 12) {
                    trimester1++;
                } else if (usia <= 27) {
                    trimester2++;
                } else {
                    trimester3++;
                }
            }
        });
        
        return {
            trimester1: trimester1,
            trimester2: trimester2,
            trimester3: trimester3
        };
    }
    
    function getTekananDarahDistribution(data) {
        let normal = 0;
        let prehypertension = 0;
        let hypertension = 0;
        let hypotension = 0;
        let unrecorded = 0;
        
        data.forEach(item => {
            if (!item.tekanan_darah || item.tekanan_darah === '') {
                unrecorded++;
            } else {
                const parts = item.tekanan_darah.split('/');
                if (parts.length === 2) {
                    const systolic = parseInt(parts[0]);
                    const diastolic = parseInt(parts[1]);
                    
                    if (isNaN(systolic) || isNaN(diastolic)) {
                        unrecorded++;
                    } else if (systolic < 90 || diastolic < 60) {
                        hypotension++;
                    } else if (systolic >= 140 || diastolic >= 90) {
                        hypertension++;
                    } else if ((systolic >= 120 && systolic < 140) || (diastolic >= 80 && diastolic < 90)) {
                        prehypertension++;
                    } else {
                        normal++;
                    }
                } else {
                    unrecorded++;
                }
            }
        });
        
        return {
            normal: normal,
            prehypertension: prehypertension,
            hypertension: hypertension,
            hypotension: hypotension,
            unrecorded: unrecorded
        };
    }
    
    // Fungsi getBeratBadanIbuHamilTrend sudah tidak digunakan karena diganti dengan tabel statistik
    
    // Fungsi getBeratTinggiLansiaTrend sudah tidak digunakan karena diganti dengan tabel statistik

    // Load charts on page load
    document.addEventListener('DOMContentLoaded', function() {
        loadAllCharts();
    });
</script>
@endpush
