<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SchoolFrai;
use App\Models\SchoolYear;
use Livewire\WithPagination;

class ListeFrai extends Component
{
    use WithPagination;
    public $search ;


    public function delete(SchoolFrai $level)
    {
        $level->delete();

        return redirect()->route('niveaux')->with('success', 'Niveau supprimé avec success');
    }
    public function render()
    {
        if($this->search){
            $frais = SchoolFrai::where('libelle','like', '%'. $this->search .'%')->orWhere('code','like', '%'. $this->search .'%')->paginate(10);
            
        }else{
            $activeSchoolYear = SchoolYear::where('active', '1')->first();


            $frais = SchoolFrai::with(['level','schoolyear'])->whereRelation('schoolyear','school_year_id',$activeSchoolYear->id)->paginate(10);
        }
        return view('livewire.liste-frai',compact('frais'));
    }
}
