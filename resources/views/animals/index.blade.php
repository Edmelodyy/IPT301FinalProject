<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Zoo Management System - Animals</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        body {
            background-color: #f5f7f5;
        }

        .page-title {
            color: #198754;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-dark bg-success shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold"
               href="{{ route('animals.index') }}">
                Zoo Management System
            </a>

            <div class="d-flex gap-2">
                <a href="{{ route('animals.index') }}"
                   class="btn btn-light btn-sm">
                    Animals
                </a>

                <a href="{{ route('keepers.index') }}"
                   class="btn btn-outline-light btn-sm">
                    Keepers
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container py-4">

        <!-- Page Heading -->
        <div class="d-flex flex-wrap justify-content-between
                    align-items-center gap-3 mb-4">

            <div>
                <h1 class="page-title mb-1">Animals</h1>
                <p class="text-muted mb-0">
                    Manage the animals in your zoo.
                </p>
            </div>

            <a href="{{ route('animals.create') }}"
               class="btn btn-success">
                + Add Animal
            </a>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show"
                 role="alert">

                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close">
                </button>
            </div>
        @endif

        <!-- Error Message -->
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                Please check your form and correct the errors.
            </div>
        @endif

        <!-- Animals Table -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0">Animal Records</h5>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">

                    <thead class="table-success">
                        <tr>
                            <th>Name</th>
                            <th>Species</th>
                            <th>Enclosure</th>
                            <th>Keeper</th>
                            <th>Gender</th>
                            <th style="min-width: 200px;">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($animals as $animal)
                            <tr>
                                <td>{{ $animal->name }}</td>

                                <td>
                                    {{ $animal->species->name ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ $animal->enclosure->name ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ $animal->keeper->name ?? 'N/A' }}
                                </td>

                                <td>{{ $animal->gender }}</td>

                                <td>
                                    <div class="d-flex flex-wrap gap-1">

                                        <a href="{{ route('animals.show', $animal) }}"
                                           class="btn btn-sm btn-info">
                                            View
                                        </a>

                                        <a href="{{ route('animals.edit', $animal) }}"
                                           class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('animals.destroy', $animal) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this animal?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6"
                                    class="text-center py-5">

                                    <h5 class="text-muted">
                                        No animals found
                                    </h5>

                                    <p class="text-muted mb-3">
                                        Add your first animal to get started.
                                    </p>

                                    <a href="{{ route('animals.create') }}"
                                       class="btn btn-success">
                                        + Add Animal
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>

        <!-- No pagination links here, to avoid the oversized pagination icon. -->

        <div class="text-muted small mt-3">
            Zoo Management System
            &copy; {{ date('Y') }}
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
