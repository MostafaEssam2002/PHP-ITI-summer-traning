<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <title>Create Course</title>
</head>
<body>
<x-navbar/>

<h1 class="text-info text-center m-5">Create New Course</h1>

<form method="POST"
      action="{{ route('courses.store') }}"
      class="rounded w-75 mx-auto my-5 border p-5"
      enctype="multipart/form-data">
    @csrf

    {{-- name --}}
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="courseName" class="form-label">Name</label>
        <input name="name" type="text" class="form-control" id="courseName" value="{{ old('name') }}">
    </div>

    {{-- grade --}}
    @error('grade')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="courseGrade" class="form-label">Grade</label>
        <input name="grade" type="text" class="form-control" id="courseGrade" value="{{ old('grade') }}">
    </div>

    {{-- description --}}
    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="courseDescription" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="courseDescription" rows="3">{{ old('description') }}</textarea>
    </div>

    {{-- image --}}
    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="courseImage" class="form-label">Image</label>
        <input name="image" type="file" class="form-control" id="courseImage">
    </div>

    <button type="submit" class="btn btn-primary">Add New Course</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
