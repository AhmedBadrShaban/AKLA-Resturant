<?php $__env->startSection('content'); ?>
<div class="add-category">
<a href="<?php echo e(url('admin/menu/addType')); ?>" class="add-btn">Add Category</a>
<a href="<?php echo e(url('admin/')); ?>" class="add-btn float-end">back</a>
       </div>
<?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
      <div class="food-category">
        <div class="category-title">
        
        <div class="delete-category-btn">
          <a 
              class="btn-link" 
              href="<?php echo e(url('admin/menu/'.strval($type-> id).'/deleteType')); ?>">
              Delete category
            </a><br>

            
          </div>
          <?php echo e($type->type_name); ?>

          
        </div>
        <ul class="cards">
          <?php $__currentLoopData = $meals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($meal['type_id'] == $type->id) :?>
          <li>
            <a class="shopping-link btn-link" href="<?php echo e(url('admin/menu/'.strval($meal-> id).'/edit/')); ?>">
              <i class="fa-regular fa-pen-to-square"></i>
            </a> 

            <a class="btn-link" href="<?php echo e(url('admin/menu/'.strval($meal-> id).'/delete/')); ?>" >
              <i class="fa-solid fa-xmark x-mark"></i>
            </a>
            <a class="card"  href="<?php echo e(url('admin/menu/'.strval($meal-> id))); ?>">
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
                      <div><?php echo e($meal->title); ?></div>
                    </h3>
                    <span class="price"><?php echo e($meal->price); ?> EGP</span>
                    <div class="rate-container">
                      <?php if($meal['rate'] < 1) : ?>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                        <span style="opacity: 0.4">(<?php echo e($meal->num_of_reviews); ?>)</span>

                      <?php elseif($meal['rate'] == 1) : ?>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                        <span style="opacity: 0.4">(<?php echo e($meal->num_of_reviews); ?>)</span>

                      <?php elseif($meal['rate'] <= 2) : ?>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                        <span style="opacity: 0.4">(<?php echo e($meal->num_of_reviews); ?>)</span>

                      <?php elseif($meal['rate'] <= 3) : ?>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                        <span style="opacity: 0.4">(<?php echo e($meal->num_of_reviews); ?>)</span>

                      <?php elseif($meal['rate'] <= 4) : ?>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star"></span>
                        <span style="opacity: 0.4">(<?php echo e($meal->num_of_reviews); ?>)</span>

                      <?php else : ?>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>                      
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                        <span style="opacity: 0.4">(<?php echo e($meal->num_of_reviews); ?>)</span>

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
          
          <?php 
          
          if($type['count'] == 0): ?>
          <li>
            <a id="plus" href="<?php echo e(url('admin/menu/create')); ?>" class="card add-cart">
              <img
                src="<?php echo e(URL::asset('uploads/add-item.png')); ?>"
                class="card-image"
                alt="add item"
              />
            </a>
          </li>
          <?php else: ?>
          <li>
            <a  href="<?php echo e(url('admin/menu/create')); ?>" class="card add-cart">
              <img
                src="<?php echo e(URL::asset('uploads/add-item.png')); ?>"
                class="card-image"
                alt="add item"
              />
            </a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      

      <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Internship\NajahNow Internship\restaurant-Ahmed-branch\resources\views/menuAdmin.blade.php ENDPATH**/ ?>