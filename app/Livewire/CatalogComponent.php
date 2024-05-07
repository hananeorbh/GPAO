<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Catalog; 
use Haruncpi\LaravelIdGenerator\IdGenerator;

class CatalogComponent extends Component
{
   

    public $data,$selected_id ,$famille ,$sfamille,$class,$impact;
    public $updateMode = false;

    public function render()
{
    $this->data = Catalog::orderBy('id')->get();
    return view('livewire.catalogs.component');
}


    private function resetInput()
    {
        $this->name = null;
    $this->famille = null;
    $this->sfamille = null;
    $this->class = null;
    $this->impact = null;
    $this->selected_id = null;
       
    }

    public function store()
    {
         
        $this->validate([
            'famille' => 'required',
            'sfamille' => 'required',
            'class' => 'required',
            'impact' => 'required',
        ], [
            'famille.required' => 'Le champ Famille est requis.',
            'sfamille.required' => 'Le champ Sous-famille est requis.',
            'class.required' => 'Le champ Classe est requis.',
            'impact.required' => 'Le champ Impact est requis.',
        ]);

        Catalog::create([
            'famille' => $this->famille,
            'sfamille' => $this->sfamille,
            'class' => $this->class,
            'impact' => $this->impact,
      
        ]);

        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Catalog::findOrFail($id);

        $this->selected_id = $id;
        $this->famille = $record->famille;
        $this->sfamille = $record->sfamille;
        $this->class = $record->class;
        $this->impact = $record->impact;
    

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'famille' => 'required',
            'sfamille' => 'required',
            'class' => 'required',
            'impact' => 'required',
           
        ]);

        if ($this->selected_id) {
            $record = Catalog::find($this->selected_id);
            $record->update([
                'famille' => $this->famille,
            'sfamille' => $this->sfamille,
            'class' => $this->class,
            'impact' => $this->impact,
                
            ]);

            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Catalog::findOrFail($id); 
            $record->delete();
        }
    }
}