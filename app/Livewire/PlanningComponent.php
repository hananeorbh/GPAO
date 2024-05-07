<?php

namespace App\Livewire;

use App\Models\Planning;
use App\Models\Atelier;
use Livewire\Component;

class PlanningComponent extends Component
{
    public $plannings;
    public $date, $équipe, $quart, $atelier_id, $selected_id;
    public $updateMode = false;

    public function mount()
    {
        $this->plannings = Planning::all();
    }

    public function render()
{
    $this->plannings = Planning::all();
    $ateliers = Atelier::pluck('name', 'id');
    return view('livewire.plannings.component', compact('ateliers'));
}

    private function resetInput()
    {
        $this->date = null;
        $this->équipe = null;
        $this->quart = null;
        $this->atelier_id = null;
    }

    public function store()
    {
        $this->validate([
            'date' => 'required',
            'équipe' => 'required',
            'quart' => 'required',
            'atelier_id' => 'required'
        ]);

        Planning::create([
            'date' => $this->date,
            'équipe' => $this->équipe,
            'quart' => $this->quart,
            'atelier_id' => $this->atelier_id
        ]);

        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Planning::findOrFail($id);

        $this->selected_id = $id;
        $this->date = $record->date;
        $this->équipe = $record->équipe;
        $this->quart = $record->quart;
        $this->atelier_id = $record->atelier_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'date' => 'required',
            'équipe' => 'required',
            'quart' => 'required',
            'atelier_id' => 'required'
        ]);

        $record = Planning::find($this->selected_id);
        if ($record) {
            $record->update([
                'date' => $this->date,
                'équipe' => $this->équipe,
                'quart' => $this->quart,
                'atelier_id' => $this->atelier_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Planning::findOrFail($id);
            $record->delete();
        }
    }
}