@extends('layouts.depan')

@section('content')
    <div class="container py-4">
        <h4 class="mb-4">Ekstrakurikuler</h4>
        @foreach ($ekstrakurikuler as $item)
            <section class="row g-3 mb-5 border-bottom pb-4">
                <div class="col-md-4">
                    <div class="ratio ratio-16x9"
                        style="background-image: url('{{ asset('storage/' . $item->gambar) }}'); background-size: cover; background-position: center center">
                    </div>
                </div>
                <div class="col-md-8">
                    <h4 class="mb-4">{{ $item->nama }}</h4>
                    <p class="mb-5">{{ $item->deskripsi }}</p>

                    <a href="{{ route('daftar.index') }}" class="btn btn-sm btn-primary">Daftar Ekstrakurikuler</a>
                </div>
            </section>
        @endforeach
    </div>
@endsection
