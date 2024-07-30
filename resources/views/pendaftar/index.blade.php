<x-app-layout>
    <div class="d-flex justify-content-between align-items-start mt-4">
        <div>
            <h3>Pendaftar</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Pendaftar</li>
            </ol>
        </div>
        <a href="{{ route('pendaftar.create') }}" class="btn btn-primary">
            Tambah Pendaftar
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            Data Pendaftar
        </div>
        <div class="card-body overflow-hidden">
            {{ $dataTable->table() }}
        </div>
    </div>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
</x-app-layout>
