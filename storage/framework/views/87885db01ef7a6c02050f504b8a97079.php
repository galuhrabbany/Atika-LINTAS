<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
    <style>
        #map {
            width: 100%;
            height: calc(100vh - 56px);
        }
    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div id="map"></div>

    <!-- Modal Create Point -->
    <div class="modal fade" id="createpointModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Point</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="<?php echo e(route('points.store')); ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Fill Point Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="geom_point" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_point" name="geom_point" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="image_point" name="image"
                                onchange="document.getElementById('preview-image-point').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <img src="" alt="" id="preview-image-point" class="img-thumbnail" width="300">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Create Polyline -->
    <div class="modal fade" id="createpolylineModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Polyline</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="<?php echo e(route('polylines.store')); ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Fill Polyline Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="geom_polyline" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_polyline" name="geom_polyline" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="image_polyline" name="image"
                                onchange="document.getElementById('preview-image-polyline').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <img src="" alt="" id="preview-image-polyline" class="img-thumbnail"
                            width="300">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Create Polygon -->
    <div class="modal fade" id="createpolygonModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Polygon</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="<?php echo e(route('polygons.store')); ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Fill Polygon Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="geom_polygon" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_polygon" name="geom_polygon" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="image_polygon" name="image"
                                onchange="document.getElementById('preview-image-polygon').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <img src="" alt="" id="preview-image-polygon" class="img-thumbnail"
                            width="300">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
            draw: {
                position: 'topleft',
                polyline: true,
                polygon: true,
                rectangle: true,
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

            console.log(type);

            var drawnJSONObject = layer.toGeoJSON();
            var objectGeometry = Terraformer.geojsonToWKT(drawnJSONObject.geometry);

            console.log(drawnJSONObject);
            // console.log(objectGeometry);

            // condition

            // nanti memunculkan polyline
            if (type === 'polyline') {
                $('#geom_polyline').val(objectGeometry);

                // memunculkan modal create polyline
                $('#createpolylineModal').modal('show');

                console.log("Create " + type);

                // nanti memunculkan polygon
            } else if (type === 'polygon' || type === 'rectangle') {
                $('#geom_polygon').val(objectGeometry);
                // memunculkan modal create polygon
                $('#createpolygonModal').modal('show');

                console.log("Create " + type);

                // nanti memunculkan marker
            } else if (type === 'marker') {
                console.log("Create " + type);

                $('#geom_point').val(objectGeometry);

                // memunculkan modal create marker
                $('#createpointModal').modal('show');

            } else {
                console.log('__undefined__');
            }

            drawnItems.addLayer(layer);
        });

        //GeoJSON Points
        var point = L.geoJson(null, {
            onEachFeature: function(feature, layer) {

                var routedelete = "<?php echo e(route('points.destroy', ':id')); ?>";
                routedelete = routedelete.replace(':id', feature.properties.id);

                var routeedit = "<?php echo e(route('points.edit', ':id')); ?>";
                routeedit = routeedit.replace(':id', feature.properties.id);

                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Deskripsi: " + feature.properties.description + "<br>" +
                    "Dibuat: " + feature.properties.created_at + "<br>" +
                    "<img src='<?php echo e(asset('storage/images')); ?>/" + feature.properties.image +
                    "' width='200' alt=''>" + "<br>" +
                    "<div class='row mt-4'>" +
                    "<div class='col-6 text-end'>" +
                    "<a href ='"+routeedit+"' class='btn btn-warning btn-sm'><i class='fa-solid fa-pencil'></i></a>" +
                    "</div>" +
                    "<div class='col-6 text-start'>" +
                    "<form method='POST' action='" + routedelete + "'>" +
                    '<?php echo csrf_field(); ?>' + '<?php echo method_field('DELETE'); ?>' +
                    "<button type='submit' class='btn btn-danger btn-sm' onclick='return confirm(`Yakin akan di hapus?`)'><i class='fa-solid fa-trash'></i></button>" +
                    "</form>" +
                    "</div>" +
                    "</div>" + "<br>" + "<p>Dibuat: " + feature.properties.user_created + "</p>";

                layer.on({
                    click: function(e) {
                        point.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        point.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("<?php echo e(route('api.points')); ?>", function(data) {
            point.addData(data);
            map.addLayer(point);
        });

        //GeoJSON Polylines
        var polyline = L.geoJson(null, {
            onEachFeature: function(feature, layer) {

                var routedelete = "<?php echo e(route('polylines.destroy', ':id')); ?>";
                routedelete = routedelete.replace(':id', feature.properties.id);

                var routeedit = "<?php echo e(route('polylines.edit', ':id')); ?>";
                routeedit = routeedit.replace(':id', feature.properties.id);

                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Deskripsi: " + feature.properties.description + "<br>" +
                    "Panjang: " + feature.properties.length_km.toFixed(2) + "km <br>" +
                    "Dibuat: " + feature.properties.created_at + "<br>" +
                    "<img src='<?php echo e(asset('storage/images')); ?>/" + feature.properties.image +
                    "' width='200' alt=''>" + "<br>" +
                    "<div class='row mt-4'>" +
                    "<div class='col-6 text-end'>" +
                    "<a href ='"+routeedit+"' class='btn btn-warning btn-sm'><i class='fa-solid fa-pencil'></i></a>" +
                    "</div>" +
                    "<div class='col-6 text-start'>" +
                    "<form method='POST' action='" + routedelete + "'>" +
                    '<?php echo csrf_field(); ?>' + '<?php echo method_field('DELETE'); ?>' +
                    "<button type='submit' class='btn btn-danger btn-sm' onclick='return confirm(`Yakin akan di hapus?`)'><i class='fa-solid fa-trash'></i></button>" +
                    "</form>" +
                    "</div>" +
                    "</div>" + "<br>" + "<p>Dibuat: " + feature.properties.user_created + "</p>";

                layer.on({
                    click: function(e) {
                        polyline.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polyline.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("<?php echo e(route('api.polylines')); ?>", function(data) {
            polyline.addData(data);
            map.addLayer(polyline);
        });

        //GeoJSON Polygons
        var polygon = L.geoJson(null, {
            onEachFeature: function(feature, layer) {

                var routedelete = "<?php echo e(route('polygons.destroy', ':id')); ?>";
                routedelete = routedelete.replace(':id', feature.properties.id);

                var routeedit = "<?php echo e(route('polygons.edit', ':id')); ?>";
                routeedit = routeedit.replace(':id', feature.properties.id);

                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Deskripsi: " + feature.properties.description + "<br>" +
                    "Luas: " + feature.properties.area_hektar.toFixed(2) + "Ha <br>" +
                    "Dibuat: " + feature.properties.created_at + "<br>" +
                    "<img src='<?php echo e(asset('storage/images')); ?>/" + feature.properties.image +
                    "' width='200' alt=''>" + "<br>" +
                    "<div class='row mt-4'>" +
                    "<div class='col-6 text-end'>" +
                    "<a href ='"+routeedit+"' class='btn btn-warning btn-sm'><i class='fa-solid fa-pencil'></i></a>" +
                    "</div>" +
                    "<div class='col-6 text-start'>" +
                    "<form method='POST' action='" + routedelete + "'>" +
                    '<?php echo csrf_field(); ?>' + '<?php echo method_field('DELETE'); ?>' +
                    "<button type='submit' class='btn btn-danger btn-sm' onclick='return confirm(`Yakin akan di hapus?`)'><i class='fa-solid fa-trash'></i></button>" +
                    "</form>" +
                    "</div>" +
                    "</div>" + "<br>" + "<p>Dibuat: " + feature.properties.user_created + "</p>";

                layer.on({
                    click: function(e) {
                        polygon.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polygon.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("<?php echo e(route('api.polygons')); ?>", function(data) {
            polygon.addData(data);
            map.addLayer(polygon);
        });

        // Layer Control
        var baseMaps = {
            "OpenStreetMap": L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png')
        };

        var overlayMaps = {
            "Points": point,
            "Polylines": polyline,
            "Polygons": polygon
        };

        L.control.layers(baseMaps, overlayMaps, {
            collapsed: false,
            position: 'bottomright'
        }).addTo(map);
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Atika Putri\Documents\KULIAH VIBES\SMSTR 4\PGWEBL\pgwebl2\resources\views/map.blade.php ENDPATH**/ ?>