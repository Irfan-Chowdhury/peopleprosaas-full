<div class="col-md-<?php echo e($colSize); ?>">
    <div class="form-group">
        <?php if($fieldType !== 'checkbox'): ?>
            <label class="font-weight-bold"><?php echo e(trans("file.$labelName")); ?> <?php if($isRequired): ?><span class="text-danger">*</span> <?php endif; ?> </label>
        <?php endif; ?>

        <?php switch($fieldType):
            case ('text'): ?>
                <input <?php echo e($isRequired ? 'required':''); ?> type="text" name="<?php echo e($nameData); ?>" id="<?php echo e(isset($idData) ? $idData : null); ?>" <?php if(isset($valueData)): ?> value="<?php echo e($valueData); ?>" <?php else: ?> placeholder="<?php echo e($placeholderData); ?>" <?php endif; ?> class="form-control">
                <?php break; ?>
            <?php case ('textarea'): ?>
                <textarea  <?php echo e($isRequired ? 'required':''); ?> name="<?php echo e($nameData); ?>" id="<?php echo e(isset($idData) ? $idData : null); ?>" <?php if(isset($placeholderData)): ?> placeholder="<?php echo e($placeholderData); ?>" <?php endif; ?> class="form-control ckeditor" rows="4"> <?php if(isset($valueData)): ?> <?php echo e($valueData); ?> <?php endif; ?> </textarea>
                <?php break; ?>
            <?php case ('checkbox'): ?>
                <input <?php echo e($isRequired ? 'required':''); ?> type="checkbox"  name="<?php echo e($nameData); ?>" id="<?php echo e(isset($idData) ? $idData : null); ?>" <?php if(isset($valueData)): ?> value="<?php echo e($valueData); ?>" <?php endif; ?>> &nbsp;
                <label class="font-weight-bold"><?php echo e(trans("file.$labelName")); ?></label>
                <?php break; ?>
            <?php default: ?>
        <?php endswitch; ?>
    </div>
</div>
<?php /**PATH /var/www/peopleprosaas/resources/views/landlord/super-admin/partials/input-field.blade.php ENDPATH**/ ?>