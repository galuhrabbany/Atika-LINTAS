@extends('layout.template')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
    <style>
        #map {
            width: 95%;
            height: 80vh;
            margin: 20px auto;
            border: 3px solid #4e73df;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .map-toolbar {
            position: absolute;
            top: 20px;
            right: 30px;
            z-index: 1000;
            border-radius: 10px;
            padding: 8px 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .map-info-bar {
            font-size: 0.875rem;
            max-width: 280px;
        }
    </style>
@endsection

@section('content')
    <!-- Peta -->
    <div class="position-relative">
        <div id="map"></div>

        <!-- Toolbar atas kanan -->
        <div class="map-toolbar">
            <button class="btn btn-success btn-sm d-flex align-items-center gap-2 shadow-sm px-3 py-2"
                onclick="map.setView([-6.2006295, 111.1267090], 7)">
                <i class="fa-solid fa-rotate-left"></i>
                <span>Reset View</span>
            </button>
        </div>

        <!-- Info Lokasi dan Statistik -->
        <div class="map-info-bar mx-auto mt-3 bg-white rounded-3 shadow-sm p-3 border" style="max-width: 800px;">
            <div class="mb-2 text-muted small">
                Koordinat: <span id="mouse-coords">-</span>
            </div>
            <button class="btn btn-outline-primary btn-sm w-100 mb-3 shadow-sm" onclick="locateUser()">
                <i class="fa-solid fa-location-crosshairs me-1"></i> Lokasi Saya
            </button>
        </div>

        <br>

        <div class="d-flex gap-3">
        <!-- Box 1: Jumlah Laporan -->
        <div class="flex-fill bg-light border rounded-3 p-3 text-center shadow-sm">
            <div class="text-success mb-1">
                <i class="fa-solid fa-file-circle-check fa-lg"></i>
            </div>
            <div class="fw-semibold text-muted small">Laporan Masuk</div>
            <div class="fs-5 fw-bold text-dark" id="laporan-count">-</div>
        </div>

        <!-- Box 2: Update Terakhir -->
        <div class="flex-fill bg-light border rounded-3 p-3 text-center shadow-sm">
            <div class="text-primary mb-1">
                <i class="fa-solid fa-clock-rotate-left fa-lg"></i>
            </div>
            <div class="fw-semibold text-muted small">Update Terakhir</div>
            <div class="fs-6 fw-bold text-dark" id="last-updated">-</div>
        </div>
    </div>

    <!-- Modal Create Point -->
    <div class="modal fade" id="createpointModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Larger and centered -->
            <div class="modal-content border-0 shadow-lg rounded-4">
                <!-- Header -->
                <div class="modal-header bg-success text-white rounded-top-4">
                    <h5 class="modal-title d-flex align-items-center gap-2">
                        <i class="fa-solid fa-map-pin"></i> Tambah Titik Laporan
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Tutup"></button>
                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('points.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <!-- Nama Titik -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-dark">Nama Pelapor</label>
                                <input type="text" class="form-control shadow-sm" name="name" required
                                    placeholder="Contoh: Dina">
                            </div>

                            <!-- Jenis Sampah -->
                            <div class="col-12">
                                <label class="form-label fw-bold text-dark">Jenis Sampah</label>
                                <select class="form-select shadow-sm" name="jenis_sampah" id="jenis_sampah" required>
                                    <option value="" disabled selected>Pilih jenis sampah</option>
                                    <option value="Organik">Organik</option>
                                    <option value="Anorganik">Anorganik</option>
                                    <option value="B3">B3 (Bahan Berbahaya & Beracun)</option>
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                            <!-- Deskripsi -->
                            <div class="col-12">
                                <label class="form-label fw-bold text-dark">Deskripsi</label>
                                <textarea class="form-control shadow-sm" name="description" rows="3"
                                    placeholder="Ceritakan kondisi titik sampah..."></textarea>
                            </div>

                            <!-- Alamat -->
                            <div class="col-12">
                                <label class="form-label fw-bold text-dark">Alamat</label>
                                <textarea class="form-control shadow-sm" name="alamat" id="alamat" rows="3"
                                    placeholder="Contoh: Jl. Merdeka No. 5"></textarea>
                            </div>

                            <!-- Foto -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-dark">Bukti</label>
                                <input type="file" class="form-control shadow-sm" name="image"
                                    onchange="document.getElementById('preview-image-point').src = window.URL.createObjectURL(this.files[0])">
                                <img src="" id="preview-image-point"
                                    class="img-thumbnail mt-2 rounded-3 border border-secondary-subtle shadow-sm"
                                    width="100%">
                            </div>

                            <!-- Geometri -->
                            <div class="col-12">
                                <label class="form-label fw-bold text-dark">Geometry</label>
                                <textarea class="form-control shadow-sm bg-light text-muted" id="geom_point" name="geom_point" rows="2" readonly></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer bg-light rounded-bottom-4 px-4 py-3">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark me-1"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-success shadow-sm px-4">
                            <i class="fa-solid fa-paper-plane me-1"></i> Kirim Laporan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/@terraformer/wkt"></script>

    <script>
        var map = L.map('map').setView([-6.2006295, 111.1267090], 7);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);

        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            draw: {
                polyline: false,
                polygon: false,
                rectangle: false,
                circle: false,
                marker: true,
                circlemarker: false
            },
            edit: false
        });
        map.addControl(drawControl);

        map.on('draw:created', function(e) {
            var type = e.layerType,
                layer = e.layer;
            var drawnJSONObject = layer.toGeoJSON();
            var objectGeometry = Terraformer.geojsonToWKT(drawnJSONObject.geometry);

            if (type === 'marker') {
                $('#geom_point').val(objectGeometry);
                $('#createpointModal').modal('show');
            }

            drawnItems.addLayer(layer);
        });

        var iconSampah = L.icon({
            iconUrl: 'https://img.icons8.com/?size=100&id=KtLdJpNivpcV&format=png&color=000000',
            iconSize: [30, 30],
            iconAnchor: [15, 30],
            popupAnchor: [0, -30]
        });

        var point = L.geoJson(null, {
            pointToLayer: function(feature, latlng) {
                return L.marker(latlng, {
                    icon: iconSampah
                });
            },
            onEachFeature: function(feature, layer) {
                var routedelete = "{{ route('points.destroy', ':id') }}".replace(':id', feature.properties.id);
                var routeedit = "{{ route('points.edit', ':id') }}".replace(':id', feature.properties.id);

                const csrfToken = '{{ csrf_token() }}';
                const popupContent = `
                <div style="min-width:200px">
                    <strong>${feature.properties.name}</strong><br>
                    <small>${feature.properties.description}</small><br>
                    <small>${feature.properties.alamat}</small><br>
                    <small class="text-success fw-semibold">Jenis Sampah: ${feature.properties.jenis_sampah}</small><br>
                    <img src='{{ asset('storage/images') }}/${feature.properties.image}' class='img-fluid my-2' style='border-radius:8px;'>
                    <div class='d-flex justify-content-between mt-2'>
                        <a href='${routeedit}' class='btn btn-sm btn-warning'>
                            <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                        </a>
                        <form method='POST' action='${routedelete}'>
                            <input type="hidden" name="_token" value="${csrfToken}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type='submit' class='btn btn-sm btn-danger' onclick='return confirm("Yakin hapus?")'>
                                <i class="fa-solid fa-trash me-1"></i> Hapus
                            </button>
                        </form>
                    </div>
                    <small class="text-muted mt-1 d-block">Dibuat: ${feature.properties.created_at}</small>
                </div>
            `;
                layer.bindPopup(popupContent);
                layer.bindTooltip(feature.properties.name);
            }
        });

        $.getJSON("{{ route('api.points') }}", function(data) {
            point.addData(data);
            map.addLayer(point);

            $('#laporan-count').text(data.features.length);

            if (data.features.length > 0) {
                const latest = data.features
                    .map(f => new Date(f.properties.updated_at))
                    .sort((a, b) => b - a)[0];

                const formatted = latest.toLocaleString('id-ID', {
                    day: '2-digit', month: 'long', year: 'numeric',
                    hour: '2-digit', minute: '2-digit'
                });

                $('#last-updated').text(formatted);
            } else {
                $('#last-updated').text('-');
            }
        });

        L.control.layers(null, {
            "Titik Laporan": point
        }, {
            collapsed: false,
            position: 'bottomright'
        }).addTo(map);

        // Menampilkan koordinat mouse saat digerakkan
        map.on('mousemove', function(e) {
            document.getElementById("mouse-coords").textContent =
                `Lat: ${e.latlng.lat.toFixed(5)}, Lng: ${e.latlng.lng.toFixed(5)}`;
        });

        // Fungsi Lokasi Pengguna (Geolocation)
        function locateUser() {
            if (!navigator.geolocation) {
                alert("Browser tidak mendukung fitur geolokasi.");
                return;
            }

            navigator.geolocation.getCurrentPosition(
                function(position) {
                    const userLatLng = [position.coords.latitude, position.coords.longitude];
                    map.setView(userLatLng, 16);

                    L.marker(userLatLng, {
                        icon: L.icon({
                            iconUrl: "https://img.icons8.com/ultraviolet/40/user-location.png",
                            iconSize: [32, 32],
                            iconAnchor: [16, 32]
                        })
                    }).addTo(map).bindPopup("Anda di sini").openPopup();
                },
                function() {
                    alert("Gagal mendapatkan lokasi.");
                }
            );
        }
    </script>
@endsection
