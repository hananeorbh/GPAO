<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title font-weight-bold">Gestion des lignes</h1>
                </div>

                <div class="card-body">

                    <!-- Vérification des erreurs -->
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Sorry!</strong> Invalid input.<br><br>
                        <ul style="list-style-type:none;">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Inclure la vue pour créer ou modifier une ligne -->
                    @if($updateMode)
                    @include('livewire.lignes.update')
                    @else
                    @include('livewire.lignes.create')
                    @endif

                    <!-- Tableau pour afficher les lignes -->
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td>CODE</td>
                            <td>Nom</td>
                            <td>Atelier</td>
                            <td>ACTION</td>
                        </tr>

                        <!-- Boucle pour afficher les lignes -->
                        @foreach($data as $row)
                        <tr>
                            <td>{{$row->code}}</td>
                            <td>{{$row->name}}</td>
                            <!-- Afficher le nom de l'atelier -->
                            <td>{{$ateliers[$row->atelier_id]}}</td>
                            <td width="100">
                                <button wire:click="edit({{$row->id}})" class="btn btn-xs btn-warning">
                                    <i class="fas fa-pencil-alt"></i> 
                                </button>
                                <button wire:click="destroy({{$row->id}})" class="btn btn-xs btn-danger">
                                    <i class="fas fa-trash-alt"></i> 
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>