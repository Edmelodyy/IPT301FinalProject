
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 700px">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Add New Animal</h4>
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

            <form action="{{ route('animals.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Animal Name</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Birth Date</label>
                    <input type="date" name="birth_date" class="form-control"
                           max="{{ date('Y-m-d') }}"
                           value="{{ old('birth_date') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <select name="gender" class="form-select" required>
                        <option value="">Select gender</option>
                        <option value="Male" @selected(old('gender') === 'Male')>
                            Male
                        </option>
                        <option value="Female" @selected(old('gender') === 'Female')>
                            Female
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Species</label>
                    <select name="species_id" class="form-select" required>
                        <option value="">Select species</option>
                        @foreach($species as $item)
                            <option value="{{ $item->id }}"
                                @selected(old('species_id') == $item->id)>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Enclosure</label>
                    <select name="enclosure_id" class="form-select" required>
                        <option value="">Select enclosure</option>
                        @foreach($enclosures as $item)
                            <option value="{{ $item->id }}"
                                @selected(old('enclosure_id') == $item->id)>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keeper</label>
                    <select name="keeper_id" class="form-select" required>
                        <option value="">Select keeper</option>
                        @foreach($keepers as $item)
                            <option value="{{ $item->id }}"
                                @selected(old('keeper_id') == $item->id)>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">
                    Save Animal
                </button>

                <a href="{{ route('animals.index') }}"
                   class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>