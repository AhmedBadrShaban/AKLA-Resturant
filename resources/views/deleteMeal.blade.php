@extends('layouts.app')

@section('content')

<div class="wrapper">
      <!-- Add Product Form -->
      <div class="heading">Delete Meal</div>
      <form  action="{{url('admin/menu/'.strval($meal-> id).'/destroy')}}" method="post">
            @csrf
            @method('DELETE')
          <div class="form-body">
          <div class="input">
          <i class="fa-solid fa-xmark x-mark"></i>
            <a class="card">
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
          <div class="input-heading">Move to trash?</div>
          </div>
        <input type="submit" class="submit" value="Delete" >
    </form>
    <a href="{{url('admin/menu')}}" class="submit-invers">Cancel</a>
</div>
@endsection
