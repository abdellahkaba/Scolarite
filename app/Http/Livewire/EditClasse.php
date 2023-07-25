<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use Exception;
use App\Models\Level;
use Livewire\Component;
use App\Models\SchoolYear;

class EditClasse extends Component
{
    public $classe;
    public $libelle;
    public $level_id;
    public function mount()
    {
        $this->libelle = $this->classe->libelle;
        $this->level_id = $this->classe->level_id;
    }
    public function update()
    {
        $classe = Classe::find($this->classe->id);
        $this->validate([
            'libelle' => 'string|required|',
            'level_id' => 'integer|required'
            
        ]);

        try{
        
           $classe->libelle = $this->libelle;
           $classe->level_id = $this->level_id;
           $classe->save();
           return redirect()->route('classes')->with('success', 'La classe mise à jour avec succèss');

        }catch(Exception $e){
            return redirect()->back()->with('error','Il y\'a un problem');
        }
    }
    public function render()
    {
        $activeSchoolYear = SchoolYear::where('active', '1')->first();
        $levels = Level::where('school_year_id', $activeSchoolYear->id)->get();
        return view('livewire.edit-classe',compact('levels'));
    }
}
