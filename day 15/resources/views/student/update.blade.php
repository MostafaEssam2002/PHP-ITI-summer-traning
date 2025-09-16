<!-- resources/views/students/update.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Update Student</title>
</head>
<body>
    <x-navbar/>

    <h1 class="text-info text-center m-5 text-capitalize">
        Update <span class="text-danger">{{ $student->name }}</span> Profile
    </h1>

    <form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Name </label>
            <input value="{{ $student->name }}" name="name" type="text" class="form-control" id="exampleInputName1">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email </label>
            <input value="{{ $student->email }}" name="email" type="email" class="form-control" id="exampleInputEmail1">
        </div>

        <div class="mb-3">
            <label class="form-label">Gender </label><br>
            <label for="male" class="form-label">Male</label>
            <input type="radio" name="gender" id="male" value="male" {{ $student->gender == 'male' ? 'checked' : '' }}>
            <label for="female" class="form-label ms-3">Female</label>
            <input type="radio" name="gender" id="female" value="female" {{ $student->gender == 'female' ? 'checked' : '' }}>
        </div>

        @if($student->image)
            <div class="mb-3">
                <img src="{{ asset('assets/images/'.$student->image) }}" width="100" alt="Current Image">
            </div>
        @endif

        <div class="mb-3">
            <label for="image" class="form-label">Change Image</label>
            <input name="image" type="file" class="form-control" id="image">
        </div>


        <div class="mb-3">
            <label for="exampleInputAddress1" class="form-label">Address </label>
            <input value="{{ $student->address }}" name="address" type="text" class="form-control" id="exampleInputAddress1">
        </div>

        <div class="mb-3">
            <label for="exampleInputAge1" class="form-label">Age </label>
            <input value="{{ $student->age }}" name="age" type="number" class="form-control" id="exampleInputAge1">
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary m-3">Update</button>
            <a href="{{ route('students.index') }}">
                <x-button class="warning m-3" name="Back"></x-button>
            </a>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>
