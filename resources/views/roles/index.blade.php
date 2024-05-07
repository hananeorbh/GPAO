@extends('adminlte::page')

@section('content')
<div class="content-wrapper" style="margin-left: 130px;">
    <br>

    <div class="text- mt-3">
        <a href="{{ route('roles.create') }}" class="btn btn-primary">
            <i class="fas fa-cube mr-1"></i> Ajouter rôle
        </a>
    </div>
    @section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

    <br>

    <div class="row">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Liste des roles</h3>
                </div>

                <!-- /.card-header -->
                
                <div class="card-body">
                    @php
                    $heads = [
                        'ID',
                        'Rôle',
                        'Actions',
                    ];
                    @endphp

                    <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable with-buttons>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                            <div class="btn-group" role="group">
                                <a  class="text-info px-1" data-toggle="modal" data-target="#permissionsModal{{ $role->id }}" title="Voir détails">
    <button type="button" class="btn btn-xs btn-success" title="Voir détails">
        <i class="fas fa-eye"></i>
    </button>
</a>
                                    <a type="button" class="btn btn-xs btn-warning mr-1"  title="Modifier"
                                        data-toggle="modal" data-target="#editRoleModal" data-role-id="{{ $role->id }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a type="button" class="btn btn-xs btn-danger" title="Supprimer" data-toggle="modal"
                                        data-target="#deleteModal-{{ $role->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                  </a>  
                                </div>
                                
                                   
                            </td>
                        </tr>
                        <!-- Modal de confirmation de suppression -->
@foreach ($roles as $role)
<div class="modal fade" id="deleteModal-{{ $role->id }}" tabindex="-1" role="dialog"
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
                Êtes-vous sûr de vouloir supprimer ce role?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <form id="deleteForm" action="{{ route('roles.destroy', $role->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

                        <!-- Modal pour afficher les permissions -->
                        <div class="modal fade" id="permissionsModal{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="permissionsModalLabel{{ $role->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="permissionsModalLabel{{ $role->id }}">Les permissions du role {{ $role->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <ul>
                                                    @foreach($role->permissions as $permission)
                                                    <li>{{ $permission->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de modification de rôle -->
    <div class="modal fade" id="editRoleModal" tabindex="-1" role="dialog" aria-labelledby="editRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRoleModalLabel">Modifier le rôle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulaire d'édition du rôle -->
                    <form id="editRoleForm" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Champ pour le nom du rôle -->
                        <div class="form-group">
                            <label for="editRoleName">Nom du rôle</label>
                            <input type="text" name="name" id="editRoleName" class="form-control" placeholder="Nom du rôle">
                        </div>
                        <!-- Permissions -->
                        <div class="form-group">
                            <label for="editRolePermissions">Permissions</label>
                            <!-- Liste des permissions à sélectionner -->
                            <ul>
                            @foreach($permission as $value)
                                        
                                        @endforeach
                            </ul>
                        </div>
                        <!-- Boutons d'action -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    @endsection
