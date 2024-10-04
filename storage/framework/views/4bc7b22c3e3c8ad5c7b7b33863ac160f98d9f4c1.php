

<?php $__env->startSection('title'); ?>
    <?php echo e(@$data['title'] ?? 'Edit Class'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content">

        
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1"><?php echo e($data['title'] ?? 'Edit Class'); ?></h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('classes.index')); ?>">Classes</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
        

        <div class="card ot-card">
            <div class="card-header">
                <h4><?php echo e(___('common.edit')); ?> Class</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('classes.update', $class->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <!-- Trainer Selection -->
                            <label for="trainer_id" class="form-label"><?php echo e(___('common.trainer')); ?> <span class="fillable">*</span></label>
                            <select class="form-select ot-input <?php $__errorArgs = ['trainer_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="trainer_id" id="trainer_id" required>
                                <option value=""><?php echo e(___('common.select_trainer')); ?></option>
                                <?php $__currentLoopData = $trainers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trainer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($trainer->id); ?>" <?php echo e($trainer->id == $class->trainer_id ? 'selected' : ''); ?>>
                                        <?php echo e($trainer->user->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['trainer_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            <!-- Class Time -->
                            <label for="class_time" class="form-label"><?php echo e(___('common.class_time')); ?> <span class="fillable">*</span></label>
                            <input type="datetime-local" name="class_time" class="form-control ot-input <?php $__errorArgs = ['class_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   value="<?php echo e(\Carbon\Carbon::parse($class->class_time)->format('Y-m-d\TH:i')); ?>" required>
                            <?php $__errorArgs = ['class_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            <!-- Capacity -->
                            <label for="capacity" class="form-label"><?php echo e(___('common.capacity')); ?> <span class="fillable">*</span></label>
                            <input type="number" name="capacity" class="form-control ot-input <?php $__errorArgs = ['capacity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   value="<?php echo e($class->capacity); ?>" min="1" required>
                            <?php $__errorArgs = ['capacity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="col-md-12 mt-24 text-end">
                        <button class="btn btn-lg ot-btn-primary"><span><i class="fa-solid fa-save"></i></span> <?php echo e(___('common.update')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-stater-kits\resources\views/classes/edit.blade.php ENDPATH**/ ?>