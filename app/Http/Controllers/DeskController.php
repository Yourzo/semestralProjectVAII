<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Desk;
use Illuminate\View\View;

class DeskController extends Controller
{
    public function show() : View
    {
        $allDesks = User::find(auth()->id())->desks;
        return view('desk', compact('allDesks'));
    }
}
