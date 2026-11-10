<select class="form-control <?php echo e($value['class']); ?>" id="input-<?php echo e($value['key']); ?>" name="opsi[<?php echo e($value['key']); ?>]" <?php echo e($value['readonly']); ?> <?php echo $value['attributes']; ?>>
    <?php $__currentLoopData = $value['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($key); ?>" <?= ($key == $value['default']) ? 'selected' : ''; ?>><?php echo e($option); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php /**PATH /home/sitb2342/public_html/resources/views/admin/theme/components/form/select.blade.php ENDPATH**/ ?>