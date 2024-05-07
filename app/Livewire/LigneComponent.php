<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ligne;
use App\Models\Atelier;

class LigneComponent extends Component
{
    public $data, $name, $atelier_id, $selected_id;
    public $updateMode = false;

    public function render()
    {
        $this->data = Ligne::all();
        $ateliers = Atelier::pluck('name', 'id');
        return view('livewire.lignes.component', compact('ateliers'));
    }
    

    
    


    private function resetInput()
    {
        $this->name = null;
        $this->atelier_id = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:5',
            'atelier_id' => 'required'
        ]);

        Ligne::create([
            'name' => $this->name,
            'atelier_id' => $this->atelier_id
        ]);

        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Ligne::findOrFail($id);

        $this->selected_id = $id;
        $this->name = $record->name;
        $this->atelier_id = $record->atelier_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'name' => 'required|min:5',
            'atelier_id' => 'required'
        ]);

        $record = Ligne::find($this->selected_id);
        if ($record) {
            $record->update([
                'name' => $this->name,
                'atelier_id' => $this->atelier_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Ligne::findOrFail($id);
            $record->delete();
        }
    }
}