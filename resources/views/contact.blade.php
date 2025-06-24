@extends('layout.template')

@section('content')
<div class="container my-5">
    <div class="card shadow border-0">
        <div class="card-body p-5">
            <h3 class="mb-4 text-success fw-bold">
                <i class="fa-solid fa-address-book me-2"></i> Kontak & Informasi
            </h3>

            <p class="lead mb-4">Silakan hubungi kami untuk pertanyaan umum atau pelaporan masalah lingkungan di wilayah Anda.</p>

            <div class="row g-4">
                <div class="col-md-6">
                    <h5 class="fw-semibold">Kontak Tim Pengelola WebGIS</h5>
                    <ul class="list-unstyled fs-6 mt-3">
                        <li><i class="fa-solid fa-envelope me-2 text-primary"></i> Email: <a href="mailto:info@webgis-sampah.id">info@webgis-sampah.id</a></li>
                        <li><i class="fa-solid fa-phone me-2 text-primary"></i> Telepon: +62 812-3456-7890</li>
                        <li><i class="fa-solid fa-location-dot me-2 text-primary"></i> Alamat: Jl. Bersih No. 1, Jakarta</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5 class="fw-semibold">Layanan Pengaduan Sampah</h5>
                    <p class="text-muted small">Klik tautan sesuai kota domisili Anda:</p>
                    <ul class="list-group list-group-flush small">
                        <li class="list-group-item">
                            <i class="fa-solid fa-city me-2 text-success"></i>
                            <strong>Jakarta:</strong>
                            <a href="https://lingkunganhidup.jakarta.go.id/pengaduan" target="_blank">lingkunganhidup.jakarta.go.id</a>
                        </li>
                        <li class="list-group-item">
                            <i class="fa-solid fa-city me-2 text-success"></i>
                            <strong>Bandung:</strong>
                            <a href="https://dpkplh.bandung.go.id" target="_blank">dpkplh.bandung.go.id</a>
                        </li>
                        <li class="list-group-item">
                            <i class="fa-solid fa-city me-2 text-success"></i>
                            <strong>Surabaya:</strong>
                            <a href="https://dlh.surabaya.go.id" target="_blank">dlh.surabaya.go.id</a>
                        </li>
                        <li class="list-group-item">
                            <i class="fa-solid fa-city me-2 text-success"></i>
                            <strong>Yogyakarta:</strong>
                            <a href="https://dlh.jogjakota.go.id" target="_blank">dlh.jogjakota.go.id</a>
                        </li>
                        <li class="list-group-item">
                            <i class="fa-solid fa-city me-2 text-success"></i>
                            <strong>Medan:</strong>
                            <a href="https://dlh.pemkomedan.go.id" target="_blank">dlh.pemkomedan.go.id</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-5">
                <h5 class="fw-semibold">Lokasi Kantor Kami</h5>
                <iframe class="rounded shadow mt-3" src="https://maps.google.com/maps?q=jakarta&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        width="100%" height="300" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
