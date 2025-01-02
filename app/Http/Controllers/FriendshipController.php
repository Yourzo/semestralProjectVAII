<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
use App\Models\FriendshipRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class FriendshipController extends Controller
{

    public function removeFriend(string $friend) : RedirectResponse
    {
        if (Friendship::where('user_id1', '=', $friend)
            ->orWhere('user_id2', '=', $friend)->get()->count() == 0) {
            return Redirect::back()->withErrors(['msg' => "You don't have this friend"]);
        }

        Friendship::where(function ($query) use ($friend) {
            $query->where('user_id1', '=', $friend)
                ->where('user_id2', '=', Auth::id());
        })->orWhere(function ($query) use ($friend) {
            $query->where('user_id1', '=', Auth::id())
                ->where('user_id2', '=', $friend);
        })->delete();

        return Redirect::route('dashboard');
    }

    public function acceptRequest(Request $request, string $user): RedirectResponse
    {
        $action = $request->input('action');
        if (FriendshipRequest::where('friend_id', Auth::id())
            ->where('user_id', $user)->get()->count() == 0) {
                return Redirect::back()->withErrors(['user' => 'You cannot accept request for this user']);
        }
        if ($action === 'confirm') {
            $friendship = Friendship::create([
                'user_id1' => $user,
                'user_id2' => Auth::id()
            ]);
            $friendship->save();
        }
        FriendshipRequest::where([
            'user_id' => $user,
            'friend_id' => Auth::id()
        ])->delete();
        return Redirect::route('dashboard');
    }

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
