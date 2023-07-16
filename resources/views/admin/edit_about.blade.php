<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/akla.ico">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>A K L N I Edit About</title>
</head>

<body style="margin:50px;">
    <h1>Current About</h1>
    <br>
    <table class="table">
        <thead>
            <th>About</th>
        </thead>
        <tbody>
        @foreach( $contacts as $contacts)
            <tr>
                <td>{{$contacts->about}}</td>
                <td> <a class="btn btn-primary" href="{{ url('admin/about/edit/'.$contacts->id)}}"> update About </a></td>
             </tr>
            @endforeach
        </tbody>
    </table>

    <a class="btn btn-primary" href="{{ url('/admin')}}"> Back </a>

</body>

</html>
