
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           
            <div class="card">
            <div class="card-header">
    <h1 class="card-title font-weight-bold">Gestion des Ateliers</h1>
</div>

                <div class="card-body">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Sorry!</strong> invalid input.<br><br>
            <ul style="list-style-type:none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if($updateMode)
        @include('livewire.ateliers.update')
    @else
        @include('livewire.ateliers.create')
    @endif


    <table class="table table-bordered table-condensed">
        <tr>
            <td>CODE</td>
            <td>Nom</td>
            <td>ACTION</td>
        </tr>

        @foreach($data as $row)
        <tr>
                    <td>{{ $row->code }}</td>
                    <td>{{ $row->name }}</td>
                    <td style="width: 100px;">
                       
                    <button wire:click="edit({{$row->id}})" class="btn btn-xs btn-warning">
    <i class="fas fa-pencil-alt"></i> 
</button>

<button wire:click="destroy({{$row->id}})" class="btn btn-xs btn-danger">
    <i class="fas fa-trash-alt"></i> 
</button>
                    </td>
                </tr>
        @endforeach
    </table>

</div> 