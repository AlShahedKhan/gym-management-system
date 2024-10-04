<ul class="serch-sagetion">
    <?php $__currentLoopData = $targets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $target): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="single-list">
        <a href="<?php echo e(url($target->url)); ?>" class="singlePage-link"><?php echo e($target->url); ?></a>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH C:\laragon\www\laravel-stater-kits\resources\views/backend/menu-autocomplete.blade.php ENDPATH**/ ?>