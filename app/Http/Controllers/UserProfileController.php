<?php

namespace App\Http\Controllers;

use App\Models\{Plan, UserProfile};
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserProfileController extends Controller
{
    public function create(Request $request): View
    {
        return view('profile.create', [
            'user' => $request->user(),
            'plans' => Plan::get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $profile = new UserProfile($request->validate([
            'phone' => 'required|string|max:16',
            'born_at' => 'required|date',
            'country' => 'required|string|max:100',
            'plan_id' => 'required|int|exists:plans,id',
        ]));

        auth()->user()->profile()->save($profile);

        return redirect()->back();
    }
}
