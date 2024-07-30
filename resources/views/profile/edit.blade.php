@section('title', 'Profil')

<x-app-layout>
    <h3 class="mt-4">Profil</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Profil</li>
    </ol>

    <div class="d-flex flex-column gap-3">
        <div class="card">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="card">
            @include('profile.partials.update-password-form')
        </div>
    </div>
</x-app-layout>
