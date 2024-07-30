@extends('layouts.depan')

@section('content')
    <main class="container py-3">
        <div class="rounded overflow-hidden mb-3 mb-md-5">
            <div id="carouselExampleInterval" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($galeri as $item)
                        <div class="carousel-item ratio ratio-21x9 {{ $loop->iteration == 1 ? 'active' : '' }}"
                            style="background-image: url('{{ asset('storage/' . $item->gambar) }}'); background-size: cover; background-position: center center"
                            data-bs-interval="5000">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <section class="row g-3 mb-3 mb-md-5">
            <div class="col-md-4">
                <div class="ratio ratio-16x9 rounded overflow-hidden">
                    <img src="{{ asset('images/about.jpg') }}" alt="Tentang SMAN 1 Montasik">
                </div>
            </div>
            <div class="col-md-8 p-md-4">
                <h4 class="mb-4">SMAN 1 Montasik</h4>
                <p> SMAN 1 Montasik adalah salah satu satuan Pendidikan dengan jenjang
                    SMA yang bertempat di lampaseh krueng, Kec. Montasik, Kab. Aceh Besar.
                </p>
                <p>SMAN 1 Montasik memiliki akreditasi A berdasarkan sertifikat 842/BAN-
                    SM/SK/2019.</p>
                <p>Ekstrakurikuler guna memperluas wawasan serta peningkatan dan penerapan
                    nilai-nilai pengetahuan dan kemampuan dalam berbagai hal, seperti olahraga dan
                    seni.</p>
            </div>
        </section>

        <section class="mb-5">
            <h4 class="mb-4">Ekstrakurikuler</h4>
            <div class="row g-3 mb-4">
                @foreach ($ekstrakurikuler as $item)
                    <div class="col-6 col-md-3">
                        <div class="card">
                            <div class="card-img-top ratio ratio-16x9"
                                style="background-image: url('{{ asset('storage/' . $item->gambar) }}'); background-size: cover; background-position: center center">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title m-0">{{ $item->nama }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                <a href="{{ route('ekstrakurikuler') }}" class="btn btn-sm btn-primary">Lihat lebih lengkap</a>
            </div>
        </section>

        <section class="rounded overflow-hidden">
            <iframe title="Peta Sekolah"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15886.604679628903!2d95.404742!3d5.4697743!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304047435182dac7%3A0x748ef5758a56e6db!2sSMA%20Negeri%201%20Montasik!5e0!3m2!1sid!2sid!4v1721906005859!5m2!1sid!2sid"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
    </main>
@endsection
