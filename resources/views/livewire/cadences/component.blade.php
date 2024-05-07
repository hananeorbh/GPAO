
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title font-weight-bold">Cadences</h1>
                </div>

                <div class="card-body">
                    <!-- Vérification des erreurs -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Erreur!</strong> Entrée invalide.<br><br>
                            <ul style="list-style-type:none;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Inclure la vue pour créer ou modifier une ligne -->
                    @if($updateMode)
                        @include('livewire.cadences.update')
                    @else
                        @include('livewire.cadences.create')
                    @endif

                    <!-- Tableau pour afficher les lignes -->
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td>CODE</td>
                            <td>ATELIER</td>
                            <td>LIGNE</td>
                            <td>ARTICLE</td>
                            <td>CADENCE</td>
                            <td>UNITÉ</td>
                            <td>ACTION</td>
                        </tr>

                        <!-- Boucle pour afficher les lignes -->
                        @foreach($data as $row)
                            <tr>
                                <td>{{$row->code}}</td>
                                <td>{{ isset($ateliers[$row->atelier_id]) ? $ateliers[$row->atelier_id] : '' }}</td>
                                <td>{{ isset($lignes[$row->ligne_id]) ? $lignes[$row->ligne_id] : '' }}</td>
                                <td>{{ isset($articles[$row->article_id]) ? $articles[$row->article_id] : '' }}</td>
                                <td>{{$row->cadence}}</td>
                                <td>{{$row->unité}}</td>
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
