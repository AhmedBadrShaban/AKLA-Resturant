<?php $__env->startSection('content'); ?>

<div class="wrapper">
      <!-- Add Product Form -->
      <div class="heading">Delete Meal</div>
      <form  action="<?php echo e(url('admin/menu/'.strval($meal-> id).'/destroy')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
          <div class="form-body">
          <div class="input">
          <i class="fa-solid fa-xmark x-mark"></i>
            <a class="card">
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
          <div class="input-heading">Move to trash?</div>
          </div>
        <input type="submit" class="submit" value="Delete" >
    </form>
    <a href="<?php echo e(url('admin/menu')); ?>" class="submit-invers">Cancel</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Internship\NajahNow Internship\restaurant-Ahmed-branch\resources\views/deleteMeal.blade.php ENDPATH**/ ?>