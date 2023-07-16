@extends('layouts.app')

@section('content')
    <div class="wrapper">
      <!-- Add Product Form -->
      <div class="heading">Add Product</div>
      <form action="{{url('admin/menu/store')}}" method = "POST" enctype="multipart/form-data">
        @csrf
        <div class="image">
          <input type="file" class=" @error('photo') is-invalid @enderror form-control-file" name='photo' id="photo" style="display: none;">
                @error('photo')
                    <span style="color:red;" class="alert-danger"> <br>{{ $message}}</span>
                @enderror
           <label class="btn" for="photo"  >Browse Files</label>

        </div>
        <div class="form-body">
          <div class="input">
            <div class="input-heading">Product Name</div>
            <input placeholder="eg. pepperoni pizza" type="text" class="@error('title') is-invalid @enderror form-control" name='title' id="title">
                @error('title')
                    <span style="color:red;" class="alert-danger">{{ $message}}</span>
                @enderror
          </div>
          <div class="input">
            <div class="input-heading">Category</div>
            <select class="form-control @error('type') is-invalid @enderror" name='type' id="type">
                @foreach ($types as $type)
                    <option value="{{$type->type_name}}">{{$type->type_name}}</option>
                @endforeach
                @error('type')
                    <span style="color:red;" class="alert-danger">{{ $message}}</span>
                @enderror
            </select>
          </div>
          <div class="input">
          <label for="price" class="input-heading">Price</label>
          <input type="text" class="@error('price') is-invalid @enderror form-control"  name='price' id="price">
                @error('price')
                    <span style="color:red;" class="alert-danger">{{ $message}}</span>
                @enderror
          </div>
          <div class="input">
          <label for="description" class="input-heading">Description</label>
            <textarea class="@error('description') is-invalid @enderror form-control" name='description' id="description" rows="3"></textarea>
                @error('description')
                    <span style="color:red;" class="alert-danger">{{ $message}}</span>
                @enderror
          </div>
        </div>
        <input class="submit" type="submit" />
      </form>
      <!-- End Add Product Form -->
    </div>

@endsection
