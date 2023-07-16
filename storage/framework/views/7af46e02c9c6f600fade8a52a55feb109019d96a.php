<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" href="images/akla.ico">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"

    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">   
    <link rel="stylesheet" type="text/css" href=" <?php echo e(URL::to('css/style1.css')); ?>">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <style>
    </style>
    <title>Login</title>
</head>
<body>

    <div class="containerr" style="top:0px ; down:0px;">
        <div class ="header">
            <?php echo $__env->make('partial.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

         <div
            class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
             style="	background: #272727; color:black; "
 >
            <header class="text-center">
              <img src="../images/akla.png" alt="" style=" width:100% ; height:80px">
                <h2 class="text-2xl font-bold uppercase mb-1 text-white">
                    Login
                </h2>
            </header>

                <form method="POST" action="/login">
                    <?php echo csrf_field(); ?>
                    <div class="mb-6">
                        <label for="email" class="inline-block text-lg mb-2 text-white">Email</label>
                        <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
                               value="<?php echo e(old('email')); ?>"/>

                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-6">
                        <label for="password" class=" text-white inline-block text-lg mb-2">
                            Password
                        </label>
                        <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
                               value="<?php echo e(old('password')); ?>"/>

                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group mb-3">
                        <input type="checkbox" name="remember" value="1">
                        <label class="text-white" for="remember">Remember me</label>
                    </div>

                    <div class="mb-6">
                        <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                            Sign In
                        </button>
                    </div>

                    <div class="mt-8 text-white">
                        <p>
                            Don't have an account?
                            <a href="/register" class="text-laravel">Register</a>
                        </p>
                    </div>
                </form>
        </div>
  </body>
</html>
<?php /**PATH E:\Internship\NajahNow Internship\Final Code\restaurant\resources\views/auth/login.blade.php ENDPATH**/ ?>