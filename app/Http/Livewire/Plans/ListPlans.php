<?php

namespace App\Http\Livewire\Plans;

use App\Models\Plan;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ListPlans extends Component
{
    use WithPagination;

    public function paginationView()
    {
        return 'layouts.pagination';
    }

    public function render(): View
    {
        $plans = Plan::query()
            ->select('id', 'title', 'type', 'updated_at')
            ->orderBy('id')
            ->paginate(5);

        return view('livewire.plans.list-plans', compact('plans'));
    }
}
