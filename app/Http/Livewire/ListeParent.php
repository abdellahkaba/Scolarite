<?php

namespace App\Http\Livewire;

use App\Models\Family;
use Livewire\Component;
use Livewire\WithPagination;

class ListeParent extends Component
{
    use WithPagination;
    public $search;

    public function delete(Family $parent)
    {
        $parent->delete();

        return redirect()->route('parents')->with('success', 'Parent supprimé avec success');
    }
    public function render()
    {
        if($this->search){
            $parents = Family::where('prenom','like', '%'. $this->search .'%')->orWhere('nom','like', '%'. $this->search .'%')->orWhere('email','like','%'. $this->search . '%')->paginate(10);
            
        }else{
            $parents = Family::paginate(10);
        }
        return view('livewire.liste-parent',[
            'parents' => $parents
        ]);
    }

    
}
