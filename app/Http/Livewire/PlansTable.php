<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use Illuminate\View\View;
use Livewire\{Component, WithPagination};

class PlansTable extends Component
{
    use WithPagination;

    public function paginationView(): string
    {
        return 'layouts.pagination';
    }

    public function render(): View
    {
        $plans = Plan::query()
            ->select('id', 'title', 'type', 'updated_at')
            ->orderBy('id')
            ->paginate(5);

        return view('livewire.plans-table', compact('plans'));
    }
}
