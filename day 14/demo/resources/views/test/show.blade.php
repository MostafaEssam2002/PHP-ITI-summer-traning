<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title><!-- <?php

// echo "<h1>All users Page </h1>";
// var_dump($users);
?> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Show user Data</title>
</head>
<body>

{{-- @dump($users) --}}

<h1 class="text-success text-center m-5">{{ $user['name'] }} Page</h1>
<table class="table table-striped  w-75 m-auto ">
<thead>
    <th>ID</th>
    <th>Course Name</th>
    <th>Departmane</th>
    <th>Actions</th>
</thead>
    <tbody>


         {{-- @dump($user) --}}

         <tr>
            <td>{{$user['id']  }}</td>
            <td>{{$user['name']  }}</td>
            <td>{{$user['department']  }}</td>
            <td class="p-2">
                <button class="btn btn-info">Back</button>
                <button class="btn btn-danger">Delete</button>
            </td>
         </tr>

    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

</head>
<body>
    
</body>
</html>
