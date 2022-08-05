<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <center>
        <h1>
            INDIGENAS
        </h1>
    </center>
    <div class="container">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Nacimiento</th>
                            <th>Direccion</th> 
                            <th>Correo</th> 
                            <th>Telefono</th> 
                            <th>Comunidad</th> 
                   
                        </tr>
                    </thead>
                    
                    <tbody>

                        @foreach($indigenas as $indigena )
                        <tr>
                            
                            <td>{{ $indigena["documento"]}} </td>
                            <td>{{ $indigena["nombre"]}} </td>
                            <td>{{ $indigena["nacimiento"]}} </td>
                            <td>{{ $indigena["direccion"]}} </td>
                            <td>{{ $indigena["correo"]}} </td>
                            <td>{{ $indigena["telefono"]}} </td>
                            <td>{{ $indigena["fk_id_comunidad"]}} </td>
                            
                            
                        </tr>
                       
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>