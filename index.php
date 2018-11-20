<!DOCTYPE html>
<html>
<?php
    include("conexion.php");
?>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css"></link>
    <link rel="stylesheet" href="/css/bootstrap.css"></link>
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="main.js"></script>
    <script src="js/jquery.js"></script>
    <script src="jmain.js"></script>
</head>
<body> 

    <div class="pad">

    <form action="login.php" method="POST">
                <div class="form-group">
                    <label class="card-title" for="exampleInputEmail1">Nombre de Usuario</label>
                    <input type="text" class="form-control"aria-describedby="emailHelp" placeholder="Ingrese su nombre" name="nombre">
                   
                </div>
                <div class="form-group">
                    <label class="card-title" for="exampleInputPassword1">Numero de identificación</label>
                    <input type="password" class="form-control" placeholder="Ingrese su contraseña" name="pass">
                </div>
                <div class="form-check">

                </div>
                <button type="submit" class="btn btn-danger" name="enviar">Ingresar</button>
    </form>
    </div>    

    


</body>
</html>