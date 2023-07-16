@extends('layouts.app')

@section('content')
    <div class="wrapper">
      <!-- Add Product Form -->
      <div class="heading">Add Category</div>
      <form action="{{url('admin/menu/storeType')}}" method = "POST" enctype="multipart/form-data">
        @csrf
        <div class="form-body">
          <div class="input">
            <div class="input-heading">Category Name</div>
            <input type="text" class="@error('type_name') is-invalid @enderror form-control" name='type_name' id="type_name">
                @error('type_name')
                    <span style="color:red;" class="alert-danger">{{ $message}}</span>
                @enderror
          </div>
          <input class="submit" type="submit" />
    </form>
</div>
@endsection