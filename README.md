# simple dashboard maked in php mssql and chartjs

![description](cut.png)

## make a canvas object on html
``` html
<canvas id="Chart" ></canvas>
```

## get the data from mssql with php

``` php
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
```
