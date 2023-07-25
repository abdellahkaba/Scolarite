<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\Student;
use Livewire\Component;

class EditStudent extends Component
{
    public $student;
    public $matricule;
    public $prenom;
    public $nom;
    public $naissance;
    public $contact_parents;

    public function mount()
    {
        $this->matricule = $this->student->matricule;
        $this->prenom = $this->student->prenom;
        $this->nom = $this->student->nom;
        $this->naissance = $this->student->naissance;
        $this->contact_parents = $this->student->contact_parents;
    }

    public function edit()
    {
        $student = Student::find($this->student->id);
        $this->validate([
            'matricule' => 'string|required',
            'prenom' => 'string|required',
            'nom' => 'string|required',
            'naissance' => 'string|required',
            'contact_parents' => 'string|required'
            
        ]);

        try{
            
            
           $student->matricule = $this->matricule;
           $student->prenom = $this->prenom;
           $student->nom = $this->nom;
           $student->naissance = $this->naissance;
           $student->contact_parents = $this->contact_parents;

           

           $student->save();
           
           return redirect()->route('eleves')->with('success', 'Mise à jour avec succèss');

        }catch(Exception $e){
            dd('Erreur');
        }
    }

    public function render()
    {
        return view('livewire.edit-student');
    }
}
