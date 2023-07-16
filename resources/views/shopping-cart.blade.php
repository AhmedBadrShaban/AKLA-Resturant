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
        <div class="active">
            <a href="{{route('Product.MyCart')}}" aria-expanded="true">Shopping Cart</a>
        </div>
        <a href="{{route('delivery')}}">Delivary Details</a>
            <a href="{{route('checkout')}}">Checkout</a>
            <a id="navbar" class="nav-link" role="button" aria-haspopup="true" aria-expanded="false" v-pre
               href="{{ route('history', auth()->user()) }}">History</a>
             <!-- <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button>Logout</button>
            </form> -->
        </div>
    </div>
</nav>



<div class="shopping-bag">
    <div class="container">
        <!-- Header -->
        <div class="heading">Your Bag</div>


        <div class="bag-actions">
            <div class="bag-tabs" >
                <div class="tab active">Shopping Bag ({{count($cards)}}) </div>
            </div>
        </div>

        <!-- Bag -->
        <div class="bag">

            @foreach($cards as $card)
                <p style="display: none">{{$c = \App\Models\Cart::where('meal_id',$card->meal_id)->where('user_id',Auth::id())->get()->count()}}</p>
                <p style="display: none">{{$n = \App\Models\Meal::where('id',$card->meal_id)->get()->first()}}</p>

                <div class="bag-items">
                    <!-- Item -->
                    <div class="bag-item">
                        <div class="product-img">
                            <img src="{{$n['photo']}}" alt="product image" style=""/>
                        </div>
                        <div class="product-desc">
                            <div class="product-name">
                                {{$n['title']}}
                            </div>
                            <div class="product-price">{{$c * $n['price']}}</div>
                            <div class="product-size">Quantity: {{$c}}</div>

                        <div class="remove">
                            <a href="{{route('product.del',$card->meal_id)}}">
                                <i class="fa-solid fa-x"></i>
                            </a>
                        </div>
                    </div>
                    <!-- End Item -->
                </div>
                </div>
            @endforeach

                    <div class="order-summary">
                        <div class="checkout total-price">
                            <div class="item">Send Order</div>
                            <div class="price">{{\App\Models\Bank::where('userid',Auth::id())->get()->first()->totalPrice}}</div>
                        </div>
                        <div class="btn main-btn"> <a href="{{route('delivery')}}"> Delivery Details </a> </div>
                            </div>
                        </div>
                    </div>
               </div>
</div>
</div>
<footer>
    <div class="container">
    </div>
</footer>

<!-- Javascript -->
<link rel="script" href="javascript/main.js" />
</body>
</html>



