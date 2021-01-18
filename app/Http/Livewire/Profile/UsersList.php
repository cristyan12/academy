<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\View\View;
use Livewire\{Component, WithPagination};

class UsersList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $orderBy = 'updated_at';
    public string $column = 'desc';
    public int $perPage = 5;

    /** @var array string[] */
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
        $users = User::search($this->search)
           ->orderBy($this->orderBy, $this->column)
           ->with('profile.plan:id,title')
           ->paginate($this->perPage);

        return view('livewire.profile.users-list', compact('users'));
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

    public function destroy(int $user): void
    {
        User::destroy($user);
    }
}
