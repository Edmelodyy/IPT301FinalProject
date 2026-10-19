<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zoo Management - Keepers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="{{ route('animals.index') }}">
            Zoo Management System
        </a>
    </div>
</nav>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Zoo Keepers</h1>
        <a href="{{ route('keepers.create') }}" class="btn btn-success">
            + Add Keeper
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-success">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Animals</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($keepers as $keeper)
                        <tr>
                            <td>{{ $keeper->name }}</td>
                            <td>{{ $keeper->email }}</td>
                            <td>{{ $keeper->phone ?? 'N/A' }}</td>
                            <td>{{ $keeper->role }}</td>
                            <td>{{ $keeper->animals_count }}</td>
                            <td class="text-nowrap">
                                <a href="{{ route('keepers.show', $keeper) }}"
                                   class="btn btn-sm btn-info">View</a>

                                <a href="{{ route('keepers.edit', $keeper) }}"
                                   class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('keepers.destroy', $keeper) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Delete this keeper?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                No keepers found. Add your first keeper.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $keepers->links('pagination::bootstrap-5') }}
    </div>

    <a href="{{ route('animals.index') }}" class="btn btn-secondary mt-3">
        Back to Animals
    </a>
</div>

</body>
</html>
