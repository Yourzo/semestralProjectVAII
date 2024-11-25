<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Desk;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DeskController extends Controller
{
    public function index(): RedirectResponse
    {
        return redirect()->route('desk.show');
    }
    public function show(Request $request) : View
    {
        $deskId = request('desk');
        $allDesks = User::find(auth()->id())->desks;
        $userIds = Desk::find($deskId)->users()->withPivot('user_id')->pluck('user_id');
        $allDeskUsers = User::whereIn('id', $userIds)->where('id', '!=', auth()->id())->get();
        return view('desk.show', compact('deskId', 'allDesks', 'allDeskUsers'));
    }

    public function create() : View
    {
        return view('desk.create');
    }

    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable' ,'string', 'max:1250'],
            'username' => ['string', 'max:255', 'exists:users,name'],
        ]);

        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $user = User::find(auth()->id());
        $desk = Desk::create($request->only(['name', 'description']));
        $desk->save();
        $user->desks()->attach($desk->id);
        if ($request->username !== '') {
            $otherUser = User::where('name',$request->username)->first();
            $otherUser->desks()->attach($desk->id);
        }
        return redirect()->route('desk.show', ['desk' => $desk->id]);
    }

    public function edit(int $id): View
    {
        $desk = Desk::find($id);
        return view('desk.edit', compact('desk'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'name' => ['string', 'max:255'],
            'description' => ['nullable' ,'string', 'max:1250'],
            'username' => ['string', 'max:255', 'exists:users,name']
        ]);
        $desk = Desk::find($id);
        if ($request->name !== '') {
            $desk->update($request->only(['name']));
        }
        if ($request->description !== '') {
            $desk->update($request->only(['description']));
        }
        if ($request->username !== '') {
            $user = User::where('name',$request->username)->first();
            $user->desks()->attach($desk->id);
        }
        $desk->save();
        return redirect()->route('desk.show', ['desk' => $id]);
    }
}
