<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\Level;
use Livewire\Component;
use App\Models\SchoolFrai;
use App\Models\SchoolYear;

class CreateFrai extends Component
{
    public function render()
    {
        //Charger les niveaux qui appartiennent à l'année en cours d'activée
        $levels = Level::all();
        return view('livewire.create-frai',['levels' => $levels]);
    }

    public $level_id;
    public $montant;
    public $school_year_id;
    public $error;

    public function store(SchoolFrai $frai)
    {
        //Recuperer l'année en cours d'activée
        $activeSchoolYear = SchoolYear::where('active', '1')->first();
        $this->validate([
            'level_id' => 'string|required',
            'montant' => 'string|required|',
        ]);


        //condition pour eviter les doublons

        $query = SchoolFrai::where('level_id', $this->level_id)->where('school_year_id', $activeSchoolYear->id)->get();

        if(count($query) < 1)
        {
            try{
                $frai->level_id = $this->level_id;
                $frai->school_year_id = $activeSchoolYear->id;
                $frai->montant = $this->montant;
                $frai->save();
    
            
               
               return redirect()->route('frais')->with('success', 'Le frai ajouté avec success');
    
            }catch(Exception $e){
                dd($e);
            } 

        }else{
            $this->error = 'Ce niveau a dejà une scolarité. Veuillez la modifier';
        }
        

        
    }
}
