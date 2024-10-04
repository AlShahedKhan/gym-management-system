
<?php $__env->startSection('title'); ?>
<?php echo e(@$data['title'] ?? 'Edit Trainer'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(hasPermission('trainer_update')): ?>
<div class="page-content">

    
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="bradecrumb-title mb-1"><?php echo e($data['title'] ?? 'Edit Trainer'); ?></h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('trainers.index')); ?>"><?php echo e($data['title'] ?? 'Trainers'); ?></a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
    

    <div class="card ot-card">
        <div class="card-header">
            <h4><?php echo e(___('common.edit')); ?></h4>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('trainers.update', $trainer->id)); ?>" method="POST" enctype="multipart/form-data" id="editTrainerForm">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="row mb-3">
                    <div class="col-lg-6">
                        <div class="row">

                            <!-- User ID Dropdown -->
                            <div class="col-md-12 mb-3">
                                <label for="user_id" class="form-label"><?php echo e(___('common.user')); ?> <span class="fillable">*</span></label>
                                <select class="form-select ot-input <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="user_id" id="user_id" required>
                                    <option value=""><?php echo e(___('common.select_user')); ?></option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>" <?php echo e($user->id == $trainer->user_id ? 'selected' : ''); ?>>
                                        <?php echo e($user->name); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['user_id'];
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
                            </div>

                            <!-- Expertise Input -->
                            <div class="col-md-12 mb-3">
                                <label for="expertise" class="form-label"><?php echo e(___('common.expertise')); ?> <span class="fillable">*</span></label>
                                <input type="text" name="expertise" class="form-control ot-input <?php $__errorArgs = ['expertise'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="expertise" value="<?php echo e($trainer->expertise); ?>" placeholder="<?php echo e(___('common.enter_expertise')); ?>" required>
                                <?php $__errorArgs = ['expertise'];
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
                            </div>

                            <!-- Availability Textarea -->
                            <div class="col-md-12 mb-3">
                                <label for="availability" class="form-label"><?php echo e(___('common.availability')); ?></label>
                                <textarea name="availability" id="availability" class="form-control ot-input <?php $__errorArgs = ['availability'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="<?php echo e(___('common.enter_availability')); ?>"><?php echo e($trainer->availability); ?></textarea>
                                <?php $__errorArgs = ['availability'];
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
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-24 text-end">
                    <button class="btn btn-lg ot-btn-primary"><span><i class="fa-solid fa-save"></i></span> <?php echo e(___('common.update')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-stater-kits\resources\views/trainers/edit.blade.php ENDPATH**/ ?>