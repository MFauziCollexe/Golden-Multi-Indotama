@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">Halaman Careers</h1>
    <p class="text-gray-600">Ini adalah halaman Careers.blade.php</p>
</div>
@endsection

<!-- {{-- Debug --}}
@if (!isset($menus))
    <div class="bg-red-600 text-white text-center py-2 text-sm">
        ⚠️ Variabel $menus tidak ditemukan
    </div>
@endif -->