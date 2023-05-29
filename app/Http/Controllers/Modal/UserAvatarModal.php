<?php

namespace App\Http\Controllers\Modal;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserAvatarModal extends Controller
{

    public function change()
    {
        $user = Auth::user();
        return Inertia::modal('UserAvatar')->with([
            'user' => $user
        ])->baseRoute('dashboard');
    }

    public function update(Request $request)
    {
        $request->validate([
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $user = Auth::user();

        if ($request->file('photo') !== null && $user instanceof User) {
            $user->updateProfilePhoto($request->file('photo'));
            $user->save();
        }

    }

}
