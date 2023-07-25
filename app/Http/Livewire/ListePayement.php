<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Payement;
use App\Models\SchoolYear;
use Livewire\WithPagination;

class ListePayement extends Component
{
    use WithPagination;
    public $search ;
    public function render()
    {
        $activeSchoolYear = SchoolYear::where('active', '1')->first();
        if($this->search){
            $payements = Payement::paginate(10);
            
        }else{

            $payements = Payement::with(['student','classe'])->where('school_year_id',$activeSchoolYear->id)->paginate(10);
        }

        return view('livewire.liste-payement',compact('payements'));
    }
}
