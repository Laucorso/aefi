<?php

namespace App\Http\Livewire;
use App\Models\discounts;
use Livewire\Component;

class Descuentos extends Component
{
    public function render()
    {
        $this->discounts = Discounts::all();
        return view('livewire.descuentos');
    }
}
