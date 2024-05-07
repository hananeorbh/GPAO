@extends('adminlte::page')

@section('content')
<div class="content-wrapper" style="margin-left: 200px;">
    <br>
    <div class="row">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Créer un utilisateur</h3>
                </div>
                <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <x-adminlte-input name="name" label="Nom d'utilisateur" placeholder="Nom d'utilisateur" label-class="text-dark">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-dark"></i>
                                </div>
                            </x-slot>
                            <input type="text" class="form-control form-control-lg" name="username" placeholder="Nom d'utilisateur">
                        </x-adminlte-input>

                        <x-adminlte-input name="email" type="email" label="Adresse e-mail" placeholder="Adresse e-mail de l'utilisateur" label-class="text-dark">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope text-dark"></i>
                                </div>
                            </x-slot>
                            <input type="email" class="form-control form-control-lg" name="email" placeholder="Adresse e-mail de l'utilisateur">
                        </x-adminlte-input>

                        <div class="form-group">
                            <label for="role_id">Rôle</label>
                            <select name="role_id" id="role_id" class="form-control">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <x-adminlte-input name="password" type="password" label="Mot de passe" placeholder="Mot de passe de l'utilisateur" label-class="text-dark">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-lock text-dark"></i>
                                </div>
                            </x-slot>
                            <input type="password" class="form-control form-control-lg" name="password" placeholder="Mot de passe de l'utilisateur">
                        </x-adminlte-input>
                    </div>

                    <div class="card-footer">
                        <button type="submit" id="addUserButton" class="btn btn-primary">Ajouter un utilisateur</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="restrictionModal" tabindex="-1" role="dialog" aria-labelledby="restrictionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="restrictionModalLabel">Restriction d'accès</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Vous n'êtes pas autorisé à ajouter un utilisateur.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('addUserButton').addEventListener('click', function () {
            @if(!auth()->user()->hasRole('admin'))
                $('#restrictionModal').modal('show');
                event.preventDefault();
            @endif
        });
    });
</script>
@endsection
