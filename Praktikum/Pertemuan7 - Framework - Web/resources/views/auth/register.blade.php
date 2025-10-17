<x-guest-layout>
  <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow">
      <div class="text-center">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mx-auto w-20 h-20 mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Daftar - {{ config('app.name') }}</h1>
        <p class="text-sm text-gray-500 mt-1">Buat akun untuk mulai menggunakan aplikasi</p>
      </div>

      <form method="POST" action="{{ route('register') }}" class="mt-6">
        @csrf

        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
          <input id="name" name="name" type="text" value="{{ old('name') }}" required
                 class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
          @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mt-4">
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input id="email" name="email" type="email" value="{{ old('email') }}" required
                 class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
          @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mt-4">
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input id="password" name="password" type="password" required
                 class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
          @error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mt-4">
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
          <input id="password_confirmation" name="password_confirmation" type="password" required
                 class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        </div>

        <div class="mt-6">
          <button type="submit" class="w-full px-4 py-2 bg-green-600 text-blue font-semibold rounded-md hover:bg-green-700 transition">
            DAFTAR
          </button>
        </div>
      </form>

      <p class="text-center text-sm text-gray-600 mt-6">
        Sudah punya akun? <a href="{{ route('login') }}" class="text-indigo-600 font-medium hover:underline">Login</a>
      </p>
    </div>
  </div>
</x-guest-layout>
