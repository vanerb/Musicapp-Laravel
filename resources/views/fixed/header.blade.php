<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Vanerb</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @auth
        <li class="nav-item">
          <a class="nav-link" href="{{ route('allmusic') }}">Música</a>
        </li>
        
        @endauth
        
       
        
      </ul>
      

      
      <ul class="navbar-nav float-end">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('musica.index') }}">Administración</a>
        </li>
        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
        </li>

        
        

       


        @else
                @if (auth()->user()->type === 'admin')
        <li class="nav-item">
          <a class="nav-link" href="#">Administración</a>
        </li>
        @endif


        @endguest

        @auth
        <form action="{{ route('logout') }}" method="POST">

          @csrf
          <button class="btn btn-primary">Cerrar sesión</button>
                      
        </form>
        @endauth


        
      </ul>
      
    </div>
  </div>
</nav>