<x-app-layout>
    <div class="d-flex justify-content-between align-items-start mt-4">
        <div>
            <h3>Tambah - Ekstrakurikuler</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ekstrakurikuler.index') }}">Ekstrakurikuler</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Tambah Ekstrakurikuler
        </div>
        <div class="card-body">
            <form action="{{ route('ekstrakurikuler.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="d-flex flex-column gap-3 mb-5">
                    <div>
                        <x-input-label for="nama" value="Nama" />
                        <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full"
                            :value="old('nama')" autofocus autocomplete="nama" />

                        @error('nama')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col">
                            <x-input-label for="admin" value="Admin" />
                            <select class="form-select mt-1" name="admin" id="admin">
                                @foreach ($admin as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>

                            @error('admin')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="col">
                            <x-input-label for="gambar" value="Gambar" />
                            <input type="file" name="gambar" id="gambar" class="form-control">

                            @error('gambar')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <x-input-label for="deskripsi" value="Deskripsi" />
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control mt-1 block w-full"></textarea>

                        @error('deskripsi')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <x-primary-button>Simpan</x-primary-button>

                    <a href="{{ route('ekstrakurikuler.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
