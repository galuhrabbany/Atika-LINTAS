@extends('layout.template')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
    <style>
        #map {
            width: 100%;
            height: calc(100vh - 56px);
        }
    </style>
@endsection


@section('content')
    <div id="map"></div>
    <!-- Modal Edit Point -->
    <div class="modal fade" id="editpointModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Larger and centered -->
            <div class="modal-content border-0 shadow-lg rounded-4">
                <!-- Header -->
                <div class="modal-header bg-warning text-dark rounded-top-4">
                    <h5 class="modal-title d-flex align-items-center gap-2">
                        <i class="fa-solid fa-pen-to-square"></i> Edit Titik Laporan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('points.update', $id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <!-- Nama Pelapor -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-dark">Nama Pelapor</label>
                                <input type="text" class="form-control shadow-sm" id="name" name="name" required>
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
                                <textarea class="form-control shadow-sm" id="description" name="description" rows="3"></textarea>
                            </div>

                            <!-- Alamat -->
                            <div class="col-12">
                                <label class="form-label fw-bold text-dark">Alamat</label>
                                <textarea class="form-control shadow-sm" id="alamat" name="alamat" rows="3"
                                    placeholder="Contoh: Jl. Merdeka No. 5"></textarea>
                            </div>

                            <!-- Foto -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-dark">Bukti</label>
                                <input type="file" class="form-control shadow-sm" id="image_point" name="image"
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
                        <button type="submit" class="btn btn-warning shadow-sm px-4">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/@terraformer/wkt"></script>

    <script>
        var map = L.map('map').setView([3.5937754, 98.6743927], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);


        /* Digitize Function */
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            draw: false,
            edit: {
                featureGroup: drawnItems,
                edit: true,
                remove: false
            }
        });

        map.addControl(drawControl);

        map.on('draw:edited', function(e) {
            var layers = e.layers;

            layers.eachLayer(function(layer) {
                var drawnJSONObject = layer.toGeoJSON();
                console.log(drawnJSONObject);

                var objectGeometry = Terraformer.geojsonToWKT(drawnJSONObject.geometry);
                console.log(objectGeometry);

                // layer properties
                var properties = drawnJSONObject.properties;
                console.log(properties);

                drawnItems.addLayer(layer);

                layer.on({
                    click: function(e) {
                        $('#name').val(properties.name);
                        $('#description').val(properties.description);
                        $('#alamat').val(properties.alamat); // ← tambahkan ini
                        $('#jenis_sampah').val(properties.jenis_sampah); // ← tambahkan ini
                        $('#geom_point').val(objectGeometry);
                        $('#preview-image-point').attr('src', "{{ asset('storage/images') }}/" +
                            properties.image);
                        $('#editpointModal').modal('show');
                    }
                });


                //menampilkan modal edit
                $('#editpointModal').modal('show');
            });
        });

        //GeoJSON Points
        var point = L.geoJson(null, {
            onEachFeature: function(feature, layer) {

                drawnItems.addLayer(layer);

                var properties = feature.properties;
                var objectGeometry = Terraformer.geojsonToWKT(feature.geometry);

                layer.on({
                    click: function(e) {
                        //menampilkan data ke dalam modal
                        $('#name').val(properties.name);
                        $('#description').val(properties.description);
                        $('#alamat').val(properties.alamat);
                        $('#jenis_sampah').val(properties.jenis_sampah);
                        $('#geom_point').val(objectGeometry);
                        $('#preview-image-point').attr('src', "{{ asset('storage/images') }}/" +
                            properties.image);

                        //menampilkan modal edit
                        $('#editpointModal').modal('show');
                    },
                });
            },
        });
        $.getJSON("{{ route('api.point', $id) }}", function(data) {
            point.addData(data);
            map.addLayer(point);
            map.fitBounds(point.getBounds(), {
                padding: [100, 100]
            });
        });
    </script>
@endsection
