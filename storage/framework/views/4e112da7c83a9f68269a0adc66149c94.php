<?php
    $generalSetting =  DB::table('general_settings')->latest()->first();
?>



<?php $__env->startSection('public-content'); ?>



    
    <!--Header-->
    <!--Header Area starts-->
    <?php if(!env('USER_VERIFIED')): ?>
    <div class="d-block text-center"><a class="button style1 w-100" href="https://lion-coders.com/software/salepro-saas">Buy Salepro SAAS</a></div>
    <?php endif; ?>

    <section class="hero mt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center hero-text mb-5">
                    <h1 class="heading"><?php echo e($hero->heading); ?></h1>
                    <h2 class="light h5 mb-3"><?php echo e($hero->sub_heading); ?></h2>
                    <a href="#packages" class="button style1"><?php echo e($hero->button_text); ?></a>
                </div>
                <div class="col-md-8 offset-md-2">
                    <img class="hero-img" src="<?php echo e(asset('landlord/images/hero/'.$hero->image)); ?>" alt=""/>
                </div>
            </div>
        </div>
    </section>



    <section id="features" class="">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center mb-5">
                    <h2 class="regular"><?php echo e($module->heading); ?></h2>
                    <p class="lead mb-5"><?php echo e($module->sub_heading); ?></p>
                </div>
                <div class="col-md-5">
                    <?php if(isset($module) && $module->image): ?>
                        <img class="mb-5" src="<?php echo e(asset('landlord/images/module/'.$module->image)); ?>" alt="Module image"/>
                    <?php else: ?>
                        <img class="mb-5" src="landlord/images/preview.png" alt=""/>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 offset-md-1">
                    <div class="row">
                        <?php $__currentLoopData = $module->moduleDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 feature">
                            <div class="icon">
                                <i class="<?php echo e($module->icon); ?>"></i>
                            </div>
                            <h3><?php echo e($module->name); ?></h3>
                            <p><?php echo e($module->description); ?></p>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if(count($features) > 0): ?>
    <section class="grey-bg">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 feature2">
                    <div class="icon">
                        <i class="<?php echo e($feature->icon); ?>"></i>
                    </div>
                    <h4 class="h6"><?php echo e($feature->name); ?></h4>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if(isset($faq)): ?>
        <section id="faq" class="accordion pb-0" id="accordionExample">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center mb-5">
                        <h2 class="regular"><?php echo e($faq->heading); ?></h2>
                        <p class="lead"><?php echo e($faq->sub_heading); ?></p>
                    </div>
                    <div class="col-md-6 offset-md-3 mb-5">
                        <?php $__currentLoopData = $faq->faqDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo e($key); ?>" aria-expanded="false" aria-controls="collapse1">
                                    <?php echo e($item->question); ?>

                                </button>
                                </h2>
                                <div id="collapse-<?php echo e($key); ?>" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <?php echo $item->answer; ?>

                                    </div>
                                </div>
                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>




    

    <section class="grey-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center mb-5">
                    <h2 class="regular"><?php echo e(__('file.Testimonials')); ?></h2>
                </div>
            </div>
            <div class="swiper mySwiper swiper-container-horizontal swiper-container-autoheight">
                <div class="swiper-wrapper" style="height: 348px;">
                <?php $__empty_1 = true; $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="swiper-slide swiper-slide-active" style="width: 563px; margin-right: 50px;">
                        <div class="review">
                            <div class="review-text">
                                <?php echo $testimonial->description; ?>

                            </div>
                            <div class="reviewer"><img src="<?php echo e(asset('landlord/images/testimonial')); ?>/<?php echo e($testimonial->image); ?>" alt="<?php echo e($testimonial->name); ?>" /> <?php echo e($testimonial->name); ?><?php if($testimonial->business_name): ?>, <?php echo e($testimonial->business_name); ?><?php endif; ?></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
                </div>
                <div class="swiper-nav-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"><i class="ti-arrow-right"></i></div>
                <div class="swiper-nav-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"><i class="ti-arrow-left"></i></div>
                <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span></div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        </div>
    </section>

    <section id="customer-signup">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center mb-3">
                    <?php if($tenantSignupDescription): ?>
                        <h2 class="regular"><?php echo e($tenantSignupDescription->heading); ?></h2>
                        <p class="lead mb-3"><?php echo e($tenantSignupDescription->sub_heading); ?></p>
                    <?php else: ?>
                        <h2 class="regular">Customer Sign Up</h2>
                        <p class="lead mb-3">SalePro is packed with all the features you'll need to seamlessly run your business</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6 offset-md-3 mb-5">
                <form action="" method="POST"  class="form row customer-signup-form">
                    <?php echo csrf_field(); ?>
                    <div class="col-12">
                        <input type="hidden" name="package_id" value="1">
                        <input type="hidden" name="subscription_type" value="monthly">
                        <input type="hidden" name="price" value="">
                        <input class="form-control" type="text" name="company_name"  placeholder="company name..." required>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="phone_number"  placeholder="contact number..." required>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="email"  placeholder="email..." required>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="name"  placeholder="username..." required>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="password" name="password"  placeholder="password..." required>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group mt-3">
                            <input class="form-control mt-0" type="text" name="tenant"  placeholder="subdomain..." aria-label="subdomain..." aria-describedby="basic-addon2" required>
                          <span class="input-group-text" id="basic-addon2"><?php echo e('@'.env('CENTRAL_DOMAIN')); ?></span>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="card-element" class="form-control">
                        </div>
                        <div class="card-errors" role="alert"></div>
                    </div>
                    <div class="col-12 mt-3">
                        <p id="waiting-msg mb-3"></p>
                        <input id="submit-btn" type="submit" class="button style1 d-block w-100" value="<?php echo e(trans('file.submit')); ?>">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php if(count($blogs) > 0): ?>
    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center mb-5">
                    <h2 class="regular"><?php echo e(__('file.Blog')); ?></h2>
                </div>
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <a href="<?php echo e(route('landingPage.blogDetail',$blog->slug)); ?>">
                        <img src="<?php echo e(asset('landlord/images/blog')); ?>/<?php echo e($blog->image); ?>" alt="<?php echo e($blog->title); ?>"/>
                        <h4 class="mt-3"><?php echo e($blog->title); ?></h4>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 offset-md-3 text-center mt-3 mb-5">
                    <a href="<?php echo e(url('blogs')); ?>" class="button style1"><?php echo e(__('file.All Blogs')); ?></a>
                </div>
            </div>
        </div>

    </section>
    <?php endif; ?>

    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('landlord.public-section.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/peopleprosaas/resources/views/landlord/public-section/pages/landing-page/index.blade.php ENDPATH**/ ?>