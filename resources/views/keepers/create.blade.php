<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Keeper</title>
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
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Add New Keeper</h4>
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

            <form action="{{ route('keepers.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" id="name" name="name"
                           class="form-control"
                           value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email"
                           class="form-control"
                           value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" id="phone" name="phone"
                           class="form-control"
                           value="{{ old('phone') }}">
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select id="role" name="role" class="form-select" required>
                        <option value="">Select Role</option>
                        <option value="Keeper" @selected(old('role') === 'Keeper')>
                            Keeper
                        </option>
                        <option value="Senior Keeper" @selected(old('role') === 'Senior Keeper')>
                            Senior Keeper
                        </option>
                        <option value="Head Keeper" @selected(old('role') === 'Head Keeper')>
                            Head Keeper
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">
                    Save Keeper
                </button>

                <a href="{{ route('keepers.index') }}"
                   class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
