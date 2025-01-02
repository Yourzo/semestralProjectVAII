<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{

    /**
     * Show user profile in this cute dashboard.
     */
    public function dashboard(): View
    {
        $id = Auth::user()->id;

        $friends = User::whereHas('friendships', function ($query) use ($id) {
            $query->where('user_id1', $id)
                ->orWhere('user_id2', $id);
        })->get();

        $requests = User::whereHas('friendship_requests', function ($query) use ($id) {
            $query->where('friend_id', $id);
        })->get();

        return view('dashboard.dashboard', compact('friends', 'requests'));
    }

    /**
     * Search for users.
     */
    public function users(): JsonResponse
    {
        return response()->json(User::all());
    }

    /**
     * Update the user's profile picture.
     */
    public function storePicture(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        try {
            $user = Auth::user();
            if ($user->profile_picture_path && Storage::exists('public/' . $user->profile_picture_path)) {
                Storage::delete('public/' . $user->profile_picture_path);
            }

            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('profilePictures'), $imageName);

            $user->profile_picture_path = 'profilePictures/'. $imageName;
            $user->save();
            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        } catch (\Exception $exception) {
            return Redirect::back()->withErrors($exception->getMessage());
        }
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
