@extends('layouts.app')

@section('content')
<div class="text-center py-24">
    <h1 class="text-3xl font-bold mb-4">Terjadi Kesalahan</h1>
    <p>{{ $message ?? 'Silakan coba beberapa saat lagi.' }}</p>
</div>
@endsection
