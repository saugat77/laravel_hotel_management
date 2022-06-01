<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        return view('layouts.dashboard-component')->layout('layouts.layout');
    }
}
