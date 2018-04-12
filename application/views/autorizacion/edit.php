<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Editar autorización</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php echo validation_errors(); ?>
                <?php echo form_open('autorizacion/edit/'.$autorizacion['id'],array("class"=>"form-horizontal")); ?>

                <div class="form-group">
                    <label for="numero" class="col-md-2 control-label">Número</label>
                    <div class="col-md-1">
                        <input type="text" name="numero" value="<?php echo ($this->input->post('numero') ? $this->input->post('numero') : $autorizacion['numero']); ?>" class="form-control" id="numero" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="año" class="col-md-2 control-label">Año</label>
                    <div class="col-md-1">
                        <input type="text" name="año" value="<?php echo ($this->input->post('año') ? $this->input->post('año') : $autorizacion['año']); ?>" class="form-control" id="año" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="descripcion" class="col-md-2 control-label">Descripción</label>
                    <div class="col-md-5">
                        <input type="text" name="descripcion" value="<?php echo ($this->input->post('descripcion') ? $this->input->post('descripcion') : $autorizacion['descripcion']); ?>" class="form-control" id="descripcion" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="descripcionDetallada" class="col-md-2 control-label">Descripción Detallada</label>
                    <div class="col-md-5">
                        <textarea rows="5" name="descripcionDetallada" class="form-control" id="descripcionDetallada" maxlength="500"><?php echo ($this->input->post('descripcionDetallada') ? $this->input->post('descripcionDetallada') : $autorizacion['descripcionDetallada']); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fondo" class="col-md-2 control-label">Fondo</label>
                    <div class="col-md-4">
                        <select id="fondo" name="fondo" class="form-control">
                            <option value="0"> Seleccione</option>
                            <?php
                            $fondo_values = array(
                                '71'=>'071 - OBRAS AL 100%',
                            );

                            foreach($fondo_values as $value => $display_text)
                            {
                                $selected = ($value == $autorizacion['idFondo']) ? ' selected="selected"' : "";
                                echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="importe" class="col-md-2 control-label">Importe Total ($)</label>
                    <div class="col-md-4">
                        <input type="text" name="importe" value="<?php echo ($this->input->post('importe') ? $this->input->post('importe') : number_format($autorizacion['importe'], 2, '.', ',')); ?>" class="form-control precio" id="importe" />
                    </div>
                </div>

                <hr />
                <div class = "col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Guardar
                    </button>
                    <a href="<?php echo site_url('autorizacion/index/'); ?>" id="botonCancelar" class="btn btn-danger">
                        <span class="fa fa-ban"></span> Cancelar
                    </a>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>