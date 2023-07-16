<?php $__env->startSection('content'); ?>
    <div class="wrapper">
      <!-- Add Product Form -->
      <div class="heading">Add Category</div>
      <form action="<?php echo e(url('admin/menu/storeType')); ?>" method = "POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-body">
          <div class="input">
            <div class="input-heading">Category Name</div>
            <input type="text" class="<?php $__errorArgs = ['type_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control" name='type_name' id="type_name">
                <?php $__errorArgs = ['type_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span style="color:red;" class="alert-danger"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <input class="submit" type="submit" />
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Internship\NajahNow Internship\restaurant-Ahmed-branch\resources\views/addType.blade.php ENDPATH**/ ?>