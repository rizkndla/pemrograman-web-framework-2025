@extends('utama')

@section('title', 'Halaman Produk')

@section('konten')
    <h2>Halaman Produk</h2>

    <x-alert type="{{ $type }}">
        {{ $pesan }}
    </x-alert>
@endsection