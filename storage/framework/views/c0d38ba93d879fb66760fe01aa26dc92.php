<?php $__env->startSection('landlord-content'); ?>


    <div class="container-fluid mb-3">


        <div class="row">
            <div class="col-3">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="general-setting" data-toggle="list" href="#generalSetting" role="tab" aria-controls="home"><?php echo app('translator')->get('file.General Setting'); ?></a>
                    <a class="list-group-item list-group-item-action" id="payment-setting" data-toggle="list" href="#paymentSetting" role="tab" aria-controls="settings"><?php echo app('translator')->get('file.Payment Setting'); ?></a>
                    <a class="list-group-item list-group-item-action" id="mail-setting" data-toggle="list" href="#mailSetting" role="tab" aria-controls="settings"><?php echo app('translator')->get('file.Mail Setting'); ?></a>
                    <a class="list-group-item list-group-item-action" id="analytics-setting" data-toggle="list" href="#analyticsSetting" role="tab" aria-controls="settings"><?php echo app('translator')->get('file.Analytics Setting'); ?></a>
                    <a class="list-group-item list-group-item-action" id="seo-setting" data-toggle="list" href="#seoSetting" role="tab" aria-controls="settings"><?php echo app('translator')->get('file.SEO Setting'); ?></a>
                </div>
            </div>
            <div class="col-9">
              <div class="tab-content" id="nav-tabContent">

                <?php echo $__env->make('landlord.super-admin.pages.settings.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('landlord.super-admin.pages.settings.payment_setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('landlord.super-admin.pages.settings.mail_setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('landlord.super-admin.pages.settings.analytic_setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('landlord.super-admin.pages.settings.seo_setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">Profile</div>
                <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">Messages</div>

              </div>
            </div>
          </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        (function($) {
            "use strict";

            let generalSettingURL = "<?php echo e(route('setting.general.manage')); ?>";
            let paymentSettingURL = "<?php echo e(route('setting.payment.manage')); ?>";
            let mailSettingURL = "<?php echo e(route('setting.mail.manage')); ?>";
            let analyticSettingURL = "<?php echo e(route('setting.analytic.manage')); ?>";
            let seoSettingURL = "<?php echo e(route('setting.seo.manage')); ?>";

            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $("#generalSettingSubmit").on("submit", function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    generateSetting('generalButton', generalSettingURL, formData);
                });
                $("#paymentSettingSubmit").on("submit", function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    generateSetting('paymentButton', paymentSettingURL, formData);
                });
                $("#mailSettingSubmit").on("submit", function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    generateSetting('mailButton', mailSettingURL, formData);
                });
                $("#analyticSettingSubmit").on("submit", function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    generateSetting('analyticButton', analyticSettingURL, formData);
                });
                $("#seoSettingSubmit").on("submit", function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    generateSetting('seoButton', seoSettingURL, formData);
                });
            });

            let generateSetting = (submitButtonName, settingURL, formData) => {
                $(`#${submitButtonName}`).text('Submitting...');
                $.post({
                    url: settingURL,
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    error: function(response) {
                        console.log(response);
                        let htmlContent = prepareMessage(response);
                        displayErrorMessage(htmlContent);
                        $(`#${submitButtonName}`).text('Submit');
                    },
                    success: function(response) {
                        console.log(response);
                        displaySuccessMessage(response.success);
                        $(`#${submitButtonName}`).text('Submit');
                    }
                });
            }
        })(jQuery);
    </script>

    <script type="text/javascript" src="<?php echo e(asset('js/landlord/common-js/alertMessages.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('landlord.super-admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/peopleprosaas/resources/views/landlord/super-admin/pages/settings/index.blade.php ENDPATH**/ ?>