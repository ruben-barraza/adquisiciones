<style>


    .table {
        margin: 50px 0 20px 0;
    }

    .table .check {
        text-align: center; /* center checkbox horizontally */
        vertical-align: middle; /* center checkbox vertically */
    }

    .myAlert-top{
        position: fixed;
        top: 5%;
        left: 45%;
        width: 20%;
        font-size: 20px;
    }

    .myAlert-bottom{
        position: fixed;
        bottom: 5px;
        left:2%;
        width: 96%;
    }

    .partida-col {
        width: 5%;
    }

    .codigo-col {
        width: 8%;
    }
    .cantidad-col {
        width: 7%;
    }

    .um-col {
        width: 4%;
    }

    .precios-col{
        width: 9%;
    }

    .alert{
        display: none;
    }

</style>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Investigación de Condiciones de Mercado</h2>
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
                                'T' => 'Terminado',
                                'C' => 'Cancelado',
                                'D' => 'Desierto',
                            );

                            foreach ($estatus_values as $value => $display_text) {

                                $selected = ($value == $im_general['estatus']) ? ' selected="selected"' : "";
                                echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="fechaElaboracion" class="col-sm-2 control-label">Fecha de Elaboración</label>
                    <div class="col-md-2">
                        <input type="text" name="fechaElaboracion" value="<?php
                        $fecha = $im_general['fechaElaboracion'];
                        $fechaElaboracion = date("d/m/Y", strtotime($fecha));
                        echo ($this->input->post('fechaElaboracion') ? $this->input->post('fechaElaboracion') : $fechaElaboracion); ?>" class="form-control" id="fechaElaboracion" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="fechaImpresion" class="col-sm-2 control-label">Fecha de Impresión</label>
                    <div class="col-md-2">
                        <input type="text" name="fechaImpresion" value="<?php
                        $fecha = $im_general['fechaImpresion'];
                        $fechaImpresion = date("d/m/Y", strtotime($fecha));
                        echo ($fecha == "0000-00-00"  ? "" : $fechaImpresion); ?>" class="form-control" id="fechaImpresion" />
                    </div>
                </div>
				<br/>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-bars"></i> Avance <small> Propuestas de oferta / Resumen / PMC / Anexo 1 </small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active tab1"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Cotizaciones</a>
                                </li>
                                <li role="presentation" class="tab2"><a href="#tab_content2" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Resumen</a>
                                </li>
                                <li role="presentation" class="tab3"><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Cálculo PMC</a>
                                </li>
                                <li role="presentation" class="tab4"><a href="#tab_content4" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Bitácora PMC</a>
                                </li>
                                <li role="presentation" class="tab5"><a href="#tab_content5" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Anexo 1</a>
                                </li>
                                <li role="presentation" class="tab6"><a href="#tab_content6" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Formulario Entrega</a>
                                </li>
                                <li role="presentation" class="tab7"><a href="#tab_content7" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Solcon</a>
                                </li>
                                <li role="presentation" class="tab8"><a href="#tab_content8" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Archivos Anexos</a>
                                </li>

                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                			        <br />
                                    <div class="form-group">
                                        <label for="imc_proveedor" class="control-label col-sm-2">Proveedor</label>
                                        <div class="col-md-4">
                                            <select name="imc_proveedor" id="imc_proveedor" class="form-control">
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

                                    <div id="tabla_total" class="">
                                        <div class="form-group">
                                            <label for="moneda" class="control-label col-sm-2">Moneda</label>
                                            <div class="col-md-2">
                                                <select name="moneda" id="moneda" class="form-control">
                                                    <option value="MXN">MXN</option>
                                                    <option value="USD">USD</option>
                                                 </select>
                                            </div>
                                        </div>
                
                                        <div class="hidden" id="tipocambio_oculto">
                                            <div class="form-group">
                                                <label for="fechaCotizacion" class="col-sm-2 control-label">Fecha de Cotización</label>
                                                <div class="col-md-2">
                                                    <input type="text" name="fechaCotizacion" value="" class="form-control" id="fechaCotizacion" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tipocambio" class="control-label col-sm-2">Tipo de cambio</label>
                                                <div class="col-md-2">
                                                    <input name="tipocambio" id="tipocambio" class="form-control" value="<?php //echo $tipo_cambio ?>" disabled/>
                                                </div>
                                            </div>
                                        </div>

                                        <table id="tablaArticulos" class="table table-hover">
                                            <thead class="thead-inverse">
                                                <th class="check">N/C</th>
                                                <th class="partida-col">Partida</th>
                                                <th class="codigo-col">Código</th>
                                                <th>Descripción</th>
                                                <th class="cantidad-col">Cantidad</th>
                                                <th class="um-col">UM</th>
                                                <th class="precios-col">Precio Unitario ($)</th>
                                                <th class="precios-col">Importe ($)</th>
                                                <th class="precios-col">PMC ($)</th>
                                                <th class="precios-col">IMC (S)</th>
                                                <th class="partida-col">CPP</th>
                                                <!--
                                                <th class="precios-col">AMP 100% ($)</th>
                                                <th>PMC</th>
                                                -->
                                            </thead>
                                            <tbody>
                                                <?php
                                                $rows = count($imcConcepto);
                                                for($i = 0; $i < $rows; $i++){ ?>
                                                    <tr>
                                                        <td class="check">
                                                            <input class="form-check-input no-cotizo" type="checkbox" value="" id="<?php echo "nc_".($i+1) ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="<?php echo "partida_".($i+1) ?>" id="<?php echo "partida_".($i+1) ?>" value="" class="form-control" disabled/>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="<?php echo "codigo_".($i+1) ?>" id="<?php echo "codigo_".($i+1) ?>" value="" class="form-control" disabled/>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="<?php echo "descripcion_".($i+1) ?>" id="<?php echo "descripcion_".($i+1) ?>" value="" class="form-control" disabled/>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="<?php echo "cantidad_".($i+1) ?>" id="<?php echo "cantidad_".($i+1) ?>" value="" class="form-control cantidad" disabled/>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="<?php echo "um_".($i+1) ?>" id="<?php echo "um_".($i+1) ?>" value="" class="form-control" disabled/>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="<?php echo "preciounitario_".($i+1) ?>" id="<?php echo "preciounitario_".($i+1) ?>" value="" class="form-control precio"/>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="<?php echo "importe_".($i+1) ?>" id="<?php echo "importe_".($i+1) ?>" value="" class="form-control importe" disabled/>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="<?php echo "pmc_".($i+1) ?>" id="<?php echo "pmc_".($i+1) ?>" value="<?php
                                                            if(isset($pmc_inicial))
                                                                echo number_format($pmc_inicial[$i], 2, '.', ',');
                                                            else
                                                                echo 0;
                                                            ?>" class="form-control precio-field" />
                                                        </td>
                                                        <td>
                                                            <input type="text" name="<?php echo "imc_".($i+1) ?>" id="<?php echo "imc_".($i+1) ?>" value="<?php
                                                            if(isset($pmc_inicial)){
                                                                $imc = $imcConcepto[$i]["cantidad"] * $pmc_inicial[$i];
                                                                echo  number_format($imc, 2, ".", ",");
                                                            }
                                                            else
                                                                echo 0;
                                                            ?>" class="form-control" />
                                                        </td>
                                                        <td>
                                                            <input type="text" name="<?php echo "cpp_".($i+1) ?>" id="<?php echo "cpp_".($i+1) ?>" value="<?php
                                                            if(isset($arr_cpp))
                                                                echo $arr_cpp[$i];
                                                            else
                                                                echo 0;
                                                            ?>" class="form-control precio-field" disabled/>
                                                        </td>

                                                        <!--
                                                            <td>
                                                                <input type="text" name="<?php /* echo "ampliacion_".($i+1) ?>" id="<?php echo "ampliacion_".($i+1) ?>" value="<?php
                                                                if(isset($imc)){
                                                                    echo number_format($imc * 2, 2, ".", ",");
                                                                }
                                                                else
                                                                    echo 0;
                                                                */
                                                        ?>" class="form-control precio-field" />
                                                            </td>
                                                            -->
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
                                    <hr/>
                                    <hr/>
                                    <div class="form-group saveim">
                                        <div class="col-sm-offset-2 col-sm-8">
                                            <a href="<?php echo site_url('im_general/index/'); ?>" id="botonRegresar" class="btn btn-primary">
                                                <span class="fa fa-arrow-left"></span> Regresar
                                            </a>
                                            <a id="botonGuardar" class="btn btn-success">
                                                <span class="fa fa-check"></span> Guardar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                <table id="tabla_resumen" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th align="center" valign="middle" ><b> Partida</b></th>
                                            <th align="center" valign="middle" ><b> Código</b></th>
                                            <th align="center" valign="middle" ><b> Descripción</b></th>
                                            <th align="center" valign="middle" ><b> CANT</b></th>
                                            <th align="center" valign="middle" ><b> UM</b></th>
                                            <th align="center" valign="middle" ><b> Familia</b></th>
                                            <?php echo $arr_th; ?>
                                            <th align="center" valign="middle" ><b> PMC</b></th>
                                            <th align="center" valign="middle" ><b> IMPORTE</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $tableRows = count($imc_data);
                                    for($j = 0; $j < $tableRows; $j++)
                                    {
                                        $importe = $imc_data[$j]['pmc'] * $imc_data[$j]['cantidad'];
                                    ?>
                                        <tr nobr="true">
                                        <td align="center"><?php echo $imc_data[$j]['partida'] ?></td>
                                        <td align="center"><?php echo $imc_data[$j]['codigo'] ?></td>
                                        <td align="center"><?php echo $imc_data[$j]['descripcion'] ?></td>
                                        <td align="center"><?php echo $imc_data[$j]['cantidad'] ?></td>
                                        <td align="center"><?php echo $imc_data[$j]['clave'] ?></td>
                                        <td align="center"><?php echo $imc_data[$j]['familia'] ?></td>
                                        <?php echo $arr_td[$j]; ?>
                                        <td align="right"><?php echo "$".number_format($imc_data[$j]['pmc'], '2', '.', ',') ?></td>
                                        <td align="right"><?php echo "$".number_format($importe, '2', '.', ',') ?></td>
                                        </tr>';
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        
                        
						    <!-- PESTAÑA CALCULO PMC -->
                        
                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                <var>
                                    <?php

                                    //var_dump($imcConcepto);

                                    $bitacora_pmc = "";

                                    $key = array_search(4, array_column($imcConcepto, 'partida'));

                                    /*
                                    echo "<br>";
                                    echo "INDEX DEL ARRAY CON LA PARTIDA 4 = ".$key;
                                    echo "<br>";
                                    */

                                    $arr_tablapmc = array();

                                    //ARRAY PARA LOS DATOS DE INTERVALOS POR PARTIDA
                                    $arr_intervalos_tabla = array();

                                    //echo "********************************************************************************************";


                                    $num_partidas = count($output2);

                                    //var_dump($listaprov);

                                    //echo "<br>";
                                    //echo $listaprov[0]["razonSocial"];

                                    foreach($output2 as $row => $innerArray){
                                        foreach($innerArray as $key => $value){
                                            if($value == 0){
                                                unset($output2[$row][$key]);
                                            }
                                        }
                                    }



                                    /*
                                    //CON OUTPUT 2 SE EMPIEZA A CALCULAR EL PMC
                                    echo "<br>";
                                    //echo "SIZE OF: ".count($output2);
                                    echo "<br>";
                                    */
                                    $bitacora_pmc .= "NUMERO DE PARTIDAS: ".$num_partidas;
                                    $bitacora_pmc .= "<br>";
                                    $bitacora_pmc .= "--------------------------------------------------------------------------------------------------------------------------------------------";
                                    $bitacora_pmc .= "<br>";



                                    if($num_partidas >= 1) {
                                        for ($i = 0; $i < $num_partidas; $i++)
                                        {

                                            $bitacora_pmc .= "<br>";
                                            $bitacora_pmc .= "<br>";
                                            $bitacora_pmc .= "<h3>Partida ".($i + 1)."</h3>";
                                            $bitacora_pmc .= "<br>";

                                            if (count($output2[$i]) <= 1){
                                                //NO NECESITA HACER NADA MAS PORQUE ESA PARTIDA SOLO TIENE UNA COTIZACION

                                                $bitacora_pmc .= "SOLO HAY UNA COTIZACION EN ESTA PARTIDA";
                                                $bitacora_pmc .= "<br>";
                                                $bitacora_pmc .= "<h4><b>PMC = 0</b></h4>";
                                                $bitacora_pmc .= "----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------";

                                                $arr_intervalo_data["partida"] = $i + 1;
                                                $arr_intervalo_data["intervalo"] = "N/A";
                                                $arr_intervalo_data["li"] = "N/A";
                                                $arr_intervalo_data["ls"] = "N/A";
                                                $arr_intervalo_data["num_frec"] = "N/A";
                                                $arr_intervalo_data["prom_inter"] = "N/A";
                                                $arr_intervalos_tabla[$i][0] = $arr_intervalo_data;
                                                array_push($arr_tablapmc, 0);

                                            } else{
                                                //NUMERO DE LAS COTIZACIONES POR PARTIDA - 1
                                                $num_intervalos = count($output2[$i]) - 1;

                                                $array_promedios = array();



                                                $maxvalue = max($output2[$i]);
                                                $minvalue = min($output2[$i]);
                                                $val_diferencia = $maxvalue - $minvalue;
                                                $bitacora_pmc .= "VAL DIFERENCIA: $val_diferencia";
                                                $bitacora_pmc .= "<br>";
                                                $val_rango = $val_diferencia/$num_intervalos;
                                                //echo "VL: $val_rango";
                                                //echo "<br>";

                                                //ARRAY DE FILA PARA LA TABLA PMC
                                                $arr_filapmc = array();
                                                //$arr_filapmc["partida"] = $i + 1;



                                                for($j = 0; $j < $num_intervalos; $j++){

                                                    $arr_intervalo_data = array();

                                                    $bitacora_pmc .= "<br>";
                                                    $bitacora_pmc .= "<h2>Intervalo ".($j+1)."</h2>";
                                                    $bitacora_pmc .= "<br>";

                                                    if($j == 0)
                                                        $lim_inf = $minvalue;

                                                    $bitacora_pmc .= "Límite inferior: ".round($lim_inf, 2);
                                                    $bitacora_pmc .= "<br>";
                                                    $lim_sup = $lim_inf + $val_rango;

                                                    $bitacora_pmc .= "Límite superior: ".round($lim_sup, 2);
                                                    $bitacora_pmc .= "<br>";

                                                    $frec_promedio = array();
                                                    $frecuencias = 0;
                                                    $k = 0;
                                                    $precios_intervalo = array();
                                                    $prom_intervalo = 0;
                                                    foreach($output2[$i] as $proveedor => $precio){
                                                        if($j == $num_intervalos - 1){
                                                            if($precio >= $lim_inf && $precio <= $maxvalue){
                                                                $frecuencias++;
                                                                $precios_intervalo[$proveedor] = $precio;
                                                            }
                                                        } else {
                                                            if($precio >= $lim_inf && $precio < $lim_sup) {
                                                                $frecuencias++;
                                                                $precios_intervalo[$proveedor] = $precio;
                                                            }
                                                        }

                                                        $k++;
                                                    }

                                                    if (empty($precios_intervalo)){
                                                        $prom_intervalo = 0;
                                                    } else {
                                                        $prom_intervalo = array_sum($precios_intervalo)/count($precios_intervalo);
                                                    }

                                                    $bitacora_pmc .= "Frecuencias en el intervalo: $frecuencias";
                                                    $bitacora_pmc .= "<br>";
                                                    $bitacora_pmc .= "Promedio del intervalo: ".round($prom_intervalo, 2);
                                                    $bitacora_pmc .= "<br>";
                                                    $bitacora_pmc .= "<br>";

                                                    $frec_promedio['frecuencias'] = $frecuencias;
                                                    $frec_promedio['promedio'] = round($prom_intervalo, 2);

                                                    array_push($array_promedios, $frec_promedio);
                                                    foreach ($precios_intervalo as $proveedor => $precio){
                                                        $array_promedios[$j][$proveedor] = $precio;
                                                    }

                                                    $arr_intervalo_data["partida"] = $i + 1;
                                                    $arr_intervalo_data["intervalo"] = $j + 1;
                                                    $arr_intervalo_data["li"] = round($lim_inf, 2);
                                                    $arr_intervalo_data["ls"] = round($lim_sup, 2);
                                                    $arr_intervalo_data["num_frec"] = $frecuencias;
                                                    $arr_intervalo_data["prom_inter"] = round($prom_intervalo, 2);

                                                    //array_push($arr_intervalos_tabla, $arr_intervalo_data);

                                                    $arr_intervalos_tabla[$i][$j] = $arr_intervalo_data;
                                                    $lim_inf = $lim_sup;


                                                    $bitacora_pmc .= "PRECIOS DENTRO DEL INTERVALO ".($j+1);
                                                    $bitacora_pmc .= "<br>";
                                                    foreach ($precios_intervalo as $key => $value){
                                                        $idProveedor = substr($key, strpos($key, "_") + 1);
                                                        $bitacora_pmc .= $listaprov[$idProveedor].": $".$value;
                                                        $bitacora_pmc .= "<br>";
                                                    }
                                                    $bitacora_pmc .= "<br>";
                                                    $bitacora_pmc .= "****************************************************************************";
                                                    $bitacora_pmc .= "<br>";


                                                }

                                                //echo "ARRAY PROMEDIOS";
                                                //var_dump($array_promedios);

                                                //Encontrar el array con el mayot número de frecuencias
                                                //Si es más de uno tomar el índice menor
                                                $max_frecuencias = max(array_column($array_promedios, 'frecuencias'));

                                                $bitacora_pmc .= "Número máximo de frecuencias: $max_frecuencias";
                                                $bitacora_pmc .= "<br>";
                                                $bitacora_pmc .= "<br>";

                                                $key = array_search($max_frecuencias, array_column($array_promedios, 'frecuencias'));

                                                $bitacora_pmc .= "Intervalo con el número máximo de frecuencias: ".($key+1);
                                                $bitacora_pmc .= "<br>";
                                                $bitacora_pmc .= "<br>";


                                                $bitacora_pmc .= "DATOS DEL INTERVALO CON MAYOR FRECUENCIAS";
                                                $bitacora_pmc .= "<br>";

                                                //PROMEDIO DEL INERVALO CON MAYOR FRECUENCIAS
                                                $prom_intervalo_mayor_frec = $array_calc_pmc['promedio'];

                                                //ESTE ES EL ARREGLO CON MAYOR NÚMERO DE FRECUENCIAS QUE SE TOMA A CONSIDERACIÓN PARA CALCULAR EL PMC
                                                $array_calc_pmc = $array_promedios[$key];
                                                //PROMEDIO DEL INERVALO CON MAYOR FRECUENCIAS
                                                $prom_intervalo_mayor_frec = $array_calc_pmc['promedio'];
                                                unset($array_calc_pmc['frecuencias']);
                                                unset($array_calc_pmc['promedio']);

                                                //var_dump($array_calc_pmc);
                                                //echo "Promedio : ";


                                                //VERIFICAR LAS COTIZACIONES REALES Y LAS HISTORICAS
                                                $cot_reales = array();
                                                $cot_historicas = array();

                                                foreach ($array_calc_pmc as $key => $value){
                                                    if(preg_match('(6666|7777|8888|9999)', $key) === 1) {
                                                        array_push($cot_historicas, $value);
                                                    } else {
                                                        array_push($cot_reales, $value);
                                                    }
                                                }


                                                $bitacora_pmc .= "COTIZACIONES HISTÓRICAS";
                                                //var_dump($cot_historicas);
                                                $bitacora_pmc .= "<br>";
                                                foreach ($cot_historicas as $key => $value){
                                                    $bitacora_pmc .= "$ ".$value;
                                                    $bitacora_pmc .= "<br>";
                                                }


                                                $bitacora_pmc .= "COTIZACIONES REALES";
                                                $bitacora_pmc .= "<br>";
                                                foreach ($cot_reales as $key => $value){
                                                    $bitacora_pmc .= "$ ".$value;
                                                    $bitacora_pmc .= "<br>";
                                                }
                                                $bitacora_pmc .= "<br>";
                                                $bitacora_pmc .= "<br>";

                                                $bitacora_pmc .= "PROMEDIO DEL INTERVALO CON MAYOR FRECUENCIA: " . $prom_intervalo_mayor_frec;
                                                $bitacora_pmc .= "<br>";


                                                //SI EL ARREGLO DE COTIZACIONES REALES ESTÁ VACÍO HAY QUE SACAR EL PROMEDIO DE LAS COIZACIONES HISTORICAS
                                                //SI EL ARREGLO DE COIZACIONES HISTÓRICAS ESTÁ VACÍO EL MENOR VALOR

                                                if(empty($cot_reales)){
                                                    $pmc = round(array_sum($cot_historicas)/count($cot_historicas), 2);
                                                } else {
                                                    $cot_minima = min($cot_reales);
                                                    if($cot_minima < $prom_intervalo_mayor_frec){
                                                        $pmc = $cot_minima;
                                                    } else {
                                                        $pmc = $prom_intervalo_mayor_frec;
                                                    }
                                                }


                                                $bitacora_pmc .= "<br>";
                                                $bitacora_pmc .= "<br>";
                                                $bitacora_pmc .= "<h4><b>PMC = ".$pmc."</b></h4>";
                                                $bitacora_pmc .= "<br>";
                                                $bitacora_pmc .= "<br>";
                                                $bitacora_pmc .= "<br>";
                                                $bitacora_pmc .= "----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------";
                                                $bitacora_pmc .= "<br>";
                                                //echo $val_rango;
                                                $bitacora_pmc .= "<br>";
                                                //$arr_filapmc["pmc"] = (string)$pmc;


                                                array_push($arr_tablapmc, $pmc);


                                            }

                                            for ($l = 0; $l < count($arr_intervalos_tabla); $l++){
                                                for ($m = 0; $m < count($arr_intervalos_tabla[$l]); $m++){
                                                    $arr_intervalos_tabla[$l][$m]["pmc"] = $arr_tablapmc[$l];
                                                }
                                            }
                                        }
                                    }

                                    //var_dump($arr_tablapmc);
                                    //echo "<br>";
                                    //var_dump($arr_intervalos_tabla);

                                    ?>


                                    <table id="tabla_pmc" class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th align="center">Partida</th>
                                            <th align="center">Código</th>
                                            <th align="center">Descripción</th>
                                            <th align="center">Intervalo</th>
                                            <th align="center">Límite Inferior</th>
                                            <th align="center">Límite Superior</th>
                                            <th align="center">Num. frecuencias</th>
                                            <th align="center">Promedio</th>
                                            <th align="center">PMC</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php  for($i = 0; $i < count($arr_intervalos_tabla); $i++){
                                            for($j = 0; $j < count($arr_intervalos_tabla[$i]); $j++){
                                                ?>
                                                <tr>
                                                    <td align="center"><?php echo $arr_intervalos_tabla[$i][$j]['partida']; ?></td>
                                                    <?php $key = array_search($arr_intervalos_tabla[$i][$j]['partida'], array_column($imcConcepto, 'partida')); ?>
                                                    <td><?php echo $imcConcepto[$key]['codigo']; ?></td>
                                                    <td><?php echo $imcConcepto[$key]['descripcion']; ?></td>
                                                    <td align="center"><?php echo $arr_intervalos_tabla[$i][$j]['intervalo']; ?></td>
                                                    <td align="center"><?php echo $arr_intervalos_tabla[$i][$j]['li']; ?></td>
                                                    <td align="center"><?php echo $arr_intervalos_tabla[$i][$j]['ls']; ?></td>
                                                    <td align="center"><?php echo $arr_intervalos_tabla[$i][$j]['num_frec']; ?></td>
                                                    <td align="center"><?php echo $arr_intervalos_tabla[$i][$j]['prom_inter']; ?></td>
                                                    <td align="center"><?php echo $arr_intervalos_tabla[$i][$j]['pmc']; ?></td>
                                                </tr>

                                            <?php } ?>
                                        <?php } ?>

                                        </tbody>
                                    </table>
                                </var>
                            </div>

                            <!-- PESTAÑA BITÁCORA PMC -->
                            <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                                <div class="form-group">
                                    <div class="col-sm-8">
                                        <a id="imprimpirBitacoraPMC" href="<?php echo site_url('generar_pdf/bitacora_pmc/' . $i['id']); ?>" class="btn btn-info">
                                            <span class="fa fa-download"></span> Bitácora en PDF
                                        </a>
                                    </div>
                                </div>
                                <?php echo $bitacora_pmc; ?>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                            	<!-- PESTAÑA ANEXO 1 -->
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_content">
                                                <table id="tablaanexo1" name="tablaanexo1" class="display table table-striped table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Partida</th>
                                                            <th>Solcon</th>
                                                            <th>Código</th>
                                                            <th>Descripción</th>
                                                            <th>Descripción Detallada</th>                        
                                                            <th>Cant. Mínima</th>
                                                            <th>Cant. Máxima</th>
                                                            <th>PU Solcon</th>
                                                            <th>PMC</th>
                                                        </tr>
                                                    </thead>
                                                    </tbody>
                                                        <?php foreach($listaanexo1 as $anexo1){ ?>
                                                            <tr>
                                                                <td><?php echo $anexo1['partida']; ?></td>
                                                                <td><?php echo $anexo1['solcon']; ?></td>
                                                                <td><?php echo $anexo1['codigo']; ?></td>
                                                                <td><?php echo $anexo1['descripcion']; ?></td>
                                                                <td><?php echo $anexo1['descripciondetallada']; ?></td>
                                                                <td> <?php echo number_format($anexo1['cantidadminima'], 2, '.', ',');  ?></td>
                                                                <td> <?php echo number_format($anexo1['cantidadmaxima'], 2, '.', ',');  ?></td>
                                                                <td><?php echo '$ '.number_format($anexo1['pusolcon'], 2, '.', ',');  ?></td>
                                                                <td><?php echo '$ '.number_format($anexo1['pmc'], 2, '.', ',');  ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <script>
                                $(document).ready(function() {
                                
                                    var table = $('#tablaanexo1').DataTable({
                                        "language": {
                                            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                                        },
                                        dom: 'Bfrtip',
                                        buttons: [ 'copy', 'excel', {
                                            extend: 'pdfHtml5',
                                            orientation: 'landscape',
                                            pageSize: 'LEGAL'
                                        }],
                                    });
                                
                                } );
                                </script>
                            </div>

                            <!-- PESTAÑA CHECKLIST -->
                            <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="profile-tab">
                                <?php include __DIR__ . "\im_general_tabs\checklist.php";  ?>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="profile-tab">
                            	<!-- PESTAÑA SOLCON -->
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_content">
                                                <table id="tablasolcon" name="tablasolcon" class="display table table-striped table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Partida</th>
                                                            <th>Código</th>
                                                            <th>Descripción</th>
                                                            <th>UM</th>                        
                                                            <th>Cantidad</th>
                                                            <th>PU Solcon</th>
                                                            <th>Importe Solcon</th>
                                                            <th>Pedido</th>
                                                            <th>Partida</th>
                                                            <th>PU Pedido</th>
                                                            <th>Importe Pedido</th>
                                                            <th>Contrato</th>
															<th>Status</th>
                                                            <th>Recurso Liberado</th>
                                                        </tr>
                                                    </thead>
                                                    </tbody>
                                                        <?php 	$tienePedido = 'N'; 
																foreach($listadetallesolcon as $ds) if ($ds['pedido']) $tienePedido = 'S';  
																foreach($listadetallesolcon as $ds) { ?>
                                                            <tr>
                                                                <td><?php echo $ds['partida']; ?></td>
                                                                <td><?php echo $ds['codigo']; ?></td>
                                                                <td><?php echo $ds['descripcion']; ?></td>
                                                                <td><?php echo $ds['unidadmedida']; ?></td>
                                                                <td> <?php echo number_format($ds['cantidad'], 2, '.', ',');  ?></td>
                                                                <td> <?php echo number_format($ds['pusolcon'], 2, '.', ',');  ?></td>
                                                                <td> <?php echo number_format($ds['IMPORTE_PARTIDA_SOLPED'], 2, '.', ',');  ?></td>
                                                                <td><?php echo $ds['pedido']; ?></td>
                                                                <td><?php echo $ds['partidapedido']; ?></td>
                                                                <td> <?php echo number_format($ds['pupedido'], 2, '.', ',');  ?></td>
                                                                <td><?php echo '$ '.number_format($ds['importepedido'], 2, '.', ',');  ?></td>
                                                                <td><?php echo $ds['contrato']; ?></td>
                                                                <td><?php if ($tienePedido == 'S' && $ds['pedido'] == '') echo 'DESIERTA'; ?></td>
                                                                <td> <?php echo number_format($ds['SALDO_LIBERADO_PARTIDA'], 2, '.', ',');  ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <script>
                                $(document).ready(function() {
                                
                                    var table = $('#tablasolcon').DataTable({
                                        "language": {
                                            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                                        },
                                        dom: 'Bfrtip',
                                        buttons: [ 'copy', 'excel', {
                                            extend: 'pdfHtml5',
                                            orientation: 'landscape',
                                            pageSize: 'LEGAL'
                                        }],
                                    });
                                
                                } );
                                </script>

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content8" aria-labelledby="profile-tab">
                                <p>EN CONSTRUCCION </p>
                            </div>
                            
                        </div>
                    </div>
                </div>


                


                <div class="myAlert-top alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cambios guardados</strong>
                </div>
                <div class="myAlert-bottom alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Danger!</strong> This alert box could indicate a dangerous or potentially negative action.
                </div>

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

        function myAlertTop(){
            $(".myAlert-top").show();
            setTimeout(function(){
                $(".myAlert-top").hide();
            }, 2000);
        }

        function myAlertBottom(){
            $(".myAlert-bottom").show();
            setTimeout(function(){
                $(".myAlert-bottom").hide();
            }, 2000);
        }

        //Cambia el idioma del datepicker a español
        $.datepicker.regional['es'] = {
            closeText: 'Cerrar',
            prevText: '< Ant',
            nextText: 'Sig >',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['es']);

        $("#fechaElaboracion").datepicker({  maxDate: new Date });
        $("#fechaImpresion").datepicker({  maxDate: new Date });
        $("#fechaCotizacion").datepicker({  maxDate: new Date });

        var table = $('#tabla_pmc').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            "pageLength": 50,
            dom: 'Bfrtip',
            buttons: [ 'copy', 'excel', {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }],
        });

        var table = $('#tabla_resumen').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            "pageLength": 50,
            "scrollX": true,
            dom: 'Bfrtip',
            buttons: [ 'copy', 'excel', {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }],
        });


        $("#fechaCotizacion").on("change", function(){
            var selected = $(this).val();
            //  dd/mm/yyyy
            var dateAr = selected.split('/');
            var newDate = dateAr[2] + '-' + dateAr[1] + '-' + dateAr[0];

            //Consulta API Banxico
            $.ajax({
                url : "https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF63528/datos/"+ newDate + "/" + newDate +"?token=24e1c912006ef11065ac185c186ed1bce351171f730c0eddc3168b89a6aafc6a",
                jsonp : "callback",
                dataType : "jsonp", //Se utiliza JSONP para realizar la consulta cross-site
                success : function(response) {  //Handler de la respuesta
                    var series = response.bmx.series;
                    var tipocambio = series[0].datos[0].dato;
                    $('#tipocambio').val(tipocambio);
                    console.log(tipocambio);
                }
            });


        });

        var $prov_id = $('#imc_proveedor').val();
        update_imctable($prov_id);

        $('#tablaArticulos').on('change', ':checkbox', function () {
            $(this).closest('tr').find('input:text').prop('disabled', this.checked);
            if(this.checked){
                $(this).closest('tr').find('input.precio:text').val(0);
                $(this).closest('tr').find('input.importe:text').val(0);
            }
        }).find(':checkbox').change();


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

        $('#moneda').change(function(){
            var $moneda = $(this).val();
            if($moneda == "MXN"){
                $("#tipocambio_oculto").hide();
            } else {
                $("#tipocambio_oculto").removeClass("hidden");
                $("#tipocambio_oculto").show();
            }
        });


        function update_imctable($prov_id){

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

                            $("#partida_" + (i+1)).val(val.partida);
                            $("#codigo_" + (i+1)).val(val.codigo);
                            $("#descripcion_" + (i+1)).val(val.descripcion);
                            $("#cantidad_" + (i+1)).val(val.cantidadPO);
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

                            if(val.cotizado == "N"){
                                $("#nc_" + (i+1)).prop('checked', true);

                                $("#partida_" + (i+1)).prop('disabled', true);
                                $("#codigo_" + (i+1)).prop('disabled', true);
                                $("#descripcion_" + (i+1)).prop('disabled', true);
                                $("#cantidad_" + (i+1)).prop('disabled', true);
                                $("#um_" + (i+1)).prop('disabled', true);
                                $("#preciounitario_" + (i+1)).prop('disabled', true);
                                $("#importe_" + (i+1)).prop('disabled', true);;
                                $("#pmc_" + (i+1)).prop('disabled', true);
                                $("#imc_" + (i+1)).prop('disabled', true);
                                $("#cpp_" + (i+1)).prop('disabled', true);
                                //$("#ampliacion_" + (i+1)).prop('disabled', true);

                            } else {
                                $("#nc_" + (i+1)).prop('checked', false);
                                $("#partida_" + (i+1)).prop('disabled', true);
                                $("#codigo_" + (i+1)).prop('disabled', true);
                                $("#descripcion_" + (i+1)).prop('disabled', true);
                                $("#cantidad_" + (i+1)).prop('disabled', true);
                                $("#um_" + (i+1)).prop('disabled', true);
                                $("#preciounitario_" + (i+1)).prop('disabled', false);
                                $("#importe_" + (i+1)).prop('disabled', true);;
                                $("#pmc_" + (i+1)).prop('disabled', true);
                                $("#imc_" + (i+1)).prop('disabled', true);
                                $("#cpp_" + (i+1)).prop('disabled', true);
                                //$("#ampliacion_" + (i+1)).prop('disabled', true);
                            }

                        });
                        calcularTotal(returned.subtotalimc);


                        var moneda = returned.moneda;
                        if(moneda != 0){
                            $("#moneda").val(moneda);
                            if(moneda == "USD"){
                                $("#tipocambio_oculto").removeClass("hidden");
                                $("#tipocambio_oculto").show();
                            } else {
                                $("#tipocambio_oculto").hide();
                            }
                        } else {
                            $('#moneda option[value=MXN]').prop('selected', true);
                            $("#tipocambio_oculto").hide();
                        }


                        var tipo_cambio = returned.tipo_cambio;
                        if(tipo_cambio != 0){
                            $("#tipocambio").val(tipo_cambio);
                            $("#fechaCotizacion").val(returned.fecha_cot);
                        } else {
                            $("#tipocambio").val("<?php echo $tipo_cambio ?>");
                            $("#fechaCotizacion").datepicker().datepicker("setDate", new Date());
                        }
                    }
                });
            }
        }

        $('#imc_proveedor').change(function(){
            var $prov_id = $(this).val();
            update_imctable($prov_id);
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
            var fechaElaboracion = $('#fechaElaboracion').val();
            var fechaImpresion = $('#fechaImpresion').val();


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
                    fechaElaboracion: fechaElaboracion,
                    fechaImpresion: fechaImpresion,
                }
            });


            //Guarda los precios
            var prov_id = $('#imc_proveedor').val();
            for(i = 1; i <= longitudTablaArticulo; i++) {
                var codigo = $("#codigo_" + i).val();
                var cantidad = $("#cantidad_" + i).val();
                var precio = $("#preciounitario_" + i).val().replace(/,/g, '');
                var importe = $("#importe_" + i).val().replace(/,/g, '');
                var moneda = $("#moneda").val();
                var tipocambio = 0;
                var fecha = 0;
                if (moneda == "MXN"){
                    tipocambio = 0;
                    fecha = "0000-00-00";
                } else {
                    tipocambio = $("#tipocambio").val();
                    fecha = $('#fechaCotizacion').val();
                }

                var is_checked = $('#nc_' + i).is(":checked");
                var cotizado = 0;
                if(is_checked == true){
                    cotizado = "N";
                } else if(importe == 0){
                    cotizado = "0";
                } else {
                    cotizado = "S";
                }

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
                        importe: importe,
                        moneda: moneda,
                        tipocambio: tipocambio,
                        fecha: fecha,
                        cotizado: cotizado,
                    }
                });
            }

            $.ajax({
                url: '<?php echo base_url(); ?>index.php/Im_general/updatePMC',
                method: 'POST',
                async: false,
                data: {
                    idImg: idImg,
                    idPog: idPog,
                },
                success: function (returned) {
                    var returned = JSON.parse(returned);

                    var cotizaciones = returned.num_cotizaciones;
                    $("#cotizaciones").val(cotizaciones);


                    var longitudArrPmc = returned.pmc.length;

                    // Create our number formatter.
                    var formatter = new Intl.NumberFormat('en-US', {
                        style: 'decimal',
                        minimumFractionDigits: 2,
                    });

                    for (var i = 0; i < longitudArrPmc; i++){
                        console.log(returned.pmc[i]);
                        $("#pmc_" + (i+1)).val(formatter.format(returned.pmc[i]));
                    }

                    var longitudCPP = returned.arr_cpp.length;
                    for (var i = 0; i < longitudCPP; i++){
                        $("#cpp_" + (i+1)).val(returned.arr_cpp[i]);
                    }
                    //console.log(returned.arr_cpp);

                }
            });

            myAlertTop();
        });

    });


</script>