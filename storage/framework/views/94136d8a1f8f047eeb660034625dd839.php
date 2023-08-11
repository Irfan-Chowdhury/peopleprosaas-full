<div class="container-fluid mb-3">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header d-flex align-items-center p-3">
                    <h4 ><?php echo e(trans('file.Testimonial Section')); ?></h4>
                </div>
                <hr>
                <div class="card-body">
                    <form id="submitForm" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                'colSize' => 4,
                                'labelName' => 'Name',
                                'fieldType' => 'text',
                                'nameData' => 'name',
                                'placeholderData' => 'e.g: Irfan Chowdhury',
                                'isRequired' => false,
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                'colSize' => 4,
                                'labelName' => 'Business Name',
                                'fieldType' => 'text',
                                'nameData' => 'business_name',
                                'placeholderData' => 'e.g: LionCoders',
                                'isRequired' => false,
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                'colSize' => 4,
                                'labelName' => 'Image',
                                'fieldType' => 'file',
                                'nameData' => 'image',
                                'placeholderData' => null,
                                'isRequired' => false,
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                'colSize' => 12,
                                'labelName' => 'Description',
                                'fieldType' => 'textarea',
                                'nameData' => 'description',
                                'placeholderData' => 'e.g: Good Support Team.',
                                'isRequired' => false,
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
<?php /**PATH /var/www/peopleprosaas/resources/views/landlord/super-admin/pages/testimonials/create.blade.php ENDPATH**/ ?>