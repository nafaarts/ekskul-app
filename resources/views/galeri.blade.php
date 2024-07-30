@extends('layouts.depan')

@section('content')
    <div class="container py-4">
        <h4 class="mb-4">Galeri</h4>
        <div class="row g-3">
            @foreach ($galeri as $item)
                <div class="col-6 col-md-3">
                    <div class="card">
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="Galeri">
                        <div class="card-body p-2">
                            <p class="card-text">
                                <strong>{{ $item->ekstrakurikuler->nama }}</strong> {{ $item->deskripsi }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
