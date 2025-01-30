<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Jobs\GenerateQRCode;

class UserController extends Controller
{
    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'age' => 'required|integer|min:1',
        'address' => 'required|string|max:255',
    ]);
        $user = User::create([
            'name' => $request->name,
            'age' => $request->age,
            'address' => $request->address,
            'points' => 0,
        ]);

	// Only dispatch the QR code generation if NOT in testing
    	if (!app()->runningUnitTests()) {
    	    dispatch(new GenerateQRCode($user));
    	}	
        return response()->json($user, 201);
    }

public function index(Request $request)
{
    $query = User::query();

    if ($request->has('search')) {
        $query->where('name', 'LIKE', '%' . $request->search . '%');
    }

    if ($request->has('sort')) {
        $query->orderBy($request->sort, $request->sort === 'name' ? 'asc' : 'desc');
    }

    return response()->json($query->get());
}


    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'User deleted']);
    }

    public function updatePoints($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->points += $request->points;
        $user->save();

        return response()->json($user);
    }

    public function resetScores()
    {
        User::query()->update(['points' => 0]);
        return response()->json(['message' => 'Scores reset successfully']);
    }
}

