 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="icon" href="images/akla.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>A K L N I Edit Details</title>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <!-- <div class="card-header">
                    <h4>Edit & Update  Details
                        <a href="{{ url('contacts') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div> -->
                <div class="card-body">

                    <form action="{{ url('admin/update-about/'.$about->id) }}" method="POST" id="aboutform">
                        @csrf
                        @method('PUT')
   
                        <div class="form-group mb-3">
                            <label for=""> About</label>
                            <textarea rows="4" cols="50" name="about" form="aboutform"  class="form-control">
                            {{$about->about}}</textarea>
                            <!-- <input type="text" name="about" value="{{$about->about}}" class="form-control"> -->
                        </div> 
                                

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update About</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>  