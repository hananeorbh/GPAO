

@extends('adminlte::page')

@section('content')
<div class="content-wrapper" style="margin-left: 150px;">
    <br>

    <div class="text- mt-3">
        <a href="{{ route('articles.create') }}" class="btn btn-primary">
            <i class="fas fa-cube mr-1"></i> Ajouter un article
        </a>
    </div>
    @section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

    <br> <!-- Ajout d'un espacement -->
    <div class="row">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-header d-flex align-items-center">
                        <i class="fas fa-users mr-2"></i>
            <h3 class="card-title">Liste des articles</h3>
        </div>
        <div class="card-body">
        @php
                    $heads = [
                'Code',
                'Nom',
                'Type',
                'Action',];
                @endphp
                    <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable with-buttons>
            @foreach ($articles as $article)
<tr>
    <td>{{ $article->code }}</td>
    <td>{{ $article->name }}</td>
    <td>{{ $article->type }}</td>
    <td style="width: 10%;">
        <div class="btn-group" role="group">
            <a type="button" class="btn btn-xs btn-warning mr-1" title="Modifier"
                data-toggle="modal" data-target="#editModal-{{ $article->id }}">
                <i class="fas fa-pencil-alt"></i>
            </a>
            <form id="deleteForm-{{ $article->id }}" method="POST" action="{{ route('articles.destroy', $article->id) }}" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-xs btn-danger delete-article" title="Supprimer" data-toggle="modal" data-target="#deleteModal-{{ $article->id }}">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </div>
    </td>
</tr>
@endforeach
            </x-adminlte-datatable>
        </div>
    </div>
    {{ $articles->links('pagination::bootstrap-5') }}
</div>
 
<!-- Modals de Modification -->
@foreach ($articles as $article)
<div class="modal fade" id="editModal-{{ $article->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="editModalLabel">Modifier l'article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulaire de Modification -->
                <form id="editForm-{{ $article->id }}" action="{{ route('articles.update', $article->id) }}"
                    method="POST">
                    @csrf
                    @method('PUT')

                    <label for="name">Article</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $article->name }}">
                    <label>Type d'article</label>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="type_ip" name="type[]" value="IP"
                            {{ in_array('IP', explode(',', $article->type)) ? 'checked' : '' }}>
                        <label class="form-check-label" for="type_ip">IP</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="type_pf" name="type[]" value="PF"
                            {{ in_array('PF', explode(',', $article->type)) ? 'checked' : '' }}>
                        <label class="form-check-label" for="type_pf">PF</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" form="editForm-{{ $article->id }}" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Modal de confirmation de suppression -->
@foreach ($articles as $article)
<div class="modal fade" id="deleteModal-{{ $article->id }}" tabindex="-1" role="dialog"
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
                Êtes-vous sûr de vouloir supprimer cet article ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger confirm-delete" data-dismiss="modal" data-article-id="{{ $article->id }}">Supprimer</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@section('js')
<script>
    $(document).ready(function () {
        $('.delete-article').click(function () {
            var articleId = $(this).data('article-id');
            $('#deleteModal-' + articleId).modal('show');
        });

        $('.confirm-delete').click(function () {
            var articleId = $(this).data('article-id');
            $('#deleteForm-' + articleId).submit();
        });
    });
</script>
@endsection
@endsection
