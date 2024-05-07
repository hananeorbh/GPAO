
<div class="panel panel-default custom-panel">
    
    <div class="panel-heading">
        <h5 class="panel-title">Ajouter une cadence:</h5>
        <br>
    </div>

    <div class="panel-body">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="atelier_id">Atelier</label>
                    <select wire:model="atelier_id" class="form-control" id="atelier_id" wire:change="getLignes($event.target.value)">
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
            <option value="">Sélectionner une ligne</option>
            @if (!empty($lignes))
                @foreach($lignes as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="article_id">Article PF</label>
                    <select wire:model="article_id" class="form-control" id="article_id">
                        <option value="">Sélectionner un article</option>
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
           
            <div class="col-md-6 text-left">
                 <br>
                <button wire:click="store()" class="btn btn-primary">Enregistrer</button>
                <br>
                <br>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('lignesUpdated', function (lignes) {
            var ligneSelect = document.getElementById('ligne_id');
            ligneSelect.innerHTML = ''; // Supprimer les options actuelles

            lignes.forEach(function (ligne) {
                var option = document.createElement('option');
                option.value = ligne.id;
                option.innerText = ligne.name;
                ligneSelect.appendChild(option);
            });
        });
    });
</script>

