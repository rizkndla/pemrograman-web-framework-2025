<x-app-layout>
    <x-slot name="header"><h2>Daftar Produk</h2></x-slot>

    <div class="p-6 bg-white rounded shadow">
        @if(Auth::user()->role === 'admin')
            <a href="{{ route('products.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Tambah Produk</a>
        @endif

        @if(session('success')) <div class="mt-4 p-3 bg-green-100">{{ session('success') }}</div> @endif

        <table class="w-full mt-4">
            <thead><tr class="text-left"><th>Nama</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr></thead>
            <tbody>
            @foreach($products as $p)
                <tr>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->category?->name ?? '-' }}</td>
                    <td>Rp {{ number_format($p->price,0,',','.') }}</td>
                    <td>{{ $p->stock }}</td>
                    <td>
                        <a href="{{ route('products.show', $p) }}">Detail</a>
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('products.edit', $p) }}" class="ml-2">Edit</a>
                            <form action="{{ route('products.destroy', $p) }}" method="POST" style="display:inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Hapus?')" class="text-red-600 ml-2">Hapus</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-4">{{ $products->links() }}</div>
    </div>
</x-app-layout>