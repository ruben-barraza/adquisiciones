<?php
    
    var_dump($contactos);
    var_dump($po_general);
    var_dump($pog_responsable);
    var_dump($pog_formula);
    var_dump($po_consideracion);

    $num_contactos = sizeof($contactos);
    echo "Contactos totales: ".$num_contactos;
    echo "<br>";
    echo $contactos[0]["nombre"];
    echo "<br>";
    echo $contactos[1]["nombre"];
    echo "<br>";
    echo $contactos[2]["nombre"];
    echo "<br>";
    echo $contactos[3]["nombre"];
    echo "<br>";
    echo $contactos[4]["nombre"];
    echo "<br>";
    echo "<br>";
    echo $po_general[0]["oficioNumero"];
    echo "<br>";
    echo $po_general[0]["oficioNumero"] + 1;
    echo "<br>";
    echo ini_get('upload_tmp_dir');
?>