<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Chicken;

class Chickens extends Component
{
    public $chickens;

    public function mount()
    {
        $this->chickens = Chicken::all();
    }

    public function render()
    {
        return view('livewire.chickens');
    }
}
