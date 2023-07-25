<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\Level;
use App\Models\Classe;
use App\Models\Inscription;
use App\Models\Student;
use Livewire\Component;
use App\Models\SchoolYear;

class CreateInscription extends Component
{
    public $student_id;
    public $level_id;
    public $matricule;
    public $classe_id;
    public $fullname;
    public $error;

    public function render()
    {
        //Recuperer l'année en cours d'activée
        $activeSchoolYear = SchoolYear::where('active', '1')->first();

        //Charger les niveaux qui appartiennent à l'année en cours d'activée

        $levels = Level::all();
        

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
        
        return view('livewire.create-inscription',[
            'levels' => $levels,
            'classes' => $classes
        ]);
    }

    public function store(Inscription $inscription)
    {
        $activeSchoolYear = SchoolYear::where('active', '1')->first();
        $this->validate([
            'matricule' => 'string|required',
            'level_id' => 'integer|required',
            'classe_id' => 'integer|required',
            
        ]);

        //Condition personaliser pour empêcher un eleve d'être isncrit deux fois aucours d'une même année!

        $qurey = Inscription::where('student_id', $this->student_id)->where('school_year_id',$activeSchoolYear->id)->get();

        if($qurey->count() > 0){

            $this->error = 'Cet elève est dejà inscrit. Modifer les informations';
            // dd('Desolé cet éleve est dejà inscrit à l\'année');
        }else{
           try
           { 
                $inscription->student_id = $this->student_id;
                $inscription->classe_id = $this->classe_id;
                $inscription->school_year_id = $activeSchoolYear->id;
                
                $inscription->save();
           
                return redirect()->route('inscriptions')->with('success', 'L\'elève inscrit avec succès');

            }catch(Exception $e){
                dd('Erreur');
            } 
        }
 
        
    }
}
