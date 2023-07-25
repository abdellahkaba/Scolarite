<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\Level;
use App\Models\Classe;
use Livewire\Component;
use App\Models\SchoolYear;

class CreateClasse extends Component
{
    public $libelle;
    public $level_id;
    public function render()
    {
        //Recuperer l'année en cours d'activée
        $activeSchoolYear = SchoolYear::where('active', '1')->first();

        //Charger les niveaux qui appartiennent à l'année en cours d'activée

        $levels = Level::get();

        return view('livewire.create-classe',compact('levels'));
    }

    public function store(Classe $classe)
    {
        $this->validate([
            'libelle' => 'required|unique:classes,libelle',
            'level_id' => 'required'
            
        ]);

        try{

           $classe->level_id = $this->level_id;
           $classe->libelle = $this->libelle;
           $classe->save();
           return redirect()->route('classes')->with('success', 'La nouvelle classe ajoutée avec success');

        }catch(Exception $e){
            return redirect()->back()->with('error','Il y\'a une erreur');
        }
    }
}
