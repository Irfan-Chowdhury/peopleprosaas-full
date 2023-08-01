<!--Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel"> <?php echo e(__('file.Add Language')); ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div id="displayErrorMessage"></div>

            <form method="POST" id="submitForm">
              <?php echo csrf_field(); ?>
                <div class="row">
                        <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                            'colSize' => 4,
                            'labelName' => 'Name',
                            'fieldType' => 'text',
                            'nameData' => 'name',
                            'placeholderData' => 'Language Name',
                            'isRequired' => false,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                            'colSize'=>4,
                            'fieldType'=>'text',
                            'labelName'=>'Locale',
                            'nameData'=>'locale',
                            'placeholderData'=>'eg: en,bn,es etc..',
                            'isRequired'=> false,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                            'colSize' => 4,
                            'labelName' => 'Default',
                            'fieldType' => 'checkbox',
                            'nameData' => 'is_default',
                            'isRequired' => false,
                            'valueData' => 1
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="submitButton"><?php echo app('translator')->get('file.Save'); ?></button>
                    </div>

                </div>
            </form>
        </div>
      </div>
    </div>
  </div>



<?php /**PATH /var/www/peopleprosaas/resources/views/landlord/super-admin/pages/languages/create-modal.blade.php ENDPATH**/ ?>