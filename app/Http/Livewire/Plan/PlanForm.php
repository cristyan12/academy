<?php

namespace App\Http\Livewire\Plan;

use App\Models\Plan;
use Illuminate\View\View;
use Livewire\{Component, Redirector};

class PlanForm extends Component
{
    public Plan $plan;

    protected array $rules = [
        'plan.title' => 'required|string|max:55',
        'plan.type' => 'required|in:niños,adolescentes,adultos,avanzado',
        'plan.description' => 'required|string|max:255',
    ];

    public function mount(): void
    {
        $this->plan = new Plan;
    }

    public function render(): View
    {
        return view('livewire.plan.plan-form');
    }

    public function save(): Redirector
    {
        $this->validate();

        $this->plan->save();

        return redirect(route('plans.index'));
    }
}
