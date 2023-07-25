<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use Exception;
use App\Models\Student;
use Livewire\Component;
use App\Models\Payement;
use App\Models\SchoolYear;
use App\Models\Inscription;
use App\Models\SchoolFrai;

class CreatePayement extends Component
{
    public $matricule;
    public $montant;
    public $fullname;
    public $student_id;
    public $error;
    public $success;
    public $haveSuccess = false;
    public $haveError = false;
    public function render()
    {
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
        return view('livewire.create-payement');
    }

    public function store(Payement $payement)
    {
        $totalPaye = 0;
        $activeSchoolYear = SchoolYear::where('active', '1')->first();

        //Recuperer l'id de la classe de l'elève
        $getClassQuery = Inscription::where('student_id' ,'=', $this->student_id)->where('school_year_id', $activeSchoolYear->id)->first();
      //  dd($getClassQuery);
        //condi 1: Recuperer le montant de la scolarité d'une classe en fonction du niveau
        
        $studentClasseId = $getClassQuery->classe_id;
      

        $classeData = Classe::with('level')->find($studentClasseId);
    
        $studentLevelId = $classeData->level->id;
       
        $query = SchoolFrai::where('level_id', $studentLevelId)->first();
      
        
        $montantSolarite = $query->montant;
        

        //condi 2: faire le cumul des paiements dejà effectués en comparant au montant de la scolarité

        $studentPayementList = Payement::where('student_id', $this->student_id)->where('school_year_id', $activeSchoolYear->id)->get();

        foreach ($studentPayementList as $studentPayement) {
            $totalPaye += $studentPayement->montant ;
        }
        
        //condi 3 : Verification du montant totale de la scolarité et le montant 
        
        $operationResult = $totalPaye - $montantSolarite;

        if(($totalPaye + $this->montant ) > $montantSolarite)
        {
            //Error
            if($operationResult === 0)
            {
                $this->success = 'Felicitation Tout est reglé !';
                $this->haveError = true;
            }else{
                $this->error = 'Attention! Il rest à payé: '. $montantSolarite - $totalPaye  . ' FG';
                $this->haveError = true;
            }
        }

        if(!$this->haveError)
        {
            $this->validate([
                'matricule' => 'string|required',
                'montant' => 'integer|required',
                
            ]);
    
            try{ 
    
                    
                    $payement->student_id = $this->student_id;
                    $payement->classe_id = $getClassQuery->classe_id;
                    $payement->school_year_id = $activeSchoolYear->id;
                    $payement->montant = $this->montant;
                    $payement->save();
               
                    return redirect()->route('payements')->with('success', 'Paiment effectué avec succès');
    
            }
            catch(Exception $e){
                    dd('Erreur');
            }  
        }

        
    }
}
