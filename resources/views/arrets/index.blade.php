
@extends('adminlte::page')

@section('content')
<div class="content-wrapper" style="margin-left: 30px;">
    <br>
    <br>

    <div class="card">
        <div class="card-header d-flex align-items-center">
            <i class="fas fa-list mr-2"></i>
            <h3 class="card-title">Liste des arrêts</h3>
            <!-- /.card-tools -->
        </div>
        @section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
        <div class="card-body">
        
        
                @php
                    $heads = [
                    'Code',
                    'Code de la production',
                    'Masqué',
                    'Durée',
                    'Famille',
                    'Sous-Famille',
                  
                    'Action',
                ];
                    @endphp
                    <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable with-buttons>
                @foreach ($arrets as $arret)
                <tr>
                    <td>{{ $arret->code }}</td>
                    <td>{{ $arret->production->code}}</td>
                    <td>{{ $arret->masqué ? 'Oui' : 'Non' }}</td>
                    <td>{{ $arret->duration }}</td>
                    <td>{{ $arret->famille }}</td>
                    <td>{{ $arret->sfamille }}</td>
                    
                    <td>
    <form action="{{ route('arrets.destroy', $arret->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow">
           <i class="fas fa-trash"></i>
        </button>
    </form>
</td>
                </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
    {{ $arrets->links('pagination::bootstrap-5') }}
</div>

@endsection
