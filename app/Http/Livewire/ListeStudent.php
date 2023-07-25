<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use App\Models\SchoolYear;
use Livewire\WithPagination;

class ListeStudent extends Component
{
    use WithPagination;
    public $search;


    public function delete(Student $student)
    {
        $student->delete();

        return redirect()->route('eleves')->with('success', 'Eleve supprimé avec success');
    }

    
    public function render()
    {
        if($this->search){
            $students = Student::where('prenom','like', '%'. $this->search .'%')->orWhere('nom','like', '%'. $this->search .'%')->orWhere('matricule','like','%'. $this->search . '%')->paginate(10);
            
        }else{
            $students = Student::paginate(10);
        }
        return view('livewire.liste-student',[
            'students' => $students
        ]);
    }

    
}
