<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::patch('/users/{id}/points', [UserController::class, 'updatePoints']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users/reset-scores', [UserController::class, 'resetScores']);

Route::post('/update-score/{id}', function (Request $request, $id) {
    $request->validate([
        'points' => 'required|integer',
    ]);

    $user = User::find($id);
    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }

    $user->points += $request->input('points');
    $user->save();

    return response()->json([
        'message' => 'Score updated',
        'user' => $user
    ]);
});

