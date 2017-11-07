<style>
    .short-field {
        width: 70px;
    }

    .med-field {
        width: 100px;
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
                            <input name="tipocambio" id="tipocambio" class="form-control" disabled/>
                        </div>
                    </div>

                    <table id="tablaArticulos" class="table table-hover">
                        <thead class="thead-inverse">
                        <th>Partida</th>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>UM</th>
                        <th>Precio Unitario</th>
                        <th>Importe</th>
                        <th>PMC</th>
                        </thead>
                        <tbody>
                        <?php
                        $rows = count($imcConcepto);
                        for($i = 0; $i < $rows; $i++){ ?>
                            <tr>
                                <td>
                                    <input type="text" name="<?php echo "partida_".($i+1) ?>" id="<?php echo "partida_".($i+1) ?>" value="<?php echo $imcConcepto[$i]["partida"] ?>" class="form-control med-field" disabled/>
                                </td>
                                <td>
                                    <input type="text" name="<?php echo "codigo_".($i+1) ?>" id="<?php echo "codigo_".($i+1) ?>" value="<?php echo $imcConcepto[$i]["codigo"] ?>" class="form-control" disabled/>
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
                                    <input type="text" name="<?php echo "preciounitario_".($i+1) ?>" id="<?php echo "preciounitario_".($i+1) ?>" value="" class="form-control med-field precio"/>
                                </td>
                                <td>
                                    <input type="text" name="<?php echo "importe_".($i+1) ?>" id="<?php echo "importe_".($i+1) ?>" value="" class="form-control importe" disabled/>
                                </td>
                                <td>
                                    <input type="text" name="pmc" id="pmc" value="" class="form-control" />
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                    <hr />

                    <div class="form-group">
                        <label for="cotizaciones" class="control-label col-sm-2">Subtotal</label>
                        <div class="col-md-2">
                            <input name="cotizaciones" id="tipocambio" class="form-control" disabled/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cotizaciones" class="control-label col-sm-2">IVA</label>
                        <div class="col-md-2">
                            <input name="cotizaciones" id="tipocambio" class="form-control" disabled/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cotizaciones" class="control-label col-sm-2">Total</label>
                        <div class="col-md-2">
                            <input name="cotizaciones" id="tipocambio" class="form-control" disabled/>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="cotizaciones" class="control-label col-sm-2">Cotizaciones</label>
                    <div class="col-md-1">
                        <input name="cotizaciones" id="tipocambio" class="form-control" disabled/>
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
                    <?php  ?>
                </var>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {


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
            var precio = parseFloat($("#preciounitario_" + $fila).val()) || 0;

            $("#importe_" + $fila).val(cantidad * precio);
        });

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
                                $("#preciounitario_" + (i+1)).val("");
                            }
                            else {
                                $("#preciounitario_" + (i+1)).val(val.preciounitarioIM);
                            }
                            if(val.importeIM == 0){
                                $("#importe_" + (i+1)).val("");
                            }
                            else {
                                $("#importe_" + (i+1)).val(val.importeIM);
                            }
                        });
                    }
                });
            }
        });

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
                    idimg: <?php echo $im_general['id'] ?>,
                    titulo: titulo,
                    empleadoAutorizaRpe: empleadoAutorizaRpe,
                    empleadoFormulaRpe: empleadoFormulaRpe,
                    solped: solped,
                    imcestatus: imcestatus,
                }
            });


            //Guarda los precios
            var prov_id = $('#imc_proveedor').val();
            var longitudTablaArticulo = $("#tablaArticulos tbody tr").length;
            for(i = 1; i <= longitudTablaArticulo; i++) {
                var codigo = $("#codigo_" + i).val();
                var cantidad = $("#cantidad_" + i).val();
                var precio = $("#preciounitario_" + i).val();
                var importe = $("#importe_" + i).val();
                $.ajax({
                    url: '<?php echo base_url();?>index.php/Im_general/updatePreciosIMC',
                    method: 'POST',
                    async: false,
                    data: {
                        idProveedor: prov_id,
                        codigo: codigo,
                        cantidad: cantidad,
                        precio: precio,
                        importe: importe
                    }
                });
            }
        });
    });


</script>