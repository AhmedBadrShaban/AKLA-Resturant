<!DOCTYPE html>
<html>
<head>
    <title>Delivary</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style1.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>

    </style>
</head>
<body>
<nav class="menuNav">
    <div class="container">
        <div class="nav-items">
        <div class="logo"><img class="logo" src="../images/akla.png" alt="Akla Logo "></div>

            <a href="{{route('home')}}">Home</a>
            <div>
            <a href="{{route('Meals.Get')}}" aria-expanded="true">Menu</a>
            </div>
            <a href="{{route('Product.MyCart')}}">Shopping Cart</a>
            <div class="active">
                <a href="{{route('delivery')}}"  aria-expanded="true">Delivary Details</a>
            </div>
            <a href="{{route('checkout')}}">Checkout</a>
            <a id="navbar" class="nav-link" role="button" aria-haspopup="true" aria-expanded="false" v-pre
               href="{{ route('history', auth()->user()) }}">History</a>
            <!-- <a id="navbar" class="nav-link" role="button" aria-haspopup="true" aria-expanded="false" v-pre
               href="{{ route('history', auth()->user()) }}">History</a> -->
            <!-- <form method="POST" action="{{ route('logout') }}">
                @csrf
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
                <td>{{$Delivery->city}}</td>
                <td>{{$Delivery->district}}</td>
                <td>{{$Delivery->street}}</td>
                <td>{{$Delivery->building_number}}</td>
                <td>{{$Delivery->department_number}}</td>
                <td>{{$Delivery->phone_number}}</td>
                <td>{{$Delivery->Popular_Mark}}</td>
                </tr>
         </tbody>
    </table>
</div>
<div style="display:flex ;  justify-content: space-around;">
   <a class="btn btn-danger" href="{{ url('/delivary/edit/'.Auth::id())}}" > Update Details </a>
   <a class="btn btn-primary" href="{{ url('/check-out')}}"> Confirm Details </a>
</div>
</body>
</html>
