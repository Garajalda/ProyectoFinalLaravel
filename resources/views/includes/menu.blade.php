<div>
  
<nav class="nav flex-column">
  @if (auth()->check())
        <a class="nav-link" href="/home">Principal</a>
        @if(!auth()->user()->is_client)
        <!--<a class="nav-link" href="/ver">Ver incidencias</a>-->
        @endif

        <a class="nav-link" href="/reportar">Reportar incidencias</a>

        @if (auth()->user()->is_admin)
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Configuración</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/usuarios">Usuarios</a></li>
          <li><a class="dropdown-item" href="/proyectos">Proyectos</a></li>
          
        </ul>
        </li>
        @endif
      
  @else
        <a class="nav-link" href="/">Bienvenido</a>
        <a class="nav-link" href="/instrucciones">Instrucciones</a>
        <a class="nav-link" href="/creditos">Créditos</a>

  @endif
  
</nav>

</div>
