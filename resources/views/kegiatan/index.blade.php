<x-app-layout>
    <div class="d-flex justify-content-between align-items-start mt-4">
        <div>
            <h3>Kegiatan</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Kegiatan</li>
            </ol>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
            Tambah Kegiatan
        </button>
    </div>

    @if (session('success'))
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mb-3">
            <ul class="pb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Data Kegiatan
        </div>
        <div class="card-body overflow-hidden">
            <div class="row g-2 g-md-3">
                @forelse ($kegiatan as $item)
                    <div class="col-6 col-md-3">
                        <div class="position-relative card ratio ratio-4x3">
                            <img class="img-fluid" src="{{ asset('storage/' . $item->gambar) }}" alt="Kegiatan">

                            <div class="position-absolute p-2">
                                <div class="d-flex justify-content-between align-items-start">
                                    <span class="badge bg-secondary">{{ $item->ekstrakurikuler->nama }}</span>

                                    <div>
                                        <button class="btn btn-sm btn-warning mb-2" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit" data-bs-id="{{ $item->id }}"
                                            data-bs-ekstrakurikuler="{{ $item->ekstrakurikuler_id }}"
                                            data-bs-deskripsi="{{ $item->deskripsi }}">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </button>
                                        <form action="{{ route('kegiatan.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('yakin dihapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-fw fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center my-4">Tidak ada data!</p>
                @endforelse
            </div>
        </div>
        @if ($kegiatan->hasPages())
            <div class="card-footer">
                {{ $kegiatan->links() }}
            </div>
        @endif
    </div>

    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahModalLabel">Tambah Kegiatan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-tambah-kegiatan" action="{{ route('kegiatan.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="d-flex flex-column gap-3">
                            <div>
                                <x-input-label for="ekstrakurikuler" value="Ekstrakurikuler" />
                                <select class="form-select mt-1" name="ekstrakurikuler" id="ekstrakurikuler">
                                    @foreach ($ekstrakurikuler as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <x-input-label for="gambar" value="Gambar" />
                                <input type="file" name="gambar" id="gambar" class="form-control">
                            </div>

                            <div>
                                <x-input-label for="deskripsi" value="Deskripsi" />
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control mt-1 block w-full"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary"
                        onclick="document.getElementById('form-tambah-kegiatan').submit()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalEditLabel">Edit Kegiatan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-edit-kegiatan" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="d-flex flex-column gap-3">
                            <div>
                                <x-input-label for="ekstrakurikuler-update-input" value="Ekstrakurikuler" />
                                <select class="form-select mt-1" name="ekstrakurikuler"
                                    id="ekstrakurikuler-update-input">
                                    @foreach ($ekstrakurikuler as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <x-input-label for="gambar" value="Gambar" />
                                <input type="file" name="gambar" id="gambar" class="form-control">
                            </div>

                            <div>
                                <x-input-label for="deskripsi-update-input" value="Deskripsi" />
                                <textarea name="deskripsi" id="deskripsi-update-input" cols="30" rows="10"
                                    class="form-control mt-1 block w-full"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary"
                        onclick="document.getElementById('form-edit-kegiatan').submit()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const form = document.getElementById('form-edit-kegiatan')
            const inputUpdateEkstrakurikuler = document.getElementById('ekstrakurikuler-update-input')
            const inputUpdateDeskripsi = document.getElementById('deskripsi-update-input')


            const modalEdit = document.getElementById('modalEdit')
            modalEdit.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget
                const id = button.getAttribute('data-bs-id')
                const ekstrakurikuler = button.getAttribute('data-bs-ekstrakurikuler')
                const deskripsi = button.getAttribute('data-bs-deskripsi')

                form.action = `/kegiatan/${id}`;

                inputUpdateEkstrakurikuler.value = ekstrakurikuler;
                inputUpdateDeskripsi.value = deskripsi;
            })
        </script>
    @endpush

</x-app-layout>
