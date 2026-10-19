<?php

namespace App\Http\Controllers;

use App\Models\Keeper;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rule;

class KeeperController extends Controller
{
    public function index()
    {
        $keepers = Keeper::withCount(['animals', 'feedingRecords'])
            ->latest()
            ->paginate(10);

        return view('keepers.index', compact('keepers'));
    }

    public function create()
    {
        return view('keepers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:keepers,email'],
            'phone' => ['nullable', 'string', 'max:30'],
            'role' => ['required', 'string', 'max:100'],
        ]);

        Keeper::create($validated);

        return redirect()
            ->route('keepers.index')
            ->with('success', 'Keeper added successfully!');
    }

    public function show(Keeper $keeper)
    {
        $keeper->load(['animals', 'feedingRecords']);

        return view('keepers.show', compact('keeper'));
    }

    public function edit(Keeper $keeper)
    {
        return view('keepers.edit', compact('keeper'));
    }

    public function update(Request $request, Keeper $keeper)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('keepers', 'email')->ignore($keeper->id),
            ],
            'phone' => ['nullable', 'string', 'max:30'],
            'role' => ['required', 'string', 'max:100'],
        ]);

        $keeper->update($validated);

        return redirect()
            ->route('keepers.index')
            ->with('success', 'Keeper updated successfully!');
    }

    public function destroy(Keeper $keeper)
    {
        if ($keeper->animals()->exists() ||
            $keeper->feedingRecords()->exists()) {
            return redirect()
                ->route('keepers.index')
                ->with('error', 'This keeper is assigned to animals or feeding records. Reassign those records before deleting this keeper.');
        }

        try {
            $keeper->delete();
        } catch (QueryException $exception) {
            return redirect()
                ->route('keepers.index')
                ->with('error', 'This keeper cannot be deleted because related records still exist.');
        }

        return redirect()
            ->route('keepers.index')
            ->with('success', 'Keeper deleted successfully!');
    }
}
