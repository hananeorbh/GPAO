<div class="container">
    <div class="content-wrapper" style="margin-left: 0px;">
        <div class="row justify-content-center">
        <div class="col-lg-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title font-weight-bold">Gestion des Catalogues</h1>
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
        @include('livewire.catalogs.update')
    @else
        @include('livewire.catalogs.create')
    @endif


    <table class="table table-bordered table-condensed">
        <tr>
        <td style="width: 13%;">CODE</td> 
            <td>Famille</td>
            <td>Sous Famille</td>
            <td>Classe</td>
            <td>Impact</td>
            <td>Action</td>
        </tr>

        @foreach($data as $row)
        <tr>
                    <td>{{ $row->code }}</td>
                    <td>{{ $row->famille }}</td>
                    <td>{{ $row->sfamille }}</td>
                    <td>{{ $row->class }}</td>
                    <td>{{ $row->impact }}</td>
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