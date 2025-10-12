@extends('layouts.app')

@section('title', 'Tentang SIPEPO')

@section('content')
<header class="bg-teal-500 text-white py-6 shadow-md">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="flex items-center back-button">
                <i data-feather="arrow-left" class="mr-2"></i>
                <span class="font-semibold back-text">Kembali</span>
            </a>
            <h1 class="text-2xl font-bold">Tentang <span class="sipepo-title" style="color: #f784c5;">SIPEPO</span></h1>
            <div class="w-8"></div> <!-- Spacer for balance -->
        </div>
    </div>
</header>

<main class="flex-grow container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-md p-6 mb-8" data-aos="fade-up">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Apa itu SIPEPO?</h2>
            <p class="text-gray-600 mb-4">
                SIPEPO (Sistem Pendataan Posyandu) adalah platform digital yang dirancang untuk memudahkan pendataan dan pemantauan kesehatan masyarakat di Posyandu Desa Hajimena.
            </p>
            <p class="text-gray-600">
                Sistem ini membantu petugas posyandu dalam mencatat, menyimpan, dan menganalisis data kesehatan balita, pra-lansia, dan lansia secara lebih efisien dan terintegrasi.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-md p-6" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center mb-4">
                    <div class="bg-teal-100 p-3 rounded-full mr-4">
                        <i data-feather="target" class="text-teal-500"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800">Tujuan</h3>
                </div>
                <ul class="text-gray-600 space-y-2">
                    <li class="flex items-start">
                        <i data-feather="check" class="text-teal-500 mr-2 mt-1 w-4 h-4"></i>
                        <span>Mempermudah pendataan kesehatan masyarakat</span>
                    </li>
                    <li class="flex items-start">
                        <i data-feather="check" class="text-teal-500 mr-2 mt-1 w-4 h-4"></i>
                        <span>Meningkatkan akurasi data kesehatan</span>
                    </li>
                    <li class="flex items-start">
                        <i data-feather="check" class="text-teal-500 mr-2 mt-1 w-4 h-4"></i>
                        <span>Memantau perkembangan kesehatan secara berkala</span>
                    </li>
                </ul>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center mb-4">
                    <div class="bg-teal-100 p-3 rounded-full mr-4">
                        <i data-feather="users" class="text-teal-500"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800">Manfaat</h3>
                </div>
                <ul class="text-gray-600 space-y-2">
                    <li class="flex items-start">
                        <i data-feather="check" class="text-teal-500 mr-2 mt-1 w-4 h-4"></i>
                        <span>Data kesehatan tersimpan dengan aman</span>
                    </li>
                    <li class="flex items-start">
                        <i data-feather="check" class="text-teal-500 mr-2 mt-1 w-4 h-4"></i>
                        <span>Laporan kesehatan dapat diakses dengan mudah</span>
                    </li>
                    <li class="flex items-start">
                        <i data-feather="check" class="text-teal-500 mr-2 mt-1 w-4 h-4"></i>
                        <span>Mempercepat proses pelayanan di posyandu</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6" data-aos="fade-up">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Kontak Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="font-medium text-gray-700 mb-2 flex items-center">
                        <i data-feather="map-pin" class="mr-2 text-teal-500 w-5 h-5"></i>
                        Alamat
                    </h3>
                    <p class="text-gray-600">Posyandu Desa Hajimena, Kecamatan Natar, Kabupaten Lampung Selatan</p>
                </div>
                <div>
                    <h3 class="font-medium text-gray-700 mb-2 flex items-center">
                        <i data-feather="phone" class="mr-2 text-teal-500 w-5 h-5"></i>
                        Telepon
                    </h3>
                    <p class="text-gray-600">(0721) 1234567</p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
