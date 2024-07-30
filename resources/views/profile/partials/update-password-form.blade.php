    <div class="card-header">
        Ganti Password
    </div>

    <div class="card-body">
        <p>Pastikan akun kamu menggunakan password yang aman.</p>

        <form method="post" action="{{ route('password.update') }}" class="d-flex flex-column gap-3">
            @csrf
            @method('put')

            <div>
                <x-input-label for="update_password_current_password" value="Password Sekarang" />
                <x-text-input id="update_password_current_password" name="current_password" type="password"
                    class="mt-1 block w-full" autocomplete="current-password" />

                @error('current_password')
                    <div class="valid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <x-input-label for="update_password_password" value="Password Baru" />
                <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full"
                    autocomplete="new-password" />

                @error('password')
                    <div class="valid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <x-input-label for="update_password_password_confirmation" value="Konfirmasi Password" />
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                    class="mt-1 block w-full" autocomplete="new-password" />

                @error('password_confirmation')
                    <div class="valid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="d-flex align-items-center gap-4">
                <x-primary-button>Simpan</x-primary-button>

                @if (session('status') === 'password-updated')
                    <p class="m-0 text-sm text-gray-600">Tersimpan</p>
                @endif
            </div>
        </form>
    </div>
