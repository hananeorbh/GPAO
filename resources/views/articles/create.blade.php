
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
                    <h3 class="card-title">Créer un article</h3>
                </div>

                <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        
                        <!-- Champs Article et Type dans la même ligne -->
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="name">Article</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="col-md-6">
                                <label>Type d'article</label>
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="type_ip" name="type[]" value="IP">
                                    <label class="form-check-label" for="type_ip">IP</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="type_pf" name="type[]" value="PF">
                                    <label class="form-check-label" for="type_pf">PF</label>
                                </div>
                            </div>
                        </div>

                        
                           
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Créer un article</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


