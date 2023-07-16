<!--  -->

<!-- <?php $__env->startSection('content'); ?> -->


<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card" style="width: 18rem; ">

  <img class="card-img-top" src="<?php echo e($order-> photo); ?>" alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title"><?php echo e($order-> title); ?></h4>
    <p class="card-text"><?php echo e($order-> description); ?></p>
    <h5 class="card-title" style ="float:left"><?php echo e($order-> price); ?> LE.</h5>
    <a href="" class="btn btn-primary" style ="float:right">Add to cart</a> <br>
    <?php if($order['comment'] == "") : ?>
    <form action="<?php echo e(url(strval($order-> id).'/feedback')); ?>" method = "POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>
                <div class="form-row">
                    <br>
                    <div class="form-group">
                        <label for="comment" >Comment</label>
                        <textarea class="<?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control" name='comment' id="comment" rows="3"></textarea>
                        <?php $__errorArgs = ['comment'];
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
  
                    <br>
                    <div class="form-group col-md-2">
                        <label for="rate" >Rate</label>
                        <input type="text" class="<?php $__errorArgs = ['rate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control"  name='rate' id="rate">

                    </div>
                    <?php $__errorArgs = ['rate'];
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
                <br>

                <button type="submit" class="btn btn-primary">Submit</button>
            

    <?php else : ?>
        <p><br> Comment : <br><?php echo e($order-> comment); ?> <br>
        <br> Rate : <br><?php echo e($order-> rate); ?></p>
    <?php endif; ?>
    </form>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ahmed\Downloads\restaurant-Ahmed-branch\resources\views/History.blade.php ENDPATH**/ ?>