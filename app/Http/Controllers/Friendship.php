<?php

namespace App\Http\Controllers;

use App\Models\FriendshipRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Friendship extends Controller
{

    public function search(string $name): JsonResponse
    {
        Log::info('Search query received:', ['query' => $name]);
        if (empty($name)) {
            return response()->json([]);
        }
        $users = User::where('name', 'like', '%' . $name . '%')->get(['id', 'name']);
        Log::info('Users found:', ['users' => $users]);
        return response()->json($users);
    }


    public function addRequest(Request $request) : JsonResponse
    {
        $user = auth()->user()->id;
        FriendshipRequest::create([
            'user_id' => $user,
            'friend_id' => $request->get('id')]
        );

        return response()->json(['success' => true]);
    }
}
