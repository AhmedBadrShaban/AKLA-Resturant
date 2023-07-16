@extends('layouts.app')

@section('content')

sadas

<div class="food-category">
  <ul class="cards" >
    <li>
        <a class="shopping-link btn-link" href="{{url('admin/menu/'.strval($meal-> id).'/edit/')}}">
          <i class="fa-regular fa-pen-to-square"></i>
        </a> 

        <a class="btn-link" href="{{url('admin/menu/'.strval($meal-> id).'/delete/')}}" >
          <i class="fa-solid fa-xmark x-mark"></i>
        </a>
        <a class="card meal">
              
    <img
      src="{{$meal-> photo}}"
      class="card-image"
      alt="meat"
      style="max-width: 400px;"
    />
      <div class="card-overlay">
        <div class="card-header">
          <svg class="border">
            <path />
          </svg>

          <div class="card-header-text">
            <h3 class="card-title">
              <div>{{$meal->title}} 
                <span style="opacity: 0.4">({{$meal->num_of_reviews}})</span>
              </div>
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
  </ul>
</div>
@endsection
