<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<style>

    .hidden {
        display: none;
    }
</style>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Agregar SOLCON</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php echo validation_errors(); ?>
                <?php echo form_open('solcon/add',array("class"=>"form-horizontal")); ?>

                <div class="form-group">
                    <label for="solcon" class="col-md-2 control-label">SOLCON</label>
                    <div class="col-md-2">
                        <div class="input-group">
                            <input type="text" id="solcon" name="solcon" maxlength="10" class="form-control pull-right" />
                            <span class="input-group-addon">
                            	<i class="glyphicon glyphicon-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="justificacion" class="col-md-2 control-label">Justificación</label>
                    <div class="col-md-4">
                        <textarea name="justificacion" class="form-control" id="justificacion" readonly="true" rows="6" maxlength="1000" ></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="titulo" class="col-md-2 control-label">Titulo</label>
                    <div class="col-md-2">
                        <input type="text" readonly="true" name="titulo" value="<?php echo $this->input->post('titulo'); ?>" class="form-control" id="titulo" maxlength="50" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="anioEjercicio" class="col-md-2 control-label">Año ejercicio</label>
                    <div class="col-md-2">
                        <input type="text" name="anioEjercicio" value="<?php echo $this->input->post('anioEjercicio'); ?>" class="form-control" id="anioEjercicio" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="origenRecurso" class="col-md-2 control-label">Origen del Recurso</label>
                    <div class="col-md-4">
                        <select id="origenRecurso" name="origenRecurso" class="form-control autorizacion">
                            <option value="0"> Seleccione</option>
                            <?php
                            $origen_values = array(
                                'PRO'=>'PROYECTO ADQUISICIONES LOCAL',
                                'CON'=>'ADQUISICIONES CONSOLIDADAS',
                            );

                            foreach($origen_values as $value => $display_text)
                            {
                                $selected = ($value == $this->input->post('origenRecurso')) ? ' selected="selected"' : "";
                                echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tipoCompra" class="col-md-2 control-label">Tipo de Compra</label>
                    <div class="col-md-4">
                        <select id="tipoCompra" name="tipoCompra" class="form-control autorizacion">
                            <option value="0"> Seleccione</option>
                            <?php
                            $tipocompra_values = array(
                                'NUE'=>'LOCAL NUEVO',
                                'LOC'=>'AMPLIACIÓN LOCAL',
                                'AMP'=>'AMPLIACIÓN CONSOLIDADA',
                                'SOC'=>'AMPLIACIÓN OTRA SOCIEDAD',
                                'MEX'=>'COMPRA MÉXICO',
                                'CON'=>'CONSOLIDADA',
                            );

                            foreach($tipocompra_values as $value => $display_text)
                            {
                                $selected = ($value == $this->input->post('tipoCompra')) ? ' selected="selected"' : "";
                                echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="seccion-oculta form-group hidden">
                    <label for="idFamilia" class="col-md-2 control-label">Familia</label>
                    <div class="col-md-4">
                        <select id="idFamilia" name="idFamilia" class="form-control">
                            <option value="0">Seleccione</option>
                            <?php
                            foreach ($familias as $i) {
                                $selected = ($i == $this->input->post('idFamilia')) ? ' selected="selected"' : "";
                                echo '<option value="'. $i->id .'" '.$selected.'>'. $i->descripcion .'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="idAt1" class="col-md-2 control-label">Autorización 1</label>
                    <div class="col-md-4">
                        <select id="idAt1" name="idAt1" class="form-control autorizacion">
                            <option value="0"> Seleccione</option>
                            <?php
                            foreach($autorizacion as $at)
                            {
                                $selected = ($at->id == $this->input->post('idAt1')) ? ' selected="selected"' : "";
                                echo '<option value="'.$at->id.'" '.$selected.'>'.sprintf("%'03d", $at->numero).' / '.$at->año.' - '.$at->descripcion.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="idAt2" class="col-md-2 control-label">Autorización 2</label>
                    <div class="col-md-4">
                        <select id="idAt2" name="idAt2" class="form-control autorizacion" disabled>
                            <option value="0"> Seleccione</option>
                            <?php
                            foreach($autorizacion as $at)
                            {
                                $selected = ($at->id == $this->input->post('idAt2')) ? ' selected="selected"' : "";
                                echo '<option value="'.$at->id.'" '.$selected.'>'.sprintf("%'03d", $at->numero).' / '.$at->año.' - '.$at->descripcion.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="idAt3" class="col-md-2 control-label">Autorización 3</label>
                    <div class="col-md-4">
                        <select id="idAt3" name="idAt3" class="form-control autorizacion" disabled>
                            <option value="0"> Seleccione</option>
                            <?php
                            foreach($autorizacion as $at)
                            {
                                $selected = ($at->id == $this->input->post('idAt3')) ? ' selected="selected"' : "";
                                echo '<option value="'.$at->id.'" '.$selected.'>'.sprintf("%'03d", $at->numero).' / '.$at->año.' - '.$at->descripcion.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <hr />

                <div class = "col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Guardar
                    </button>
                    <a href="<?php echo site_url('solcon/index/'); ?>" id="botonCancelar" class="btn btn-danger">
                        <span class="fa fa-ban"></span> Cancelar
                    </a>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">


    $(document).ready(function() {

        $("#solcon").on('keyup', function (e) {
            if ($(this).val().length == 9) {
                var capture = $('#solcon').val();
                var solcon = "0" + capture;
                getSolconDetalle(solcon);
            } else if ($(this).val().length == 10){
                var solcon = $('#solcon').val();
                getSolconDetalle(solcon);
            }
        });

        function getSolconDetalle(solcon){
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/Solcon/buscarSolconDetalle',
                method: 'POST',
                data: {
                    solcon: solcon
                },
                success: function (returned) {
                    var returned = JSON.parse(returned);
                    var justificacion = (returned.detalle)[0].JUSTIFICACION;
                    var titulo = (returned.detalle)[0].TITULO;
                    $("#justificacion").val(justificacion);
                    $("#titulo").val(titulo);
                }
            });
        }

        //Oculta secciones dependiendo de la elección de tipo de proveedor
        $('#tipoCompra').change(function(){
            var val = $(this).val();
            var origenRecurso = $("#origenRecurso").val();

            if (val == "NUE" && origenRecurso == "PRO"){
                $('.seccion-oculta').removeClass('hidden');
                $('.seccion-oculta').show();
            } else {
                $('.seccion-oculta').hide();
            }
        });

        $('select.autorizacion').change(function() {
            var hidden = [];
            // Get the values that should be hidden
            $('select.autorizacion').each(function() {
                var val = $(this).find('option:selected').val();
                if(val > 0) {
                    hidden.push($(this).find('option:selected').val());
                }
            });
            // Show all options...
            $('select.autorizacion option').show().removeAttr('disabled');
            // ...and hide those that should be invisible
            for(var i in hidden) {
                // Note the not(':selected'); we don't want to hide the option from where
                // it's active. The hidden option should also be disabled to prevent it
                // from submitting accidentally (just in case).
                $('select.autorizacion option[value='+hidden[i]+']')
                    .not(':selected')
                    .hide()
                    .attr('disabled', 'disabled');
            }
        });

        $('#idAt1').on('change', function() {
            if(this.value != 0){
                $('#idAt2').prop("disabled", false);
            } else {
                $('#idAt2').prop("disabled", true);
                $('#idAt3').prop("disabled", true);
                $('#idAt2').val("0");
                $('#idAt3').val("0");
            }
        })

        $('#idAt2').on('change', function() {
            if(this.value != 0){
                $('#idAt3').prop("disabled", false);
            } else {
                $('#idAt3').prop("disabled", true);
                $('#idAt3').val("0");
            }
        })

    });


</script>