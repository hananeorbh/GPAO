<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title">Modifier la ligne :</h5>
        <br>
    </div>

    <div class="panel-body">
        <div class="row justify-content-md-center">
            <input type="hidden" wire:model="selected_id">
            
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
            <button wire:click="update()" class="btn btn-primary">Modifier</button>
            <br>
            <br>
        </div>
    </div>
</div>