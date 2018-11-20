<?php
	$serverName = "localhost\\SQLEXPRESS";
	$connectionInfo = array("Database"=>"dashboard", "UID"=>"sa", "PWD"=>"", "CharacterSet"=>"UTF-8");
	$con = sqlsrv_connect($serverName, $connectionInfo);

	if($con){
		//echo "<script>alert(`conexión exitosa`)</script>";
	}else{
		//echo "fallo en la conexión";
	}

?>