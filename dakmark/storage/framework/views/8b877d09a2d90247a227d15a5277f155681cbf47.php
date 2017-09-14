    <!--header-->
        <div class="header">
            <div class="header-top">
                <div class="container">
                    <div class="top-right">
                    <ul>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i> <?php echo e(app()->getLocale()); ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                <li><a href="<?php echo e(URL::asset('')); ?>language/vi" style="color:#000;"><img src="<?php echo e(url('public/assets/img/flags/vn.png')); ?>" alt="img"> Tiếng Việt</a></li>
                                <li><a href="<?php echo e(URL::asset('')); ?>language/en" style="color:#000;"><img src="<?php echo e(url('public/assets/img/flags/en.png')); ?>" alt="img"> English</a></li>
                            </ul>
                        </li>                        
                    <?php if(Auth::guest()): ?>
                        <li>
                            <a href="<?php echo e(url('/login')); ?>" id="link-modal-login" data-reveal-id="modal-signup2" class="modal-signup2 nb-signup">
                                    <i class="fa fa-fw fa-sign-in"></i> <?php echo app('translator')->getFromJson('auth.login'); ?>
                            </a> 
                        </li>
                        <li>
                            <a href="<?php echo e(url('/register')); ?>" id="link-modal-sign-up" data-reveal-id="modal-signup" class="modal-signup nb-signup">      
                                    <i class="fa fa-fw fa-user-plus"></i> <?php echo app('translator')->getFromJson('auth.register'); ?>
                            </a> 
                        </li>
                        <?php else: ?>
                        <li class="dropdown hide-point">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo e(Auth::user()->last_name); ?> <?php echo e(Auth::user()->first_name); ?><b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu">
                                <li >
                                    <a tabindex="-1" href="<?php echo e(url('/order')); ?>"><i class="fa fa-fw fa-list-alt" ></i> <?php echo app('translator')->getFromJson('shoppings.order-history'); ?></a>
                                </li>                          
                                <li>
                                    <a tabindex="-1" href="<?php echo e(url('/profile')); ?>"><i class="fa fa-fw fa-user"></i> <?php echo app('translator')->getFromJson('common.profile'); ?></a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fa fa-fw fa-power-off"></i> <?php echo app('translator')->getFromJson('auth.logout'); ?>
                                </a>
                                    <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                    </form>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>                        
                    </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="heder-bottom">
                <div class="container">
                    <div class="logo-nav">
                        <div class="logo-nav-left">
                            <a href="<?php echo e(url('/')); ?>" class="logo-top"><img alt="" src="<?php echo e(url('assets/img/logo-dark-mark-200.png')); ?>" /></a>
                        </div>
                        <div class="logo-nav-left1">
                            <nav class="navbar navbar-default">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header nav_2">
                                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div> 
                            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                                <ul class="nav navbar-nav">
                                    <li class="menu-item"><a href="<?php echo e(url('/')); ?>" class="act"><?php echo app('translator')->getFromJson('header.home'); ?></a></li>   
                                    <li class="menu-item"><a href="<?php echo e(url('/about-us')); ?>"><?php echo app('translator')->getFromJson('header.about-us'); ?></a></li>
                                    <li class="menu-item"><a href="<?php echo e(url('/cert')); ?>"><?php echo app('translator')->getFromJson('header.cert'); ?></a></li>
                                    <li class="menu-item">
                                        <a href="#"><?php echo app('translator')->getFromJson('header.shop'); ?></a>
                                        <?php 
                                            $productCats = \DB::table('product_cat')->where('parent_id', 0)->orderBy('sort_order', 'asc')->get();
                                        ?>
                                        <?php if(!empty($productCats)): ?>
                                        <ul class="sub-menu">
                                            <?php $__currentLoopData = $productCats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $pCatSeo = \DB::table('seo')->where('system_id', $pCat->system_id)->first(); ?>
                                            <li>
                                                <a href="<?php echo e(route('front.item.show',$pCatSeo->slug)); ?>" title="<?php echo e($pCat->name); ?>">
                                                    <?php echo e($pCat->name); ?>

                                                </a>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                        <?php endif; ?>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#"><?php echo app('translator')->getFromJson('header.blog'); ?></a>
                                        <?php 
                                            $blogCats = \DB::table('blog_cat')->where('parent_id', 0)->orderBy('sort_order', 'asc')->get();
                                        ?>
                                        <?php if(!empty($blogCats)): ?>
                                        <ul class="sub-menu">
                                            <?php $__currentLoopData = $blogCats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $bCatSeo = \DB::table('seo')->where('system_id', $bCat->system_id)->first(); ?>
                                            <li>
                                                <a href="<?php echo e(route('front.item.show',$bCatSeo->slug)); ?>" title="<?php echo e($bCat->name); ?>">
                                                    <?php echo e($bCat->name); ?>

                                                </a>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                        <?php endif; ?>
                                    </li>                               
                                    <li class="menu-item"><a href="<?php echo e(url('/contact')); ?>"><?php echo app('translator')->getFromJson('header.contact'); ?></a></li>
                                </ul>
                            </div>
                            </nav>
                        </div>
                        <div class="logo-nav-right">
                            <div id="cd-search" class="cd-search">
                                <form action="#" method="post">
                                    <input name="Search" type="search" placeholder="Search...">
                                </form>
                            </div>  
                        </div>
                        <div class="header-right2">
                            <div class="cart box_1">
                                <p>
                                    <span class="cart-item-count"><?php echo e(Cart::instance('default')->count(false)); ?> </span>
                                    <?php echo app('translator')->getFromJson('shoppings.items'); ?>
                                    <a href="<?php echo e(url('/cart')); ?>">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-circle-thin fa-stack-2x" aria-hidden="true" style='color:#000;'></i>
                                          <i class="fa fa-shopping-cart fa-stack-1x" aria-hidden="true" style='color:#000;'></i>
                                        </span>                                        
                                    </a>
                                </p>
                                <div class="clearfix"> </div>
                            </div>  
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header-->