<?php
    include("conexion.php");
    if(isset($_POST['enviar'])){
        $pass = $_POST['pass'];
        $nombre = $_POST['nombre'];

        $insertar = "SELECT id,nombre FROM gamemaster where id='$pass' and nombre='$nombre'";

        $ejecutar = sqlsrv_query($con, $insertar);

        $fila = sqlsrv_fetch_array($ejecutar);
        $x = $fila['id'];
        $y = $fila['nombre'];

        if($x == $pass && $y == $nombre){
            echo "<script>alert(`welcome`)</script>";
            header('location:dashboard.php');
        }
        else{
            echo "<script>alert(`Usuario o contraseña incorrecto`)</script>";
            // header('location: index.php');
            echo "<script> window.location=`index.php`</script>`";
        }
    }
?>
