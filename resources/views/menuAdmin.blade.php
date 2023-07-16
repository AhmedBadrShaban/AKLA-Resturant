@extends('layouts.app')

@section('content')
<div class="add-category">
<a href="{{url('admin/menu/addType')}}" class="add-btn">Add Category</a>
<a href="{{url('admin/')}}" class="add-btn float-end">back</a>
       </div>
@foreach ($types as $type) 
      <div class="food-category">
        <div class="category-title">
        
        <div class="delete-category-btn">
          <a 
              class="btn-link" 
              href="{{url('admin/menu/'.strval($type-> id).'/deleteType')}}">
              Delete category
            </a><br>

            
          </div>
          {{$type->type_name}}
          
        </div>
        <ul class="cards">
          @foreach ($meals as $meal)
          <?php if($meal['type_id'] == $type->id) :?>
          <li>
            <a class="shopping-link btn-link" href="{{url('admin/menu/'.strval($meal-> id).'/edit/')}}">
              <i class="fa-regular fa-pen-to-square"></i>
            </a> 

            <a class="btn-link" href="{{url('admin/menu/'.strval($meal-> id).'/delete/')}}" >
              <i class="fa-solid fa-xmark x-mark"></i>
            </a>
            <a class="card"  href="{{url('admin/menu/'.strval($meal-> id))}}">
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
                      <div>{{$meal->title}}</div>
                    </h3>
                    <span class="price">{{$meal->price}} EGP</span>
                    <div class="rate-container">
                      <?php if($meal['rate'] < 1) : ?>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                        <span style="opacity: 0.4">({{$meal->num_of_reviews}})</span>

                      <?php elseif($meal['rate'] == 1) : ?>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                        <span style="opacity: 0.4">({{$meal->num_of_reviews}})</span>

                      <?php elseif($meal['rate'] <= 2) : ?>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                        <span style="opacity: 0.4">({{$meal->num_of_reviews}})</span>

                      <?php elseif($meal['rate'] <= 3) : ?>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                        <span style="opacity: 0.4">({{$meal->num_of_reviews}})</span>

                      <?php elseif($meal['rate'] <= 4) : ?>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star"></span>
                        <span style="opacity: 0.4">({{$meal->num_of_reviews}})</span>

                      <?php else : ?>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>                      
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                        <span style="opacity: 0.4">({{$meal->num_of_reviews}})</span>

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
          
          <?php 
          
          if($type['count'] == 0): ?>
          <li>
            <a id="plus" href="{{url('admin/menu/create')}}" class="card add-cart">
              <img
                src="{{ URL::asset('uploads/add-item.png') }}"
                class="card-image"
                alt="add item"
              />
            </a>
          </li>
          <?php else: ?>
          <li>
            <a  href="{{url('admin/menu/create')}}" class="card add-cart">
              <img
                src="{{ URL::asset('uploads/add-item.png') }}"
                class="card-image"
                alt="add item"
              />
            </a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
      @endforeach
      

      @endsection
