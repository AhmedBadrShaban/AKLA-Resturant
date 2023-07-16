<!--  -->

<!-- <?php $__env->startSection('content'); ?> -->
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h4 class="card-title"><?php echo e($type-> type_name); ?></h4>
    <form  action="<?php echo e(url('admin/menu/'.strval($type-> id).'/destroyType')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
        <input type="submit" class="btn btn-danger" style='float: right;' value="Delete" >
    </form>
    <a href="<?php echo e(url('admin/menu')); ?>" style='float: left;' class="btn btn-outline-secondary">Cancel</a>
  
    </div>
</div>
<!-- <?php $__env->stopSection(); ?> -->

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ahmed\Downloads\restaurant-Ahmed-branch\resources\views/deleteType.blade.php ENDPATH**/ ?>