@extends('app')

@section('content')
    
<div class="container">

    <div class="row">
        <div class="col-md-12">
            @auth
            <button type="button" class="btn btn-success float-end mt-4" data-bs-toggle="modal" data-bs-target="#addmusica">
                Añadir
              </button>
            @endauth
            
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
<!-- Modal -->
<div class="modal fade" id="addmusica" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir musica</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('musica.store') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
          
            <div class="mb-3">
                <label class="form-label" for="name">Nombre</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Nombre">
            </div>
            

            <div class="mb-3">
                <label class="form-label" for="pista">Pista</label>
                <input class="form-control" type="file" name="pista" id="pista" placeholder="Pista">
            </div>
            
          
        </div>
        <div class="modal-footer">
            
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
        </div>
    </div>


    <div class="row mt-2">
        @foreach ($musicas as $musica)
            <div class="col-md-4">
                <div class="card p-4">
                    <div class="card-title">
                        <h1 class="text-center">{{ $musica->name }}</h1>
                    </div>
                    <div class="card-body text-center  embed-responsive embed-responsive-4by3">
                        <audio controls class="embed-responsive-item">
                            <source src="{{ asset('storage/' . $musica->pista)}}" type="audio/mpeg">
                          </audio>
                    </div>
                    @auth
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <a class="float-end" href="{{ route('musica.show', ['musica'=>$musica->id])}}"><button class="btn btn-primary">Editar</button></a>
                            </div>
                            <div class="col-md-6">
                                <form action="{{ route('musica.destroy', ['musica'=>$musica->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    @endauth
                    
                        
                       
                        
                    </div>
                </div>
            </div>
        @endforeach
       
    </div>
</div>

@endsection