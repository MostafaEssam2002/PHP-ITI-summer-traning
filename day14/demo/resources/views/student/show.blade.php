<!DOCTYPE html>
<html>
<head>
    <title>Show Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h2 class="mb-4">Student Details</h2>

    <div class="card p-3">
        <p><strong>ID:</strong> {{ $student->id }}</p>
        <p><strong>Name:</strong> {{ $student->name }}</p>
        <p><strong>Email:</strong> {{ $student->email }}</p>
        <p><strong>Gender:</strong> {{ $student->gender }}</p>
        <p><strong>Track:</strong> {{ $student->track->name ?? 'N/A' }}</p>
    </div>

    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
</body>
</html>
