<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" href="images/akla.ico">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">    
    <link rel="stylesheet" type="text/css" href=" {{URL::to('css/style1.css')}}">
    <link rel="stylesheet" type="text/css" href=" {{URL::to('css/main.css')}}">

     <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
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
    <title>Edit</title>
</head>
<body>
@auth
    <nav class="items-center">
            <ul class="flex text-lg">
                <li class="navMenu">
                <a href="/" class="font-bold">
                Welcome {{auth()->user()->name}}
                </a>
                </li>
                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
     <div class="body" >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                Edit INFO 
                </h2>
                <p class="mb-4">Please enter your new info</p>
            </header>

            <form method="POST" action="/profile/edit">
                @csrf

                <div class="item mb-4">
                    <label for="address" class="item-head mb-2">
                        New Address
                    </label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="address"
                    />
                    @error('address')
                    <!-- Error Example -->
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="item mb-4">
                    <label
                        for="password"
                        class="item-head mb-2"
                    >
                       New Password
                    </label>
                    <input
                        type="password"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="password"
                    />
                    @error('password')
                    <!-- Error Example -->
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button
                        type="submit"
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                    >
                        Update
                    </button>
                </div>

            </form>
            <div class="item">
            <img src="../images/akla.png" alt="" style=" width:100% ; height:80px">
             </div>
     </div>
@else
    <h1>
        404 Cannot find page. Please <a href="/register">Register</a> or <a href="/login">Log In</a>
    </h1>
@endauth
 </body>
</html>
