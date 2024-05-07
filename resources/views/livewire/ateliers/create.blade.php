<div class="panel panel-default custom-panel">
    <div class="panel-heading">
        <h5 class="panel-title">Ajouter un Atelier :</h5>
    </div>

    <div class="panel-body">
        <div class="row justify-content-md-center">
            <div class="col-md-5">
            <div class="form-group row">
    <label for="name" class="col-md-8 col-form-label">Nom</label>
    <div class="col-md-11">
        <input wire:model="name" type="text" class="form-control" id="name">
    </div>
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