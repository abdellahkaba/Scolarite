<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\Level;
use Livewire\Component;
use App\Models\SchoolYear;
use Illuminate\Support\Facades\Request;

class CreateLevel extends Component
{
    public function render()
    {
        return view('livewire.create-level');
    }
    public $code;
    public $libelle;
    public $scolarite;

    public function store(Level $level)
    {
        $this->validate([
            'code' => 'string|required|unique:levels,code',
            'libelle' => 'string|required|unique:levels,libelle',
            // 'scolarite' => 'integer|required'
            
        ]);

        try{
            // Recupération de l'année en cours d'utilisation
        //    $activeSchoolYear = SchoolYear::where('active', '1')->first();
            
           $level->code = $this->code;
           $level->libelle = $this->libelle;
        //    $level->scolarite = $this->scolarite;
        //    $level->school_year_id = $activeSchoolYear->id;

           

           $level->save();
           
           return redirect()->route('niveaux')->with('success', 'Le niveau ajouté avec success');

        }catch(Exception $e){
            dd('Erreur');
        }
    }


    
}
