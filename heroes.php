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
            

            <!--tarjetas sql --> 
            <div class="row">
            <?php 
            $sql   = "SELECT * from heroe";
            $query = sqlsrv_query($con,$sql);

            $sql2 = "SELECT * FROM stats_h";
            $query2 = sqlsrv_query($con,$sql2);

            while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC) and $result2 = $fila = sqlsrv_fetch_array($query2) ){
                $nombre = $result['nombre'];
                $tipo = $result['tipo_heroe'];

                //stats
                $dps = $fila['dps'];
                $arm = $fila['armadura'];
                $daño_base = $fila['daño_base'];
                $resistencia = $fila['resistencia'];
            ?>
                
                <div class="card col-3" style="width: 18rem;">
                <?php
                echo '<img class="card-img-top" alt="Card image cap" src="data:image/jpg;base64,' . base64_encode($result['foto'])  . '" >';
                ?>
                            <div class="card-body">
                            <h5 class="card-title"><?php echo $nombre; ?></h5>
                            <small class="card-text"><strong>Disparo por Segundo:</strong> <?php echo $dps; ?></small></br>
                            <small class="card-text"><strong>Armadura:</strong> <?php echo $arm; ?> </small></br>
                            <small class="cart-text"><strong>Daño Base:</strong> <?php echo $daño_base; ?></small></br>
                            <small class="cart-text"><strong>Resistencia:</strong> <?php echo $resistencia; ?></small>
                    
                            </div>
                </div> 
                               
             <?php } ?>
            </div> <!--end onf col -->
            </div> <!-- row -->
    
        </main>
 
</body>
</html>