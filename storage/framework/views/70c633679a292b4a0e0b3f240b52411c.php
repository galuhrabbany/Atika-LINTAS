<?php $__env->startSection('content'); ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            //loop points data
            <?php $__currentLoopData = $points; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($p->id); ?></td>
                <td><?php echo e($p->name); ?></td>
                <td><?php echo e($p->description); ?></td>
                <td>
                    <img src="<?php echo e(asset('storage/images/' . $p->image)); ?>" alt=""
                    width="200" title="<?php echo e($p->image); ?>">
                </td>
                <td><?php echo e($p->image); ?></td>
                <td><?php echo e($p->created_at); ?></td>
                <td><?php echo e($p->updated_at); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Atika Putri\Documents\KULIAH VIBES\SMSTR 4\PGWEBL\pgwebl2\resources\views/table.blade.php ENDPATH**/ ?>