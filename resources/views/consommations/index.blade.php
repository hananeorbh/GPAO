
@extends('adminlte::page')

@section('content')
<div class="content-wrapper" style="margin-left: 30px;">
    <br>
    <br>

    <div class="card">
        <div class="card-header d-flex align-items-center">
            <i class="fas fa-list mr-2"></i>
            <h3 class="card-title">Consommations_IP</h3>
            <!-- /.card-tools -->
        </div>
        @section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
<div class="card-body">
@php
                    $heads = [

        
                    'CODE',
                    'Code de la production',
                    'Nom de l\'article',
                    'Quantité',
                    'Unité',
                    'Action',
                ];
                @endphp
                    <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable with-buttons>
              @foreach($consommations_ip as $consommation_ip)
              <tr>
                  <td>{{ $consommation_ip->code }}</td>
                  <td>{{ $consommation_ip->production->code }}</td>
                  <td>
                      {{ optional($consommation_ip->article)->name }}
                  </td>
                  <td>{{ $consommation_ip->quantité }}</td>
                  <td>{{ $consommation_ip->unité }}</td>

                  <td>
                      <form action="{{ route('consommations.destroy', $consommation_ip->id) }}" method="POST">
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

</div>

@endsection
