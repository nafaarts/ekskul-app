@extends('layouts.depan')

@section('content')
    <div class="container py-4">
        <div class="row g-3">
            <div class="col-md-5 d-none d-md-block">
                <div class="rounded overflow-hidden h-100"
                    style="background-image: url('{{ asset('images/daftar.jpeg') }}'); background-size: cover; background-position: center center">
                </div>
            </div>
            <div class="col-md-7 p-md-4">
                <h4 class="mb-4">Pendaftaran</h4>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('daftar.store') }}" method="POST">
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

                        <div>
                            <x-input-label for="tgl_lahir" value="Tanggal Lahir" />
                            <x-text-input id="tgl_lahir" name="tgl_lahir" type="date" class="mt-1 block w-full"
                                :value="old('tgl_lahir')" autocomplete="tgl_lahir" />

                            @error('tgl_lahir')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div>
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

                        <div>
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

                        <div>
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

                        <div>
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

                    <div class="d-flex align-items-center gap-2">
                        <x-primary-button>Simpan</x-primary-button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
