<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title font-weight-bold">Gestion des plannings</h1>
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

                    <!-- Formulaire pour créer ou modifier un planning -->
                    @if($updateMode)
                        @include('livewire.plannings.update')
                    @else
                        @include('livewire.plannings.create')
                    @endif

                    <!-- Tableau pour afficher les plannings -->
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td>CODE</td>
                            <td>Date</td>
                            <td>Quart</td>
                            <td>Équipe</td>
                            
                            <td>Atelier</td>
                            <td>ACTION</td>
                        </tr>

                        <!-- Boucle pour afficher les plannings -->
                        @foreach($plannings as $planning)
                        <tr>
                            <td>{{$planning->code}}</td>
                            <td>{{$planning->date}}</td>
                           
                            <td>{{$planning->quart}}</td>
                            <td>{{$planning->équipe}}</td>
                            <!-- Afficher le nom de l'atelier -->
                            <td>{{ isset($ateliers[$planning->atelier_id]) ? $ateliers[$planning->atelier_id] : 'N/A' }}</td>
                            <td width="100">
                                <button wire:click="edit({{$planning->id}})" class="btn btn-xs btn-warning">
                                    <i class="fas fa-pencil-alt"></i> 
                                </button>
                                <button wire:click="destroy({{$planning->id}})" class="btn btn-xs btn-danger">
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
