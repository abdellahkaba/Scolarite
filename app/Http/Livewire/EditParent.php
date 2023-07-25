<?php

namespace App\Http\Livewire;

use App\Models\StudentParent;
use Exception;
use Livewire\Component;

class EditParent extends Component
{

    public $parent;
    public $prenom;
    public $nom;
    public $email;
    public $contact;

    public function mount()
    {
       
        $this->prenom = $this->parent->prenom;
        $this->nom = $this->parent->nom;
        $this->email = $this->parent->email;
        $this->contact = $this->parent->contact;
    }

    public function edit()
    {
        $parent = StudentParent::find($this->parent->id);
        $this->validate([
            'prenom' => 'string|required',
            'nom' => 'string|required',
            'email' => 'string|required',
            'contact' => 'string|required'
            
        ]);

        try{

           $parent->prenom = $this->prenom;
           $parent->nom = $this->nom;
           $parent->email = $this->email;
           $parent->contact = $this->contact;

           

           $parent->save();
           
           return redirect()->route('parents')->with('success', 'Mise à jour avec succèss');

        }catch(Exception $e){
            dd('Erreur');
        }
    }
    public function render()
    {
        return view('livewire.edit-parent');
    }
}
