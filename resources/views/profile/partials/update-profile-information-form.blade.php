<div class="card-header">
    Informasi Akun
</div>

<div class="card-body">
    <p>Ubah informasi akun profil dan email anda.</p>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="d-flex flex-column gap-3">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" value="Nama" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                autofocus required autocomplete="name" />

            @error('name')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />

            @error('email')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div>
            <x-input-label for="no_hp" value="No. HP" />
            <x-text-input id="no_hp" name="no_hp" type="text" class="mt-1 block w-full" :value="old('no_hp', $user->no_hp)"
                required autocomplete="no_hp" />

            @error('no_hp')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-4">
            <x-primary-button>Simpan</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p class="m-0 text-sm text-gray-600">Tersimpan</p>
            @endif
        </div>
    </form>
</div>
