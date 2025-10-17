<x-guest-layout>
  <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow">
      <div class="text-center">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mx-auto w-20 h-20 mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Selamat Datang di {{ config('app.name') }}</h1>
        <p class="text-sm text-gray-500 mt-1">Silakan login untuk melanjutkan</p>
      </div>

      <form method="POST" action="{{ route('login') }}" class="mt-6" id="loginForm">
        @csrf

        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                 class="mt-1 block w-full rounded-md border-gray-300 p-2" />
          @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mt-4">
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input id="password" name="password" type="password" required
                 class="mt-1 block w-full rounded-md border-gray-300 p-2" />
          @error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center justify-between mt-4">
          <label class="flex items-center text-sm">
            <input type="checkbox" name="remember" class="rounded border-gray-300">
            <span class="ml-2 text-gray-600">Ingat saya</span>
          </label>

          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">Lupa password?</a>
          @endif
        </div>

        <!-- TOMBOL LOGIN: pastikan ada dan di dalam FORM -->
        <div class="mt-6">
          <button type="submit" id="loginButton"
                  class="w-full px-4 py-2 bg-indigo-600 text-black font-semibold rounded-md hover:bg-indigo-700">
            LOGIN
          </button>
        </div>
      </form>

      <p class="text-center text-sm text-gray-600 mt-6">
        Belum punya akun?
        @if (Route::has('register'))
          <a href="{{ route('register') }}" class="text-indigo-600 font-medium hover:underline">Daftar di sini</a>
        @else
          <span class="text-gray-400">Pendaftaran ditutup</span>
        @endif
      </p>
    </div>
  </div>
</x-guest-layout>
