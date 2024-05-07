<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Atelier; 
use Haruncpi\LaravelIdGenerator\IdGenerator;

class AtelierComponent extends Component
{
   

    public $data, $name,  $selected_id;
    public $updateMode = false;

    public function render()
{
    $this->data = Atelier::orderBy('id')->get();
    return view('livewire.ateliers.component');
}


    private function resetInput()
    {
        $this->name = null;
       
    }

    public function store()
    {
         
        $this->validate([
            'name' => 'required|min:5',
           
        ]);

        Atelier::create([
            'name' => $this->name,
      
        ]);

        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Atelier::findOrFail($id);

        $this->selected_id = $id;
        $this->name = $record->name;
    

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'name' => 'required|min:5',
           
        ]);

        if ($this->selected_id) {
            $record = Atelier::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                
            ]);

            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Atelier::findOrFail($id); 
            $record->delete();
        }
    }
}