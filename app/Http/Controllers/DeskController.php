<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class DeskController extends Controller
{
    public function show() : View
    {
        $user = User::find(1);
    }
}
