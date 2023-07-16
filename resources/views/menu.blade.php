@extends('layouts.app')
<nav class="menuNav">
    <div class="container">
        <div class="nav-items">
        <div class="logo"><img class="logo" src="../images/akla.png" alt="Akla Logo "></div>

            <a href="{{route('home')}}">Home</a>
            <div class="active">
            <a href="{{route('Meals.Get')}}" aria-expanded="true">Menu</a>
            </div>
            <a href="{{route('Product.MyCart')}}">Shopping Cart</a>
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

@section('content')
    @if (session('status'))
        <div class="alert alert-success container">
            {{ session('status') }}
        </div>
    @endif

    @foreach ($types as $type)
<div class="food-category">
  <div class="category-title">
    {{$type->type_name}}
  </div>
  <?php if($type['count'] == 1): ?>
  <ul class="cards stand-alone">
  <?php else: ?>
  <ul class="cards" >
    <?php endif; ?>
      @foreach ($meals as $meal)
      <?php if($meal['type_id'] == $type->id) : ?>
      <li>
        <a class="shopping-link btn-link" href="{{route('Product.shoppingCart',$meal->id)}}"><i class="fa-solid fa-cart-plus"></i></a>
        <a class="card" href="{{url('menu/'.strval($meal-> id))}}">
          <img
            src="{{$meal-> photo}}"
            class="card-image"
            alt="meat"
          />
          <div class="card-overlay">
            <div class="card-header">
              <svg class="border">
                <path />
              </svg>

              <div class="card-header-text">
                <h3 class="card-title">
                  <div>{{$meal->title}} <span style="opacity: 0.4">({{$meal->num_of_reviews}})</span></div>

                </h3>
                <span class="price">{{$meal->price}} EGP</span>
                <div class="rate-container">
                  <?php if($meal['rate'] < 1) : ?>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>

                  <?php elseif($meal['rate'] == 1) : ?>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>

                  <?php elseif($meal['rate'] <= 2) : ?>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>

                  <?php elseif($meal['rate'] <= 3) : ?>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>

                  <?php elseif($meal['rate'] <= 4) : ?>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>

                  <?php else : ?>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>

                  <?php endif; ?>
                </div>
              </div>
            </div>
            <p class="card-description">
              {{$meal->description}}
            </p>
          </div>
        </a>
      </li>
    <?php endif; ?>
    @endforeach
  </ul>
</div>
@endforeach

@endsection
