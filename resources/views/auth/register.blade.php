<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-2xl font-extrabold text-gray-900">Pendaftaran Pengurus</h2>
        <p class="text-sm text-gray-500 mt-2">Daftarkan lingkungan Anda. Akun akan ditinjau oleh Super Admin sebelum dapat digunakan.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="role" value="Mendaftar Sebagai" class="font-bold" />
            <select id="role" name="role" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-xl shadow-sm" required autofocus>
                <option value="rt">Ketua RT</option>
                <option value="rw">Ketua RW</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="name" value="Nama Lengkap Pengurus" class="font-bold" />
            <x-text-input id="name" class="block mt-1 w-full rounded-xl" type="text" name="name" :value="old('name')" required autocomplete="name" placeholder="Contoh: Budi Santoso" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" value="Email Aktif" class="font-bold" />
            <x-text-input id="email" class="block mt-1 w-full rounded-xl" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Contoh: rtxx@gmail.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" value="Kata Sandi (Password)" class="font-bold" />
            <x-text-input id="password" class="block mt-1 w-full rounded-xl"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" value="Ulangi Kata Sandi" class="font-bold" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-xl"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 flex gap-3">
            <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <p class="text-xs text-blue-800 font-medium">Setelah mendaftar, harap hubungi Super Admin untuk proses aktivasi akun. Anda tidak bisa login sebelum di-approve.</p>
        </div>

        <div class="flex items-center justify-between mt-6">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 font-bold" href="{{ route('login') }}">
                Sudah punya akun?
            </a>

            <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white font-bold py-2.5 px-6 rounded-xl shadow-md transition-all active:scale-95">
                Daftar Sekarang
            </button>
        </div>
    </form>
</x-guest-layout>