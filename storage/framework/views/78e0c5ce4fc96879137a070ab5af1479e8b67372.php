<?php $__env->startSection('content'); ?>


<div class="food-category">
  <ul class="cards" >
    <li>
    <a class="shopping-link btn-link"   href="<?php echo e(route('Product.shoppingCart',$meal->id)); ?>"><i class="fa-solid fa-cart-plus"></i></a> 
    <a class="card meal">
              
    <img
      src="<?php echo e($meal-> photo); ?>"
      class="card-image"
      alt="meat"
      style="max-width: 400px;"
    />
      <div class="card-overlay">
        <div class="card-header">
          <svg class="border">
            <path />
          </svg>

          <div class="card-header-text">
            <h3 class="card-title">
              <div><?php echo e($meal->title); ?> 
                <span style="opacity: 0.4">(<?php echo e($meal->num_of_reviews); ?>)</span>
              </div>
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
  </ul>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Internship\NajahNow Internship\restaurant-Ahmed-branch\resources\views/meal.blade.php ENDPATH**/ ?>