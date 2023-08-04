<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel"> <?php echo app('translator')->get('file.Edit Language'); ?> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <div id="displayErrorMessageEdit"></div>

                <form method="POST" id="updateForm">
                    <input type="hidden" name="language_id" id="modelId">

                    <div class="row">
                        <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                            'colSize' => 4,
                            'labelName' => 'Name',
                            'fieldType' => 'text',
                            'nameData' => 'name',
                            'idData' => 'name',
                            'placeholderData' => 'Language Name',
                            'isRequired' => false,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                            'colSize'=>4,
                            'fieldType'=>'text',
                            'labelName'=>'Locale',
                            'nameData'=>'locale',
                            'idData' => 'locale',
                            'placeholderData'=>'eg: en,bn,es etc..',
                            'isRequired'=> false,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                        <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                            'colSize' => 4,
                            'labelName' => 'Default',
                            'fieldType' => 'checkbox',
                            'nameData' => 'is_default',
                            'idData' => 'isDefault',
                            'isRequired' => false,
                            'valueData' => 1
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="updateButton"><?php echo app('translator')->get('file.Update'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<?php /**PATH /var/www/peopleprosaas/resources/views/landlord/super-admin/pages/languages/edit-modal.blade.php ENDPATH**/ ?>