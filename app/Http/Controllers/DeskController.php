<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
use App\Models\Task;
use App\Models\User;
use App\Models\Desk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class DeskController extends Controller
{

    public function index(): View
    {
        $desks = User::find(auth()->id())->desks;
        return view('desk.index',compact('desks'));
    }
    public function show(Request $request) : View
    {
        $deskId = request('desk');
        $allDesks = User::find(auth()->id())->desks;
        $userIds = Desk::find($deskId)->users()->withPivot('user_id')->pluck('user_id');
        $allDeskUsers = User::whereIn('id', $userIds)->where('id', '!=', auth()->id())->get();

        $todo = Task::where([['desk_id', $deskId], ['status', 'todo']])->get();
        $doing = Task::where([['desk_id', $deskId], ['status', 'doing']])->get();
        $done = Task::where([['desk_id', $deskId], ['status', 'done']])->get();
        return view('desk.show', compact('deskId',
            'allDesks', 'allDeskUsers',
                'todo', 'doing', 'done'
        ));
    }

    public function destroy(Desk $desk): RedirectResponse
    {
        $desk->delete();
        return redirect()->route('desk.index');
    }

    public function create() : View
    {
        $id = Auth::user()->id;
        $users = Friendship::getFriends($id);
        return view('desk.create', compact('users'));
    }

    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:desks'],
            'description' => ['nullable' ,'string', 'max:1250'],
            'username' => ['nullable','string', 'max:255', 'exists:users,name'],
        ]);

        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $user = User::find(auth()->id());
        $desk = Desk::create($request->only(['name', 'description']));

        $this->saveUserPermissions($request, $desk, 'edit');
        $this->saveUserPermissions($request, $desk, 'read');
        $user->desks()->attach($desk->id);
        if ($request->username !== '' && $request->username != null) {
            $otherUser = User::where('name',$request->username)->first();
            $otherUser->desks()->attach($desk->id);
        }
        return redirect()->route('desk.show', ['desk' => $desk->id]);
    }

    //TODO create logic of when user is already in desk that he's already marked
    public function edit(int $id): View
    {
        $desk = Desk::find($id);
        $oldName = $desk->name;
        $oldDescription = $desk->description;
        $users = Friendship::getFriends($id);
        $userIds = Desk::find($id)->users()->withPivot('user_id')->pluck('user_id');

        $editors = User::whereHas('desks', function ($query) use ($userIds) {
            $query->whereIn('desk_id', $userIds)
            ->where('permission', 'edit')
            ->where('user_id', '!=', auth()->id());
        })->get();

        $readers = User::whereHas('desks', function ($query) use ($userIds) {
            $query->whereIn('desk_id', $userIds)
                ->where('permission', 'read')
                ->where('user_id', '!=', auth()->id());
        })->get();

        return view('desk.edit', compact('desk', 'oldName',
            'oldDescription', 'users', 'editors', 'readers'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'name' => ['string', 'max:255', 'unique:desks,name,'.$id, 'required'],
            'description' => ['nullable' ,'string', 'max:1250'],
            'username' => ['nullable', 'string', 'max:255', 'exists:users,name']
        ]);


        $desk = Desk::find($id);
        if ($request->name !== '') {
            $desk->update($request->only(['name']));
        }
        if ($request->description !== '') {
            $desk->update($request->only(['description']));
        }
        if ($request->username !== '' && $request->username != null) {
            $user = User::where('name',$request->username)->first();
            $user->desks()->attach($desk->id);
        }

        $this->saveUserPermissions($request, $desk, 'edit');
        $this->saveUserPermissions($request, $desk, 'read');
        return redirect()->route('desk.show', ['desk' => $id]);
    }

    /**
     * @param Request $request given request
     * @param Desk $desk on which desk
     * @param string $key which desk permission will be synchronized
     * synchronizes user permissions on given desk
     */

    private function saveUserPermissions(Request $request, $desk, $key): void
    {
        $selectedEdit = $request->input('selected_'.$key, []);
        $editUsers = [];
        foreach ($selectedEdit as $userId) {
            $user = User::find($userId);
            if ($user) {
                $editUsers[$userId] = ['permission' => $key];
            }
        }
        $desk->users()->syncWithoutDetaching($editUsers);
        $currentEditUsers = $desk->users()->wherePivot('permission', $key)
            ->pluck('user_id')->toArray();
        $desk->users()->detach(array_diff($currentEditUsers, array_keys($editUsers)));
        $desk->save();
    }

}
