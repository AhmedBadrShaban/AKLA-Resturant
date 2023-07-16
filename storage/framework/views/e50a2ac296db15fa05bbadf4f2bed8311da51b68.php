<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

 
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('Fonts/styles.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/admin-menu.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/menu.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/history.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/add-product.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> AKLA </title>
    <link rel="icon" href="<?php echo e(URL::asset('images/akla.ico')); ?> ">


    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
      integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>
<body>
    <div id="app">




































































        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>
<?php /**PATH E:\Internship\NajahNow Internship\restaurant-Ahmed-branch\resources\views/layouts/app.blade.php ENDPATH**/ ?>