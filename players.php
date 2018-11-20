<!DOCTYPE html>
<?php
    include("conexion.php");
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="main.js"></script>
    <link rel="stylesheet" href="/css/bootstrap.css"></link>
    <link rel="stylesheet" href="estilo.css">
    <script src="jmain.js"></script>
</head>
<body>
        <main class="container">
            <div class="row">
                <div class="col-12 ">
                    <nav class="navbar navbar-expand-lg">
                        <ul class="navbar-nav ">
                            <li class="nav-item active">
                                <a class="nav-link active" href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="heroes.php">Heroes</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="productos.php">Productos</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="players.php">Jugadores</a>
                            </li>
                        </ul>
                        
                </div> 
                <div class="col"></br></div>
            </div>
            
            
            <!-- row para el form  -->
       

            <!--funcion para insertar los datos -->

            <?php
                if(isset($_POST['insert'])){
        
                    $nombre= $_POST['nombre'];
                    $clasificacion = $_POST['clas'];
                    $precio = $_POST['precio'];
        
                    $insertar = "INSERT INTO  producto (nombre,clasificacion,precio) VALUES ('$nombre','$clasificacion','$precio')";
        
                    $ejecutar = sqlsrv_query($con, $insertar);
        
                    if($ejecutar){
                        echo "<script>alert(`Ingresado Correctamente`)</script>";
                    }
                    else{
                        echo "<script>alert(`Error`)</script>";
                    }
        
                }
            ?>  


            </br></br>

             <div class="row">
                <div class="col">
                    <table class="table table-sm">
                        <thead class="table-dark"  align="center">
                            <th>ID Jugador</th>
                            <th>Nombre</th>
                            <th>Clasificacón</th>
                            <th>ID Status</th>
                        </thead>
            
            <?php
                	$consulta = "SELECT * FROM player";

                    $ejecutar = sqlsrv_query($con, $consulta);
        
                    $i = 0;
        
                    while($fila = sqlsrv_fetch_array($ejecutar)){
                        $id = $fila['id_player'];
                        $nombre = $fila['nombre'];
                        $clasificacion = $fila['mmr'];
                        $precio = $fila['id_status'];
                        $i++;
            ?>
            


            <!--tarjetas sql --> 
                        <tr align="center">
                        <th><?php echo $id;?> </th>
                        <th><?php echo $nombre;?> </th>
                        <th><?php echo $clasificacion;?> </th>
                        <th><?php echo $precio;?></th>
                        </tr>
            <?php } ?>
                    </table>
                </div> <!--end onf col -->
            </div> <!-- row -->
           
        </main>
 
</body>
</html>