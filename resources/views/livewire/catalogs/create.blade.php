<div class="panel panel-default custom-panel">
    <div class="panel-heading">
        <h5 class="panel-title">Ajouter un catalogue:</h5>
        <br>
    </div>

    <div class="panel-body">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="famille">Famille</label>
                    <input wire:model="famille" type="text" class="form-control" id="famille">
                </div>
                <div class="form-group">
                    <label for="sfamille">Sous famille</label>
                    <input wire:model="sfamille" type="text" class="form-control" id="sfamille">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="class">Classe</label>
                    <input wire:model="class" type="text" class="form-control" id="class">
                </div>
                <div class="form-group">
                    <label for="impact">Impact</label>
                    <input wire:model="impact" type="text" class="form-control" id="impact">
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
