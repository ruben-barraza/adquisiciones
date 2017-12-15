<style>
    .short-field {
        width: 60px;
    }

    .med-field {
        width: 110px;
    }

    .precio-field{
        width: 120px;
    }

    .table {
        margin: 50px 0 20px 0;
    }
</style>


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php echo validation_errors(); ?>
                <?php echo form_open('im_general/edit/' . $im_general['id'], array("class" => "form-horizontal")); ?>

                <div class="form-group">
                    <label for="titulo" class="col-md-2 control-label">Título</label>
                    <div class="col-md-6">
                        <input type="text" name="titulo"
                               value="<?php echo $im_general['titulo']; ?>"
                               class="form-control" id="titulo"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="empleadoAutoriza" class="col-md-2 control-label">Empleado Autoriza</label>
                    <div class="col-md-2">
                        <div class="input-group">
                            <input type="text" id="empleadoAutoriza" name="empleadoAutoriza"
                                   value="<?php echo $empleadoAutoriza[0]['rpe'] ?>" maxlength="5"
                                   class="form-control pull-right" placeholder="Ingrese RPE"/>
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-search"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="text" id="empleadoAutoriza2"
                               value="<?php echo $empleadoAutoriza[0]['nombre'] . ' ' . $empleadoAutoriza[0]['apellidoPaterno'] . ' ' . $empleadoAutoriza[0]['apellidoMaterno'] ?>"
                               name="empleadoAutoriza2" class="form-control" readonly
                               placeholder="Nombre del empleado"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="empleadoFormula" class="col-md-2 control-label">Empleado Formula</label>
                    <div class="col-md-2">
                        <div class="input-group">
                            <input type="text" id="empleadoFormula" name="empleadoFormula"
                                   value="<?php echo $empleadoFormula[0]['rpe'] ?>" maxlength="5"
                                   class="form-control pull-right" placeholder="Ingrese RPE"/>
                            <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <input type="text" id="empleadoFormula2"
                               value="<?php echo $empleadoFormula[0]['nombre'] . ' ' . $empleadoFormula[0]['apellidoPaterno'] . ' ' . $empleadoFormula[0]['apellidoMaterno'] ?>"
                               name="empleadoFormula2" class="form-control" readonly placeholder="Nombre del empleado"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="solped" class="col-md-2 control-label">SOLPED</label>
                    <div class="col-md-4">
                        <input type="text" name="solped" value="<?php
                        if ($im_general['SOLPED'] != 0)
                            echo $im_general['SOLPED'];
                        else
                            echo "";
                        ?>" class="form-control" id="solped"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="imc_estatus" class="control-label col-sm-2">Status</label>
                    <div class="col-md-4">
                        <select name="imc_estatus" id="imc_estatus" class="form-control">
                            <option value="0">Seleccione</option>
                            <?php
                            $estatus_values = array(
                                'I' => 'Inicial',
                                'E' => 'Enviado',
                                'R' => 'Recepción',
                                'T' => 'Concluido',
                                'C' => 'Cancelado',
                            );

                            foreach ($estatus_values as $value => $display_text) {

                                $selected = ($value == $im_general['estatus']) ? ' selected="selected"' : "";
                                echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>


                <hr/>

                <div class="form-group">
                    <label for="imc_proveedor" class="control-label col-sm-2">Proveedor</label>
                    <div class="col-md-4">
                        <select name="imc_proveedor" id="imc_proveedor" class="form-control">
                            <option value="0">Seleccione</option>
                            <?php foreach($imcProveedores as $proveedor) : ?>
                                <option value="<?php echo $proveedor['id']; ?>"><?php echo $proveedor['razonSocial']; ?></option>
                            <?php endforeach; ?>
                            <option value="6666">REF BANCO PRECIO 1</option>
                            <option value="7777">REF BANCO PRECIO 2</option>
                            <option value="8888">REF BANCO PRECIO 3</option>
                            <option value="9999">REF CATPRE</option>
                        </select>
                    </div>
                </div>

                <div id="tabla_total" class="hidden">
                    <div class="form-group">
                        <label for="moneda" class="control-label col-sm-2">Moneda</label>
                        <div class="col-md-2">
                            <select name="moneda" id="moneda" class="form-control">
                                <option value="0">Seleccione</option>
                                <?php
                                $moneda_values = array(
                                    'MXN' => 'MXN',
                                    'USD' => 'USD',
                                );

                                foreach ($moneda_values as $value => $display_text) {
                                    echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tipocambio" class="control-label col-sm-2">Tipo de cambio</label>
                        <div class="col-md-2">
                            <input name="tipocambio" id="tipocambio" class="form-control" value="<?php echo $tipo_cambio ?>" disabled/>
                        </div>
                    </div>

                    <table id="tablaArticulos" class="table table-hover">
                        <thead class="thead-inverse">
                        <th>Partida</th>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>UM</th>
                        <th>Precio Unitario ($)</th>
                        <th>Importe ($)</th>
                        <th>PMC</th>
                        </thead>
                        <tbody>
                        <?php
                        $rows = count($imcConcepto);
                        for($i = 0; $i < $rows; $i++){ ?>
                            <tr>
                                <td>
                                    <input type="text" name="<?php echo "partida_".($i+1) ?>" id="<?php echo "partida_".($i+1) ?>" value="<?php echo $imcConcepto[$i]["partida"] ?>" class="form-control short-field" disabled/>
                                </td>
                                <td>
                                    <input type="text" name="<?php echo "codigo_".($i+1) ?>" id="<?php echo "codigo_".($i+1) ?>" value="<?php echo $imcConcepto[$i]["codigo"] ?>" class="form-control med-field" disabled/>
                                </td>
                                <td>
                                    <input type="text" name="<?php echo "descripcion_".($i+1) ?>" id="<?php echo "descripcion_".($i+1) ?>" value="<?php echo $imcConcepto[$i]["descripcion"] ?>" class="form-control" disabled/>
                                </td>
                                <td>
                                    <input type="text" name="<?php echo "cantidad_".($i+1) ?>" id="<?php echo "cantidad_".($i+1) ?>" value="<?php echo $imcConcepto[$i]["cantidad"] ?>" class="form-control short-field cantidad"/>
                                </td>
                                <td>
                                    <input type="text" name="<?php echo "um_".($i+1) ?>" id="<?php echo "um_".($i+1) ?>" value="<?php echo $imcConcepto[$i]["clave"] ?>" class="form-control short-field" disabled/>
                                </td>
                                <td class="col-md-1">
                                    <input type="text" name="<?php echo "preciounitario_".($i+1) ?>" id="<?php echo "preciounitario_".($i+1) ?>" value="" class="form-control precio-field precio"/>
                                </td>
                                <td>
                                    <input type="text" name="<?php echo "importe_".($i+1) ?>" id="<?php echo "importe_".($i+1) ?>" value="" class="form-control importe precio-field" disabled/>
                                </td>
                                <td>
                                    <input type="text" name=""<?php echo "pmc_".($i+1) ?>" id="<?php echo "pmc_".($i+1) ?>" value="<?php
                                    if(isset($pmc))
                                        echo $pmc[$i];
                                    else
                                        echo 0;
                                    ?>" class="form-control precio-field" />
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                    <hr />

                    <div class="form-group">
                        <label for="subtotal" class="control-label col-sm-2">Subtotal ($)</label>
                        <div class="col-md-2">
                            <input name="subtotal" id="subtotal" class="form-control" disabled/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="iva" class="control-label col-sm-2">IVA ($)</label>
                        <div class="col-md-2">
                            <input name="iva" id="iva" class="form-control" disabled/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="imctotal" class="control-label col-sm-2">Total ($)</label>
                        <div class="col-md-2">
                            <input name="imctotal" id="imctotal" class="form-control" disabled/>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="cotizaciones" class="control-label col-sm-2">Cotizaciones</label>
                    <div class="col-md-1">
                        <input name="cotizaciones" id="cotizaciones" value="<?php echo $num_cotizaciones; ?>" class="form-control" disabled/>
                    </div>
                </div>

                <hr/>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <a href="<?php echo site_url('im_general/index/'); ?>" id="botonRegresar" class="btn btn-primary">
                            <span class="fa fa-arrow-left"></span> Regresar
                        </a>
                        <a id="botonGuardar" class="btn btn-success">
                            <span class="fa fa-check"></span> Guardar
                        </a>
                    </div>
                </div>

                <var>
                    <?php

                    echo "TIPO DE CAMBIO: ".$tipo_cambio;
                    echo "<br>";
                    echo $num_cotizaciones;
                    var_dump($newOutput);
                    ?>
                </var>


                <var>
                    <?php
                        //var_dump($pmc);
                        echo "********************************************************************************************";

                        var_dump($output2);



                        $subarraykeys = array_keys($output2[0]);
                        $removekeys = array();

                        $num_cotizaciones = 0;
                        $num_partidas = 0;

                        echo "<br>";
                        echo "<br>";

                        //Checo el número de cotizaciones, si la suma de algún idProveedor = 0, agrego a esa llave a $removekeys
                        foreach($subarraykeys as $key){
                            if(array_sum(array_column($output2, $key)) != 0){
                                $num_cotizaciones++;
                            } else if(array_sum(array_column($output2, $key)) == 0) {
                                array_push($removekeys, $key);
                            }
                            echo array_sum(array_column($output2, $key));
                            echo "<br>";
                        }

                        echo "NUM COTIZACIONES: $num_cotizaciones";

                        echo "<br>";

                        var_dump($removekeys);

                        //Quito los proveedores que no tienen cotizaciones
                        for ($i = 0; $i < count($output2); $i++){
                            foreach($removekeys as $key) {
                                unset($output2[$i][$key]);
                            }
                        }

                        var_dump($output2);

                        $num_partidas = count($output2);

                        //Este array va a contener solamente las cotizaciones, no incluye ningún precio histórico
                        //De aquí se toma el mínimo para la cotización más baja
                        $output3 = $output2;
                        $keys_historicos = array("idProveedor_6666", "idProveedor_7777", "idProveedor_8888", "idProveedor_9999");

                        //Quito los precios historicos del array output3
                        for ($i = 0; $i < count($output3); $i++){
                            foreach($keys_historicos as $key) {
                                unset($output3[$i][$key]);
                            }
                        }
                        echo "ARRAY COTIZACIONES";
                        var_dump($output3);
                        var_dump($output2);


                        echo "<br>";
                        echo "SIZE OF: ".count($output2);
                        echo "<br>";

                        echo "----------------------------";
                        echo "<br>";
                        $maxvalue;
                        $minvalue;
                        $num_intervalos = $num_cotizaciones - 1;
                        for ($i = 0; $i < $num_partidas; $i++)
                        {
                            echo "PARTIDA ".($i + 1);
                            echo "<br>";

                            $array_promedios = array();

                            //Contiene los promedios de los intervalos con mayor número de frecuencias
                            $max_frec_prom = array();

                            $prom_frec = 0;

                            $maxvalue = max($output2[$i]);
                            $minvalue = min($output2[$i]);
                            $val_diferencia = $maxvalue - $minvalue;
                            $val_rango = $val_diferencia/$num_intervalos;
                            echo "VL: $val_rango";
                            echo "<br>";
                            for($j = 0; $j < $num_intervalos; $j++){
                                echo "Intervalo ".($j+1);
                                echo "<br>";
                                if($j == 0)
                                    $lim_inf = $minvalue;
                                echo "Límite inferior: ".round($lim_inf, 2);
                                echo "<br>";
                                $lim_sup = $lim_inf + $val_rango;

                                echo "Límite superior: ".round($lim_sup, 2);
                                echo "<br>";
                                $frec_promedio = array();
                                $frecuencias = 0;
                                $k = 0;
                                $precios_intervalo = array();
                                $prom_intervalo = 0;
                                foreach($output2[$i] as $array){
                                    if($j == $num_intervalos - 1){
                                        if($array >= $lim_inf && $array <= $lim_sup){
                                            $frecuencias++;
                                            array_push($precios_intervalo, $array);
                                        }
                                    } else {
                                        if($array >= $lim_inf && $array < $lim_sup) {
                                            $frecuencias++;
                                            array_push($precios_intervalo, $array);
                                        }
                                    }

                                    $k++;
                                }

                                if (empty($precios_intervalo)){
                                    $prom_intervalo = 0;
                                } else {
                                    $prom_intervalo = array_sum($precios_intervalo)/count($precios_intervalo);
                                }
                                echo "Frecuencias en el intervalo: $frecuencias";
                                echo "<br>";
                                echo "Promedio del intervalo: ".round($prom_intervalo, 2);
                                echo "<br>";
                                echo "<br>";
                                $frec_promedio['frecuencias'] = $frecuencias;
                                $frec_promedio['promedio'] = round($prom_intervalo, 2);

                                array_push($array_promedios, $frec_promedio);
                                $lim_inf = $lim_sup;

                            }
                            var_dump($array_promedios);

                            //Valor max de frecuencias
                            $max_frecuencias = max(array_column($array_promedios, 'frecuencias'));
                            foreach ($array_promedios as $row){
                                if ($row['frecuencias'] == $max_frecuencias){
                                    array_push($max_frec_prom, $row['promedio']);
                                }
                            }

                            $prom_frec = array_sum($max_frec_prom)/count($max_frec_prom);
                            $cot_mas_baja =  min($output3[$i]);

                            $pmc = min($prom_frec, $cot_mas_baja);

                            echo "Promedio frecuencias: ".round($prom_frec, 2);
                            echo "<br>";
                            echo "Cotización más baja: ".$cot_mas_baja;
                            echo "<br>";
                            echo "<br>";
                            echo "PMC = ".$pmc;
                            echo "<br>";
                            echo "<br>";
                            echo "<br>";
                            echo "------------------------------------------------------------------------------";
                            echo "<br>";
                            //echo $val_rango;
                            echo "<br>";
                        }

                        //echo round(1.125, 2);


                    ?>
                </var>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var idPog = <?php echo $im_general['idPog'] ?>;
        var idImg = <?php echo $im_general['id'] ?>;

        var longitudTablaArticulo = $("#tablaArticulos tbody tr").length;


        $('.precio').keyup(function(event) {

            // skip for arrow keys
            if(event.which >= 37 && event.which <= 40) return;

            // format number
            $(this).val(function(index, value) {
                value = value.replace(/,/g,''); // remove commas from existing input
                return FormatNumber(value);
            });
        });


        //Busca el nombre del empleado una vez que el input tenga 5 caracteres
        $("#empleadoAutoriza").on('keyup', function(e) {
            if ($(this).val().length == 5) {
                var rpe = $('#empleadoAutoriza').val();
                var nombre = "";
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/Po_general/obtenerNombreEmpleado',
                    method: 'POST',
                    data: {
                        rpe: rpe
                    },
                    success: function (returned) {
                        var returned = JSON.parse(returned);
                        jQuery.each( returned.nombre, function( i, val ) {
                            nombre = val.nombre + " " + val.apellidoPaterno + " " + val.apellidoMaterno;
                        });
                        $("#empleadoAutoriza2").val(nombre);
                    }
                });
            } else if ($(this).val().length < 5){
                $('#empleadoAutoriza2').val('');
            }
        });

        $("#empleadoFormula").on('keyup', function(e) {
            if ($(this).val().length == 5) {
                var rpe = $('#empleadoFormula').val();
                var nombre = "";
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/Po_general/obtenerNombreEmpleado',
                    method: 'POST',
                    data: {
                        rpe: rpe
                    },
                    success: function (returned) {
                        var returned = JSON.parse(returned);
                        //console.log(returned.nombre.length);

                        jQuery.each(returned.nombre, function( i, val ) {
                            nombre = val.nombre + " " + val.apellidoPaterno + " " + val.apellidoMaterno;
                        });
                        $("#empleadoFormula2").val(nombre);
                    }
                });
            } else if ($(this).val().length < 5){
                $('#empleadoFormula2').val('');
            }
        });


        $('.cantidad, .precio').keyup(function(){
            var $id = $(this).attr('id');
            var $fila = $id.split("_").pop();

            var cantidad = parseFloat($("#cantidad_" + $fila).val()) || 0;
            var precio = parseFloat($("#preciounitario_" + $fila).val().replace(/,/g, '')) || 0;

            var importe = cantidad * precio;
            var importeformat = FormatNumber(importe.toFixed(2));
            $("#importe_" + $fila).val(importeformat);

            var subtotal = 0;
            for($i = 1; $i <= longitudTablaArticulo; $i++) {
                subtotal += parseFloat($("#importe_" + $i).val().replace(/,/g, ''));
            }
            calcularTotal(subtotal);

        });

        function FormatNumber(total) {
            //Seperates the components of the number
            var components = total.toString().split(".");
            //Comma-fies the first part
            components [0] = components [0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            //Combines the two sections
            return components.join(".");
        }

        $('#imc_proveedor').change(function(){
            var $prov_id = $(this).val();
            if($prov_id == 0){
                $("#tabla_total").hide();
            } else {
                $("#tabla_total").removeClass("hidden");
                $("#tabla_total").show();

                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/Im_general/obtenerPreciosIMC',
                    method: 'POST',
                    data: {
                        idProveedor: $prov_id,
                        idPog: idPog,
                    },
                    success: function (returned) {
                        var returned = JSON.parse(returned);

                        jQuery.each(returned.preciosimc, function( i, val ) {
                            //console.log(i);
                            $("#partida_" + (i+1)).val(val.partida);
                            $("#codigo_" + (i+1)).val(val.codigo);
                            $("#descripcion_" + (i+1)).val(val.descripcion);
                            $("#cantidad_" + (i+1)).val(val.cantidad);
                            $("#um_" + (i+1)).val(val.clave);
                            if(val.preciounitarioIM == 0){
                                $("#preciounitario_" + (i+1)).val("0");
                            }
                            else {
                                var preciounitario = FormatNumber(parseFloat(val.preciounitarioIM));
                                $("#preciounitario_" + (i+1)).val(preciounitario);
                            }
                            if(val.importeIM == 0){
                                $("#importe_" + (i+1)).val("0");
                            }
                            else {
                                var importe = FormatNumber(val.importeIM);
                                $("#importe_" + (i+1)).val(importe);
                            }

                        });
                        calcularTotal(returned.subtotalimc);
                    }
                });
            }
        });

        function calcularTotal(subtotal){
            var subtotalfloat = parseFloat(subtotal);
            var imcsubtotal = FormatNumber(subtotalfloat.toFixed(2));
            $("#subtotal").val(imcsubtotal);
            var iva = subtotalfloat * 0.16;
            var ivaformat = FormatNumber(parseFloat(iva.toFixed(2)));
            $("#iva").val(ivaformat);
            var total = subtotalfloat + iva;
            var totalformat = FormatNumber(parseFloat(total.toFixed(2)));
            $("#imctotal").val(totalformat);
        }



        $("#botonGuardar").click(function(){

            //Guarda info basica IM
            var titulo = $("#titulo").val();
            var empleadoAutorizaRpe = $("#empleadoAutoriza").val();
            var empleadoFormulaRpe = $("#empleadoFormula").val();
            var solped = $("#solped").val();
            var imcestatus = $('#imc_estatus').val();
            $.ajax({
                url: '<?php echo base_url();?>index.php/Im_general/updateIMG',
                method: 'POST',
                async: false,
                data: {
                    idimg: idImg,
                    titulo: titulo,
                    empleadoAutorizaRpe: empleadoAutorizaRpe,
                    empleadoFormulaRpe: empleadoFormulaRpe,
                    solped: solped,
                    imcestatus: imcestatus,
                }
            });


            //Guarda los precios
            var prov_id = $('#imc_proveedor').val();
            for(i = 1; i <= longitudTablaArticulo; i++) {
                var codigo = $("#codigo_" + i).val();
                var cantidad = $("#cantidad_" + i).val();
                var precio = $("#preciounitario_" + i).val().replace(/,/g, '');
                var importe = $("#importe_" + i).val().replace(/,/g, '');
                $.ajax({
                    url: '<?php echo base_url();?>index.php/Im_general/updatePreciosIMC',
                    method: 'POST',
                    async: false,
                    data: {
                        idProveedor: prov_id,
                        idPog: idPog,
                        codigo: codigo,
                        cantidad: cantidad,
                        precio: precio,
                        importe: importe
                    }
                });
            }

            $.ajax({
                url: '<?php echo base_url(); ?>index.php/Im_general/updatePMC',
                method: 'POST',
                async: false,
                data: {
                    idImg: idImg
                },
                success: function (returned) {
                    var returned = JSON.parse(returned);

                    var cotizaciones = returned.num_cotizaciones;
                    $("#cotizaciones").val(cotizaciones);

                    //console.log(returned.pmc.length);

                    var longitudArrPmc = returned.pmc.length;

                    for (var i = 0; i < longitudArrPmc; i++){
                        console.log(returned.pmc[i]);
                        $("#pmc_" + (i+1)).val(returned.pmc[i]);
                    }
                }
            });
        });
    });


</script>