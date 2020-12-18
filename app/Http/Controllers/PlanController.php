<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlanController extends Controller
{
    public function create(): View
    {
        $options = ['Mexico', 'USA', 'Canada'];

        return view('plans.create', compact('options'));
    }

    public function store(Request $request): RedirectResponse
    {
        $plan = new Plan($request->all());

        auth()->user()->plans()->save($plan);

        return redirect()->route('plans.index');
    }
}
