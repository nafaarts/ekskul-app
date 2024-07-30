<x-app-layout>
    <div class="d-flex justify-content-between align-items-start mt-4">
        <div>
            <h3>Ekstrakurikuler</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Ekstrakurikuler</li>
            </ol>
        </div>
        <a href="{{ route('ekstrakurikuler.create') }}" class="btn btn-primary">
            Tambah Ekstrakurikuler
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            Data Ekstrakurikuler
        </div>
        <div class="card-body overflow-hidden">
            {{ $dataTable->table() }}
        </div>
    </div>

    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
</x-app-layout>
