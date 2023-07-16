<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>A K L N I Users</title>
</head>

<body style="margin:50px;">
    <h1>List of Users</h1>
    <br>
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Is Admin</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
        </thead>
        <tbody>
            @foreach($users as $users)
            <tr>
                <td>{{$users->id}}</td>
                <td>{{$users->is_admin}}</td>
                <td>{{$users->name}}</td>
                <td>{{$users->email}}</td>
                <td>{{$users->password}}</td>
                 <td> <a class="btn btn-danger" href="{{url('admin/suspend/'.$users->id)}}"> Suspend </a></td>
             </tr>
            @endforeach

        </tbody>

    </table>
     <a class="btn btn-primary" href="{{url('admin')}}"> Back </a>


</body>

</html>