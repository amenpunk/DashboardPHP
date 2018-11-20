<!DOCTYPE html>
<?php
    include('conexion.php');
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/bootstrap.css"></link>
    <link rel="stylesheet" href="estilo.css">

    <script src="ChartEx/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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

            <div class="row">
                <div class="col-6">
                    <!--esto es la grfica -->
                    <?php
    
                $tiempos = '';
                $experiencias = '';
                $oros ="";
                $acciones ="";
                //obtener lista
                $consulta = "SELECT minuto, avg(epm) as m_epm, avg(opm) as m_opm, AVG(apm) m_apm  from desc_partida group by minuto ";
                $sql = sqlsrv_query($con, $consulta);
                //my
            
                while($row = sqlsrv_fetch_array($sql)){
                $minuto	= $row['minuto'];
                            $epm = $row['m_epm'];
                            $opm = $row['m_opm'];
                            $apm = $row['m_apm'];
                    
                    $tiempos = $tiempos.$minuto.',';
                            $experiencias = $experiencias.$epm.',';
                            $oros = $oros.$opm.',';
                            $acciones = $acciones.$apm.',';
                }
                $tiempos = trim($tiempos,",");
                        $experiencias = trim($experiencias,",");
                        $oros = trim($oros,",");
                        $acciones = trim($acciones,",");
                                ?>
                <p class="h4">Media Estadisticas de los jugador</p>
            </br>  
            <canvas id="Chart" ></canvas>
  
  <script>
    // chart DOM Element
    var ctx = document.getElementById("Chart");
    var data = {
      datasets: [
        
      {
        data: [<?php echo $oros; ?>],
        backgroundColor: 'transparent',
        //backgroundColor: 'rgba(69, 92, 115, 0.5)',
       // backgroundColor: 'rgba(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ', 0.4)',
        //backgroundColor: "#455C73",
        borderColor: "teal",
        borderWidth: 5,
        label: 'OPM' // for legend
      },

      {
        data: [<?php echo $acciones; ?>],
        backgroundColor: 'transparent',
        //backgroundColor: 'rgba(69, 92, 115, 0.5)',
       // backgroundColor: 'rgba(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ', 0.4)',
        //backgroundColor: "#455C73",
        borderColor: "#333",
        borderWidth: 5,
        label: 'APM' // for legend
      },

   
      
      {
        data: [<?php echo $experiencias; ?>],
        backgroundColor: 'transparent',
        borderColor: "yellow",
        borderWidth: 5,
        // Changes this dataset to become a line
        //type: 'line',
        label: 'EPM' // for legend
      }
      
      
      ],

      //ESTOOOOOOOOOOOOOOOOOOOOOOOOOOOOO ES EL EJE X
      labels: [
        <?php echo $tiempos; ?>
      ]

    };

    var xChart = new Chart(ctx, {
       // The type of chart we want to create
      type: 'line',
       // The data for our dataset
      data: data,
       // Configuration options go here
      options: {
           legend: {
              display: true,
              position: 'left',
              labels: {
                  fontColor: 'black'
                  //fontColor: 'rgb(255, 99, 132)'
              }
            },
            tooltips: {
                mode: 'y'
            },
          scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }],
              xAxes: [{
                ticks: {
                  autoskip: true,
                  maxTicksLimit:6
                }
              }]
            }
          }
        });
</script>
</div>
               <!-- END 6 ROW  -->
               <div class="col-6">
                   <p class="h4">Top 5 MMR Players</p>
                    </br>
                <table class="table table-sm" >
                    <thead class="thead-dark" align="center">
                        <th>#</th>
                        <th>Nombre</th>
                        <th>MMR</th>
                        <th>Clasificación</th>
                    </thead>

		<?php
			$consulta = "SELECT top(5) nombre,mmr from player order by mmr desc";

			$ejecutar = sqlsrv_query($con, $consulta);

			$i = 0;

			while($fila = sqlsrv_fetch_array($ejecutar)){
				$codigo = $fila['nombre'];
				$nombre = $fila['mmr'];
				$i++;
		?>
        <tr align="center">
            <td><?php echo $i; ?></td>
            <td><?php echo $codigo; ?></td>
            <td><?php echo $nombre; ?></td>
            <td><img src="medal.png"><td>
		</tr>   
        <?php } ?>
        </table>

        
        </div> 
        </div>
            </br> </br>
            <?php
                $consulta = "SELECT * from dbo.mas_vendido('1-nov-2018')";
                $ejecutar = sqlsrv_query($con, $consulta);
                while($new = sqlsrv_fetch_array($ejecutar)){
                    $max = $new['Maximo'];                   
                
                }
            ?>

            <?php
                $consulta = "SELECT * from dbo.menos_vendido('1-nov-2018')";
                $ejecutar = sqlsrv_query($con, $consulta);
                while($new = sqlsrv_fetch_array($ejecutar)){
                    $min = $new['Minimo'];                   
                
                }
            ?>


            <!-- contador de ventas -->
           <?php
                 $consulta = "SELECT dbo.contador(1)";
                 $ejecutar = sqlsrv_query($con, $consulta);
                 while($new = sqlsrv_fetch_array($ejecutar)){
                     $plus = $new[''];                   
                 
                 }
           ?>


            <div class="row">
                <div class="col-6">
                    <div class="row">
                        
                        <div class="col "><p class="derecha"><strong>Record producto mas vendidos al inicio del mes: </strong><?php echo $max?></p></div>
                        <div class="col"><p class="izquierda"><strong>Record producto menos vendidos al inicio del mes: </strong><?php echo $min?></p></div>
                    </div>
            </div>
                <div class="col-6">
                    <small class="h5">Usuarios Actualmente Activos:</small>
                    </br>
                    <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $plus?>%"><?php echo $plus?>%</div>
                    </div>
                </div>
            </div>  
            
            <?php
                
                $consulta = "SELECT ROUND(cast((select count(*) from partida where resultado='Victoria') as float)/  cast((select count(*) from partida) as float),2)*100 as victoria";
                $ejecutar = sqlsrv_query($con, $consulta);
                while($new = sqlsrv_fetch_array($ejecutar)){
                    $vic = $new['victoria'];                   
                
                }
            ?>

            <?php
                
                $consulta = "SELECT ROUND(cast((select count(*) from partida where resultado='Derrota') as float)/  cast((select count(*) from partida) as float),2)*100 as derrota";
                $ejecutar = sqlsrv_query($con, $consulta);
                while($new = sqlsrv_fetch_array($ejecutar)){
                    $derr = $new['derrota'];                   
                
                }
            ?>



            <div class="row">
            <div class="col-6">
                </br>
            <p class="h3">Tasa de victorias</p> 
            </br>
            <canvas id="oilChart"></canvas>
                    <script>
                        var oilCanvas = document.getElementById("oilChart");

                            Chart.defaults.global.defaultFontFamily = "Lato";
                            Chart.defaults.global.defaultFontSize = 18;

                            var oilData = {
                                labels: [
                                    "Victoria",
                                    "Derrota",
                               
                                    
                                ],
                                datasets: [
                                    {
                                        data: [<?php echo $vic;?>, <?php echo $derr;?>],
                                        backgroundColor: [
                                            "teal",
                                            "#333",
                                        
                                            
                                        ]
                                    }]
                            };

                            var pieChart = new Chart(oilCanvas, {
                            type: 'doughnut',
                            // type: 'piet',
                            data: oilData
                            });
                    </script>
            </div>
                            
            <?php
                $nums = '';
                $meses = '';
                $cols ='';

                $consulta = "SELECT COUNT(*) num , nmes = case
                when datepart(MM,fecha_partida) = 1 then 'Enero'
                when datepart(MM,fecha_partida) = 2 then 'Febrero'
                when datepart(MM,fecha_partida) = 3 then 'Marzo'
                when datepart(MM,fecha_partida) = 4 then 'Abril'
                when datepart(MM,fecha_partida) = 5 then 'Mayo'
                when datepart(MM,fecha_partida) = 6 then 'Junio'
                when datepart(MM,fecha_partida) = 7 then 'Julio'
                when datepart(MM,fecha_partida) = 8 then 'Agosto'
                when datepart(MM,fecha_partida) = 9 then 'Septiembre'
                when datepart(MM,fecha_partida) = 10 then 'Octubre'
                when datepart(MM,fecha_partida) = 11 then 'Noviembre'
                when datepart(MM,fecha_partida) = 12 then 'Diciembre'
                else null end
                from partida group by DATEPART(MM,fecha_partida)";
                $sql = sqlsrv_query($con, $consulta);


                while($row = sqlsrv_fetch_array($sql)){
                    $num	= $row['num'];
                    $nmes = $row['nmes'];
                

                    $nums = $nums.$num.',';
                    $meses = $meses.'"'.$nmes.'",'; 
                      

                }
                    $nums = trim($nums,",");
                    $meses = trim($meses,",");      
                  
                ?>         
      
            <div class="col-6">
            </br>
                <p class="h3">Concurrencia Jugadores</p>
                        </br></br>
                    
                <canvas id="bar-chart"></canvas>
                <script>
                    new Chart(document.getElementById("bar-chart"), {
                        type: 'bar',
                        data: {
                        labels: [<?php echo $meses; ?>],
                        datasets: [
                            {
                            label: "Mayor número de partidas jugadas",
                            backgroundColor: ["#333","yellow","#3cba9f","Salmon","teal","#333","yellow","#3cba9f","Salmon","Teal","#333","Yellow"],
                            data: [<?php echo $nums; ?>]
                            
                            }
                        ]
                        },
                        options: {
    legend: {
      display: true
    },
    scales: {
      xAxes: [{
        display: true,
        ticks: {
          min: 0
        }
      }],
      yAxes: [{
        ticks: {
					beginAtZero: true
				  },
        
        display: true
      }],
    }
  }
                        });
                </script>
                
            </div>
        </div> 
            
        </main>
        
    </body>