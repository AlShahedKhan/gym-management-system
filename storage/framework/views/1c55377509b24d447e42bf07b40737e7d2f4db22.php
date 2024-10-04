<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <a href="<?php echo e(route('dashboard')); ?>">
                <input type="hidden" name="global_light_logo" id="global_light_logo"
                    value="<?php echo e(@globalAsset(setting('light_logo'), '154x38.png')); ?>" />
                <input type="hidden" name="global_dark_logo" id="global_dark_logo"
                    value="<?php echo e(@globalAsset(setting('dark_logo'), '154x38.png')); ?>" />

                <img id="sidebar_full_logo" class="full-logo setting-image"
                    src="<?php echo e(userTheme() == 'default-theme' ? @globalAsset(setting('light_logo'), '154x38.png') : @globalAsset(setting('dark_logo'), '154x38.png')); ?>"
                    alt="" />

                <img class="half-logo" src="<?php echo e(globalAsset(setting('favicon'), '38x38.png')); ?>" alt="" />
            </a>
        </div>

        <button class="half-expand-toggle sidebar-toggle">
            <img src="<?php echo e(asset('backend')); ?>/assets/images/icons/collapse-arrow.svg" alt="" />
        </button>
        <button class="close-toggle sidebar-toggle">
            <img src="<?php echo e(asset('backend')); ?>/assets/images/icons/collapse-arrow.svg" alt="" />
        </button>
    </div>

    <div class="sidebar-menu srollbar">
        <div class="sidebar-menu-section">
            <!--Admin Tools Start -->
            <h6 class="sidebar-menu-section-heading">
                <?php echo e(___('cricket.admin')); ?> <span class="on-half-expanded"> <?php echo e(___('cricket.tools')); ?></span>
            </h6>
            <!--Admin Tools End -->

            <!-- parent menu list start  -->
            <ul class="sidebar-dropdown-menu parent-menu-list">
                <li class="sidebar-menu-item">
                    <a href="#" class="parent-item-content has-arrow">
                        
                        <i class="las la-tachometer-alt"></i>
                        <span class="on-half-expanded"><?php echo e(___('common.dashboard')); ?></span>
                    </a>
                    <ul class="child-menu-list">
                        <li class="sidebar-menu-item <?php echo e(set_menu(['dashboard'])); ?>">
                            <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(___('common.default_dashboard')); ?></a>
                        </li>
                    </ul>
                </li>
                <?php if(hasPermission('user_read') || hasPermission('role_read')): ?>
                    <li class="sidebar-menu-item <?php echo e(set_menu(['users*', 'roles*'])); ?>">
                        <a class="parent-item-content has-arrow">
                            
                            <i class="las la-user-tag"></i>
                            <span class="on-half-expanded"><?php echo e(___('common.users_&_roles')); ?></span>
                        </a>

                        <!-- second layer child menu list start  -->

                        <ul class="child-menu-list">
                            <?php if(hasPermission('role_read')): ?>
                                <li class="sidebar-menu-item <?php echo e(set_menu(['roles*'])); ?>">
                                    <a href="<?php echo e(route('roles.index')); ?>"><?php echo e(___('users_roles.roles')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(hasPermission('user_read')): ?>
                                <li class="sidebar-menu-item <?php echo e(set_menu(['users*'])); ?>">
                                    <a href="<?php echo e(route('users.index')); ?>"><?php echo e(___('users_roles.users')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- second layer child menu list end  -->

                <!-- Language layout start -->
                <?php if(hasPermission('trainer_read')): ?>
                    <li class="sidebar-menu-item <?php echo e(set_menu(['trainers*'])); ?>">
                        <a href="<?php echo e(route('trainers.index')); ?>" class="parent-item-content">
                            <i class="las la-language"></i>
                            <span class="on-half-expanded"><?php echo e(___('common.trainers')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(hasPermission('class_read')): ?>
                    <li class="sidebar-menu-item <?php echo e(set_menu(['classes*'])); ?>">
                        <a href="<?php echo e(route('classes.index')); ?>" class="parent-item-content">
                            <i class="las la-language"></i>
                            <span class="on-half-expanded"><?php echo e(___('common.classes')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(hasPermission('booking_read')): ?>
                    <li class="sidebar-menu-item <?php echo e(set_menu(['bookings*'])); ?>">
                        <a href="<?php echo e(route('bookings.index')); ?>" class="parent-item-content">
                            <i class="las la-language"></i>
                            <span class="on-half-expanded"><?php echo e(___('common.bookings')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                
                <!-- Language layout end -->

                <!-- Components Layout End -->
            </ul>
            <!-- parent menu list end  -->
            
            <!-- parent menu list start  -->
            <ul class="sidebar-dropdown-menu parent-menu-list">
                

                 <!--football Start -->
                 <!-- <li class="sidebar-menu-item <?php echo e(set_menu(['football_scores'])); ?>">
                    <a href="<?php echo e(url('football_scores')); ?>" class="parent-item-content">
                        <i class="fa-regular fa-futbol"></i>
                        <span class="on-half-expanded"><?php echo e(___('football.football')); ?> </span>
                    </a>
                </li> -->
                <!--football End -->
            </ul>
            <!-- parent menu list end  -->
        </div>
    </div>
</aside>
<?php /**PATH C:\laragon\www\laravel-stater-kits\resources\views/backend/partials/sidebar.blade.php ENDPATH**/ ?>