<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Proyecto indigenas</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  <script src="{{asset("assets/js/jquery.validate.js") }}"></script>

  <!-- Favicons -->
  <link href="{{ asset("assets/img/favicon.png") }}" rel="icon">
  <link href="{{ asset("assets/img/apple-touch-icon.png") }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="{{ asset("assets/vendor/fontawesome-free/css/all.min.css") }}" rel="stylesheet" type="text/css">

  <!-- Vendor CSS Files -->
  <link href="{{ asset("assets/vendor/aos/aos.css") }}" rel="stylesheet">
  <link href="{{ asset("assets/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
  <link href="{{ asset("assets/vendor/bootstrap-icons/bootstrap-icons.css") }}" rel="stylesheet">
  <link href="{{ asset("assets/vendor/boxicons/css/boxicons.min.css") }}" rel="stylesheet">
  <link href="{{ asset("assets/vendor/glightbox/css/glightbox.min.css") }}" rel="stylesheet">
  <link href="{{ asset("assets/vendor/remixicon/remixicon.css") }}" rel="stylesheet">
  <link href="{{ asset("assets/vendor/swiper/swiper-bundle.min.css") }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset("assets/css/style.css") }}" rel="stylesheet">
  <link href="{{ asset("assets/css/sb-admin-2.css") }}" rel="stylesheet">


  <!-- =======================================================
  * Template Name: Arsha - v4.6.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    
<!--Incluir header.blade.php -->
@include('header')

<section id="hero2" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-2 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          
        </div>
        
      </div>
    </div>

  </section><!-- End Hero -->

<main id="main">
    
    <!-- ======= Custom Section ======= -->
    <section id="personalize" class="cliens section-bg">
        
        <div class="container">
        
            @yield('content')
   
        </div>

    </section>

</main><!-- End #main -->


<!-- Incluir footer.blade.php -->
 @include('footer')


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>


<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset("assets/vendor/aos/aos.js") }}"></script>
<script src="{{asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{asset("assets/vendor/glightbox/js/glightbox.min.js") }}"></script>
<script src="{{asset("assets/vendor/isotope-layout/isotope.pkgd.min.js") }}"></script>
<script src="{{asset("assets/vendor/php-email-form/validate.js") }}"></script>
<script src="{{asset("assets/vendor/swiper/swiper-bundle.min.js") }}"></script>
<script src="{{asset("assets/vendor/waypoints/noframework.waypoints.js") }}"></script>

<!-- Template Main JS File -->
<script src="{{asset("assets/js/main.js") }}"></script>

<script src="{{asset("assets/js/js.cookie.js") }}"></script>


<script>
  jQuery(document).ready(function () {
                
                let token = Cookies.get('JWT');
        
                $.ajax({
                  url: '{{ route('auth.user') }}',
                  type:"POST",
                  data:{
                    token:token
                  },
                  success:function(response){
                    let user = response.user;

                  console.log(user);
                    
                    if(user.fk_id_rol == 2){
                      $("#userName_admin").empty();
                      $("#userName_admin").append(user.nombre);
                      $("#header_admin").hide();
                    }
                    if(user.fk_id_rol == 1){
                      $("#userName_usuario").empty();
                      $("#userName_usuario").append(user.nombre);
                      $("#header_usuario").hide();
                    }
                  },
                  error: function(xhr, status, error){
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    alert('Error - ' + errorMessage);
                }
                });
  });

                            
</script>

</body>

</html>