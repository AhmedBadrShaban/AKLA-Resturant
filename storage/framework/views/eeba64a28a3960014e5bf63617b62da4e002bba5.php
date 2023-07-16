<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>A K L N I Users</title>
</head>

<body style="margin:50px;">
    <h1>List of Users</h1>
    <br>
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Is Admin</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($users->id); ?></td>
                <td><?php echo e($users->is_admin); ?></td>
                <td><?php echo e($users->name); ?></td>
                <td><?php echo e($users->email); ?></td>
                <td><?php echo e($users->password); ?></td>
                 <td> <a class="btn btn-danger" href="<?php echo e(url('admin/suspend/'.$users->id)); ?>"> Suspend </a></td>
             </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>

    </table>
     <a class="btn btn-primary" href="<?php echo e(url('admin')); ?>"> Back </a>


</body>

</html><?php /**PATH E:\Internship\NajahNow Internship\restaurant-Ahmed-branch\resources\views/admin/allusers.blade.php ENDPATH**/ ?>