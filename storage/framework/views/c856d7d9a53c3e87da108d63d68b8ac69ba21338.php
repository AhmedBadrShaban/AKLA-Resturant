
<nav class="menuNav">
    <div class="container">
        <div class="nav-items">
        <div class="logo"><img class="logo" src="../images/akla.png" alt="Akla Logo "></div>

            <a href="<?php echo e(route('home')); ?>">Home</a>
            <div class="active">
            <a href="<?php echo e(route('Meals.Get')); ?>" aria-expanded="true">Menu</a>
            </div>
            <a href="<?php echo e(route('Product.MyCart')); ?>">Shopping Cart</a>
            <a href="<?php echo e(route('delivery')); ?>">Delivary Details</a>
            <a href="<?php echo e(route('checkout')); ?>">Checkout</a>
            
            <a id="navbar" class="nav-link" role="button" aria-haspopup="true" aria-expanded="false" v-pre
               href="<?php echo e(route('history', auth()->user())); ?>">History</a>
            <!-- <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button>Logout</button>
            </form> -->
        </div>
    </div>
</nav>

<?php $__env->startSection('content'); ?>
    <?php if(session('status')): ?>
        <div class="alert alert-success container">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="food-category">
  <div class="category-title">
    <?php echo e($type->type_name); ?>

  </div>
  <?php if($type['count'] == 1): ?>
  <ul class="cards stand-alone">
  <?php else: ?>
  <ul class="cards" >
    <?php endif; ?>
      <?php $__currentLoopData = $meals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($meal['type_id'] == $type->id) : ?>
      <li>
        <a class="shopping-link btn-link" href="<?php echo e(route('Product.shoppingCart',$meal->id)); ?>"><i class="fa-solid fa-cart-plus"></i></a>
        <a class="card" href="<?php echo e(url('menu/'.strval($meal-> id))); ?>">
          <img
            src="<?php echo e($meal-> photo); ?>"
            class="card-image"
            alt="meat"
          />
          <div class="card-overlay">
            <div class="card-header">
              <svg class="border">
                <path />
              </svg>

              <div class="card-header-text">
                <h3 class="card-title">
                  <div><?php echo e($meal->title); ?> <span style="opacity: 0.4">(<?php echo e($meal->num_of_reviews); ?>)</span></div>

                </h3>
                <span class="price"><?php echo e($meal->price); ?> EGP</span>
                <div class="rate-container">
                  <?php if($meal['rate'] < 1) : ?>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>

                  <?php elseif($meal['rate'] == 1) : ?>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>

                  <?php elseif($meal['rate'] <= 2) : ?>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>

                  <?php elseif($meal['rate'] <= 3) : ?>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>

                  <?php elseif($meal['rate'] <= 4) : ?>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>

                  <?php else : ?>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>

                  <?php endif; ?>
                </div>
              </div>
            </div>
            <p class="card-description">
              <?php echo e($meal->description); ?>

            </p>
          </div>
        </a>
      </li>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Internship\NajahNow Internship\Final Code\restaurant\resources\views/menu.blade.php ENDPATH**/ ?>