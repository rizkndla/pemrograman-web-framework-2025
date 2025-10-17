<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-600 leading-tight">
            Edit Kategori
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700">Nama Kategori</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="w-full border rounded px-3 py-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Deskripsi</label>
                    <textarea name="description" class="w-full border rounded px-3 py-2">{{ $category->description }}</textarea>
                </div>
                <button type="submit" class="px-4 py-2 bg-gradient-to-r from-blue-400 to-pink-400 text-white rounded-lg shadow hover:opacity-90">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
