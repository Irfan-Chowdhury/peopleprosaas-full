<?php $__env->startSection('public-content'); ?>
<?php $__env->startPush('css'); ?>
    <style>
    .loading-icon {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.8);
        z-index: 9999;
        justify-content: center;
        align-items: center;
    }

    .loading-icon i {
        font-size: 40px;
        color: #333;
    }
</style>
<?php $__env->stopPush(); ?>


    <section class="hero mt-0 pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 hero-text mb-5">

                    <form action="<?php echo e(route('renew_subscription')); ?>" method="POST"
                        class="renew-subscription-form">
                        <?php echo csrf_field(); ?>
                        <h1 class="heading h2 text-center mt-4"><?php echo app('translator')->get('file.Your subscription has expired!'); ?></h1>
                        <div class="row">
                            <div class="col-md-4 offset-md-2 form-group">
                                <label><?php echo e(trans('file.Subscription Type')); ?> *</label>
                                <div class="form-check">
                                    <input type="radio" name="subscription_type" value="monthly" class="form-check-input"
                                        id="subscription-type-1" checked>
                                    <label class="form-check-label" for="subscription-type-1">
                                        <?php echo app('translator')->get('file.Monthly'); ?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="subscription_type" value="yearly" class="form-check-input"
                                        id="subscription-type-2">
                                    <label class="form-check-label" for="subscription-type-2">
                                        <?php echo app('translator')->get('file.Yearly'); ?>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 offset-md-2 form-group">
                                <label><?php echo e(trans('file.Package')); ?> *</label>
                                <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check">
                                        <input type="radio" name="package_id" value="<?php echo e($package->id); ?>" class="form-check-input">
                                        <label class="form-check-label"><?php echo e($package->name); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="col-md-8 offset-md-2">
                                <div class="input-group mt-3">
                                    <input class="form-control mt-0" type="text" name="tenant_id" required
                                        placeholder="Type your subdomain to renew..." aria-label="subdomain..."
                                        aria-describedby="basic-addon2">
                                    <span class="input-group-text" id="basic-addon2"><?php echo e('@' . env('CENTRAL_DOMAIN')); ?></span>
                                </div>
                            </div>
                            <div class="col-md-8 offset-md-2 mt-3">
                                <input id="submitBtn" type="submit" class="button style1 d-block w-100"
                                    value="<?php echo e(trans('file.Submit')); ?>">
                            </div>
                        </div>
                    </form>
                    

                </div>
                <!-- <div class="col-md-8 offset-md-2">
                    <img class="hero-img" src="images/preview.png" alt=""/>
                </div> -->
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>

<script>
    (function ($) {
        "use strict";

        $("#submitBtn").click(function(event){
            simulateTimeConsumingTask();
        });


    })(jQuery);
</script>

<script>
    function showLoadingIcon() {
        $('#loading-icon').css('display', 'flex');
    }

    function hideLoadingIcon() {
        $('#loading-icon').css('display', 'none');
    }

    function simulateTimeConsumingTask() {
        showLoadingIcon(); // Show the loading icon before the task starts
        setTimeout(function () {
        }, 3000);
    }
</script>

<?php if($errors->any()): ?>
    <script>
        $(document).ready(function() {
            hideLoadingIcon();
            let errorMessages = <?php echo json_encode($errors->all(), 15, 512) ?>;
            htmlContent = "";
            errorMessages.forEach(function(errorMsg) {
                htmlContent += '<p class="text-danger">' + errorMsg + '</p>';
            });
            console.log(htmlContent);
            displayErrorMessage(htmlContent);
        });
    </script>
<?php endif; ?>

<?php if(session()->has('success')): ?>
    <script>
        $(document).ready(function() {
            hideLoadingIcon();
            displaySuccessMessage('<?php echo e(Session::get('success')); ?>');
        });
    </script>
<?php endif; ?>
<script type="text/javascript" src="<?php echo e(asset('js/landlord/common-js/alertMessages.js')); ?>"></script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('landlord.public-section.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/peopleprosaas/resources/views/landlord/public-section/pages/renew/contact_for_renewal.blade.php ENDPATH**/ ?>