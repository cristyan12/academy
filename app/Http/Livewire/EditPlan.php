<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditPlan extends Component
{
    public string $title;
    public string $type;
    public string $description;

    public function render()
    {
        return view('livewire.edit-plan');
    }
}
