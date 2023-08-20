<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel"> <?php echo app('translator')->get('file.Edit Module'); ?> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="POST" id="updateForm">
                    <input type="hidden" name="module_detail_id" id="modelId">

                    <div class="row">

                        <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                            'colSize' => 12,
                            'labelName' => 'Icon',
                            'fieldType' => 'text',
                            'nameData' => 'icon',
                            'placeholderData' => 'e.g fa fa-book',
                            'isRequired' => true,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                            'colSize' => 12,
                            'labelName' => 'Name',
                            'fieldType' => 'text',
                            'nameData' => 'name',
                            'placeholderData' => 'e.g: Purchase',
                            'isRequired' => true,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                            'colSize' => 12,
                            'labelName' => 'Description',
                            'fieldType' => 'text',
                            'nameData' => 'description',
                            'placeholderData' => 'e.g: Create purchase order and automatically update your daily stocks.',
                            'isRequired' => true,
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



<?php /**PATH /var/www/peopleprosaas/resources/views/landlord/super-admin/pages/modules/edit-modal.blade.php ENDPATH**/ ?>