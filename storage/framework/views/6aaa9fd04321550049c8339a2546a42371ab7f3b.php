

<?php $__env->startSection('content'); ?>
<style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@200;400&display=swap");

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1em 5vw;
            background-color: #fff;
            z-index: 10;
            position: sticky;
            top: 0;
            transition: 0.3s;
            font-family: "Nunito", sans-serif;
        }

        .scrolled {
            box-shadow: 0px 3px 19px -7px rgb(0 0 0 / 10%);
            padding: 0 5vw;
        }

        .logo {
            width: 100px;
        }

        .logo img {
            width: 100%;
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin: 0 1em;
        }

        nav ul li a {
            
            text-decoration: none;
            color: #000;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .logout {
            color: #d7bdca;
        }

        * {
            box-sizing: border-box;
            margin: 0;
        }

        body {
            font-family: "Roboto", sans-serif;
        }
        .centered {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: "Roboto", sans-serif;
            height: 100vh;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 2rem;
            margin: 4rem 5vw;
            padding: 0;
            list-style-type: none;
        }

        .card {
            position: relative;
            display: flex;
            border-radius: 40px;
            overflow: hidden;
            box-shadow: 0px 3px 19px -7px rgb(0 0 0 / 10%);
            height: 400px;
        }

        .card-image {
            width: 100%;
        }

        .card-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            border-radius: 40px;
            background-color: #fff;
            transform: translateY(100%);
            transition: 0.2s ease-in-out;
            width: 100%;
        }

        .card:hover .card-overlay {
            transform: translateY(0);
        }

        .card-header {
            gap: 2em;
            padding: 2em;
            border-radius: 40px 0 0 0;
            background-color: #fff;
            transform: translateY(-100%);
            transition: 0.2s ease-in-out;
        }

        .border {
            width: 80px;
            height: 80px;
            position: absolute;
            bottom: 100%;
            right: 0;
            z-index: 1;
        }

        .border path {
            fill: #fff;
            d: path("M 40 80 c 22 0 40 -22 40 -40 v 40 Z");
        }

        .card:hover .card-header {
            transform: translateY(0);
        }

        .card-title {
            font-size: 1em;
            margin: 0 0 0.3em;
            color: #6a515e;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-title i {
            font-size: 1.3em;
            cursor: pointer;
            opacity: 0.6;
            transition: 0.3s;
        }

        .card-title i:hover {
            opacity: 1;
        }

        .price {
            font-size: 0.8em;
            color: #d7bdca;
        }

        .card-description {
            padding: 0 2em 2em;
            color: #d7bdca;
        }

        footer {
            background-color: #f8f8f9;
            padding: 9em 0 ;
            color: #d7bdca;
        }


    </style>
<nav class="menuNav">
    <div class="container m-0">
        <div class="nav-items">
            <div class="logo"><img class="logo" src="../images/akla.png" alt="Akla Logo "></div>
            <div><a href="<?php echo e(route('home')); ?>">Home</a></div>
            <a href="<?php echo e(route('Meals.Get')); ?>">Menu</a>
            <a href="<?php echo e(route('Product.MyCart')); ?>">Shopping Cart</a>
            <div class="active">  <a id="navbar" class="nav-link" role="button" aria-haspopup="true" aria-expanded="true" v-pre
               href="<?php echo e(route('history', auth()->user())); ?>">History</a></div>
           
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button>Logout</button>
            </form>
        </div>
    </div>
</nav>
 </ul>
        </div>
        <ul class="cards">
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $meal = App\Models\Meal::where(['id' => $order-> meal_id ])->firstOrFail();
                    ?>
                    <?php if( $order->status != "done"): ?>
                        <?php continue; ?>
                    <?php endif; ?>    
                <li>
                <a class="shopping-link btn-link" href="<?php echo e(route('Product.shoppingCart',$meal->id)); ?>"><i class="fa-solid fa-cart-plus"></i></a>
                    <div class="card">
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
                        <div><?php echo e($meal->title); ?> </div>
                        <!--<a class="btn-link" href="<?php echo e(url('admin/menu/'.strval($meal-> id).'/edit/')); ?>" >-->
                        
                        <!--</a>-->
                        
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
                    <p class="history-description card-description">
                    <?php echo e($meal->description); ?>

                    </p>
                    <?php if($order['comment'] == "") : ?>
                    <form class="feedback" action=" <?php echo e(url(strval($order-> id).'/feedback')); ?>" method = "POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <div class="input">
                            <div class="input-heading">Comment</div>
                                <input class="history-comment" placeholder="eg. The service was excellent" type="text" class="<?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control"  name='comment' id="comment" >
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
                            <div class="input-heading">Rate</div>
                            <select class="form-control <?php $__errorArgs = ['rate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name='rate' id="rate">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
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
                            </select>
                            <button type="submit" class="submit">Submit</button>
                            </div>
                    <?php else : ?>
                        <div class="input-heading">Comment </div>
                        <div class="review"><?php echo e($order-> comment); ?> </div>
                        <div class="input-heading"> Rate </div>
                        <div class="review"><?php echo e($order-> rate); ?></div>
                    <?php endif; ?>
                    </form>
                </div> 
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  

<?php $__env->stopSection(); ?>
      
        

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Internship\NajahNow Internship\Final Code\restaurant\resources\views/History.blade.php ENDPATH**/ ?>