<header>
        <ul>
            <div class="nav-items">
            <li><a href="#">Home</a></li>
            <li><a href="<?php echo e(url('menu')); ?>">Meals</a></li>
            <li><a href="#">Today's Offers</a></li>
             <li><a href="#">Contact Us</a></li>
            <li><a href="#">About</a></li>
            </div>
            <div class="login">
            <?php if(Route::has('login')): ?>
                <?php if(auth()->guard()->check()): ?>
                    <?php if(Auth::user()->is_admin): ?>
                   <li><a href="<?php echo e(url('/dashboard')); ?>" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo e(url('/')); ?>" class="text-sm text-gray-700 dark:text-gray-500 underline">Welcome <?php echo e(Auth::user()->name); ?></a></li>
                           <li> <form method="POST" action="<?php echo e(route('logout')); ?>">
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
                        </li>
                        <?php endif; ?>
                <?php else: ?>
                    <li> <a href="<?php echo e(route('login')); ?>" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>

                    <?php if(Route::has('register')): ?>
                        <li>  <a href="<?php echo e(route('register')); ?>" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
            </div>
        </ul>
 </header>

<?php /**PATH C:\Users\ahmed\Downloads\restaurant-Ahmed-branch\resources\views/partial/header.blade.php ENDPATH**/ ?>