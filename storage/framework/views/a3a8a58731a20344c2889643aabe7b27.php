<div class="tab-pane fade show active" id="generalSetting" role="tabpanel" aria-labelledby="general-setting">
    <div class="card">
        <h4 class="card-header p-3"><b><?php echo app('translator')->get('file.General Setting'); ?></b></h4>
        <hr>
        <div class="card-body">
            <form id="generalSettingSubmit" action="<?php echo e(route('setting.general.manage')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="row">
                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                        'colSize' => 6,
                        'labelName' => 'Site Title',
                        'fieldType' => 'text',
                        'nameData' => 'site_title',
                        'placeholderData' => 'PeopleProSAAS',
                        'isRequired' => true,
                        'valueData'=> isset($generalSetting->site_title) ? $generalSetting->site_title : null
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                        'colSize' => 6,
                        'labelName' => 'Email',
                        'fieldType' => 'text',
                        'nameData' => 'email',
                        'placeholderData' => 'support@lion-coders.com',
                        'isRequired' => true,
                        'valueData'=> isset($generalSetting->email) ? $generalSetting->email : null
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                        'colSize' => 6,
                        'labelName' => 'Phone Number',
                        'fieldType' => 'text',
                        'nameData' => 'phone',
                        'placeholderData' => '+880182XXXXXXX',
                        'isRequired' => true,
                        'valueData'=>  isset($generalSetting->phone) ? $generalSetting->phone : null
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                        'colSize' => 6,
                        'labelName' => 'Free Trial Limit',
                        'fieldType' => 'number',
                        'nameData' => 'free_trial_limit',
                        'placeholderData' => '5',
                        'isRequired' => true,
                        'valueData'=> isset($generalSetting->free_trial_limit) ? $generalSetting->free_trial_limit : null

                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                        'colSize' => 6,
                        'labelName' => 'Currency Code',
                        'fieldType' => 'text',
                        'nameData' => 'currency_code',
                        'placeholderData' => 'USD',
                        'isRequired' => true,
                        'valueData'=> isset($generalSetting->currency_code) ? $generalSetting->currency_code : null
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo e(trans("file.Date Format")); ?>  </label>
                            <select name="date_format" class="selectpicker form-control">
                                <?php $__currentLoopData = $dateFormat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php echo e($generalSetting->date_format === $key ? 'selected' : ''); ?>><?php echo e($item); ?></option>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo e(trans("file.Time Zone")); ?>  </label>
                            <select name="time_zone" class="selectpicker form-control">
                                <?php $__currentLoopData = $timeZones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($zone['zone']); ?>" <?php echo e($generalSetting->time_zone === $zone['zone'] ? 'selected' : ''); ?>><?php echo e($zone['diff_from_GMT'] . ' - ' . $zone['zone']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                        'colSize' => 6,
                        'labelName' => 'Developed By',
                        'fieldType' => 'text',
                        'nameData' => 'developed_by',
                        'placeholderData' => 'LionCoders',
                        'isRequired' => true,
                        'valueData'=> $generalSetting->developed_by

                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                        'colSize' => 6,
                        'labelName' => 'Footer',
                        'fieldType' => 'text',
                        'nameData' => 'footer',
                        'placeholderData' => 'LionCoders',
                        'isRequired' => true,
                        'valueData'=> $generalSetting->footer

                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                        'colSize' => 6,
                        'labelName' => 'Footer Link',
                        'fieldType' => 'text',
                        'nameData' => 'footer_link',
                        'placeholderData' => 'https://www.lion-coders.com',
                        'isRequired' => true,
                        'valueData'=> $generalSetting->footer_link

                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                        'colSize' => 6,
                        'labelName' => 'Site Logo',
                        'fieldType' => 'file',
                        'nameData' => 'site_logo',
                        'placeholderData' => '',
                        'isRequired' => false,
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo e(trans("file.Frontend Layout")); ?>  </label>
                            <div class="form-check">
                                <input name="frontend_layout" id="regular" class="form-check-input" type="radio" value="regular" <?php echo e($generalSetting->frontend_layout === 'regular' ? 'checked' :''); ?>> Regular
                            </div>
                            <div class="form-check">
                                <input name="frontend_layout" id="custom" class="form-check-input" type="radio" value="custom" <?php echo e($generalSetting->frontend_layout === 'custom' ? 'checked' :''); ?>> Custom
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-group row">
                    <button type="submit" id="generalButton" class="btn btn-primary btn-block"><?php echo app('translator')->get('file.Submit'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /var/www/peopleprosaas/resources/views/landlord/super-admin/pages/settings/general.blade.php ENDPATH**/ ?>