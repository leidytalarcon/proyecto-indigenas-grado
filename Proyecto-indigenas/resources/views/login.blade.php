
@extends('layout_external.layout_external')
@section('content')
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                @if($errors->any())
                <div class="alert alert-warning" role="alert">
                  @foreach ($errors->all() as $error)
                      <div>{{ $error }}</div>
                  @endforeach
                </div>
                @endif
                <br> 
                
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                                    </div>
                                    <form class="user" id="loginForm">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="email"  name="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                min="6" max="20"
                                                id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Recordarme</label>
                                            </div>
                                        </div>
                                        <a href="/" class="btn btn-primary btn-user btn-block" id="loginSubmit">
                                            Iniciar
                                        </a>
                                        
                                        <hr>
                                        
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

   
    @endsection
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {//clasesin
    
            $('#loginSubmit').click(function(e) {
                event.preventDefault();
        
                let email = $('#email').val();
                let password = $('#password').val();
        
                $.ajax({
                  url: '{{ route('auth.login') }}',
                  type:"POST",
                  data:{
                    email:email,
                    password:password
                  },
                  success:function(response){
                    console.log(response);
                    Cookies.set('JWT', response.token);
                    route_list = '{{ route('inicio') }}';
 
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