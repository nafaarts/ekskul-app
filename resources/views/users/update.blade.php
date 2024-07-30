<x-app-layout>
    <div class="d-flex justify-content-between align-items-start mt-4">
        <div>
            <h3>Ubah - User</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User</a></li>
                <li class="breadcrumb-item active">Ubah</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Ubah User
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('patch')

                <div class="d-flex flex-column gap-3 mb-5">
                    <div class="row">
                        <div class="col">
                            <x-input-label for="name" value="Nama" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                :value="old('name', $user->name)" autofocus autocomplete="name" />

                            @error('name')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="col">
                            <x-input-label for="email" value="Email" />
                            <x-text-input id="email" name="email" type="text" class="mt-1 block w-full"
                                :value="old('email', $user->email)" autocomplete="email" />

                            @error('email')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <x-input-label for="no_hp" value="No. HP" />
                            <x-text-input id="no_hp" name="no_hp" type="text" class="mt-1 block w-full"
                                :value="old('no_hp', $user->no_hp)" autocomplete="no_hp" />

                            @error('no_hp')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="col">
                            <x-input-label for="hak_akses" value="Hak Akses" />
                            <select class="form-select mt-1" name="hak_akses" id="hak_akses">
                                <option @selected($user->hak_akses == 'ADMIN') value="ADMIN">ADMIN</option>
                                <option @selected($user->hak_akses == 'EKSTRAKURIKULER') value="EKSTRAKURIKULER">EKSTRAKURIKULER</option>
                            </select>

                            @error('hak_akses')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <x-input-label for="password" value="Password" />
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                                autocomplete="password" />

                            @error('password')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="col">
                            <x-input-label for="password_confirmation" value="Konfimasi Password" />
                            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                                class="mt-1 block w-full" autocomplete="password_confirmation" />

                            @error('password_confirmation')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <x-primary-button>Simpan</x-primary-button>

                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
