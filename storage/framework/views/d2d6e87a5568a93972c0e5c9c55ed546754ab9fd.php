<!DOCTYPE html>
<html>
<head>
    <title>Delivary</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/menu.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/style1.css')); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>

    </style>
</head>
<body>
<nav class="menuNav">
    <div class="container">
        <div class="nav-items">
        <div class="logo"><img class="logo" src="../images/akla.png" alt="Akla Logo "></div>

            <a href="<?php echo e(route('home')); ?>">Home</a>
            <div>
            <a href="<?php echo e(route('Meals.Get')); ?>" aria-expanded="true">Menu</a>
            </div>
            <a href="<?php echo e(route('Product.MyCart')); ?>">Shopping Cart</a>
            <div class="active">
                <a href="<?php echo e(route('delivery')); ?>"  aria-expanded="true">Delivary Details</a>
            </div>
            <a href="<?php echo e(route('checkout')); ?>">Checkout</a>
            <a id="navbar" class="nav-link" role="button" aria-haspopup="true" aria-expanded="false" v-pre
               href="<?php echo e(route('history', auth()->user())); ?>">History</a>
            <!-- <a id="navbar" class="nav-link" role="button" aria-haspopup="true" aria-expanded="false" v-pre
               href="<?php echo e(route('history', auth()->user())); ?>">History</a> -->
            <!-- <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button>Logout</button>
            </form> -->
        </div>
    </div>
</nav>

<div style="margin:50px;">
    <h1>Your Current Delivery Details</h1>
    <br>
    <table class="table">
        <thead>
            <th>City</th>
            <th>District</th>
            <th>Street</th>
            <th>Building number</th>
            <th>Department number</th>
            <th>Phone number</th>
            <th>Popular Mark</th>
        </thead>
        <tbody>
             <tr>
                <td><?php echo e($Delivery->city); ?></td>
                <td><?php echo e($Delivery->district); ?></td>
                <td><?php echo e($Delivery->street); ?></td>
                <td><?php echo e($Delivery->building_number); ?></td>
                <td><?php echo e($Delivery->department_number); ?></td>
                <td><?php echo e($Delivery->phone_number); ?></td>
                <td><?php echo e($Delivery->Popular_Mark); ?></td>
                </tr>
         </tbody>
    </table>
</div>
<div style="display:flex ;  justify-content: space-around;">
   <a class="btn btn-danger" href="<?php echo e(url('/delivary/edit/'.Auth::id())); ?>" > Update Details </a>
   <a class="btn btn-primary" href="<?php echo e(url('/check-out')); ?>"> Confirm Details </a>
</div>
</body>
</html>
<?php /**PATH E:\Internship\NajahNow Internship\restaurant-Ahmed-branch\resources\views/edit-delivery-details.blade.php ENDPATH**/ ?>