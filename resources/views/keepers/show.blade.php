<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keeper Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="{{ route('keepers.index') }}">
            Zoo Management System
        </a>
    </div>
</nav>

<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Keeper Details</h4>
        </div>

        <div class="card-body">
            <p><strong>Name:</strong> {{ $keeper->name }}</p>
            <p><strong>Email:</strong> {{ $keeper->email }}</p>
            <p><strong>Phone:</strong> {{ $keeper->phone ?? 'N/A' }}</p>
            <p><strong>Role:</strong> {{ $keeper->role }}</p>

            <hr>

            <h5>Assigned Animals</h5>

            @if($keeper->animals->isEmpty())
                <p>No animals are assigned to this keeper.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-success">
                            <tr>
                                <th>Animal Name</th>
                                <th>Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($keeper->animals as $animal)
                                <tr>
                                    <td>{{ $animal->name }}</td>
                                    <td>{{ $animal->gender }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <a href="{{ route('keepers.edit', $keeper) }}"
               class="btn btn-warning">Edit</a>

            <a href="{{ route('keepers.index') }}"
               class="btn btn-secondary">Back to Keepers</a>
        </div>
    </div>
</div>

</body>
</html>
