@extends('adminlte::page')

@section('content')

<div class="content-wrapper" style="margin-left: 170px;">
    <br>
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <div class="row">
        <div class="col-md-9">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Créer une recette</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('recettes.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="article_pf_id"><i class="fas fa-cube"></i> Article PF:</label>
                                <select class="form-control" name="article_pf_id" id="article_pf_id">
                                    <option value="">Sélectionnez un article PF</option>
                                    @foreach($articlesPF as $article)
                                    <option value="{{ $article->id }}">{{ $article->name }}</option>
                                    @endforeach
                                </select>
                            </div>
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
</div>

@endsection
