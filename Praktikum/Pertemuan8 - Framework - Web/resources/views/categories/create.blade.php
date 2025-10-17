<x-app-layout>
    <x-slot name="header"><h2>Tambah Kategori</h2></x-slot>

    <div class="p-6 bg-white rounded shadow">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div>
                <label>Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full border rounded p-2">
                @error('name') <p class="text-red-600">{{ $message }}</p> @enderror
            </div>
            <div class="mt-2">
                <label>Deskripsi</label>
                <textarea name="description" class="w-full border rounded p-2">{{ old('description') }}</textarea>
            </div>
            <div class="mt-4">
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                <a href="{{ route('categories.index') }}" class="ml-2">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
