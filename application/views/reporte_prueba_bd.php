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

    echo $po_general[0]["oficioNumero"];

     echo '<ul>
        <li>'.$po_consideracion[0]["fc1"].'</li>
        <li>'.$po_consideracion[0]["fc2"].'</li>
        <li>'.$po_consideracion[0]["fc3"].'</li>
        <li>'.$po_consideracion[0]["fc4"].'</li>
        <li>'.$po_consideracion[0]["fc5"].'</li>
        <li>'.$po_consideracion[0]["fc6"].'</li>
        <li>'.$po_consideracion[0]["fc7"].'</li>
        <li>'.$po_consideracion[0]["fc8"].'</li>
        <li>'.$po_consideracion[0]["fc9"].'</li>
        <li>'.$po_consideracion[0]["fc10"].'</li>
        <li>'.$po_consideracion[0]["fc11"].'</li>
        <li>'.$po_consideracion[0]["fc12"].'</li>
        <li>'.$po_consideracion[0]["fc13"].'</li>
        <li>'.$po_consideracion[0]["fc14"].'</li>
        <li>'.$po_consideracion[0]["fc15"].'</li>
        <li>'.$po_consideracion[0]["fc16"].'</li>
        <li>'.$po_consideracion[0]["fc17"].'</li>
        <li>'.$po_consideracion[0]["fc18"].'</li>
    <ul>'
?>