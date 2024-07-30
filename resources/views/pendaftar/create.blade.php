<x-app-layout>
    <div class="d-flex justify-content-between align-items-start mt-4">
        <div>
            <h3>Tambah - Pendaftar</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pendaftar.index') }}">Pendaftar</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Tambah Pendaftar
        </div>
        <div class="card-body">
            <form action="{{ route('pendaftar.store') }}" method="POST">
                @csrf

                <div class="d-flex flex-column gap-3 mb-5">
                    <div class="row">
                        <div class="col">
                            <x-input-label for="nama" value="Nama" />
                            <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full"
                                :value="old('nama')" autofocus autocomplete="nama" />

                            @error('nama')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="col">
                            <x-input-label for="tgl_lahir" value="Tanggal Lahir" />
                            <x-text-input id="tgl_lahir" name="tgl_lahir" type="date" class="mt-1 block w-full"
                                :value="old('tgl_lahir')" autocomplete="tgl_lahir" />

                            @error('tgl_lahir')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <x-input-label for="ekstrakurikuler" value="Ekstrakurikuler" />
                            <select class="form-select mt-1" name="ekstrakurikuler_id" id="ekstrakurikuler">
                                @foreach ($ekstrakurikuler as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>

                            @error('ekstrakurikuler_id')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="col">
                            <x-input-label for="kelas" value="Kelas" />
                            <select class="form-select mt-1" name="kelas_id" id="kelas">
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>

                            @error('kelas_id')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div>
                                <x-input-label for="nisn" value="NISN" />
                                <x-text-input id="nisn" name="nisn" type="text" class="mt-1 block w-full"
                                    :value="old('nisn')" autocomplete="nisn" />

                                @error('nisn')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div>
                                <x-input-label for="no_hp" value="No. HP" />
                                <x-text-input id="no_hp" name="no_hp" type="text" class="mt-1 block w-full"
                                    :value="old('no_hp')" autocomplete="no_hp" />

                                @error('no_hp')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <x-primary-button>Simpan</x-primary-button>

                    <a href="{{ route('pendaftar.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
