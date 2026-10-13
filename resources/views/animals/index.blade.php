
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zoo Management - Animals</title>
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
        <h1>Animals</h1>
        <a href="{{ route('animals.create') }}" class="btn btn-success">
            + Add Animal
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            Please correct the errors in your submission.
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-success">
                    <tr>
                        <th>Name</th>
                        <th>Species</th>
                        <th>Enclosure</th>
                        <th>Keeper</th>
                        <th>Gender</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($animals as $animal)
                        <tr>
                            <td>{{ $animal->name }}</td>
                            <td>{{ $animal->species->name }}</td>
                            <td>{{ $animal->enclosure->name }}</td>
                            <td>{{ $animal->keeper->name }}</td>
                            <td>{{ $animal->gender }}</td>
                            <td>
                                <a href="{{ route('animals.show', $animal) }}"
                                   class="btn btn-sm btn-info">View</a>

                                <a href="{{ route('animals.edit', $animal) }}"
                                   class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('animals.destroy', $animal) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this animal?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                No animals found. Add your first animal.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $animals->links() }}
    </div>
</div>

</body>
</html>