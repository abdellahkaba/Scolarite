<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use Livewire\Component;
use App\Models\SchoolYear;
use App\Models\Inscription;
use Livewire\WithPagination;

class ListeInscription extends Component
{
    use WithPagination;
    public $search;
    public $selected_classe_id;

    
    public function render()
    {
        //filtrage par classe
        $activeSchoolYear = SchoolYear::where('active', '1')->first();
        if(isset($this->selected_classe_id))
        {
            if($this->search){
                $inscriptions = Inscription::where('prenom','like', '%'. $this->search .'%')->orWhere('nom','like', '%'. $this->search .'%')->orWhere('matricule','like','%'. $this->search . '%')->where('school_year_id',$activeSchoolYear->id)->paginate(10);
                
            }else{
                $inscriptions = Inscription::with(['student','classe'])->where('classe_id', $this->selected_classe_id)->where('school_year_id',$activeSchoolYear->id)->paginate(10);
            }
        }else{
            if($this->search){
                $inscriptions = Inscription::where('prenom','like', '%'. $this->search .'%')->orWhere('nom','like', '%'. $this->search .'%')->orWhere('matricule','like','%'. $this->search . '%')->where('school_year_id',$activeSchoolYear->id)->paginate(10);
                
            }else{
                $inscriptions = Inscription::with(['student','classe'])->where('school_year_id', $activeSchoolYear->id)->paginate(10);
            }
        }

        $classListe = Classe::all();
        return view('livewire.liste-inscription',[
            'inscriptions' => $inscriptions,
            'classList' => $classListe
        ]);
    }
}
