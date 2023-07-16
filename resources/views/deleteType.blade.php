@extends('layouts.app')

@section('content')
<div class="wrapper">
      <!-- Add Product Form -->
      <div class="heading">Delete Category : {{$type-> type_name}}</div>
    <form  action="{{url('admin/menu/'.strval($type-> id).'/destroyType')}}" method="post">
            @csrf
            @method('DELETE')
          <div class="form-body">
          <div class="input">
            <div class="input-heading">Move to trash?</div>
            </div>
        <input type="submit" class="submit" value="Delete" >
    </form>
    <a href="{{url('admin/menu')}}" class="submit-invers">Cancel</a>
</div>
@endsection
