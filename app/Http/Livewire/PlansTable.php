<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use Illuminate\View\View;
use Livewire\{Component, WithPagination};

class PlansTable extends Component
{
    use WithPagination;

    public string $search = '';
    public string $orderBy = 'updated_at';
    public string $column = 'desc';
    public int $perPage = 5;

    /** @var string[] */
    protected $queryString = [
        'search' => ['except' => ''],
        'orderBy' => ['except' => 'updated_at'],
        'column' => ['except' => 'desc'],
        'perPage' => ['except' => 5],
    ];

    public function mount(): void
    {
        $this->fill(request()->only('search', 'orderBy', 'column', 'perPage'));
    }

    public function render(): View
    {
        $plans = Plan::search($this->search)
            ->select('id', 'title', 'type', 'updated_at')
            ->orderBy($this->orderBy, $this->column)
            ->paginate($this->perPage);

        return view('livewire.plans-table', compact('plans'));
    }

    public function paginationView(): string
    {
        return 'layouts.pagination';
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function resetFilters(): void
    {
        $this->reset(['search', 'orderBy', 'column', 'perPage']);
    }

    public function destroy(int $plan): void
    {
        Plan::destroy($plan);
    }
}
