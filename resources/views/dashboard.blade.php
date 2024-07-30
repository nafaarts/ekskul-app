<x-app-layout>
    <h3 class="my-4">Dashboard</h3>

    <div class="row g-3">
        <div class="col-12 col-md-4">
            <div class="card p-3">
                <small>Jumlah User</small>
                <h2 class="m-0">{{ $jumlah_user }}</h2>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card p-3">
                <small>Jumlah Ekstrakulikuler</small>
                <h2 class="m-0">{{ $jumlah_ekstrakurikuler }}</h2>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card p-3">
                <small>Jumlah Pendaftar</small>
                <h2 class="m-0">{{ $jumlah_pendaftar }}</h2>
            </div>
        </div>
    </div>
</x-app-layout>
