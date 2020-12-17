<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PlanController extends Controller
{
    public function create(): View
    {
        $options = ['Mexico', 'USA', 'Canada'];

        return view('plans.create', compact('options'));
    }
}
