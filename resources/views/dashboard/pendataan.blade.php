@extends('layouts.app')

@section('title', 'Pendataan - SIPEPO')

@section('content')
<header class="bg-emerald-500 text-white py-6 shadow-md">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="flex items-center back-button">
                <i data-feather="arrow-left" class="mr-2"></i>
                <span class="font-semibold back-text">Kembali</span>
            </a>
            <h1 class="text-2xl font-bold">Pendataan <span class="sipepo-title" style="color: #f784c5;">SIPEPO</span></h1>
            <div class="w-8"></div> <!-- Spacer for balance -->
        </div>
    </div>
</header>

<main class="flex-grow container mx-auto px-4 py-8">
    <div class="bg-white rounded-xl shadow-md p-6 max-w-5xl mx-auto" data-aos="fade-up">
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Pilih Kategori Pendataan</h2>
            
            <div class="mb-6">
                <div class="flex flex-wrap mb-4">
                    <button onclick="showPendataanTab('balita', event)" class="tab-btn bg-emerald-100 text-emerald-700 px-4 py-2 rounded-lg mr-2 mb-2 hover:bg-emerald-200 active-tab">
                        Balita
                    </button>
                    <button onclick="showPendataanTab('ibu-hamil', event)" class="tab-btn bg-pink-100 text-pink-700 px-4 py-2 rounded-lg mr-2 mb-2 hover:bg-pink-200">
                        Ibu Hamil
                    </button>
                    <button onclick="showPendataanTab('lansia', event)" class="tab-btn bg-yellow-100 text-yellow-700 px-4 py-2 rounded-lg mr-2 mb-2 hover:bg-yellow-200">
                        Lansia
                    </button>
                </div>
            </div>
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            
            <!-- Balita Form Tab -->
            <div id="balita-form" class="pendataan-tab">
                <h3 class="text-lg font-medium text-gray-800 mb-3">Formulir Pendataan Balita</h3>
                <form method="POST" action="{{ route('data.balita.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-gray-700 mb-2">Nama Balita</label>
                            <input type="text" name="nama_lengkap" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Lingkar Kepala (cm)</label>
                            <input type="number" name="lingkar_kepala" step="0.1" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Berat Badan (kg)</label>
                            <input type="number" name="berat_badan" step="0.1" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Tinggi Badan (cm)</label>
                            <input type="number" name="tinggi_badan" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                    </div>
                    
                    <!-- Immunization Section -->
                    <div class="mb-6">
                        <label class="block text-gray-700 mb-2">Imunisasi</label>
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded">
                                    <input type="checkbox" name="imunisasi[]" value="Hepatitis B (<24 Jam)" class="rounded text-emerald-500 mr-2">
                                    <span>Hepatitis B (&lt;24 Jam)</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded">
                                    <input type="checkbox" name="imunisasi[]" value="BCG" class="rounded text-emerald-500 mr-2">
                                    <span>BCG</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded">
                                    <input type="checkbox" name="imunisasi[]" value="Polio Tetes 1" class="rounded text-emerald-500 mr-2">
                                    <span>Polio Tetes 1</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded">
                                    <input type="checkbox" name="imunisasi[]" value="DPT-HB-Hib 1" class="rounded text-emerald-500 mr-2">
                                    <span>DPT-HB-Hib 1</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded">
                                    <input type="checkbox" name="imunisasi[]" value="Polio Tetes 2" class="rounded text-emerald-500 mr-2">
                                    <span>Polio Tetes 2</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded">
                                    <input type="checkbox" name="imunisasi[]" value="Rota Virus (RV) 1*" class="rounded text-emerald-500 mr-2">
                                    <span>Rota Virus (RV) 1*</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded">
                                    <input type="checkbox" name="imunisasi[]" value="PCV 1" class="rounded text-emerald-500 mr-2">
                                    <span>PCV 1</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded">
                                    <input type="checkbox" name="imunisasi[]" value="DPT-HB-Hib 2" class="rounded text-emerald-500 mr-2">
                                    <span>DPT-HB-Hib 2</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded">
                                    <input type="checkbox" name="imunisasi[]" value="Polio Tetes 3" class="rounded text-emerald-500 mr-2">
                                    <span>Polio Tetes 3</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded">
                                    <input type="checkbox" name="imunisasi[]" value="Rota Virus (RV) 2*" class="rounded text-emerald-500 mr-2">
                                    <span>Rota Virus (RV) 2*</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded">
                                    <input type="checkbox" name="imunisasi[]" value="PCV 2" class="rounded text-emerald-500 mr-2">
                                    <span>PCV 2</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded">
                                    <input type="checkbox" name="imunisasi[]" value="DPT-HB-Hib 3" class="rounded text-emerald-500 mr-2">
                                    <span>DPT-HB-Hib 3</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded">
                                    <input type="checkbox" name="imunisasi[]" value="Polio Tetes 4" class="rounded text-emerald-500 mr-2">
                                    <span>Polio Tetes 4</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded">
                                    <input type="checkbox" name="imunisasi[]" value="Polio Suntik (IPV) 1" class="rounded text-emerald-500 mr-2">
                                    <span>Polio Suntik (IPV) 1</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded">
                                    <input type="checkbox" name="imunisasi[]" value="Rota Virus (RV) 3*" class="rounded text-emerald-500 mr-2">
                                    <span>Rota Virus (RV) 3*</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded">
                                    <input type="checkbox" name="imunisasi[]" value="Campak - Rubella (MR)" class="rounded text-emerald-500 mr-2">
                                    <span>Campak - Rubella (MR)</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded">
                                    <input type="checkbox" name="imunisasi[]" value="Polio Suntik (IPV) 2*" class="rounded text-emerald-500 mr-2">
                                    <span>Polio Suntik (IPV) 2*</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded">
                                    <input type="checkbox" name="imunisasi[]" value="Japanese Encephalitis (JE)**" class="rounded text-emerald-500 mr-2">
                                    <span>Japanese Encephalitis (JE)**</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded">
                                    <input type="checkbox" name="imunisasi[]" value="PCV 3" class="rounded text-emerald-500 mr-2">
                                    <span>PCV 3</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded">
                                    <input type="checkbox" name="imunisasi[]" value="DPT-HB-Hib Lanjutan" class="rounded text-emerald-500 mr-2">
                                    <span>DPT-HB-Hib Lanjutan</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded">
                                    <input type="checkbox" name="imunisasi[]" value="Campak - Rubella (MR) Lanjutan" class="rounded text-emerald-500 mr-2">
                                    <span>Campak - Rubella (MR) Lanjutan</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Data Orang Tua Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-gray-700 mb-2">Nama Orang Tua</label>
                            <input type="text" name="nama_orang_tua" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">No. WA/Telepon</label>
                            <input type="tel" name="kontak_orang_tua" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                    </div>
                    
                    <div class="flex justify-end items-center">
                        <button type="submit" class="bg-[#f784c5] hover:bg-[#f561b0] text-white font-medium py-2 px-6 rounded-lg transition duration-300 shadow-md hover:shadow-lg">
                            Simpan Data
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Ibu Hamil Form Tab -->
            <div id="ibu-hamil-form" class="pendataan-tab" style="display: none">
                <h3 class="text-lg font-medium text-gray-800 mb-3">Formulir Pendataan Ibu Hamil</h3>
                <form method="POST" action="{{ route('data.ibu-hamil.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <label class="block text-gray-700 mb-2">Nama Ibu Hamil</label>
                            <input type="text" name="nama_lengkap" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Usia Kehamilan (minggu)</label>
                            <input type="number" name="usia_kehamilan" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Berat Badan (kg)</label>
                            <input type="number" name="berat_badan" step="0.1" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Tinggi Badan (cm)</label>
                            <input type="number" name="tinggi_badan" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Lingkar Perut (cm)</label>
                            <input type="number" name="lingkar_perut" step="0.1" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Lingkar Lengan (cm)</label>
                            <input type="number" name="lingkar_lengan" step="0.1" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Tekanan Darah</label>
                            <input type="text" name="tekanan_darah" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500" placeholder="120/80">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">No. WA/Telepon</label>
                            <input type="tel" name="nomor_wa" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 mb-2">Alamat</label>
                            <input type="text" name="alamat" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                        </div>
                    </div>
                    
                    <div class="flex justify-end items-center gap-4 mt-6">
                        <button type="submit" class="bg-[#f784c5] hover:bg-[#f561b0] text-white font-medium py-2 px-6 rounded-lg transition duration-300 shadow-md hover:shadow-lg">
                            Simpan Data
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Lansia Form Tab -->
            <div id="lansia-form" class="pendataan-tab" style="display: none">
                <h3 class="text-lg font-medium text-gray-800 mb-3">Formulir Pendataan Lansia</h3>
                <form method="POST" action="{{ route('data.lansia.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <label class="block text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Tekanan Darah</label>
                            <input type="text" name="tekanan_darah" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" placeholder="120/80">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Tinggi Badan (cm)</label>
                            <input type="number" name="tinggi_badan" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Berat Badan (kg)</label>
                            <input type="number" name="berat_badan" step="0.1" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 mb-2">Alamat</label>
                            <input type="text" name="alamat" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Nomor WA/Telepon</label>
                            <input type="tel" name="nomor_wa" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                        </div>
                    </div>
                    
                    <div class="flex justify-end items-center gap-4 mt-6">
                        <button type="submit" class="bg-[#f784c5] hover:bg-[#f561b0] text-white font-medium py-2 px-6 rounded-lg transition duration-300 shadow-md hover:shadow-lg">
                            Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
    // Pendataan page tab functionality
    function showPendataanTab(tabName, e) {
        // Hide all tabs
        document.querySelectorAll('.pendataan-tab').forEach(tab => {
            tab.style.display = 'none';
        });
        
        // Show the selected tab
        document.getElementById(tabName + '-form').style.display = 'block';
        
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
