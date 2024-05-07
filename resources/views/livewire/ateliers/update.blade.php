<div class="panel panel-default">
    <div class="panel-heading">
   
        <h5 class="panel-title">Modifier l'atelier: </h5>
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

           
        </div>

        <div class="text-left">
            <button wire:click="update()" class="btn btn-primary">Modifier</button>
            <br>
            <br>
        </div>
    </div>
</div>