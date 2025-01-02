<?php

namespace App\Http\Controllers;

use App\Models\FriendshipRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FriendshipController extends Controller
{

    public function search(string $name): JsonResponse
    {
        if (empty($name)) {
            return response()->json([]);
        }
        $users = User::where('name', 'like', '%' . $name . '%')
            ->get(['id', 'name']);

        $users = $users->filter(function ($user) {
            return $user->name !== Auth::user()->name;
        });
        return response()->json($users);
    }


    public function addRequest(Request $request) : JsonResponse
    {
        Log::info('addRequest');
        $user = auth()->user()->id;
        if ($request->get('user_id') === $user){
            return response()->json(['success' => false]);
        }
        Log::info('addRequest2');
        FriendshipRequest::create([
            'user_id' => $user,
            'friend_id' => $request->get('user_id')]
        );
        Log::info('addRequest3');
        return response()->json(['success' => true]);
    }
}
