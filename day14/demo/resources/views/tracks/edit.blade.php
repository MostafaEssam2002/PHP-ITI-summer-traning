<!DOCTYPE html>
<html>
<head>
    <title>Edit Track</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-3 text-center">Edit Track</h2>

    <form action="{{ route('tracks.update', $track->id) }}" method="POST" enctype="multipart/form-data" class="shadow p-4 bg-white rounded">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Track Name</label>
            <input type="text" name="name" class="form-control" value="{{ $track->name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ $track->description }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Current Image</label><br>
            @if($track->image_path)
                <img src="{{ asset($track->image_path) }}" width="120" class="rounded shadow mb-2">
            @else
                <span class="text-muted">No Image</span>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Change Image</label>
            <input type="file" name="image_path" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('tracks.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
