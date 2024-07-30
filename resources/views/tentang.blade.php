@extends('layouts.depan')

@section('content')
    <div class="container py-4">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="ratio ratio-4x3 rounded overflow-hidden">
                    <img src="{{ asset('images/about.jpg') }}" alt="Tentang SMAN 1 Montasik">
                </div>
            </div>
            <div class="col-md-8 px-md-3">
                <h4 class="mb-4">Tentang Kami</h4>
                <p>
                    SMAN 1 Montasik adalah salah satu satuan Pendidikan dengan jenjang
                    SMA yang bertempat di lampaseh krueng, Kec. Montasik, Kab. Aceh Besar.
                    SMAN 1 Montasik memiliki akreditasi A berdasarkan sertifikat 842/BAN-
                    SM/SK/2019.</p>
                <p class="mb-5">
                    Ekstrakurikuler guna memperluas wawasan serta peningkatan dan penerapan
                    nilai-nilai pengetahuan dan kemampuan dalam berbagai hal, seperti olahraga dan
                    seni. Selain itu, kegiatan ekstrakurikuler juga merupakan salah satu cara
                    menampung dan mengembangkan potensi siswa yang tidak tersalurkan saat di
                    sekolah. Kegiatan ekstrakurikuler merupakan salah satu upaya pembinaan yang
                    diselenggarakan di lingkungan sekolah. Pada gilirannya keterampilan siswa akan
                    ditingkatkan dengan bentuk-bentuk latihan khusus sesuai cabang olahraga yang
                    diikuti dan diminati</p>

                <h4 class="mb-3">Social Media</h4>
                <div class="d-flex flex-column flex-md-row gap-2 gap-md-4">
                    <a href="#" class="text-dark text-decoration-none" style="font-size: 18px">
                        <i class="fab fa-fw fa-square-instagram"></i>
                        <span>instagram</span>
                    </a>
                    <a href="#" class="text-dark text-decoration-none" style="font-size: 18px">
                        <i class="fab fa-fw fa-square-facebook"></i>
                        <span>facebook</span>
                    </a>
                    <a href="#" class="text-dark text-decoration-none" style="font-size: 18px">
                        <i class="fab fa-fw fa-square-whatsapp"></i>
                        <span>08218123</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
