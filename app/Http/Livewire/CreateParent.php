<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;
use App\Models\SchoolYear;
use App\Models\parentParent;
use App\Models\Family;
use App\Notifications\ParentNotification;

class CreateParent extends Component
{

    public $prenom;
    public $nom;
    public $email;
    public $contact;
    public function render()
    {
        return view('livewire.create-parent');
    }


    public function store(Family $parent)
    {
        $this->validate([
            
            'prenom' => 'string|required',
            'nom' => 'string|required',
            'email' => 'email|required|unique:parents,email',
            'contact' => 'string|required'
            
        ]);

        try{
            // Recupération de l'année en cours d'utilisation
           $activeSchoolYear = SchoolYear::where('active', '1')->first();
            
           
           $parent->prenom = $this->prenom;
           $parent->nom = $this->nom;
           $parent->email = $this->email;
           $parent->contact = $this->contact;

           $parent->save();

           //verifier si le parent est inscrit dans la bd

           if($parent)
           {
                $parent->notify(new ParentNotification());
           }
           
           return redirect()->route('parents')->with('success', 'Parent ajouté avec success');

        }catch(Exception $e){
            dd($e);
        }
    }
}
