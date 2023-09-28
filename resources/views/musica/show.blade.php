@extends('app')
@section('content')
<div class="container">
    <form action="{{ route('musica.update', ['musica'=>$musica->id]) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label class="form-label" for="name">Nombre</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="Nombre" value="{{ $musica->name }}">
        </div>
        
    
        <div class="mb-3">
            <label class="form-label" for="pista">Pista</label>
            <input class="form-control" type="file" name="pista" id="pista" placeholder="Pista" value="{{ $musica->pista }}">
        </div>

        <button class="btn btn-success" type="submit">Guardar</button>
        
    </form>
</div>


@endsection