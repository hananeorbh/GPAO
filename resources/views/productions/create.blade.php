@extends('adminlte::page')

@section('content')

<div class="content-wrapper" style="margin-left: 70px;">
    <br>
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <div class="row">
        <div class="col-md-11">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Créer une production</h3>
                </div>

                <form method="POST" action="{{ route('productions.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <!-- Champs Date, Quart et Équipe dans la même ligne -->
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                            <div class="col-md-4">
                                <label for="quart">Quart</label>
                                <select class="form-control" id="quart" name="quart">
                                    <option value=""> </option>
                                    <option value="3*8">3*8</option>
                                    <option value="2*12">2*12</option>
                                    <option value="surface">Surface</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="équipe">Équipe</label>
                                <select class="form-control" id="équipe" name="équipe">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
                            </div>
                        </div>

                        <!-- Champ Atelier et Ligne dans la même ligne -->
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Atelier</label>
                                <select class="form-control select-atelier" name="atelier_id">
                                    <option value="">Sélectionner un atelier</option>
                                    @foreach($ateliers as $atelier)
                                    <option value="{{ $atelier->id }}">{{ $atelier->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Ligne de production</label>
                                <select class="form-control select-ligne" name="ligne_id">
                                    <option value="">Sélectionner une ligne</option>
                                </select>
                            </div>
                        </div>

                        <!-- Champs Type d'article avec des boutons radio -->
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="type">Type d'article</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" id="type_ip" value="IP">
                                    <label class="form-check-label" for="type_ip">IP</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" id="type_pf" value="PF">
                                    <label class="form-check-label" for="type_pf">PF</label>
                                </div>
                            </div>
                        </div>

                        <!-- Champ Article avec une liste déroulante dynamique -->
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="article_id">Article</label>
                                <select class="form-control" id="article_id" name="article_id" data-type="">
                                    <option value="">Sélectionner un article</option>
                                </select>
                            </div>
                        </div>

                        <!-- Champs Quantité, Unité et Lot dans la même ligne -->
                        <div class="form-group row">
                            <!-- Champ Quantité -->
                            <div class="col-md-4">
                                <label for="quantité">Quantité</label>
                                <input type="number" class="form-control" id="quantité" name="quantité" placeholder="Quantité de la production">
                            </div>
                            <!-- Champ Unité de production -->
                            <div class="col-md-4">
                                <label for="unité">Unité de production</label>
                                <input type="text" class="form-control" id="unité" name="unité" placeholder="Unité de production">
                            </div>
                            <!-- Champ Lot -->
                            <div class="col-md-4">
                                <label for="lot">Lot</label>
                                <input type="text" class="form-control" id="lot" name="lot" placeholder="Lot de la production">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Créer une production</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
$(document).ready(function(){
    // Lorsqu'un type d'article est sélectionné
    $('input[name="type"]').change(function(){
        var type = $(this).val();
        // Requête AJAX pour obtenir les articles du type sélectionné
        $.ajax({
            url: '/get-articles-by-type',
            type: 'GET',
            data: { type: type },
            success: function(data) {
                // Supprimer toutes les options actuelles
                $('#article_id').empty();
                // Ajouter les nouvelles options des articles
                $.each(data, function(index, article) {
                    $('#article_id').append('<option value="' + article.id + '">' + article.name + '</option>');
                });
            }
        });
    });
});
$(document).ready(function(){
    // Lorsqu'un atelier est sélectionné
    $('select[name="atelier_id"]').change(function(){
        var atelierId = $(this).val();
        // Requête AJAX pour obtenir les lignes de l'atelier sélectionné
        $.ajax({
            url: '/get-lignes/' + atelierId,
            type: 'GET',
            success: function(data) {
                // Supprimer toutes les options actuelles
                $('select[name="ligne_id"]').empty();
                // Ajouter les nouvelles options des lignes
                $.each(data, function(index, ligne) {
                    $('select[name="ligne_id"]').append('<option value="' + ligne.id + '">' + ligne.name + '</option>');
                });
            }
        });
    });
});
</script>
@endpush
