<!--  -->
<!-- <?php $__env->startSection('content'); ?> -->

    <?php if(session('status')): ?>
        <div class="alert alert-success container">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>
    <div style="display: flex; justify-content: right; padding-right: 2em;">
        <a href="<?php echo e(route('Meals.Get')); ?>" style="color: black; text-decoration: none">
            <div style=" padding: 0.5em; font-size: 1.1em; font-weight: bold; display: flex; justify-content: right">
                <i class="fa-solid fa-utensils" style="margin-right: 0.5em; display: flex; align-items: center"></i>Menu
            </div>
        </a>

        <a href=" <?php echo e(url('stripe')); ?>" style="color: black; text-decoration: none">
            <div style="padding: 0.5em;font-size: 1.1em;font-weight: bold;display: flex;justify-content: right">
                <i class="fa-solid fa-cash-register" style="margin-right: 0.5em; display: flex;
                align-items: center"></i>Checkout
            </div>
        </a>
    </div>
    <div class="container" style="display: flex">

        <?php $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card" style="padding: 1.2em;
    margin-right: 1em;">
                <p style="display: none">
                    <?php echo e($c = \App\Models\Cart::where('meal_id',$card->meal_id)->where('user_id',Auth::id())->get()->count()); ?>

                </p>
                <p style="display: none">
                    <?php echo e($n = \App\Models\Meal::where('id',$card->meal_id)->get()->first()); ?>



                </p>

                <p>name of products: <?php echo e($n['title']); ?></p>
                <p>count of products: <?php echo e($c); ?></p>
                <p>price of products: <?php echo e($c * $n['price']); ?></p>
                <a href="<?php echo e(route('product.del',$card->meal_id)); ?>">
                    <i class="fa-solid fa-trash-can"></i>
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <p class="container">total Price:<?php echo e(\App\Models\Bank::where('userid',Auth::id())->get()->first()->totalPrice); ?></p>
<!-- <?php $__env->stopSection(); ?> -->

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ahmed\Downloads\restaurant-Ahmed-branch\resources\views/shopping-cart.blade.php ENDPATH**/ ?>