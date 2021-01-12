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
        return view('plans.create', ['plan' => new Plan]);
    }

    public function show(Plan $plan): View
    {
        return view('plans.show', compact('plan'));
    }

    public function edit(Plan $plan): View
    {
        return view('plans.edit', compact('plan'));
    }

    public function update(Request $request, Plan $plan): RedirectResponse
    {
        $plan->update($request->all());

        return redirect()->route('plans.index');
    }
}
