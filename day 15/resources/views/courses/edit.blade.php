<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Course</title>
</head>
<body>
<x-navbar/>

<h1 class="text-info text-center m-5">Edit Course</h1>

<form method="POST" action="{{ route('courses.update', $course->id) }}" class="rounded w-75 mx-auto my-5 border p-5" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    {{-- name --}}
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input name="name" type="text" class="form-control" value="{{ old('name', $course->name) }}">
    </div>

    {{-- grade --}}
    <div class="mb-3">
        <label class="form-label">Grade</label>
        <input name="grade" type="text" class="form-control" value="{{ old('grade', $course->grade) }}">
    </div>

    {{-- description --}}
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3">{{ old('description', $course->description) }}</textarea>
    </div>

    {{-- image --}}
    <div class="mb-3">
        <label class="form-label">Image</label>
        @if($course->image)
            <p>Current Image:</p>
            <img src="{{ asset('assets/images/' . $course->image) }}" width="100" class="mb-2">
        @endif
        <input name="image" type="file" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Update Course</button>
    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
</form>
</body>
</html>
