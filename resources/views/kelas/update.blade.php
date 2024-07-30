<x-app-layout>
    <div class="d-flex justify-content-between align-items-start mt-4">
        <div>
            <h3>Ubah - Kelas</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('kelas.index') }}">Kelas</a></li>
                <li class="breadcrumb-item active">Ubah</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Ubah Kelas
        </div>
        <div class="card-body">
            <form action="{{ route('kelas.update', $kelas) }}" method="POST">
                @csrf
                @method('patch')

                <div class="d-flex flex-column gap-3 mb-5">
                    <div>
                        <x-input-label for="nama" value="Nama" />
                        <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full"
                            :value="old('nama', $kelas->nama)" autofocus autocomplete="nama" />

                        @error('nama')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <x-primary-button>Simpan</x-primary-button>

                    <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
