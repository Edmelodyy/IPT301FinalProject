
@extends('layouts.app')

@section('title', 'Edit Animal')

@section('content')
<h1 class="mb-4">Edit Animal</h1>

<form action="{{ route('animals.update', $animal) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Animal Name</label>
        <input name="name" class="form-control" required
               value="{{ old('name', $animal->name) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Birth Date</label>
        <input type="date" name="birth_date" class="form-control"
               value="{{ old('birth_date', optional($animal->birth_date)->format('Y-m-d')) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Gender</label>
        <select name="gender" class="form-select" required>
            <option value="Male" @selected(old('gender', $animal->gender) === 'Male')>Male</option>
            <option value="Female" @selected(old('gender', $animal->gender) === 'Female')>Female</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Species</label>
        <select name="species_id" class="form-select" required>
            @foreach ($species as $item)
                <option value="{{ $item->id }}"
                    @selected(old('species_id', $animal->species_id) == $item->id)>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Enclosure</label>
        <select name="enclosure_id" class="form-select" required>
            @foreach ($enclosures as $item)
                <option value="{{ $item->id }}"
                    @selected(old('enclosure_id', $animal->enclosure_id) == $item->id)>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Keeper</label>
        <select name="keeper_id" class="form-select" required>
            @foreach ($keepers as $item)
                <option value="{{ $item->id }}"
                    @selected(old('keeper_id', $animal->keeper_id) == $item->id)>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Update Animal</button>
    <a href="{{ route('animals.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection