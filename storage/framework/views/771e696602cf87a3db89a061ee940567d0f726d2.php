<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" href="images/akla.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">    <link rel="stylesheet" type="text/css" href=" <?php echo e(URL::to('css/style1.css')); ?>">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" type="text/css" href=" <?php echo e(URL::to('css/main.css')); ?>">

    <title>Profile</title>
</head>
<body>
<?php if(auth()->guard()->check()): ?>
    <nav class="items-center">
         <ul class="flex text-lg">
            <li class="navMenu">
            <a href="/" class="font-bold">
            Welcome <?php echo e(auth()->user()->name); ?>

            </a>
            </li>
            <li>
                <form class="inline" method="POST" action="/logout">
                    <?php echo csrf_field(); ?>
                    <button type="submit">
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>
    <div class="body">
        <div class="headerr">
            <div class="info">
                <div class="name"><?php echo e(auth()->user()->name); ?></div>
            </div>
            <div>
            <a class="edit-btn" href = "/profile/edit" >
                    <i class="fa-solid fa-pen"></i> Edit Profile
                </a>
            </div>
        </div>
        <div class="information">
            <div class="item">
                <div class="item-head">INFO</div>
            </div>
            <div class="item">
                <div class="item-head">Email</div>
                <div class="item-desc"><?php echo e(auth()->user()->email); ?></div>
            </div>
            <div class="item">
                <div class="item-head">Address</div>
                <div class="item-desc"><?php echo e(auth()->user()->address); ?></div>
            </div>
            <div class="item">
                <a class="item-head ordered" href="<?php echo e(route('history', auth()->user())); ?>">Recently Ordered Meals</a>
            </div>
            <div class="item">
            <img src="../images/akla.png" alt="" style=" width:100% ; height:80px">
             </div>
        </div>
    </div>
<?php else: ?>
    <h1>
        404 Cannot find page. Please <a href="/register">Register</a> or <a href="/login">Log In</a>
    </h1>
<?php endif; ?>
</body>
</html>
<?php /**PATH E:\Internship\NajahNow Internship\restaurant-Ahmed-branch\resources\views/users/profile.blade.php ENDPATH**/ ?>