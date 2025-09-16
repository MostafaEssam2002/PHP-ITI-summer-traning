<!DOCTYPE html>
<html>
<head>
    <title>Create Track</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-3 text-center">Add New Track</h2>

    <form action="{{ route('tracks.store') }}" method="POST" enctype="multipart/form-data" class="shadow p-4 bg-white rounded">
        @csrf
        <div class="mb-3">
            <label class="form-label">Track Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter track name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Enter description" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image_path" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('tracks.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
