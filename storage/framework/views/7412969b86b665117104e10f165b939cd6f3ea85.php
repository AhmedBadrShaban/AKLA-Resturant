<?php $__env->startSection('content'); ?>
<div class="wrapper">
      <!-- Add Product Form -->
      <div class="heading">Delete Category : <?php echo e($type-> type_name); ?></div>
    <form  action="<?php echo e(url('admin/menu/'.strval($type-> id).'/destroyType')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
          <div class="form-body">
          <div class="input">
            <div class="input-heading">Move to trash?</div>
            </div>
        <input type="submit" class="submit" value="Delete" >
    </form>
    <a href="<?php echo e(url('admin/menu')); ?>" class="submit-invers">Cancel</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Internship\NajahNow Internship\restaurant-Ahmed-branch\resources\views/deleteType.blade.php ENDPATH**/ ?>