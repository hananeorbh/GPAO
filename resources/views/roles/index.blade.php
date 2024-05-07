@extends('adminlte::page')

@section('content')
<div class="content-wrapper" style="margin-left: 160px;">
    <br>
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <i class="fas fa-list mr-2"></i>
                    <h3 class="card-title flex-grow-1">Roles</h3>
                    <span class="text-primary" data-toggle="modal" data-target="#addRoleModal">
                        <i class="fas fa-plus"></i> Ajouter un rôle
                    </span>
                </div>
                <div class="card-body">
                    @php
                        $heads = [
                            'ID',
                            'Rôle',
                            'Action',
                        ];
                    @endphp
                    <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable with-buttons>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                           
                             <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-xs btn-warning mr-1" data-toggle="modal" data-target="#editRoleModal{{ $role->id }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="delete-form mr-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-xs btn-danger" title="Supprimer" data-toggle="modal" data-target="#deleteRoleModal{{ $role->id }}">
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
        </div>
    </div>
</div>

<div class="modal fade" id="addRoleModal" tabindex="-1" role="dialog" aria-labelledby="addRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRoleModalLabel">Ajouter un rôle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulaire de création de rôle avec les permissions -->
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="role">Rôle</label>
                        <input type="text" class="form-control" id="role" name="role" placeholder="Entrez le nom du rôle">
                    </div>
                    <div class="form-group">
                        <label for="permissions">Permissions</label><br>
                        @foreach ($permissions as $permission)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="permission_{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}">
                                <label class="form-check-label" for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- Modale de confirmation de suppression de rôle -->
@foreach ($roles as $role)
<div class="modal fade" id="deleteRoleModal{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteRoleModalLabel{{ $role->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteRoleModalLabel{{ $role->id }}">Confirmation de suppression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer ce rôle ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <!-- Soumettre le formulaire de suppression lors de la confirmation -->
                <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Modal d'édition de rôle -->
@foreach ($roles as $role)
<div class="modal fade" id="editRoleModal{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="editRoleModalLabel{{ $role->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRoleModalLabel{{ $role->id }}">Modifier le rôle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="roleName">Nom du rôle</label>
                        <input type="text" class="form-control" id="roleName" name="roleName"
                            value="{{ $role->name }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- Formulaire pour attribuer une permission à un rôle -->
<form action="{{ route('roles.store') }}" method="POST">
    
    @csrf
    <div class="modal fade" id="assignPermissionModal" tabindex="-1" role="dialog" aria-labelledby="assignPermissionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assignPermissionModalLabel">Attribuer une permission à un rôle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="role">Rôle</label>
                        <select name="roleId" class="form-control">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="permission">Permission</label>
                        <select name="permissionId" class="form-control">
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Attribuer Permission</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Sélectionnez le menu déroulant des rôles
        var roleSelect = document.getElementById('role');

        // Ajoutez un écouteur d'événements pour détecter les changements
        roleSelect.addEventListener('change', function () {
            // Récupérez la valeur sélectionnée (ID du rôle)
            var roleId = roleSelect.value;

            // Mettez à jour la valeur du champ caché avec l'ID du rôle sélectionné
            document.getElementById('roleId').value = roleId;
        });
    });
</script>

@endsection
