<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Data</title>
    <x-bootstrap-css/>
</head>
<body>
    <x-navbar/>

    <div class="d-flex justify-content-around">
        <h1 class="text-success text-center m-5">All Students Data</h1>
        <div class="m-5">
            <a href="{{ route('students.create') }}" class="text-decoration-none">
                <x-button class="info" name="Create New Student"/>
            </a>
        </div>
        <a href="{{ route('home') }}">
            <x-button class="success m-5" name="Home"/>
        </a>
    </div>

    <table class="table table-bordered w-75 m-auto text-center">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>
                    @if($student->image)
                        <img src="{{ asset('assets/images/'.$student->image) }}" alt="{{ $student->name }}" width="100" height="100">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>

                <td>{{ $student->gender }}</td>
                <td class="d-flex justify-content-around">
                    <a href="{{ route('students.show',$student->id) }}" class="text-decoration-none">
                        <x-button class="warning" name="View"/>
                    </a>

                    <form action="{{ route('students.destroy',$student->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <x-button class="danger" name="Delete"/>
                    </form>
                    <a class="text-decoration-none" href="{{ route('students.edit',$student->id ) }}"> <x-button class="info" name="Update"/></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <x-footer/>
    <x-bootstrap-js/>
</body>
</html>
