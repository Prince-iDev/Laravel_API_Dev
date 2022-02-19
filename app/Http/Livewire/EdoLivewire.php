<?php

namespace App\Http\Livewire;

use App\Models\States;
use App\Models\localgovernmentarea;
use Livewire\Component;

class EdoLivewire extends Component
{

    public $states;
    // public $lgas;
  
    public $selectedState = NULL;
    public $selectedLGA = NULL;
    public $lgas = NULL;

  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function mount()
    {
        $this->states = States::all();
        // $this->lgas = collect();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        return view('livewire.edo-livewire')->extends('livewire.app');
    }
  
   
    public function updatedselectedState($state_id)
    {
        if (!is_null($state_id)) {
            $this->lgas = localgovernmentarea::where('state_id', $state_id)->get();
        }
    }
    
}
