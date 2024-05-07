@extends('adminlte::page')

@section('content')

<div class="content-wrapper" style="margin-left: 180px;">
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
                    <h3 class="card-title">Créer un nouveau rôle</h3>
                </div>

<form method="POST" action="{{ route('roles.store') }}">
    @csrf

    <div class="row">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        <div class="col-xs-7 col-sm-7 col-md-7">
                            <div class="form-group">
                                <p>Nom :</p>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- col -->
                        <div class="col-lg-4">
                           
                                <li><a >Lui assigner les permissions :</a>
                                    <ul>
                                        @foreach($permission as $value)
                                        <li>
                                            <label style="font-size: 16px;"><input type="checkbox" name="permission[]" class="name" value="{{ $value->id }}">
                                                {{ $value->name }}</label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                            
                        </div>
                        
                    </div>
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

</form>

</div>

@endsection

