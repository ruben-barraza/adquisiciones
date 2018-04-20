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
                    <label for="origenRecurso" class="col-md-2 control-label">Origen del Recurso</label>
                    <div class="col-md-2">
                        <input type="text" name="origenRecurso" value="<?php echo ($this->input->post('origenRecurso') ? $this->input->post('origenRecurso') : $solcon['origenRecurso']); ?>" class="form-control" id="origenRecurso" />
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
                <div class="form-group">
                    <label for="tipoCompra" class="col-md-2 control-label">Tipo de Compra</label>
                    <div class="col-md-4">
                        <input type="text" name="tipoCompra" value="<?php echo ($this->input->post('tipoCompra') ? $this->input->post('tipoCompra') : $solcon['tipoCompra']); ?>" class="form-control" id="tipoCompra" />
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
    });
</script>