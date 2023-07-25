<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SchoolYear;
use Livewire\WithPagination;

class Settings extends Component
{
    use WithPagination;
    public $search = '';

    public function toggleStatus(SchoolYear $schoolYear)
    {
        $query = SchoolYear::where('active', '1')->update(['active' => '0']);

        $schoolYear->active = '1';
        $schoolYear->save();
    }

    public function render()
    {
        
        if($this->search){
            $schoolYear = SchoolYear::where('school_year','like', '%'. $this->search .'%')->orWhere('current_year','like', '%'. $this->search .'%')->paginate(10);
            
        }else{
             $schoolYear = SchoolYear::paginate(10); 
        }
        
        return view('livewire.settings',[
            'schoolYear' => $schoolYear
        ]);
    }
}
