<div class="tab-pane fade" id="analyticsSetting" role="tabpanel" aria-labelledby="analytics-setting">    <div class="card">
        <h4 class="card-header p-3"><b><?php echo app('translator')->get('file.Analytics Setting'); ?></b></h4>
        <hr>
        <div class="card-body">
            <form id="analyticSettingSubmit" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="row">
                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                        'colSize' => 12,
                        'labelName' => 'Google Analytics Script',
                        'fieldType' => 'text',
                        'nameData' => 'google_analytics_script',
                        'placeholderData' => 'Paste your Google Analytics Snippet',
                        'isRequired' => true,
                        'valueData'=> isset($analyticSetting->google_analytics_script) ? $analyticSetting->google_analytics_script : null
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                        'colSize' => 12,
                        'labelName' => 'Facebook Pixel Script',
                        'fieldType' => 'text',
                        'nameData' => 'facebook_pixel_script',
                        'placeholderData' => 'Meta Pixel Snippet',
                        'isRequired' => true,
                        'valueData'=> isset($analyticSetting->facebook_pixel_script) ? $analyticSetting->facebook_pixel_script : null
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                        'colSize' => 12,
                        'labelName' => 'Chat Script',
                        'fieldType' => 'text',
                        'nameData' => 'chat_script',
                        'placeholderData' => 'Chat Snippet Start',
                        'isRequired' => true,
                        'valueData'=> isset($analyticSetting->chat_script) ? $analyticSetting->chat_script : null
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group row">
                    <button type="submit" id="analyticButton" class="btn btn-primary btn-block"><?php echo app('translator')->get('file.Submit'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /var/www/peopleprosaas/resources/views/landlord/super-admin/pages/settings/analytic_setting.blade.php ENDPATH**/ ?>