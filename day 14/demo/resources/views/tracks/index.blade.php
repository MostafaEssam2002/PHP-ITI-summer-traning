<!DOCTYPE html>
<html>
<head>
    <title>Tracks List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-3 text-center">All Tracks</h2>
    <a href="{{ route('tracks.create') }}" class="btn btn-success mb-3">+ Add New Track</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-hover table-bordered shadow">
        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Created At</th>
                <th width="200px">Actions</th>
            </tr>
        </thead>
        <tbody class="align-middle">
            @foreach($tracks as $track)
                <tr>
                    <td>{{ $track->id }}</td>
                    <td>{{ $track->name }}</td>
                    <td>{{ Str::limit($track->description, 50) }}</td>
                    <td style="text-align: center">
                        @if($track->image_path)
                            <img src="{{ asset($track->image_path) }}" width="80" class="rounded shadow">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $track->created_at->format('Y-m-d') }}</td>
                    <td class="text-center">
                        <a href="{{ route('tracks.show', $track->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('tracks.edit', $track->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('tracks.destroy', $track->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this track?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
