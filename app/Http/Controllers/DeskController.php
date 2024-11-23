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
        $deskId = request('desk_id');
        $allDesks = User::find(auth()->id())->desks;
        if ($deskId !== null) {
            $deskId = $allDesks->where('id', $deskId)->first();
        }
        $allDeskUsers = User::whereHas('desks', function ($query) use ($deskId) {
            $query->where('id', $deskId);
        });

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
        ]);

        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $user = User::find(auth()->id());
        $desk = Desk::create($request->only(['name', 'description']));
        $desk->save();
        $user->desks()->attach($desk->id);
        return redirect()->route('desk.show', ['desk' => $desk->id]);
    }
}
