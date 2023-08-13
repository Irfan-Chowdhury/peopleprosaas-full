<?php
    $generalSetting = DB::table('general_settings')
        ->latest()
        ->first();
?>



<?php $__env->startSection('public-content'); ?>
    <section id="blog">
        <div class="container">
            <div class="row blog-list">
                <div class="col-md-6 offset-md-3 text-center mb-5">
                    <h2 class="regular"><?php echo e(__('file.All Blog Posts')); ?></h2>
                </div>
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 offset-md-3 mb-5">
                        <a href="<?php echo e(url('/blog')); ?>/<?php echo e($blog->slug); ?>">
                            <img src="<?php echo e(asset('landlord/images/blog')); ?>/<?php echo e($blog->image); ?>"
                                alt="<?php echo e($blog->title); ?>" />
                            <h2 class="mt-3 text-center"><?php echo e($blog->title); ?></h2>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('landlord.public-section.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/peopleprosaas/resources/views/landlord/public-section/pages/blogs/index.blade.php ENDPATH**/ ?>