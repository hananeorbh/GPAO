@extends('adminlte::page')

@section('content')
<div class="content-wrapper" style="margin-left: 130px;">
    <br>

    <div class="text- mt-3">
        <a href="{{ route('recettes.create') }}" class="btn btn-primary">
            <i class="fas fa-cube mr-1"></i> Ajouter recette
        </a>
    </div>
    @section('plugins.Datatables', true)
    @section('plugins.DatatablesPlugin', true)


    {{-- Votre contenu ici --}}
    <br>

    <div class="row">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Liste des recettes</h3>
                </div>

                <!-- /.card-header -->
                
                <div class="card-body">
                    @php
                    $heads = [
                        'Article PF',
                        'Article IP',
                        'Quantité',
                        'Unité',
                        'Actions',
                    ];
                    @endphp
                    
                    <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable with-buttons> 
                        
                            @foreach($recettes as $recette)
                                <tr>
                                    <td>
                                        @if($recette->article_pf)
                                            {{ $recette->article_pf->name }}
                                        @else
                                            Aucun article trouvé
                                        @endif
                                    </td>
                                    <td>
                                        @if($recette->article_ip)
                                            {{ $recette->article_ip->name }}
                                        @else
                                            Aucun article trouvé
                                        @endif
                                    </td>
                                    <td>{{ $recette->quantite }}</td>
                                    <td>{{ $recette->unite }}</td>
                                    <td>
                                    <button class="btn btn-xs btn-warning edit-btn" data-article-pf="{{ $recette->article_pf_id }}" data-article-ip="{{ $recette->article_ip_id }}" data-quantite="{{ $recette->quantite }}" data-unite="{{ $recette->unite }}" data-toggle="modal" data-target="#editModal{{ $recette->id }}">
                <i class="fas fa-pencil-alt"></i>
            </button>
                                        <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal{{ $recette->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>
    </div>
</div>


@foreach($recettes as $recette)
    <!-- Modal de confirmation de suppression -->
    <div class="modal fade" id="deleteModal{{ $recette->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $recette->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $recette->id }}">Confirmation de suppression</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer cette recette ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <form action="{{ route('recettes.destroy', $recette->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal pour modifier la recette -->
<div class="modal fade" id="editModal{{ $recette->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $recette->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $recette->id }}">Modifier la recette</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
 
                <form method="POST" action="{{ route('recettes.update', $recette->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                  
                        <div class="form-group">
                            <label for="article_pf_id"><i class="fas fa-cube"></i> Article PF:</label>
                                <select class="form-control" name="article_pf_id" id="article_pf_id">
                                            <option value="">Sélectionnez un article PF</option>
                                            @foreach($articlesPF as $article)
                                            <option value="{{ $article->id }}">{{ $article->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="col-md-6">
                                        <label for="article_ip_id"><i class="fas fa-cube"></i> Article IP:</label>
                                        <select class="form-control" name="article_ip_id" id="article_ip_id">
                                            <option value="">Sélectionnez un article IP</option>
                                            @foreach($articlesIP as $article)
                                            <option value="{{ $article->id }}">{{ $article->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                         </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="quantite"><i class="fas fa-balance-scale"></i> Quantité:</label>
                                <input type="text" class="form-control" name="quantite" id="quantite" placeholder="Quantité">
                            </div>
                            <div class="col-md-6">
                                <label for="unite"><i class="fas fa-boxes"></i> Unité:</label>
                                <input type="text" class="form-control" name="unite" id="unite" placeholder="Unité">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach

@endsection
@section('js')
<script>
    // JavaScript pour pré-remplir les champs du formulaire de modification avec les valeurs de la ligne
    $(document).ready(function() {
        $('.edit-btn').click(function() {
            var article_pf_id = $(this).data('article-pf');
            var article_ip_id = $(this).data('article-ip');
            var quantite = $(this).data('quantite');
            var unite = $(this).data('unite');

            $('#article_pf_id').val(article_pf_id);
            $('#article_ip_id').val(article_ip_id);
            $('#quantite').val(quantite);
            $('#unite').val(unite);
        });
    });
</script>
@endsection