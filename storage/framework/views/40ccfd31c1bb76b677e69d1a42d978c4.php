<div class="tab-pane fade" id="seoSetting" role="tabpanel" aria-labelledby="seo-setting">
    <div class="card">
    <h4 class="card-header p-3"><b><?php echo app('translator')->get('file.SEO Setting'); ?></b></h4>
    <hr>
    <div class="card-body">
        <form id="seoSettingSubmit" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="row">
                <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                    'colSize' => 12,
                    'labelName' => 'Meta Title (50-60 characters)',
                    'fieldType' => 'text',
                    'nameData' => 'meta_title',
                    'placeholderData' => 'Peoplepro SAAS inventory, POS, accounting & HRM',
                    'isRequired' => true,
                    'valueData'=> isset($seoSetting->meta_title) ? $seoSetting->meta_title : null
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                    'colSize' => 12,
                    'labelName' => 'Meta Description (150-160 characters)',
                    'fieldType' => 'textarea',
                    'nameData' => 'meta_description',
                    'placeholderData' => 'Peoplepro SAAS lets your customers subscribe to Peoplepro HRM solution',
                    'isRequired' => true,
                    'valueData'=> isset($seoSetting->meta_description) ? $seoSetting->meta_description : null
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                    'colSize' => 12,
                    'labelName' => 'OG Title',
                    'fieldType' => 'text',
                    'nameData' => 'og_title',
                    'placeholderData' => 'Peoplepro SAAS HRM',
                    'isRequired' => true,
                    'valueData'=> isset($seoSetting->og_title) ? $seoSetting->og_title : null
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                    'colSize' => 12,
                    'labelName' => 'OG Description',
                    'fieldType' => 'textarea',
                    'nameData' => 'og_description',
                    'placeholderData' => 'Peoplepro SAAS lets your customers subscribe to Peoplepro HRM solution',
                    'isRequired' => true,
                    'valueData'=> isset($seoSetting->og_description) ? $seoSetting->og_description : null
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                    'colSize' => 12,
                    'labelName' => 'OG Image',
                    'fieldType' => 'file',
                    'nameData' => 'og_image',
                    'placeholderData' => null,
                    'isRequired' => true,
                    // 'valueData'=> isset($seoSetting->og_image) ? $seoSetting->og_image : null
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="form-group row">
                <button type="submit" id="seoButton" class="btn btn-primary btn-block"><?php echo app('translator')->get('file.Submit'); ?></button>
            </div>
        </form>
    </div>
</div>
</div>
<?php /**PATH /var/www/peopleprosaas/resources/views/landlord/super-admin/pages/settings/seo_setting.blade.php ENDPATH**/ ?>