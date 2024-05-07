<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title">Modifier le planning :</h5>
        <br>
    </div>

    <div class="panel-body">
        <div class="row justify-content-md-center">
            <input type="hidden" wire:model="selected_id">
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="date">Date</label>
                    <input wire:model="date" type="date" class="form-control" id="date">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="équipe">Équipe</label>
                    <input wire:model="équipe" type="text" class="form-control" id="équipe">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="quart">Quart</label>
                    <input wire:model="quart" type="text" class="form-control" id="quart">
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