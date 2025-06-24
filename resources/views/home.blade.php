@extends('layout.template')

@section('title', 'Beranda WebGIS')

@section('content')
    <!-- Hero Section -->
    <div class="min-vh-100 d-flex align-items-center justify-content-center text-white text-center px-4"
        style="background: url('https://images.unsplash.com/photo-1636549887186-232495930c54?w=1600&auto=format&fit=crop&q=80') center center / cover no-repeat; position: relative;">

        <!-- Soft Gradient Overlay -->
        <div
            style="position: absolute; top: 0; left: 0; height: 100%; width: 100%;
        background: linear-gradient(135deg, rgba(40,48,72,0.6), rgba(90,50,120,0.5));
        z-index: 1;">
        </div>

        <!-- Content -->
        <div class="container position-relative z-2">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h1 class="display-3 fw-bold animate__animated animate__fadeInDown mb-3"
                        style="text-shadow: 0 2px 6px rgba(0,0,0,0.5);">Laporan Interaktif Titik Sampah</h1>
                    <p class="lead animate__animated animate__fadeInUp mb-4"
                        style="font-size: 1.25rem; text-shadow: 0 1px 4px rgba(0,0,0,0.4);">
                        Laporkan titik-titik sampah di sekitarmu secara real-time melalui peta interaktif.
                    </p>

                    <a href="{{ route('login') }}"
                        class="btn btn-lg px-5 py-3 fw-semibold shadow border-0 animate__animated animate__zoomIn"
                        style="background: rgba(255, 255, 255, 0.2);
                            backdrop-filter: blur(6px);
                            color: #fff;
                            border-radius: 50px;
                            box-shadow: 0 0 8px rgba(255, 255, 255, 0.2);
                            transition: all 0.3s ease-in-out;
                            position: relative;"
                        onmouseover="this.style.backgroundColor='rgba(255, 213, 0, 0.3)';
                                    this.style.boxShadow='0 0 18px 4px rgba(255, 213, 0, 0.8)';
                                    this.style.color='#fff';"
                        onmouseout="this.style.backgroundColor='rgba(255, 255, 255, 0.2)';
                                    this.style.boxShadow='0 0 8px rgba(255, 255, 255, 0.2)';
                                    this.style.color='#fff';">
                        <i class="bi bi-send-fill me-2"></i> Laporkan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>




    <!-- Informasi Umum Sistem -->
    <section class="py-5 bg-light text-dark">
        <div class="container">
            <h2 class="text-center fw-bold mb-4">Kenali Sistem Kami</h2>
            <p class="text-center mb-5 mx-auto" style="max-width: 800px;">
                Sistem WebGIS ini memudahkan masyarakat dalam melaporkan keberadaan sampah secara spasial.
                Dikelola oleh Dinas Lingkungan Hidup, sistem ini bertujuan menciptakan kota yang lebih bersih,
                transparan, dan partisipatif.
            </p>

            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100 transition-scale hover-shadow">
                        <div class="mx-auto mb-3"
                            style="width: 80px; height: 80px; background-color: #e3f2fd; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <img src="https://img.icons8.com/fluency/48/filled-message.png" alt="Lapor">
                        </div>
                        <h5 class="fw-semibold">Lapor Mudah</h5>
                        <p class="small">Laporkan titik sampah hanya dengan beberapa klik—cukup unggah foto dan tandai
                            lokasi!</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100 transition-scale hover-shadow">
                        <div class="mx-auto mb-3"
                            style="width: 80px; height: 80px; background-color: #e8f5e9; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <img src="https://img.icons8.com/fluency/48/map.png" alt="Peta">
                        </div>
                        <h5 class="fw-semibold">Visual Interaktif</h5>
                        <p class="small">Lihat sebaran sampah dalam peta interaktif yang mudah digunakan dan diperbarui
                            real-time.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100 transition-scale hover-shadow">
                        <div class="mx-auto mb-3"
                            style="width: 80px; height: 80px; background-color: #fff3e0; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <img src="https://img.icons8.com/fluency/48/data-configuration.png" alt="Data Publik">
                        </div>
                        <h5 class="fw-semibold">Transparan & Terbuka</h5>
                        <p class="small">Semua laporan dapat diakses publik untuk mendorong kolaborasi dan tanggung jawab
                            bersama.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistik Dinamis (Dummy)
                    <section class="py-5 bg-dark text-white">
                        <div class="container text-center">
                            <h2 class="fw-bold mb-4">Statistik Laporan Terkini</h2>
                            <div class="row justify-content-center">
                                <div class="col-md-3 mb-3">
                                    <h3 class="fw-bold">2,384</h3>
                                    <p class="mb-0">Total Laporan</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <h3 class="fw-bold">1,220</h3>
                                    <p class="mb-0">Sudah Ditangani</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <h3 class="fw-bold">18</h3>
                                    <p class="mb-0">Laporan Hari Ini</p>
                                </div>
                            </div>
                        </div>
                    </section>-->

    <!-- CTA Section -->
    <section class="py-5 bg-success text-white text-center">
        <div class="container">
            <h2 class="fw-bold mb-3">Ayo Berpartisipasi Sekarang!</h2>
            <p class="mb-4">Bersama kita bisa menjaga kebersihan lingkungan. Laporkan sampah di sekitarmu!</p>
            <!--<a href="{{ route('login') }}" class="btn btn-warning fw-semibold px-4 py-2">Mulai Lapor Sekarang</a>-->
        </div>
    </section>

    <!-- Testimoni -->
    <section class="py-5 bg-white text-dark">
        <div class="container">
            <h2 class="text-center fw-bold mb-4">Apa Kata Masyarakat</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="p-4 bg-light rounded shadow-sm h-100">
                        <p class="fst-italic">"Saya jadi lebih mudah lapor tumpukan sampah di sekitar rumah. Sangat
                            membantu!"</p>
                        <h6 class="fw-bold mt-3 mb-0">- Rina, Jakarta</h6>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="p-4 bg-light rounded shadow-sm h-100">
                        <p class="fst-italic">"Tampilan peta sangat informatif dan laporan bisa diakses siapa saja."</p>
                        <h6 class="fw-bold mt-3 mb-0">- Dedi, Jakarta</h6>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="p-4 bg-light rounded shadow-sm h-100">
                        <p class="fst-italic">"Transparansi yang ditawarkan WebGIS ini membuat masyarakat lebih peduli."</p>
                        <h6 class="fw-bold mt-3 mb-0">- Lilis, Jakarta</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Video Edukasi Kebersihan -->
    <section class="py-5 bg-white text-dark">
        <div class="container">
            <h2 class="text-center fw-bold mb-4">Edukasi Kebersihan Lingkungan</h2>
            <div class="ratio ratio-16x9 rounded shadow-sm">
                <iframe src="https://www.youtube.com/embed/gCmmf9hL7R8" title="Edukasi Sampah untuk Masyarakat"
                    allowfullscreen></iframe>
            </div>
        </div>
    </section>


@endsection
