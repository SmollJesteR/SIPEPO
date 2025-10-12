@extends('layouts.app')

@section('title', 'History - SIPEPO')

@section('content')
<header class="bg-blue-500 text-white py-6 shadow-md">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="flex items-center back-button">
                <i data-feather="arrow-left" class="mr-2"></i>
                <span class="font-semibold back-text">Kembali</span>
            </a>
            <h1 class="text-2xl font-bold">Riwayat <span class="sipepo-title" style="color: #f784c5;">SIPEPO</span></h1>
            <div class="w-8"></div> <!-- Spacer for balance -->
        </div>
    </div>
</header>

<main class="flex-grow container mx-auto px-4 py-8">
    <div class="bg-white rounded-xl shadow-md p-6 max-w-5xl mx-auto" data-aos="fade-up">
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">History Data Posyandu</h2>
            
            <div class="mb-6">
                <div class="flex flex-wrap mb-4">
                    <button onclick="showHistoryTab('balita', event)" class="tab-btn bg-emerald-100 text-emerald-700 px-4 py-2 rounded-lg mr-2 mb-2 hover:bg-emerald-200 active-tab">
                        Data Balita
                    </button>
                    <button onclick="showHistoryTab('ibu-hamil', event)" class="tab-btn bg-pink-100 text-pink-700 px-4 py-2 rounded-lg mr-2 mb-2 hover:bg-pink-200">
                        Data Ibu Hamil
                    </button>
                    <button onclick="showHistoryTab('lansia', event)" class="tab-btn bg-yellow-100 text-yellow-700 px-4 py-2 rounded-lg mr-2 mb-2 hover:bg-yellow-200">
                        Data Lansia
                    </button>
                </div>
            </div>
            
            <!-- Balita History Tab -->
            <div id="balita-history" class="history-tab">
                <h3 class="text-lg font-medium text-gray-800 mb-3">Riwayat Data Balita</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Lahir</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lingkar Kepala (cm)</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Badan (kg)</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tinggi Badan (cm)</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imunisasi</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Orang Tua</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kontak Orang Tua</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Input</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($balitas as $balita)
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $balita->nama_lengkap }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $balita->tanggal_lahir->format('d/m/Y') }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $balita->lingkar_kepala ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $balita->berat_badan ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $balita->tinggi_badan ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">
                                    @if($balita->imunisasi && count($balita->imunisasi) > 0)
                                        {{ implode(', ', $balita->imunisasi) }}
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $balita->nama_orang_tua ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $balita->kontak_orang_tua ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $balita->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="py-4 px-6 text-center text-gray-500">Belum ada data balita</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <a href="{{ route('export.balita') }}" class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-6 rounded-lg transition duration-300 shadow-md hover:shadow-lg flex items-center">
                        <i data-feather="download" class="w-4 h-4 mr-2"></i>
                        Export Excel
                    </a>
                </div>
            </div>
            
            <!-- Ibu Hamil History Tab -->
            <div id="ibu-hamil-history" class="history-tab" style="display:none">
                <h3 class="text-lg font-medium text-gray-800 mb-3">Riwayat Data Ibu Hamil</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usia Kehamilan (minggu)</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Badan (kg)</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tinggi Badan (cm)</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lingkar Perut (cm)</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lingkar Lengan (cm)</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tekanan Darah</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor WA</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Input</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ibuHamils as $ibuHamil)
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $ibuHamil->nama_lengkap }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $ibuHamil->usia_kehamilan }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $ibuHamil->berat_badan ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $ibuHamil->tinggi_badan ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $ibuHamil->lingkar_perut ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $ibuHamil->lingkar_lengan ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $ibuHamil->tekanan_darah ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $ibuHamil->nomor_wa ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $ibuHamil->alamat ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $ibuHamil->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10" class="py-4 px-6 text-center text-gray-500">Belum ada data ibu hamil</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <a href="{{ route('export.ibu-hamil') }}" class="bg-pink-500 hover:bg-pink-600 text-white font-medium py-2 px-6 rounded-lg transition duration-300 shadow-md hover:shadow-lg flex items-center">
                        <i data-feather="download" class="w-4 h-4 mr-2"></i>
                        Export Excel
                    </a>
                </div>
            </div>
            
            <!-- Lansia History Tab -->
            <div id="lansia-history" class="history-tab" style="display:none">
                <h3 class="text-lg font-medium text-gray-800 mb-3">Riwayat Data Lansia</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tekanan Darah</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tinggi Badan (cm)</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Badan (kg)</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor WA</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Input</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($lansias as $lansia)
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $lansia->nama_lengkap }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $lansia->tekanan_darah ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $lansia->tinggi_badan ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $lansia->berat_badan ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $lansia->alamat ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $lansia->nomor_wa ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $lansia->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="py-4 px-6 text-center text-gray-500">Belum ada data lansia</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <a href="{{ route('export.lansia') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2 px-6 rounded-lg transition duration-300 shadow-md hover:shadow-lg flex items-center ">
                        <i data-feather="download" class="w-4 h-4 mr-2"></i>
                        Export Excel
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
    // History page tab functionality
    function showHistoryTab(tabName, e) {
        // Hide all tabs
        document.querySelectorAll('.history-tab').forEach(tab => {
            tab.style.display = 'none';
        });
        
        // Show the selected tab
        document.getElementById(tabName + '-history').style.display = 'block';
        
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
    }
</script>
@endpush
