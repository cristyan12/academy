<?php

namespace App\Http\Controllers;

use App\Models\{User, UserProfile};
use Illuminate\Http\{RedirectResponse, Request};
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

    public function create(User $user): void
    {
        $this->formView('profiles.create', $user);
    }

    public function edit(User $user): void
    {
        $this->formView('profiles.edit', $user);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $user->update($request->only('name', 'email'));

        auth()->user()->profile()->save(new UserProfile($request->only(
            'date_of_birth', 'phone', 'last_access', 'country', 'plan_id'
        )));

        return redirect()->route('profiles.index', $user);
    }

    protected function formView(string $view, User $user): View
    {
        return view($view, [
            'user' => $user,
            'profile' => new UserProfile,
        ]);
    }
}
