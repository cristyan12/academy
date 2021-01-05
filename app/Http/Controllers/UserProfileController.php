<?php

namespace App\Http\Controllers;

use App\Models\{User, UserProfile};
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserProfileController extends Controller
{
    public function index(User $user): View
    {
        return view('profiles.index', [
            'user' => $user,
            'profiles' => 'profiles',
        ]);
    }

    public function create(User $user): View
    {
        return view('profiles.create', [
            'user' => $user,
            'profile' => new UserProfile,
        ]);
    }
}
