<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>
    <x-bootstrap-css></x-bootstrap-css>
</head>
<body>
    <x-navbar></x-navbar>

    <h1 class="text-info text-center m-5">Create New Student</h1>

    <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data"
          class="rounded w-75 mx-auto my-5 border p-5">
        @csrf

        {{-- Name --}}
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" type="text" class="form-control" value="{{ old('name') }}">
        </div>

        {{-- Email --}}
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control" value="{{ old('email') }}">
        </div>

        {{-- Address --}}
        @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Address</label>
            <input name="address" type="text" class="form-control" value="{{ old('address') }}">
        </div>

        {{-- Gender --}}
        @error('gender')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Gender</label><br>
            <select name="gender" class="form-select">
                <option value="">-- Select Gender --</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        {{-- Age --}}
        @error('age')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Age</label>
            <input name="age" type="number" class="form-control" value="{{ old('age') }}">
        </div>

        {{-- Image --}}
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Profile Image</label>
            <input name="image" type="file" class="form-control">
        </div>

        {{-- Buttons --}}
        <div class="d-flex justify-content-between">
            <x-button class="primary" name="Add Student"></x-button>
            <a href="{{ route('students.index') }}">
                <x-button class="secondary" name="Cancel"></x-button>
            </a>
        </div>
    </form>

    <x-footer></x-footer>
    <x-bootstrap-js></x-bootstrap-js>
</body>
</html>
