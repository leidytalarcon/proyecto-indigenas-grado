<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PROYECTO INDIGENAS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="/login">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Inicio</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Busqueda
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-write"></i>
            <span>Comunidades</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Ver Comunidades</h6>
                <a class="collapse-item" id="comunidad" href="/">Comunidades</a>  
                         
            </div>
        </div>
    </li>


    <hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
Usuarios
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
aria-expanded="true" aria-controls="collapsePages1">
<i class="fas fa-fw fa-folder"></i>
<span>Administrador</span>
</a>
<div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
    <h6 class="collapse-header">FOROS:</h6>
    <a class="collapse-item" href="{{ route('foro.nuevo') }}"> Registro Foro</a>
    <a class="collapse-item" id="foro" href="/">Listar Foros</a>
    <h6 class="collapse-header">USUARIOS:</h6>
    <a class="collapse-item" href="{{ route('usuario.nuevo') }}">Registro Usuario</a>
    <a class="collapse-item" id="usuario" href="/">Ver Usuarios</a>
    <div class="collapse-divider"></div>                           
</div>
</div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
    aria-expanded="true" aria-controls="collapsePages2">
    <i class="fas fa-fw fa-folder"></i>
    <span>Usuarios</span>
    </a>
    <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">COMUNIDADES:</h6>
        <a class="collapse-item" href="{{ route('comunidad.nuevo') }}"> Registro Comunidad</a>
        <a class="collapse-item" href="{{ route('comunidad.index') }}"> Listar Comunidades</a>
        <h6 class="collapse-header">INDIGENAS:</h6>
        <a class="collapse-item" href="{{ route('indigena.nuevo') }}">Registro Indigena</a>
        <a class="collapse-item" id="indigena" href="/">Listar Indigenas</a>
        <div class="collapse-divider"></div>                           
    </div>
    </div>
    </li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages4"
aria-expanded="true" aria-controls="collapsePages4">
<i class="fas fa-fw fa-folder"></i>
<span>Usuario</span>
</a>
<div id="collapsePages4" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
    <h6 class="collapse-header">Ventanas:</h6>
    <a class="collapse-item" id="foro" href="/"> Participar foro</a>
   
    <div class="collapse-divider"></div>                          
</div>
</div>
</li>
<!-- fin columna-->


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
<button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


</ul>
<!-- End of Sidebar -->

<script type="text/javascript">
    jQuery(document).ready(function () {//clasesin
        
        $('#comunidad').click(function(e) {
            e.preventDefault();
            route_list = '{{ route('comunidad.index') }}';

            window.location.href = route_list;
        });

        $('#indigena').click(function(e) {
            e.preventDefault();
            route_list = '{{ route('indigena.index') }}';

            window.location.href = route_list;
        });
        $('#usuario').click(function(e) {
            e.preventDefault();
            route_list = '{{ route('usuario.index') }}';
            window.location.href = route_list;
        });
        $('#foro').click(function(e) {
            e.preventDefault();
            route_list = '{{ route('foro.index') }}';
            window.location.href = route_list;
        });
        $('#foro_crear').click(function(e) {
            e.preventDefault();
            route_list = '{{ route('foro.index') }}';
            window.location.href = route_list;
        });
    });

   
</script>
