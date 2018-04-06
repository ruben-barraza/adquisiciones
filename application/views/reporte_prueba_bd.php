<?php

//var_dump($provs);

//var_dump($prov_split);

//echo count($prov_split[0]);


/*
$arr_th = array();

foreach ($prov_split as $prov_group){
    //echo "Proveedores en el grupo: ".count($prov_group);
    $num_provs = count($prov_group);

    switch ($num_provs) {
        case 1: $width = 466;
                break;
        case 2: $width = 230;
            break;
        case 3: $width = 154;
            break;
        case 4: $width = 115;
            break;
        case 5: $width = 92;
            break;
    }

    $th = "";
    for ($i = 0; $i < $num_provs; $i++){
        $th .= '<th align="center" valign="middle" width='.$width.'><b>'.$prov_group[$i]['razonSocial'].'</b></th>';
    }

    array_push($arr_th, $th);
    echo $th;
    echo "<br>";
}

var_dump($arr_th);

*/

//var_dump($nombres);
var_dump($resumen);

echo $tbody;





