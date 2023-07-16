<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Style Sheet -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/menu.css" />
    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />

    <title>Checkout | Rewear</title>
</head>
<body>


<nav class="menuNav">
    <div class="container">
        <div class="nav-items">
        <div class="logo"><img class="logo" src="../images/akla.png" alt="Akla Logo "></div>
        <a href="{{route('home')}}"> Home</a>
        <a href="{{route('Meals.Get')}}">Menu</a>
        <a href="{{route('Product.MyCart')}}" >Shopping Cart</a>
        <a href="{{route('delivery')}}">Delivary Details</a>
        <div class="active">
            <a href="{{route('Product.MyCart')}}" aria-expanded="true">Checkout</a>
        </div>
        <a id="navbar" class="nav-link" role="button" aria-haspopup="true" aria-expanded="false" v-pre
        href="{{ route('history', auth()->user()) }}">History</a>
             <!-- <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button>Logout</button>
            </form> -->
        </div>
    </div>
</nav>
<div class="container">
               <div class="order-summary">
                        <div class="checkout total-price">
                            <div class="item">Estimated Total</div>
                            <div class="price">{{\App\Models\Bank::where('userid',Auth::id())->get()->first()->totalPrice}}</div>
                        </div>
                        <div class="btn main-btn"> <a href="{{url('stripe')}}"> Pay online </a> </div>
                        <div class="btn main-btn"> <a href="{{route('Order.send', Auth::id())}}"> Pay on Delivery </a> </div>
                        <div class="payment-method">
                            <div class="py">Payment methods</div>
                            <div class="methods">
                                <img src="images/cards/2.png" />
                                <img src="images/cards/3.png" />
                                <img src="images/cards/4.png" />
                            </div>
                        </div>
                    </div>
</div>

</body>