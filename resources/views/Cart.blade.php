<!DOCTYPE html>
<html lang="en" xmlns:wire="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Style Sheet -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />

</head>
<body>
<nav>
    <div class="container">
        <div class="logo">Refood</div>
        <div class="nav-items">
            <a href="{{route('home')}}">Home</a>
            <a href="products.html">Products</a>
            <a href="cart.html" class="active">Shopping Cart</a>
            <a href="profile.html">Profile</a>
            <a href="{{route('logout')}}">Logout</a>
        </div>
        <div class="floating-icons">
            <i class="fa-solid fa-magnifying-glass"></i>
            <i class="fa-regular fa-heart"></i>
        </div>
    </div>
</nav>

<div class="shopping-bag">
    <div class="container">
        <!-- Header -->
        <div class="heading">Your Bag</div>
        <div class="bag-actions">
            <a class="btn main-btn" href="products.html">Continue Shopping</a>
            <a class="btn main-btn" href="Payment.html">Checkout Now</a>
        </div>
        <!-- Bag -->
        <div class="wrap-iten-in-cart">
            @if(Cart::count() > 0)
                <h3 class="box-title">Products Name</h3>
                <ul class="products-cart">
                    @foreach (Cart::content() as $item)
                        <li class="pr-cart-item">
                            <div class="product-image">
                                <figure><img src="{{ ('assets/images/products') }}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                            </div>
                            <div class="product-name">
                                <a class="link-to-product" href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a>
                            </div>
                            <div class="price-field produtc-price"><p class="price">${{$item->model->price}}</p></div>
                            <div class="quantity">
                                <div class="quantity-input">
                                    <input type="text" name="product-quatity" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" >
                                    <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></a>
                                    <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"></a>
                                </div>
                            </div>
                            <div class="price-field sub-total"><p class="price">${{$item->subtotal}}</p></div>
                            <div class="delete">
                                <a href="#" wire:click.prevent="destroy('{{$item->rowId}}')" class="btn btn-delete" title="">
                                    <span>Delete from your cart</span>
                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>

        </div>
        <div class="order-summary">
            <div class="header">Order Summary</div>
            <div class="checkout">
                <div class="item">Subtotal</div>
                <div class="price">{{Cart::subtotal()}}</div>
            </div>
            <div class="checkout">
                <div class="item">Estimated Tax</div>
                <div class="price">{{Cart::tax()}}</div>
            </div>
            <div class="checkout total-price">
                <div class="item">Estimated Total</div>
                <div class="price">{{Cart::total()}}</div>
            </div>

            @else
                <p>  No item in cart  </p>

            @endif
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
</div>
</div>
<footer>
    <div class="container">
        <div class="footer-header">Top Items</div>
        <div class="categories">
            <div class="cat">Cooked Vegetables</div>
            <div class="cat">Oven-Grilled</div>
            <div class="cat">Chili Shrimps</div>
            <div class="cat">Cooked Honey Roll</div>
            <div class="cat">Barbecued Potatoes</div>
            <div class="cat">Pan-Fried Garlic</div>
            <div class="cat">Creamy Buns</div>
            <div class="cat">Cranberry Cheesecake</div>
            <div class="cat">Mint Pie</div>
            <div class="cat">Rum Tart</div>
            <div class="cat">Lemon Fish</div>
            <div class="cat">Mustard Snapper</div>
            <div class="cat">Cooked Stew of Scallops</div>
            <div class="cat">Cinnamon Snacks</div>
            <div class="cat">Lime Ice Lollies</div>
            <div class="cat">Strawberry Roll</div>
            <div class="cat">Almond Cake</div>
            <div class="cat">Orange Trifle</div>
            <div class="cat">Cinnamon Bonbons</div>
            <div class="cat">Rosemary Alligator</div>
            <div class="cat">Grilled Beets</div>
            <div class="cat">Apple Jelly</div>
            <div class="cat">Almond Fudge</div>
            <div class="cat">Kiwi Soufflé</div>
            <div class="cat">Shrimps</div>
            <div class="cat">Fried Yogurt Crab</div>
            <div class="cat">Conservative Collection</div>
            <div class="cat">Pickled Cheese</div>
            <div class="cat">Beef</div>
            <div class="cat">Blueberry Snacks</div>
        </div>
        <div class="methods">
            <img src="images/cards/1.png" />
            <img src="images/cards/2.png" />
            <img src="images/cards/3.png" />
            <img src="images/cards/4.png" />
        </div>
    </div>
</footer>
</body>
</html>
