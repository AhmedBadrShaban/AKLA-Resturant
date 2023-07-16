<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" href="images/akla.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="resources/Fonts/styles.css"/>
    <title>Orders</title>
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
</head>
<body>

     <nav style="background-color:#272727;">
        <div class="logo">
            <a href="/"><img src=<?php echo e(URL::asset('images/akla.png')); ?> alt="logo" /></a>
        </div>
        <ul class="nav-links">
            <li><a style="color:#f6f4e6;" href="/">Home</a></li>
         </ul>
    </nav>

             <?php 
                $orders= \App\Models\Order::where('status' , "active")->get();
                $currentUID=-1;
               ?>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                        $meal = App\Models\Meal::where('id',$item-> meal_id)->firstOrFail();
                ?>
                <?php if($item->user_id != $currentUID): ?>
                     <table class="table">
                        <thead>
                            <th>User ID</th>
                            <th>Meal Name</th>
                            <th>Meal Description</th>
                            <th>Meal Price</th>
                            <th><a class="btn btn-primary" href="<?php echo e(route('deliveryDetails', $item->user_id)); ?>"> Delivary Details </a></th>
                            <th><a class="btn btn-danger" href="<?php echo e(route('end', $item->user_id)); ?>"> End Order </a></td></th>
                         </thead>
                        <tbody>
                             <tr>
                                <td><?php echo e($item->user_id); ?></td>
                                <td> <?php echo e($meal->title); ?></td>
                                <td> <?php echo e($meal->description); ?></td>
                                <td><?php echo e($meal->price); ?> L.E</td>
                             </tr>
                        </tbody>
                <?php else: ?>
                             <tr>
                                <td><?php echo e($item->user_id); ?></td>
                                <td> <?php echo e($meal->title); ?></td>
                                <td> <?php echo e($meal->description); ?></td>
                                <td><?php echo e($meal->price); ?> L.E</td>
                             </tr>
                 <?php endif; ?>
                   
                    <?php 
                        $currentUID=$item->user_id;
                    ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<script>
    let nav = document.querySelector("nav");
    window.onscroll = function () {
        if (window.pageYOffset > 200) {
            nav.classList.add("scrolled");
        } else {
            nav.classList.remove("scrolled");
        }
    };
</script>
    
 </body>
</html>
<?php /**PATH E:\Internship\NajahNow Internship\restaurant-Ahmed-branch\resources\views/admin/orders.blade.php ENDPATH**/ ?>