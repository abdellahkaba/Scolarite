<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\Student;
use Livewire\Component;
use App\Models\SchoolYear;

class CreateStudent extends Component
{
    public $matricule;
    public $prenom;
    public $nom;
    public $naissance;
    public $contact_parents;
    public function render()
    {
        return view('livewire.create-student');
    }

    public function store(Student $student)
    {
        $this->validate([
            'matricule' => 'string|required|unique:students,matricule',
            'prenom' => 'string|required',
            'nom' => 'string|required',
            'naissance' => 'string|required',
            'contact_parents' => 'string|required'
            
        ]);

        try{
            // Recupération de l'année en cours d'utilisation
           $activeSchoolYear = SchoolYear::where('active', '1')->first();
            
           $student->matricule = $this->matricule;
           $student->prenom = $this->prenom;
           $student->nom = $this->nom;
           $student->naissance = $this->naissance;
           $student->contact_parents = $this->contact_parents;

           

           $student->save();
           
           return redirect()->route('eleves')->with('success', 'L\'elève ajouté avec success');

        }catch(Exception $e){
            dd('Erreur');
        }
    }
}
