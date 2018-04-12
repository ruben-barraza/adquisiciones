<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Agregar autorización</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php echo validation_errors(); ?>
                <?php echo form_open('autorizacion/add',array("class"=>"form-horizontal")); ?>

                <div class="form-group">
                    <label for="numero" class="col-md-2 control-label">Número</label>
                    <div class="col-md-1">
                        <input type="text" name="numero" value="<?php echo $this->input->post('numero'); ?>" class="form-control" id="numero" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="año" class="col-md-2 control-label">Año</label>
                    <div class="col-md-1">
                        <input type="text" name="año" value="<?php echo $this->input->post('año'); ?>" class="form-control" id="año" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="descripcion" class="col-md-2 control-label">Descripción</label>
                    <div class="col-md-5">
                        <input type="text" name="descripcion" value="<?php echo $this->input->post('descripcion'); ?>" class="form-control" id="descripcion" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="descripcionDetallada" class="col-md-2 control-label">Descripción Detallada</label>
                    <div class="col-md-5">
                        <textarea rows="5" name="descripcionDetallada" class="form-control" id="descripcionDetallada" maxlength="500"><?php echo $this->input->post('descripcionDetallada'); ?></textarea>
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
                                $selected = ($value == $this->input->post('fondo')) ? ' selected="selected"' : "";
                                echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="importe" class="col-md-2 control-label">Importe Total ($)</label>
                    <div class="col-md-4">
                        <input type="text" name="importe" value="<?php echo $this->input->post('importe'); ?>" class="form-control precio" id="importe" />
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

<script type="text/javascript">
    $(document).ready(function () {


        $('.precio').keyup(function(event) {

            // skip for arrow keys
            if(event.which >= 37 && event.which <= 40) return;

            // format number
            $(this).val(function(index, value) {
                value = value.replace(/,/g,''); // remove commas from existing input
                return FormatNumber(value);
            });
        });

        function FormatNumber(total) {
            //Seperates the components of the number
            var components = total.toString().split(".");
            //Comma-fies the first part
            components [0] = components [0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            //Combines the two sections
            return components.join(".");
        }
    });


</script>