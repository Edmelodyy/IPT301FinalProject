<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Species;
use App\Models\Enclosure;
use App\Models\Keeper;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::with([
            'species', 'enclosure', 'keeper'
        ])->latest()->paginate(10);

        return view('animals.index', compact('animals'));
    }

    public function create()
    {
        return view('animals.create', [
            'species' => Species::all(),
            'enclosures' => Enclosure::all(),
            'keepers' => Keeper::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'nullable|date|before_or_equal:today',
            'gender' => ['required', Rule::in(['Male', 'Female'])],
            'species_id' => 'required|exists:species,id',
            'enclosure_id' => 'required|exists:enclosures,id',
            'keeper_id' => 'required|exists:keepers,id',
        ]);

        Animal::create($validated);

        return redirect()->route('animals.index')
            ->with('success', 'Animal added successfully!');
    }

    public function show(Animal $animal)
    {
        $animal->load(['species', 'enclosure', 'keeper', 'feedingRecords']);

        return view('animals.show', compact('animal'));
    }

    public function edit(Animal $animal)
    {
        return view('animals.edit', [
            'animal' => $animal,
            'species' => Species::all(),
            'enclosures' => Enclosure::all(),
            'keepers' => Keeper::all(),
        ]);
    }

    public function update(Request $request, Animal $animal)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'nullable|date|before_or_equal:today',
            'gender' => ['required', Rule::in(['Male', 'Female'])],
            'species_id' => 'required|exists:species,id',
            'enclosure_id' => 'required|exists:enclosures,id',
            'keeper_id' => 'required|exists:keepers,id',
        ]);

        $animal->update($validated);

        return redirect()->route('animals.index')
            ->with('success', 'Animal updated successfully!');
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();

        return redirect()->route('animals.index')
            ->with('success', 'Animal deleted successfully!');
    }
}