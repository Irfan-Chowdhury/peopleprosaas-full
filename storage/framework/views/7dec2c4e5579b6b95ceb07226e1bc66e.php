<!--Create Modal -->
<div class="modal fade bd-example-modal-lg" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel"> <?php echo e(__('file.Add Customer')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" id="submitForm" action="<?php echo e(route('customer.signup')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">

                        <div class="col-md-6">
                            <label><strong><?php echo app('translator')->get('file.Package'); ?></strong></label>
                            <select name="package_id" class="form-control">
                                <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-md-6 form-group">
                            <label><?php echo e(trans('file.Subscription Type')); ?> *</label>
                            <div class="form-check">
                                <input type="radio" name="subscription_type" value="free" class="form-check-input"
                                    id="subscription-type-1" checked>
                                <label class="form-check-label" for="subscription-type-1">
                                    <?php echo app('translator')->get('file.Free'); ?>
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="subscription_type" value="monthly" class="form-check-input"
                                    id="subscription-type-1">
                                <label class="form-check-label" for="subscription-type-1">
                                    <?php echo app('translator')->get('file.Monthly'); ?>
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="subscription_type" value="yearly" class="form-check-input"
                                    id="subscription-type-2">
                                <label class="form-check-label" for="subscription-type-2">
                                    <?php echo app('translator')->get('file.Yearly'); ?>
                                </label>
                            </div>
                        </div>

                        <?php echo $__env->make('landlord.super-admin.partials.input-field', [
                            'colSize' => 6,
                            'labelName' => 'First Name',
                            'fieldType' => 'text',
                            'nameData' => 'first_name',
                            'placeholderData' => 'First Name',
                            'isRequired' => false,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('landlord.super-admin.partials.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Last Name',
                            'fieldType' => 'text',
                            'nameData' => 'last_name',
                            'placeholderData' => 'Last Name',
                            'isRequired' => false,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('landlord.super-admin.partials.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Contact No',
                            'fieldType' => 'number',
                            'nameData' => 'contact_no',
                            'placeholderData' => '123456789',
                            'isRequired' => false,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('landlord.super-admin.partials.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Email',
                            'fieldType' => 'text',
                            'nameData' => 'email',
                            'placeholderData' => 'Email',
                            'isRequired' => false,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('landlord.super-admin.partials.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Username',
                            'fieldType' => 'text',
                            'nameData' => 'username',
                            'placeholderData' => 'Username',
                            'isRequired' => false,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('landlord.super-admin.partials.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Company Name',
                            'fieldType' => 'text',
                            'nameData' => 'company_name',
                            'placeholderData' => 'Company Name',
                            'isRequired' => false,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('landlord.super-admin.partials.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Password',
                            'fieldType' => 'text',
                            'nameData' => 'password',
                            'placeholderData' => 'Password',
                            'isRequired' => false,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('landlord.super-admin.partials.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Password Confirmation',
                            'fieldType' => 'text',
                            'nameData' => 'password_confirmation',
                            'placeholderData' => 'Password Confirmation',
                            'isRequired' => false,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="col-md-12">
                            <label><strong><?php echo app('translator')->get('file.Sub-domain'); ?></strong></label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="tenant" placeholder="Subdomain..."
                                    aria-label="ubdomain..." aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2"><?php echo e('@' . env('CENTRAL_DOMAIN')); ?></span>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary submitButton" id="submitButton"><?php echo app('translator')->get('file.Save'); ?></button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/peopleprosaas/resources/views/landlord/super-admin/pages/customers/create-modal.blade.php ENDPATH**/ ?>