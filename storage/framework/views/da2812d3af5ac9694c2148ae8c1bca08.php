<div class="container-fluid mb-3">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header d-flex align-items-center p-3">
                    <h4 ><?php echo e(trans('file.FAQ Section')); ?></h4>
                </div>
                <hr>
                <div class="card-body">
                    <form id="submitForm" action="<?php echo e(route('faq.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                'colSize' => 6,
                                'labelName' => 'Heading',
                                'fieldType' => 'text',
                                'nameData' => 'heading',
                                'placeholderData' => 'e.g: PeopleProSaaS is a HRM software.',
                                'isRequired' => false,
                                'valueData'=> isset($faq->heading) ? $faq->heading : null
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                'colSize' => 12,
                                'labelName' => 'Sub Heading',
                                'fieldType' => 'textarea',
                                'nameData' => 'sub_heading',
                                'placeholderData' => 'e.g: PeopleProSaaS Description',
                                'isRequired' => false,
                                'valueData'=> isset($faq->sub_heading) ? $faq->sub_heading : null
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input" name="is_allow" value="1" id="toggleCard">
                                    <span class="custom-control-indicator"></span>
                                    <span class="form-check-label"><h5><?php echo app('translator')->get('file.FAQ Details'); ?></h5></span>
                                </label>
                            </div>
                            <div class="card-body" id="cardContent" style="display: none;">
                                <div class="row">
                                    <?php echo $__env->make('landlord.super-admin.partials.input-field', [
                                        'colSize' => 12,
                                        'labelName' => 'Question',
                                        'fieldType' => 'text',
                                        'nameData' => 'question',
                                        'placeholderData' => 'What is FAQ',
                                        'isRequired' => false,
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('landlord.super-admin.partials.input-field', [
                                        'colSize' => 12,
                                        'labelName' => 'Answer',
                                        'fieldType' => 'textarea',
                                        'nameData' => 'answer',
                                        'placeholderData' => 'e.g: Write some description about faq',
                                        'isRequired' => false,
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4 form-group mt-3">
                                <button type="submit" id="submitButton" class="btn btn-primary"><?php echo app('translator')->get('file.Submit'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/peopleprosaas/resources/views/landlord/super-admin/pages/faqs/create.blade.php ENDPATH**/ ?>