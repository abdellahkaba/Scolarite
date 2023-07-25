<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\Level;
use App\Models\Classe;
use App\Models\Student;
use Livewire\Component;
use App\Models\SchoolYear;
use App\Models\Inscription;

class EditInscription extends Component
{
    public $inscription;
    public $student_id;
    public $level_id;
    public $matricule;
    public $classe_id;
    public $fullname;
    public $error;


    public function mount()
    {
        //Recuperer les informations de l'elève
        $defaultStudentId = $this->inscription->student_id;
        $query = Student::find($defaultStudentId);

        $this->matricule = $query->matricule;
        $this->student_id = $query->id;

        //Recuperer le niveau concerné
        $selectedLevel = Classe::where('id', $this->inscription->classe_id)->first();
        $this->level_id = $selectedLevel->level_id;
        $this->classe_id = $this->inscription->classe_id;
    }

    public function update()
    {
        $inscription = Inscription::find($this->inscription->id);
        $activeSchoolYear = SchoolYear::where('active', '1')->first();
        $this->validate([
            'matricule' => 'string|required',
            'level_id' => 'integer|required',
            'classe_id' => 'integer|required',
            
        ]);

        //Condition personaliser pour empêcher un eleve d'être isncrit deux fois aucours d'une même année!

        try
           { 

                $inscription->student_id = $this->student_id;
                $inscription->classe_id = $this->classe_id;
                $inscription->school_year_id = $activeSchoolYear->id;
                
                $inscription->save();
           
                return redirect()->route('inscriptions')->with('success', 'Inscription modifié avec success!');

            }catch(Exception $e){
                dd('Erreur');
            } 
 
    }

    public function render()
    {
        //Recuperer l'année en cours d'activée
        $activeSchoolYear = SchoolYear::where('active', '1')->first();

        //Charger les niveaux qui appartiennent à l'année en cours d'activée

        $levels = Level::where('school_year_id', $activeSchoolYear->id)->get();
        

        if(isset($this->matricule)) {

            $students = Student::where('matricule', $this->matricule)->first();

            if($students){
                $this->fullname = $students->nom . ' ' . $students->prenom;

                //sauvegarder l'id de l'elève
                $this->student_id = $students->id;
            }else{
                $this->fullname = '';
            }

        }
        

        if(isset($this->level_id))
        {
            $classes = Classe::where('level_id', $this->level_id)->get();
        }else
        {
            $classes = [];
        }
        
        return view('livewire.edit-inscription',[
            'levels' => $levels,
            'classes' => $classes
        ]);
     
    }
}
