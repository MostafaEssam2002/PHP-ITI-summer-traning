<!DOCTYPE html>
<html>
<head>
    <title>Track Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-3 text-center">Track Details</h2>

    <table class="table table-bordered shadow bg-white">
        <tr>
            <th>ID</th>
            <td>{{ $track->id }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $track->name }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $track->description }}</td>
        </tr>
        <tr>
            <th>Image</th>
            <td>
                @if($track->image_path)
                    <img src="{{ asset($track->image_path) }}" width="200" class="rounded shadow">
                @else
                    <span class="text-muted">No Image</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $track->created_at->format('Y-m-d H:i') }}</td>
        </tr>
    </table>

    <a href="{{ route('tracks.index') }}" class="btn btn-secondary">Back</a>
</div>
</body>
</html>
