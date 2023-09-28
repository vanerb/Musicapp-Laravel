@extends('app')

@section('content')
    
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Canciones</h1>
        </div>
    </div>
    <div class="row mt-4">
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
                        
                    </div>
                </div>
            </div>
        @endforeach
       
    </div>
</div>

@endsection