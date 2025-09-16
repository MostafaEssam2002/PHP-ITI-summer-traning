<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Show Course</title>
</head>
<body>
<x-navbar/>

<div class="container mt-5">
    <h1 class="text-center text-primary mb-4">Course Details</h1>

    <div class="card w-75 mx-auto">
        <div class="card-body">
            <h3 class="card-title">{{ $course->name }}</h3>
            <p><strong>Grade:</strong> {{ $course->grade }}</p>
            <p><strong>Description:</strong> {{ $course->description }}</p>

            @if($course->image)
                <img src="{{ asset('assets/images/' . $course->image) }}" width="200" class="d-block mx-auto my-3">
            @else
                <p class="text-muted">No Image</p>
            @endif

            <div class="mt-3">
                <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
