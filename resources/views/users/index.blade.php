<x-app-layout>
    <div class="d-flex justify-content-between align-items-start mt-4">
        <div>
            <h3>User</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>
        </div>
        <a href="{{ route('users.create') }}" class="btn btn-primary">
            Tambah User
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            Data User
        </div>
        <div class="card-body overflow-hidden">
            {{ $dataTable->table() }}
        </div>
    </div>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
</x-app-layout>
