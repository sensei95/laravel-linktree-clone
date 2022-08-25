<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user()->load('theme:id,name,button_type,button_radius_size');
        $themes = Theme::whereNot('id', $user->theme_id)->orderBy('name')->get();
        return view('users.edit', compact('user', 'themes'));
    }

    public function update(Request $request, User $user)
    {
    }
}
