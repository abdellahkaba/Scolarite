<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use Livewire\Component;
use App\Models\Payement;
use App\Models\Inscription;

class ShowStudent extends Component
{
    public $student;

    public function getClasseStudent()
    {
        $query = Inscription::where('student_id', $this->student->id)->first();
        $currentClasseId = $query->classe_id;
        $classeQuery = Classe::find($currentClasseId);
        return $classeQuery->libelle;
    }
    public function render()
    {
        $studentPayement = Payement::where('student_id', $this->student->id)->get();
        return view('livewire.show-student',compact('studentPayement'));
    }
}
