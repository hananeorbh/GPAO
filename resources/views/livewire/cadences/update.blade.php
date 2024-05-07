<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title">Modifier une cadence:</h5>
        <br>
    </div>

    <div class="panel-body">
        <div class="row justify-content-md-center">
            <input type="hidden" wire:model="selected_id">
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
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ligne_id">Ligne</label>
                    <select wire:model="ligne_id" class="form-control" id="ligne_id">
                        <option value="">Sélectionner un atelier</option>
                        @foreach($lignes as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="article_id">Article</label>
                    <select wire:model="article_id" class="form-control" id="article_id">
                        <option value="">Sélectionner un atelier</option>
                        @foreach($articles as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cadence">Cadence</label>
                    <input wire:model="cadence" type="text" class="form-control" id="cadence">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="unité">Unité</label>
                    <input wire:model="unité" type="text" class="form-control" id="unité">
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