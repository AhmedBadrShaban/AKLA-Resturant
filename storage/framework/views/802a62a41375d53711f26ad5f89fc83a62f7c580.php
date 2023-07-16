<nav class="navMenu">
            <a href="/"><img class="logo" src="../images/akla.png" alt="Akla Logo "> </a>
             <a href="#">Home</a>
            <a href="<?php echo e(url('menu')); ?>">Meals</a>
            <a href="#">Today's Offers</a>
            <a href="#footer">Contact Us</a>
            <a href="#about-section">About</a>
            <div class="dot"></div>
            
</nav>
<div class="login ls-auto">
             <?php if(Route::has('login')): ?>
                <?php if(auth()->guard()->check()): ?>   

                    <?php if(Auth::user()->is_admin): ?>
                   <a href="<?php echo e(url('/dashboard')); ?>" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        <?php else: ?>
                            <a href="/profile">Profile</a>
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>

                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.responsive-nav-link','data' => ['href' => route('logout'),'onclick' => 'event.preventDefault();
                                        this.closest(\'form\').submit();']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault();
                                        this.closest(\'form\').submit();']); ?>
                                    <?php echo e(__('Log Out')); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </form>
                        <?php endif; ?>
                        
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>"> <span class="icon-sign-in"></span> Log in</a>

                    <?php if(Route::has('register')): ?>
                         <a href="<?php echo e(route('register')); ?>" > <span class="icon-register"></span> Register</a>
                         
                    <?php endif; ?>
                <?php endif; ?>
             <?php endif; ?>
            </div>


      <!-- <a href="#">Home</a>
      <a href="#">Blog</a>
      <a href="#">Work</a>
      <a href="#">About</a>
  -->
<?php /**PATH E:\Internship\NajahNow Internship\Final Code\restaurant\resources\views/partial/header.blade.php ENDPATH**/ ?>