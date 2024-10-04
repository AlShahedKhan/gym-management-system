

<?php $__env->startSection('title'); ?>
    <?php echo e(@$data['title'] ?? 'Create Trainer'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(hasPermission('trainer_create')): ?>
    <div class="page-content">
        <div class="card ot-card border-0 ph-14 pv-14 mb-24">
            <div class="card-body pt-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ot-breadcrumb-secondary mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(___('common.home')); ?></a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('trainers.index')); ?>"><?php echo e(___('common.trainers')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(___('common.add_new')); ?></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card ot-card">
            <div class="card-body">
                <form action="<?php echo e(route('trainers.store')); ?>" method="POST" enctype="multipart/form-data" id="trainerForm">
                    <?php echo csrf_field(); ?>
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
                                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
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
                                           id="expertise" placeholder="<?php echo e(___('common.enter_expertise')); ?>" required>
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

                                <!-- Availability Input -->
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
                                              placeholder="<?php echo e(___('common.enter_availability')); ?>"></textarea>
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
                        <button class="btn btn-lg ot-btn-primary"><span><i class="fa-solid fa-save"></i></span> <?php echo e(___('common.submit')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-stater-kits\resources\views/trainers/create.blade.php ENDPATH**/ ?>