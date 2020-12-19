<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlanController extends Controller
{
    public function index()
    {
        return Plan::get();
    }

    public function create(): View
    {
        return view('plans.create', ['plan' => new Plan]);
    }

    public function store(Request $request): RedirectResponse
    {
        $plan = new Plan($request->validate([
            'title' => 'required|string|max:55',
            'type' => 'required|in:niños,adolescentes,adultos,avanzado',
            'description' => 'required|string|max:255',
        ]));

        auth()->user()->plans()->save($plan);

        return redirect()->route('plans.index');
    }
}
