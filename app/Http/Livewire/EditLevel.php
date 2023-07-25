<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\Level;
use Livewire\Component;
use App\Models\SchoolYear;

class EditLevel extends Component
{
    public $level;
    public $code;
    public $libelle;
    // public $scolarite;

    public function mount()
    {
        $this->code = $this->level->code;
        $this->libelle = $this->level->libelle;
        // $this->scolarite = $this->level->scolarite;
        
    }

    public function edit()
    {
        $level = Level::find($this->level->id);
        $this->validate([
            'code' => 'string|required|unique:levels,code',
            'libelle' => 'string|required|unique:levels,libelle',
            // 'scolarite' => 'integer|required'
            
        ]);

        try{
           $level->code = $this->code;
           $level->libelle = $this->libelle;
        //    $level->scolarite = $this->scolarite;
           $level->save();
           return redirect()->route('niveaux')->with('success', 'Le niveau ajouté avec success');

        }catch(Exception $e){
            return redirect()->back()->with('error','Il y\'a un problem');
        }
    }

    public function render()
    {
        return view('livewire.edit-level');
    }
}
