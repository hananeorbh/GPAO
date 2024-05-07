<div class="panel panel-default custom-panel">
    <div class="panel-heading">
        <h5 class="panel-title">Ajouter un planning :</h5>
        <br>
    </div>

    <div class="panel-body">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="date">Date</label>
                    <input wire:model="date" type="date" class="form-control" id="date">
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label for="quart">Quart</label>
                    <input wire:model="quart" type="text" class="form-control" id="quart">
                </div>
            </div>

            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="équipe">Équipe</label>
                    <input wire:model="équipe" type="text" class="form-control" id="équipe">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="atelier_id">Atelier</label>
                    <select wire:model="atelier_id" class="form-control" id="atelier_id">
                        <option value="">Sélectionner un atelier</option>
                        @foreach($ateliers as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="text-left">
            <button wire:click="store()" class="btn btn-primary">Enregistrer</button>
            <br>
            <br>
        </div>
    </div>
</div>