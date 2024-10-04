

<?php $__env->startSection('title'); ?>
    <?php echo e(@$data['title'] ?? 'Classes'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content">

        
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1"><?php echo e($data['title'] ?? 'Classes'); ?></h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><?php echo e($data['title'] ?? 'Classes'); ?></li>
                    </ol>
                </div>
            </div>
        </div>
        

        <!-- Table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><?php echo e($data['title'] ?? 'Classes'); ?></h4>
                    <?php if(hasPermission('class_create')): ?>
                    <a href="<?php echo e(route('classes.create')); ?>" class="btn btn-lg ot-btn-primary">
                        <span><i class="fa-solid fa-plus"></i> </span>
                        <span class="">Add Class</span>
                    </a>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead">
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Trainer Name</th>
                                    <th>Class Time</th>
                                    <th>Capacity</th>
                                    <?php if(hasPermission('class_update') || hasPermission('class_delete')): ?>
                                    <th>Actions</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                <?php $__empty_1 = true; $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr id="row_<?php echo e($class->id); ?>">
                                        <td class="serial"><?php echo e($key + 1); ?></td>
                                        <td><?php echo e($class->trainer->user->name); ?></td>
                                        <td><?php echo e($class->class_time); ?></td>
                                        <td><?php echo e($class->capacity); ?></td>
                                        <?php if(hasPermission('class_update') || hasPermission('class_delete')): ?>
                                        <td>
                                            <div class="dropdown dropdown-action">
                                                <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <?php if(hasPermission('class_update')): ?>
                                                    <li>
                                                        <a class="dropdown-item" href="<?php echo e(route('classes.edit', $class->id)); ?>">
                                                            <span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
                                                            <span>Edit</span>
                                                        </a>
                                                    </li>
                                                    <?php endif; ?>
                                                    <?php if(hasPermission('class_delete')): ?>
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:void(0);" 
                                                           onclick="delete_row('<?php echo e(route('classes.delete', $class->id)); ?>', <?php echo e($class->id); ?>)">
                                                            <span class="icon mr-12"><i class="fa-solid fa-trash-can"></i></span>
                                                            <span>Delete</span>
                                                        </a>
                                                    </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="text-center gray-color">
                                            <img src="<?php echo e(asset('images/no_data.svg')); ?>" alt="No Data" width="100">
                                            <p class="mb-0">No classes found.</p>
                                            <p class="text-secondary">Please add a new class.</p>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="ot-pagination pagination-content d-flex justify-content-end align-content-center py-3">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php echo $classes->links(); ?>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table content end -->

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<?php echo $__env->make('backend.partials.delete-ajax', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-stater-kits\resources\views/classes/index.blade.php ENDPATH**/ ?>