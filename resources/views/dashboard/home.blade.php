@extends('layouts.app')

@section('title', 'Dashboard - SIPEPO')

@section('content')
<main class="flex-grow container mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h1 class="text-5xl md:text-6xl font-bold mb-4 animate__animated animate__fadeInDown sipepo-title" style="color: #f784c5;">SIPEPO</h1>
        <h2 class="text-sm md:text-lg text-gray-600 animate__animated animate__fadeIn animate__delay-1s">Sistem Pendataan Posyandu Hajimena</h2>
        <p class="text-sm text-gray-500 mt-2">Selamat datang, {{ Auth::user()->name }}!</p>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-5xl mx-auto bento-mobile-grid">
        <!-- Pendataan Button -->
        <a href="{{ route('pendataan') }}" 
           class="btn-hover bg-gradient-to-br from-pink-200 to-pink-100 rounded-xl p-8 text-center shadow-md hover:shadow-lg"
           data-aos="fade-up" data-aos-delay="100">
            <div class="bg-pink-500 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4" style="background-color: #f784c5;">
                <i data-feather="clipboard" class="text-white w-8 h-8"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Pendataan</h3>
            <p class="text-gray-600">Pendataan balita, ibu hamil & lansia</p>
        </a>

        <!-- History Button -->
        <a href="{{ route('history') }}" 
           class="btn-hover bg-gradient-to-br from-blue-100 to-cyan-100 rounded-xl p-8 text-center shadow-md hover:shadow-lg"
           data-aos="fade-up" data-aos-delay="200">
            <div class="bg-blue-500 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                <i data-feather="clock" class="text-white w-8 h-8"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">History</h3>
            <p class="text-gray-600">Riwayat pendataan posyandu</p>
        </a>

        <!-- Statistik Button -->
        <a href="{{ route('statistik') }}" 
           class="btn-hover bg-gradient-to-br from-green-100 to-emerald-100 rounded-xl p-8 text-center shadow-md hover:shadow-lg"
           data-aos="fade-up" data-aos-delay="300">
            <div class="bg-green-500 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                <i data-feather="bar-chart-2" class="text-white w-8 h-8"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Statistik</h3>
            <p class="text-gray-600">Visualisasi data kesehatan</p>
        </a>

        <!-- About Button -->
        <a href="{{ route('about') }}" 
           class="btn-hover bg-gradient-to-br from-pink-200 to-pink-100 rounded-xl p-8 text-center shadow-md hover:shadow-lg"
           data-aos="fade-up" data-aos-delay="400">
            <div class="bg-pink-500 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4" style="background-color: #f784c5;">
                <i data-feather="home" class="text-white w-8 h-8"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">SIPEPO</h3>
            <p class="text-gray-600">Informasi tentang SIPEPO</p>
        </a>
    </div>

    <!-- Logout Button -->
    <div class="text-center mt-8">
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-6 rounded-lg transition duration-300 shadow-md hover:shadow-lg flex items-center mx-auto">
                <i data-feather="log-out" class="w-4 h-4 mr-2"></i>
                Logout
            </button>
        </form>
    </div>
</main>
@endsection
