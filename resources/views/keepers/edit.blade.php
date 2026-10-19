<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Keeper</title>
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
    <div class="card shadow-sm mx-auto" style="max-width: 650px;">
        <div class="card-header bg-warning">
            <h4 class="mb-0">Edit Keeper</h4>
        </div>

        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('keepers.update', $keeper) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" id="name" name="name"
                           class="form-control"
                           value="{{ old('name', $keeper->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email"
                           class="form-control"
                           value="{{ old('email', $keeper->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" id="phone" name="phone"
                           class="form-control"
                           value="{{ old('phone', $keeper->phone) }}">
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select id="role" name="role" class="form-select" required>
                        <option value="Keeper"
                            @selected(old('role', $keeper->role) === 'Keeper')>
                            Keeper
                        </option>
                        <option value="Senior Keeper"
                            @selected(old('role', $keeper->role) === 'Senior Keeper')>
                            Senior Keeper
                        </option>
                        <option value="Head Keeper"
                            @selected(old('role', $keeper->role) === 'Head Keeper')>
                            Head Keeper
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-warning">
                    Update Keeper
                </button>

                <a href="{{ route('keepers.index') }}"
                   class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
