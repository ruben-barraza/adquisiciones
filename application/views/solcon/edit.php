<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Editar SOLCON</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php echo validation_errors(); ?>
                <?php echo form_open('solcon/edit/'.$solcon['id'],array("class"=>"form-horizontal")); ?>

                <div class="form-group">
                    <label for="solcon" class="col-md-2 control-label">SOLCON</label>
                    <div class="col-md-2">
                        <input type="text" name="solcon" value="<?php echo ($this->input->post('solcon') ? $this->input->post('solcon') : $solcon['solcon']); ?>" class="form-control" id="solcon" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="anioEjercicio" class="col-md-2 control-label">Año Ejercicio</label>
                    <div class="col-md-2">
                        <input type="text" name="anioEjercicio" value="<?php
                        if ($solcon['anioEjercicio'] != 0)
                            echo $solcon['anioEjercicio'];
                        else
                            echo "";
                        ?>" class="form-control" id="anioEjercicio"/>
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
                                $selected = ($value == $solcon['origenRecurso']) ? ' selected="selected"' : "";
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
                                $selected = ($value == $solcon['tipoCompra']) ? ' selected="selected"' : "";
                                echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="seccion-oculta form-group hidden">
                    <div class="form-group">
                        <label for="idFamilia" class="col-md-2 control-label">Familia</label>
                        <div class="col-md-4">
                            <select id="idFamilia" name="idFamilia" class="form-control">
                                <option value="0">Seleccione</option>
                                <?php
                                foreach ($familias as $i) {
                                    $selected = ($i->id == $solcon["idFamilia"]) ? ' selected="selected"' : "";
                                    echo '<option value="'. $i->id .'" '.$selected.'>'. $i->descripcion .'</option>';
                                }
                                ?>
                            </select>
                        </div>
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
                                $selected = ($at->id == $solcon['idAt1']) ? ' selected="selected"' : "";
                                echo '<option value="'.$at->id.'" '.$selected.'>'.sprintf("%'03d", $at->numero).' / '.$at->año.' - '.$at->descripcion.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="idAt2" class="col-md-2 control-label">Autorización 2</label>
                    <div class="col-md-4">
                        <select id="idAt2" name="idAt2" class="form-control autorizacion">
                            <option value="0"> Seleccione</option>
                            <?php
                            foreach($autorizacion as $at)
                            {
                                $selected = ($at->id == $solcon['idAt2']) ? ' selected="selected"' : "";
                                echo '<option value="'.$at->id.'" '.$selected.'>'.sprintf("%'03d", $at->numero).' / '.$at->año.' - '.$at->descripcion.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="idAt3" class="col-md-2 control-label">Autorización 3</label>
                    <div class="col-md-4">
                        <select id="idAt3" name="idAt3" class="form-control autorizacion">
                            <option value="0"> Seleccione</option>
                            <?php
                            foreach($autorizacion as $at)
                            {
                                $selected = ($at->id == $solcon['idAt3']) ? ' selected="selected"' : "";
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

        var origenRecurso = $('#origenRecurso').val();
        var tipoCompra = $('#tipoCompra').val();

        if(origenRecurso == "PRO" && tipoCompra == "NUE"){
            $('.seccion-oculta').hide();
        }


        //Oculta secciones dependiendo de la elección de tipo de proveedor
        $('#origenRecurso').change(function(){
            var val = $(this).val();
            if (val != "PRO"){
                $('#tipoCompra').val("0");
                $('#idFamilia').val("0");
                $('.seccion-oculta').hide();
            }
        });

        //Oculta secciones dependiendo de la elección de tipo de proveedor
        $('#tipoCompra').change(function(){
            var val = $(this).val();

            if (val == "NUE" || val == "0"){
                $('.seccion-oculta').hide();
                $('#idFamilia').val("0");
            } else {
                $('.seccion-oculta').removeClass('hidden');
                $('.seccion-oculta').show();
            }
        });

        $('select.autorizacion').change(function() {
            var hidden = [];
            $('select.autorizacion').each(function() {
                var val = $(this).find('option:selected').val();
                if(val > 0) {
                    hidden.push($(this).find('option:selected').val());
                }
            });
            $('select.autorizacion option').show().removeAttr('disabled');
            for(var i in hidden) {
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