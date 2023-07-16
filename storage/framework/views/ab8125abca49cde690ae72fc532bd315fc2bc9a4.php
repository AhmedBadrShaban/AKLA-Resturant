<?php $__env->startSection('content'); ?>

    <?php if(session('status')): ?>
        <div class="alert alert-success container">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('Product.MyCart')); ?>" style="color: black; text-decoration: none">
        <div style="
    padding: 1em;
    font-size: 1.1em;
    font-weight: bold;
    display: flex;
    justify-content: right">
            <i class="fa-solid fa-cart-shopping" style="margin-right: 0.5em; display: flex;
            align-items: center"></i>Shopping Cart
        </div>
    </a>
    <div style="display: flex">
    <?php $__currentLoopData = $meals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="card" style="width: 14rem; margin-left: 1em; ">
        <img class="card-img-top" style="padding:25px;" src="<?php echo e($meal-> photo); ?>" alt="Card image cap">
        <div class="card-body">
            <h4 class="card-title"><?php echo e($meal-> title); ?></h4>
            <p class="card-text"><?php echo e($meal-> description); ?></p>
            <p class="card-text">Rating : <?php echo e($meal-> rate); ?></p>
            <h5 class="card-title" style ="float:left"><?php echo e($meal->price); ?> LE.</h5>
            <a href="<?php echo e(route('Product.shoppingCart',$meal->id)); ?>" class="btn btn-primary" style ="float:right">Add to cart</a>
        </div>
    </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>


        <br>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ahmed\Downloads\restaurant-Ahmed-branch\resources\views/menu.blade.php ENDPATH**/ ?>