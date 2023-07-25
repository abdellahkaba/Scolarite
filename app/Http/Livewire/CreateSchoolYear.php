<?php

namespace App\Http\Livewire;

use App\Models\SchoolYear;
use Exception;
use Livewire\Component;
use Illuminate\Support\Carbon;

class CreateSchoolYear extends Component
{
    public function render()
    {
        return view('livewire.create-school-year');
    }


    public $libelle;
   
 
   
    public function store(SchoolYear $schoolYear)
    {
        
        $this->validate([
            'libelle' => 'string|required|unique:school_years,school_year'
        ]);

        try{
            $currentYear = Carbon::now()->format('Y');
            $check = SchoolYear::whereYear('current_year', $currentYear)->get();
            if($check->count() >= 1)
            {
                return redirect()->back()->with('error','L\'année en cour a été ajoutée.');
               
            }else{
                $schoolYear->school_year = $this->libelle;
                $schoolYear->current_year = $currentYear;
                $schoolYear->save();
                if($schoolYear){
                    $this->libelle = '';
                }
                return redirect()->route('settings')->with('success','Année scolaire ajoutée avec success');
                 
            }
            

        }catch(Exception $e){

        }
    }
}
