@extends('layouts.app')

@section('content')
<div class="text-center py-24">
    <h1 class="text-4xl font-bold mb-4">404</h1>
    <p>{{ $message ?? 'Halaman tidak ditemukan.' }}</p>
</div>
@endsection
