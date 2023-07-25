<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Payement;
use App\Models\Inscription;

class ShowInscription extends Component
{
    public $inscription ;
    public function render()
    {
        // $studentPayement = Payement::where('student_id', $this->student->id)->get();
        $inscriptions = Inscription::all();
        return view('livewire.show-inscription');
        
    }

   
}
