  <!-- ======= Header ======= -->
 <header id="header_admin" class="fixed-top header-scroled">
    <div id="menu_navegacion" class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{ route('inicio') }}">ProInd</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      <label id="userName_admin">Bienvenido</label>
      <nav id="navbar_admin" class="navbar">
        <ul>
         
          <!-- ADMINISTRADOR-->
          <li><a class="nav-link scrollto active" href="/" id="comunidad">Comunidades</a></li>
          <li class="dropdown"><a href="#"><span>Administrador</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/" id="foro_crear">Foros</a></li>
              <li><a href="/" id="usuario">Usuarios</a></li>
            </ul>
          </li>
     
          <form class="user" id="logoutForma">
              <button type="submit" id="submit" class="btn btn-primary btn-user btn-block">
              Cerrar Sesion
          </form>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <header id="header_usuario" class="fixed-top header-scroled">
    <div id="menu_navegacion" class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{ route('inicio') }}">ProInd</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      <label id="userName_usuario">Bienvenido</label>
     
      <nav id="navbar_user" class="navbar">
        <ul>
        <!-- USUARIO-->
          <li><a class="nav-link scrollto active" href="/" id="foro">Foros</a></li>
          <li class="dropdown"><a id="menu_usuario" href="#"><span>Usuario</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ route('comunidad.index') }}" id="comunidad">Comunidades</a></li>
              <li><a href="/" id="indigena">Indigenas</a></li>
            </ul>
          </li>
     
          <form class="user" id="logoutFormu">
              <button type="submit" id="submit" class="btn btn-primary btn-user btn-block">
              Cerrar Sesion
          </form>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  
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
      
      $('#logoutForma').on('submit',function(event){
                event.preventDefault();
                let token = Cookies.get('JWT');
                
                $.ajax({
                  url: '{{ route('logout') }}',
                  type:"POST",
                  data:{token:token
                  },
                  success:function(response){ 
                    console.log(response);
                    Cookies.remove('JWT');
                    route_list = '{{ route('auth.view') }}';
  
                    window.location.href = route_list;
                  },
                  error: function(xhr, status, error){
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    alert('Error - ' + errorMessage);
                }
                });
            });
            $('#logoutFormu').on('submit',function(event){
                event.preventDefault();
                let token = Cookies.get('JWT');
                
                $.ajax({
                  url: '{{ route('logout') }}',
                  type:"POST",
                  data:{token:token
                  },
                  success:function(response){
                    console.log(response);
                    Cookies.remove('JWT');
                    route_list = '{{ route('auth.view') }}';

                    window.location.href = route_list;
                  },
                  error: function(xhr, status, error){
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    alert('Error - ' + errorMessage);
                }
                });
            });
    
  });

 
</script>

