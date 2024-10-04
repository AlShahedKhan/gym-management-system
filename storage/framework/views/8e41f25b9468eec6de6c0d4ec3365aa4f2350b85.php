<header class="header">
    <button class="close-toggle sidebar-toggle p-0">
        <img src="<?php echo e(asset('backend')); ?>/assets/images/icons/hammenu-2.svg" alt="" />
    </button>
    <div class="spacing-icon">
        <div class="header-search tab-none">
            <div class="search-icon">
                <i class="las la-search"></i>
            </div>

            
            <input class="search-field ot-input" type="text" placeholder="Search Page" id="menuSearch"/>
            <div id="autoCompleteData" class="d-nones">
            </div>
        </div>

        <div class="header-controls">
            <div class="header-control-item md-none">
                <div class="item-content language-currceny-container">
                    <button class="language-currency-btn d-flex align-items-center mt-0" type="button" id="language_change"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="icon-flag">
                            <i class="<?php echo e(@$data['language']->icon_class); ?> rounded-circle icon"></i>
                        </div>
                        <h6><?php echo e(@$data['language']->name); ?></h6>
                    </button>

                    <div class="language-currency-dropdown dropdown-menu dropdown-menu-end top-navbar-dropdown-menu ot-card"
                        aria-labelledby="language_change">

                        <div class="lanuage-currency-">
                            <div class="dropdown-item-list language-list mb-20">
                                <h5><?php echo e(___('common.language')); ?></h5>
                                <select name="language" id="language_with_flag"
                                    class="form-select ot-input mb-3 language-change" aria-label="Default select example">
                                    <?php $__currentLoopData = $data['languages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option data-icon="<?php echo e($row->icon_class); ?>" value="<?php echo e($row->code); ?>"
                                            <?php echo e($row->code == \Cache::get('locale') ? 'selected' : ''); ?>>
                                            <?php echo e($row->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="header-control-item">
                <div class="item-content dropdown md-none">
                    <button class="mt-0" onclick="javascript:toggleFullScreen()">
                        <img class="icon" src="<?php echo e(asset('backend/assets/images/icons/full-screen.svg')); ?>" alt="check in" />
                    </button>
                </div>
            </div>
            <div class="header-control-item md-none">
                <div class="item-content">
                    <button class="mt-0" type="button" id="topbar_messages" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img class="icon" src="<?php echo e(asset('backend/assets/images/icons/message-notify.svg')); ?>"
                            alt="notification" />
                    </button>

                    <div class="dropdown-menu dropdown-menu-end topbar-dropdown-menu ot-card pv-32 ph-16"
                        aria-labelledby="topbar_messages">
                        <div class="topbar-dropdown-header">
                            <h1>Messages</h1>
                        </div>
                        <div class="srollbar scroll-fix height-350">
                            
                            <div class="topbar-dropdown-content">
                                <a class="dropdown-item topbar-dropdown-item d-flex align-items-start" href="#">
                                    <div class="item-avater">
                                        <img src="<?php echo e(asset('backend/assets/images/icons/user1.png')); ?>"
                                            alt="User" />
                                        <div class="item-badge active"></div>
                                    </div>
                                    <div class="item-content">
                                        <h6 class="message">
                                            Jarret Waelchi
                                            <span>When do you release the coded template...</span>
                                        </h6>
                                    </div>
                                    <div class="item-status">
                                        <span class="time"> 03:30PM </span>
                                        <span class="status-dot"></span>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="topbar-dropdown-content">
                                <a class="dropdown-item topbar-dropdown-item d-flex align-items-start" href="#">
                                    <div class="item-avater">
                                        <img src="<?php echo e(asset('backend/assets/images/icons/user2.png')); ?>"
                                            alt="User" />
                                        <div class="item-badge active"></div>
                                    </div>
                                    <div class="item-content">
                                        <h6 class="message">
                                            Jarret Waelchi
                                            <span>When do you release the coded template...</span>
                                        </h6>
                                    </div>
                                    <div class="item-status">
                                        <span class="time"> 03:30PM </span>
                                        <span class="status-dot"></span>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="topbar-dropdown-content">
                                <a class="dropdown-item topbar-dropdown-item d-flex align-items-start" href="#">
                                    <div class="item-avater">
                                        <img src="<?php echo e(asset('backend/assets/images/icons/user3.png')); ?>"
                                            alt="User" />
                                        <div class="item-badge active"></div>
                                    </div>
                                    <div class="item-content">
                                        <h6 class="message">
                                            Jarret Waelchi
                                            <span>When do you release the coded template...</span>
                                        </h6>
                                    </div>
                                    <div class="item-status">
                                        <span class="time"> 03:30PM </span>
                                        <span class="status-dot"></span>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="topbar-dropdown-content unseen">
                                <a class="dropdown-item topbar-dropdown-item d-flex align-items-start" href="#">
                                    <div class="item-avater">
                                        <img src="<?php echo e(asset('backend/assets/images/icons/user3.png')); ?>"
                                            alt="User" />
                                        <div class="item-badge active"></div>
                                    </div>
                                    <div class="item-content">
                                        <h6 class="message">
                                            Jarret Waelchi
                                            <span>When do you release the coded template...</span>
                                        </h6>
                                    </div>
                                    <div class="item-status">
                                        <span class="time"> 03:30PM </span>
                                        <span class="status-dot"></span>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="topbar-dropdown-content">
                                <a class="dropdown-item topbar-dropdown-item d-flex align-items-start" href="#">
                                    <div class="item-avater">
                                        <img src="<?php echo e(asset('backend/assets/images/icons/user4.png')); ?>"
                                            alt="User" />
                                        <div class="item-badge active"></div>
                                    </div>
                                    <div class="item-content">
                                        <h6 class="message">
                                            Jarret Waelchi
                                            <span>When do you release the coded template...</span>
                                        </h6>
                                    </div>
                                    <div class="item-status">
                                        <span class="time"> 03:30PM </span>
                                        <span class="status-dot"></span>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="topbar-dropdown-content">
                                <a class="dropdown-item topbar-dropdown-item d-flex align-items-start" href="#">
                                    <div class="item-avater">
                                        <img src="<?php echo e(asset('backend/assets/images/icons/user5.png')); ?>"
                                            alt="User" />
                                        <div class="item-badge active"></div>
                                    </div>
                                    <div class="item-content">
                                        <h6 class="message">
                                            Jarret Waelchi
                                            <span>When do you release the coded template...</span>
                                        </h6>
                                    </div>
                                    <div class="item-status">
                                        <span class="time"> 03:30PM </span>
                                        <span class="status-dot"></span>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="topbar-dropdown-content">
                                <a class="dropdown-item topbar-dropdown-item d-flex align-items-start" href="#">
                                    <div class="item-avater">
                                        <img src="<?php echo e(asset('backend/assets/images/icons/user6.png')); ?>"
                                            alt="User" />
                                        <div class="item-badge active"></div>
                                    </div>
                                    <div class="item-content">
                                        <h6 class="message">
                                            Jarret Waelchi
                                            <span>When do you release the coded template...</span>
                                        </h6>
                                    </div>
                                    <div class="item-status">
                                        <span class="time"> 03:30PM </span>
                                        <span class="status-dot"></span>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="topbar-dropdown-content">
                                <a class="dropdown-item topbar-dropdown-item d-flex align-items-start" href="#">
                                    <div class="item-avater">
                                        <img src="<?php echo e(asset('backend/assets/images/icons/user7.png')); ?>"
                                            alt="User" />
                                        <div class="item-badge active"></div>
                                    </div>
                                    <div class="item-content">
                                        <h6 class="message">
                                            Jarret Waelchi
                                            <span>When do you release the coded template...</span>
                                        </h6>
                                    </div>
                                    <div class="item-status">
                                        <span class="time"> 03:30PM </span>
                                        <span class="status-dot"></span>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="topbar-dropdown-content">
                                <a class="dropdown-item topbar-dropdown-item d-flex align-items-start" href="#">
                                    <div class="item-avater">
                                        <img src="<?php echo e(asset('backend/assets/images/icons/user8.png')); ?>"
                                            alt="User" />
                                        <div class="item-badge active"></div>
                                    </div>
                                    <div class="item-content">
                                        <h6 class="message">
                                            Jarret Waelchi
                                            <span>When do you release the coded template...</span>
                                        </h6>
                                    </div>
                                    <div class="item-status">
                                        <span class="time"> 03:30PM </span>
                                        <span class="status-dot"></span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <a class="topbar-dropdown-footer ot-btn-primary w-100" href="<?php echo e(url('chat')); ?>">
                                See All Messages
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-control-item md-none">
                <div class="item-content">
                    <button class="mt-0" type="button" id="topbar_notifications" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img class="icon" src="<?php echo e(asset('backend/assets/images/icons/notification.svg')); ?>"
                            alt="notification" />
                    </button>

                    <div class="dropdown-menu dropdown-menu-end topbar-dropdown-menu ot-card pv-32 ph-16"
                        aria-labelledby="topbar_notifications">
                        <div class="topbar-dropdown-header">
                            <h1>Notifications</h1>
                        </div>

                        <div class="srollbar scroll-fix height-350">
                            
                            <div class="topbar-dropdown-content">
                                <a class="dropdown-item topbar-dropdown-item d-flex align-items-start" href="#">
                                    <div class="item-avater">
                                        <img src="<?php echo e(asset('backend/assets/images/icons/user1.png')); ?>"
                                            alt="User" />
                                        <div class="item-badge item-icon-badge">
                                            <i class="fa-solid fa-star text-white">&starf;</i>
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <h6 class="notification">
                                            Dominca <span> @domenica<br /> commented on</span> Smiles - 3D
                                            Icons
                                        </h6>
                                    </div>
                                    <div class="item-status">
                                        <span class="time"> 2h </span>
                                        <span class="status-dot active"></span>
                                    </div>
                                </a>
                            </div>
                             
                             <div class="topbar-dropdown-content">
                                <a class="dropdown-item topbar-dropdown-item d-flex align-items-start" href="#">
                                    <div class="item-avater">
                                        <img src="<?php echo e(asset('backend/assets/images/icons/user2.png')); ?>"
                                            alt="User" />
                                        <div class="item-badge item-icon-badge">
                                            <i class="fa-solid fa-star text-white">&starf;</i>
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <h6 class="notification">
                                            Dominca <span> @domenica<br /> commented on</span> Smiles - 3D
                                            Icons
                                        </h6>
                                    </div>
                                    <div class="item-status">
                                        <span class="time"> 2h </span>
                                        <span class="status-dot active"></span>
                                    </div>
                                </a>
                            </div>
                             
                             <div class="topbar-dropdown-content">
                                <a class="dropdown-item topbar-dropdown-item d-flex align-items-start" href="#">
                                    <div class="item-avater">
                                        <img src="<?php echo e(asset('backend/assets/images/icons/user3.png')); ?>"
                                            alt="User" />
                                        <div class="item-badge item-icon-badge">
                                            <i class="fa-solid fa-star text-white">&starf;</i>
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <h6 class="notification">
                                            Dominca <span> @domenica<br /> commented on</span> Smiles - 3D
                                            Icons
                                        </h6>
                                    </div>
                                    <div class="item-status">
                                        <span class="time"> 2h </span>
                                        <span class="status-dot active"></span>
                                    </div>
                                </a>
                            </div>
                             
                             <div class="topbar-dropdown-content">
                                <a class="dropdown-item topbar-dropdown-item d-flex align-items-start" href="#">
                                    <div class="item-avater">
                                        <img src="<?php echo e(asset('backend/assets/images/icons/user4.png')); ?>"
                                            alt="User" />
                                        <div class="item-badge item-icon-badge">
                                            <i class="fa-solid fa-star text-white">&starf;</i>
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <h6 class="notification">
                                            Dominca <span> @domenica<br /> commented on</span> Smiles - 3D
                                            Icons
                                        </h6>
                                    </div>
                                    <div class="item-status">
                                        <span class="time"> 2h </span>
                                        <span class="status-dot active"></span>
                                    </div>
                                </a>
                            </div>
                              
                              <div class="topbar-dropdown-content">
                                <a class="dropdown-item topbar-dropdown-item d-flex align-items-start" href="#">
                                    <div class="item-avater">
                                        <img src="<?php echo e(asset('backend/assets/images/icons/user5.png')); ?>"
                                            alt="User" />
                                        <div class="item-badge item-icon-badge">
                                            <i class="fa-solid fa-star text-white">&starf;</i>
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <h6 class="notification">
                                            Dominca <span> @domenica<br /> commented on</span> Smiles - 3D
                                            Icons
                                        </h6>
                                    </div>
                                    <div class="item-status">
                                        <span class="time"> 2h </span>
                                        <span class="status-dot active"></span>
                                    </div>
                                </a>
                            </div>
                              
                              <div class="topbar-dropdown-content">
                                <a class="dropdown-item topbar-dropdown-item d-flex align-items-start" href="#">
                                    <div class="item-avater">
                                        <img src="<?php echo e(asset('backend/assets/images/icons/user5.png')); ?>"
                                            alt="User" />
                                        <div class="item-badge item-icon-badge">
                                            <i class="fa-solid fa-star text-white">&starf;</i>
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <h6 class="notification">
                                            Dominca <span> @domenica<br /> commented on</span> Smiles - 3D
                                            Icons
                                        </h6>
                                    </div>
                                    <div class="item-status">
                                        <span class="time"> 2h </span>
                                        <span class="status-dot active"></span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <a class="topbar-dropdown-footer ot-btn-primary w-100" href="<?php echo e(url('notification')); ?>">
                                See All Notifications
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-control-item">
                <div class="item-content">
                    <button class="profile-navigate mt-0 p-0" type="button" id="profile_expand" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="profile-photo user-card">
                            <img src="<?php echo e(@globalAsset(Auth::user()->image->path, 'user2.jpg')); ?>" alt="<?php echo e(Auth::user()->name); ?>">
                        </div>
                        <div class="profile-info md-none">
                            <h6><?php echo e(Auth::user()->name); ?></h6>
                            <p><?php echo e(@Auth::user()->role->name); ?></p>
                        </div>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end profile-expand-dropdown top-navbar-dropdown-menu ot-card"
                        aria-labelledby="profile_expand">
                        <div class="profile-expand-container">
                            <div class="profile-expand-list d-flex flex-column">
                                <a class="profile-expand-item <?php echo e(set_menu(['my.profile'], 'active')); ?>"
                                    href="<?php echo e(route('my.profile')); ?>">
                                    <span><?php echo e(___('common.my_profile')); ?></span>
                                </a>
                                <a class="profile-expand-item <?php echo e(set_menu(['passwordUpdate'], 'active')); ?>"
                                    href="<?php echo e(route('passwordUpdate')); ?>">
                                    <span><?php echo e(___('common.update_password')); ?></span>
                                </a>
                                <form action="<?php echo e(route('logout')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="profile-expand-item">
                                        <span>
                                            <?php echo e(___('common.logout')); ?></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</header>


<?php /**PATH C:\laragon\www\laravel-stater-kits\resources\views/backend/partials/header.blade.php ENDPATH**/ ?>