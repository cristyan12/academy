<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

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
        return view('livewire.plan-form');
    }

    public function save(): Redirector
    {
        $this->validate();

        $this->plan->save();

        return redirect()->to(route('plans.index'));
    }
}
