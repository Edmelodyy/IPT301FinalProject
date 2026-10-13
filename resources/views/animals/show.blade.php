
@extends('layouts.app')

@section('title', 'Animal Details')

@section('content')
<h1 class="mb-4">Animal Details</h1>

<div class="card">
    <div class="card-body">
        <p><strong>Name:</strong> {{ $animal->name }}</p>
        <p><strong>Birth Date:</strong> {{ $animal->birth_date?->format('M d, Y') ?? 'Not provided' }}</p>
        <p><strong>Gender:</strong> {{ $animal->gender }}</p>
        <p><strong>Species:</strong> {{ $animal->species->name }}</p>
        <p><strong>Enclosure:</strong> {{ $animal->enclosure->name }}</p>
        <p><strong>Keeper:</strong> {{ $animal->keeper->name }}</p>

        <a href="{{ route('animals.edit', $animal) }}"
           class="btn btn-warning">Edit</a>
        <a href="{{ route('animals.index') }}"
           class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection