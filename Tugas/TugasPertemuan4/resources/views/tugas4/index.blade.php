@extends('layouts.app') {{-- kalau kamu pakai layout utama, misal layouts/app.blade.php --}}

@section('content')
<div class="container">
    <h2>Hasil dari Controller</h2>
    <p>Angka yang dikirim dari route: <strong>{{ $hasil }}</strong></p>
</div>
@endsection