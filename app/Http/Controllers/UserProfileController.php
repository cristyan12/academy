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

    public function store(Request $request): RedirectResponse
    {
        $profile = new UserProfile([
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone,
            'last_access' => $request->last_access,
            'country' => $request->country,
            'plan_id' => $request->plan_id,
        ]);

        auth()->user()->profile()->save($profile);

        return back();
    }

    public function edit(): void
    {
        $this->formView('profiles.edit', auth()->user());
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $user->profile()->update([
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone,
            'last_access' => $request->last_access,
            'country' => $request->country,
            'plan_id' => $request->plan_id,
        ]);

        return back();
    }

    protected function formView(string $view, User $user): View
    {
        return view($view, [
            'user' => $user,
            'profile' => new UserProfile,
        ]);
    }
}
