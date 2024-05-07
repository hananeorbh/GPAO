

@extends('adminlte::page')

@section('content')
<div class="content-wrapper" style="margin-left: 130px;">
    <br>

    <div class="text- mt-3">
        <a href="{{ route('productions.create') }}" class="btn btn-primary">
            <i class="fas fa-cube mr-1"></i> Ajouter production
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
                    <h3 class="card-title">Liste des productions</h3>
                </div>

                <!-- /.card-header -->
                
                <div class="card-body">
                    @php
                    $heads = [
                    'Code',
                    'Date',
                    
                    'Article',
                    'Quantité',
                    'Unité',
                    
                    'Actions',
                    ];
                    @endphp
                    
                    <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable with-buttons> 
                   
                        
                        @foreach ($productions as $production)
                        <tr>
                            <td >{{ $production->code }}</td>
                            <td >{{ $production->date }}</td>
                            <td>{{ $production->article->name }}</td> 
                            <td>{{ $production->quantité }}</td>
                            <td>{{ $production->unité }}</td>
                           
                            <td>
                                <div class="btn-group" role="group">
                                <a href="{{ route('productions.show', $production->id) }}" class="text-info px-1" title="Voir détails">
    <button type="button" class="btn btn-xs btn-success" title="Voir détails">
        <i class="fas fa-eye"></i>
    </button>
</a>
                                    <a type="button" class="btn btn-xs btn-warning mr-1"  title="Modifier"
                                        data-toggle="modal" data-target="#editModal-{{ $production->id }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a type="button" class="btn btn-xs btn-danger" title="Supprimer" data-toggle="modal"
                                        data-target="#deleteModal-{{ $production->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                  </a>  
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </x-adminlte-datatable>
                   
                    <div class="d-flex justify-content-center mt-4">

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ $productions->links('pagination::bootstrap-5') }}
    <!-- /.row -->
</div>

<!-- Modal de confirmation de suppression -->
@foreach ($productions as $production)
<div class="modal fade" id="deleteModal-{{ $production->id }}" tabindex="-1" role="dialog"
    aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmation de suppression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cette production ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <form id="deleteForm" action="{{ route('productions.destroy', $production->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Modification -->
<div class="modal fade" id="editModal-{{ $production->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="editModalLabel">Modifier la production</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulaire de Modification -->
                <form id="editForm-{{ $production->id }}"
                    action="{{ route('productions.update', $production->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date"
                                value="{{ $production->date }}">
                        </div>
                        <div class="col-md-4">
                            <label for="quart">Quart</label>
                            <select class="form-control" id="quart" name="quart">
                                <option value="3*8" {{ $production->quart == '3*8' ? 'selected' : '' }}>3*8</option>
                                <option value="2*12" {{ $production->quart == '2*12' ? 'selected' : '' }}>2*12
                                </option>
                                <option value="surface"
                                    {{ $production->quart == 'surface' ? 'selected' : '' }}>Surface</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="équipe">Équipe</label>
                            <select class="form-control" id="équipe" name="équipe">
                                <option value="A" {{ $production->équipe == 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ $production->équipe == 'B' ? 'selected' : '' }}>B</option>
                                <option value="C" {{ $production->équipe == 'C' ? 'selected' : '' }}>C</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="atelier_id">Atelier</label>
                            <select class="form-control" id="atelier_id" name="atelier_id">
                                <option value="">Sélectionner un atelier</option>
                                @foreach ($ateliers as $atelier)
                                <option value="{{ $atelier->id }}"
                                    {{ $atelier->id == $production->atelier_id ? 'selected' : '' }}>
                                    {{ $atelier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="ligne_id">Ligne</label>
                            <select class="form-control" id="ligne_id" name="ligne_id">
                                <option value="">Sélectionner une ligne</option>
                                @foreach ($lignes as $ligne)
                                <option value="{{ $ligne->id }}"
                                    {{ $ligne->id == $production->ligne_id ? 'selected' : '' }}>
                                    {{ $ligne->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="article_id">Article</label>
                            <select class="form-control" id="article_id" name="article_id">
                                <option value="">Sélectionner un article</option>
                                @foreach ($articles as $article)
                                <option value="{{ $article->id }}"
                                    {{ $article->id == $production->article_id ? 'selected' : '' }}>
                                    {{ $article->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="quantité">Quantité</label>
                            <input type="number" class="form-control" id="quantité" name="quantité"
                                value="{{ $production->quantité }}">
                        </div>
                        <div class="col-md-4">
                            <label for="unité">Unité de production</label>
                            <input type="text" class="form-control" id="unité" name="unité"
                                value="{{ $production->unité }}">
                        </div>
                        <div class="col-md-4">
                            <label for="lot">Lot</label>
                            <input type="text" class="form-control" id="lot" name="lot"
                                value="{{ $production->lot }}">
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
