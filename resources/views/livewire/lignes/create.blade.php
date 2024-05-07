<div class="panel panel-default custom-panel">
    <div class="panel-heading">
        <h5 class="panel-title">Ajouter une ligne :</h5>
        <br>
    </div>

    <div class="panel-body">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input wire:model="name" type="text" class="form-control" id="name">
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