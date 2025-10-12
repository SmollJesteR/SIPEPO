@extends('layouts.app')

@section('title', 'Login - SIPEPO')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-pink-50 to-blue-50">
    <div class="max-w-md w-full space-y-8 p-8">
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-4 animate__animated animate__fadeInDown sipepo-title" style="color: #f784c5;">SIPEPO</h1>
            <h2 class="text-lg text-gray-600 animate__animated animate__fadeIn animate__delay-1s">Sistem Pendataan Posyandu Hajimena</h2>
            <p class="text-sm text-gray-500 mt-2">Silakan login untuk mengakses sistem</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-8" data-aos="fade-up">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-200"
                        placeholder="admin1@sipepo.com"
                    >
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-200"
                        placeholder="Masukkan password"
                    >
                </div>

                <button 
                    type="submit" 
                    class="w-full bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-300 shadow-lg hover:shadow-xl btn-hover"
                >
                    <i data-feather="log-in" class="w-5 h-5 inline mr-2"></i>
                    Masuk
                </button>
            </form>       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
