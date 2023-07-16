<!DOCTYPE html>
<html>
<head>
    <title>Delivary | Checkout</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/menu.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />
        <!-- MDB -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
        rel="stylesheet"
        />
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
<div class="container mt-4" style="display:flex; justify-content: center;
">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card" style="width:fit-content;">
        <div class="card-header text-center font-weight-bold">
            Delivery Details
        </div>
        <div class="card-body">
            <form  action="{{ url('/update-delivery/'.Auth::id())}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
      <input value="{{$Delivery->city}}" type="string" id="city" name="city" class="form-control" required="">
      <label class="form-label" for="form6Example1">City</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input value="{{$Delivery->district}}" type="string" id="district" name="district" class="form-control" required="">
        <label class="form-label" for="form6Example2">District</label>
      </div>
    </div>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
  <input value="{{$Delivery->street}}" type="string" id="street" name="street" class="form-control" required="">
    <label class="form-label" for="form6Example3">Street</label>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
  <input value="{{$Delivery->building_number}}" type="number" id="building_number" name="building_number" class="form-control" required="">
    <label class="form-label" for="form6Example4">Building Number</label>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
  <input value="{{$Delivery->department_number}}" type="number" id="department_number" name="department_number" class="form-control" required="">
    <label class="form-label" for="form6Example5">Department Number</label>
  </div>

  <!-- Number input -->
  <div class="form-outline mb-4">
  <input value="{{$Delivery->phone_number}}" type="string" id="phone_number" name="phone_number" class="form-control" required="">
    <label class="form-label" for="form6Example6">Phone Number</label>
  </div>

  <div class="form-outline mb-4">
  <input value="{{$Delivery->Popular_Mark}}" type="string" id="Popular_Mark" name="Popular_Mark" class="form-control" required="">
     <label class="form-label" for="form6Example6">Popular Mark</label>
  </div>
  
  <!-- Message input -->
  <div class="form-outline mb-4">
    <textarea value="{{$Delivery->delivery_time}}" class="form-control" id="form6Example7" name="delivery_time" rows="4"></textarea>
    <label class="form-label" for="form6Example7">Additional information</label>
  </div>

  <!-- Checkbox -->
  <div class="form-check d-flex justify-content-center mb-4">
    <input class="form-check-input me-2" type="checkbox" value="" id="form6Example8" checked />
    <label class="form-check-label" for="form6Example8"> Save my details </label>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4" style="margin:0;">Update</button>
            </form>
        </div>
    </div>
</div>
</body>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
></script>
</html>
