@extends('utama')

@section('judul-menu', 'Profile')

@section('isi-menu')
    <p>Nama: {{ Auth::user()->name ?? 'Guest' }}</p>
    <p>Email: {{ Auth::user()->email ?? '-' }}</p>
@endsection