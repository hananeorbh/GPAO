@extends('adminlte::page')

@section('content')
<div class="content-wrapper" style="margin-left: 50px;">
    <br>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Modifier l'utilisateur</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Champ Nom d'utilisateur -->
                <div class="form-group">
                    <label for="name">Nom d'utilisateur</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
                </div>

                <!-- Champ Adresse e-mail -->
                <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
                </div>

                <!-- Champ Mot de passe -->
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>

                <!-- Champ Rôle -->
                <div class="form-group">
                    <label for="role_id">Rôle</label>
                    <select name="role_id" id="role_id" class="form-control">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Bouton de soumission -->
                <button type="submit" class="btn btn-dark">Enregistrer les modifications</button>
            </form>
        </div>
    </div>
</div>
@endsection
