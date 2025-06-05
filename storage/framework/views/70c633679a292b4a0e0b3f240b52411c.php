<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">Data Points</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="pointsTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $points; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($p->id); ?></td>
                                <td><?php echo e($p->name); ?></td>
                                <td><?php echo e($p->description); ?></td>
                                <td>
                                    <img src="<?php echo e(asset('storage/images/' . $p->image)); ?>" alt=""
                                    width="120" class="img-thumbnail" title="<?php echo e($p->image); ?>">
                                </td>
                                <td><?php echo e($p->created_at); ?></td>
                                <td><?php echo e($p->updated_at); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mt-4">
        <div class="card-header">
            <h5 class="mb-0">Data Polylines</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="polylinesTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $polylines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($p->id); ?></td>
                                <td><?php echo e($p->name); ?></td>
                                <td><?php echo e($p->description); ?></td>
                                <td>
                                    <img src="<?php echo e(asset('storage/images/' . $p->image)); ?>" alt=""
                                    width="120" class="img-thumbnail" title="<?php echo e($p->image); ?>">
                                </td>
                                <td><?php echo e($p->created_at); ?></td>
                                <td><?php echo e($p->updated_at); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mt-4">
        <div class="card-header">
            <h5 class="mb-0">Data Polygons</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="polygonsTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $polygons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($p->id); ?></td>
                                <td><?php echo e($p->name); ?></td>
                                <td><?php echo e($p->description); ?></td>
                                <td>
                                    <img src="<?php echo e(asset('storage/images/' . $p->image)); ?>" alt=""
                                    width="120" class="img-thumbnail" title="<?php echo e($p->image); ?>">
                                </td>
                                <td><?php echo e($p->created_at); ?></td>
                                <td><?php echo e($p->updated_at); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
<script>
    let tablepoints = new DataTable('#pointsTable');
    let tablepolylines = new DataTable('#polylinesTable');
    let tablepolygons = new DataTable('#polygonsTable');
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Atika Putri\Documents\KULIAH VIBES\SMSTR 4\PGWEBL\pgwebl2\resources\views/table.blade.php ENDPATH**/ ?>