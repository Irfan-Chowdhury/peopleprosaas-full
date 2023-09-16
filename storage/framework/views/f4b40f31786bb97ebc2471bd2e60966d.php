<?php $__env->startPush('custom-css'); ?>
<style>
    .count-title .icon {
        font-size: 36px;
        margin-right: 20px
    }
    .count-title .count-number {
        font-size: 22px;
        font-weight: 400
    }
    .count-title .count-number span {
        color: #999;
        font-size: 16px;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('landlord-content'); ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <div class="wrapper count-title">
                        <div class="icon"><i class="dripicons-graph-bar" style="color: #733686"></i></div>
                        <div>
                            <div class="count-number"><span><?php echo e($generalSetting->currency_code); ?></span> <?php echo e(number_format($subscriptionValue, 2)); ?></div>
                            <div class="name"><strong style="color: #733686"><?php echo e(__('file.Subscription value')); ?></strong></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="wrapper count-title">
                        <div class="icon"><i class="dripicons-card" style="color: #5fc64a"></i></div>
                        <div>
                            <div class="count-number"><span><?php echo e($generalSetting->currency_code); ?></span> <?php echo e(number_format($receivedAmount, 2)); ?></div>
                            <div class="name"><strong style="color: #5fc64a"><?php echo e(__('file.Received Amount')); ?></strong></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="wrapper count-title">
                        <div class="icon"><i class="dripicons-user" style="color: #00c689"></i></div>
                        <div>
                            <div class="count-number"><?php echo e($totalTenantCount); ?> (<?php echo e($totalActiveTenantCount); ?> <span><?php echo e(__('file.Active')); ?></span>)</div>
                            <div class="name"><strong style="color: #00c689"><?php echo e(__('file.Total Clients')); ?></strong></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="wrapper count-title">
                        <div class="icon"><i class="dripicons-archive" style="color: #ff8952"></i></div>
                        <div>
                            <div class="count-number"><?php echo e($totalPackageCount); ?></div>
                            <div class="name"><strong style="color: #ff8952"><?php echo e(__('file.Packages')); ?></strong></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4><?php echo e(trans('file.Send message to customers')); ?></h4>
                        </div>
                        <div class="card-body">
                            <label>Select customer</label>
                            
                            <p>This feature is coming soon...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('landlord.super-admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/peopleprosaas/resources/views/landlord/super-admin/pages/dashboard/index.blade.php ENDPATH**/ ?>