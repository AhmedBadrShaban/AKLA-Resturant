<!DOCTYPE html>
<html lang="en">
<head>
    <title> Restaurant </title>
    <link rel="stylesheet" type="text/css" href=" <?php echo e(URL::to('css/style1.css')); ?>">
</head>
<body>
<div class="main">
    <?php echo $__env->make('partial.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<div>
 </div>
    <div class="title">
        <h1>
            A K L N I  Restaurant
        </h1>
        <h2>
            We’re the best restaurant in City
        </h2>
    </div>
    <div class="button">
        <a href="#"  class="bt">Order Now !</a>
        <a href="#"  class="bt">Book A Visit</a>
    </div>
</body>
</html>
<?php /**PATH C:\Users\ahmed\Downloads\restaurant-Ahmed-branch\resources\views/frontend/master.blade.php ENDPATH**/ ?>