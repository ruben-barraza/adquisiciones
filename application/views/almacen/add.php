
<?php
/**
 * @var CI_Controller $this
 */
echo $this->uri->segment(1);
?>



<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Agregar almacén</h2>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
				<?php echo validation_errors(); ?>
				<?php echo form_open('almacen/add',array("class"=>"form-horizontal")); ?>
					<div class="form-group">
						<label for="centroMM" class="col-md-4 control-label">Centro MM</label>
						<div class="col-md-8">
							<input type="text" name="centroMM" value="<?php echo $this->input->post('centroMM'); ?>" class="form-control" id="centroMM" maxlength="4"/>
						</div>
					</div>
					<div class="form-group">
						<label for="idEmpleadoResponsable" class="col-md-4 control-label">Empleado Responsable</label>
						<div class="col-md-8">
							<select name="idEmpleadoResponsable" class="form-control">
								<option value="0">Seleccione</option>
								<?php 
									foreach($all_listaempleado as $empleado)
									{
										$selected = ($empleado['id'] == $this->input->post('idEmpleadoResponsable')) ? ' selected="selected"' : "";
										echo '<option value="'.$empleado['id'].'" '.$selected.'>'.$empleado['rpe'].' - '.$empleado['nombre'].' '.$empleado['apellidoPaterno'].' '.$empleado['apellidoMaterno'].'</option>';
									} 
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="nombre" class="col-md-4 control-label">Nombre</label>
						<div class="col-md-8">
							<input type="text" name="nombre" value="<?php echo $this->input->post('nombre'); ?>" class="form-control" id="nombre" maxlength="150"/>
						</div>
					</div>
					<div class="form-group">
						<label for="domicilio" class="col-md-4 control-label">Domicilio</label>
						<div class="col-md-8">
							<input type="text" name="domicilio" value="<?php echo $this->input->post('domicilio'); ?>" class="form-control" id="domicilio" maxlength="150"/>
						</div>
					</div>
					<div class="form-group">
						<label for="codigoPostal" class="col-md-4 control-label">Código Postal</label>
						<div class="col-md-8">
							<input type="text" name="codigoPostal" value="<?php echo $this->input->post('codigoPostal'); ?>" class="form-control" id="codigoPostal" maxlength="5"/>
						</div>
					</div>
					<div class="form-group">
                    	<label for="idEstado" class="col-md-4 control-label">Estado</label>
                        <div class="col-md-8">
                           	 <select id="idEstado" name="idEstado" class="form-control">
								<option value="0">Seleccione</option>
								<?php 
									foreach ($estados as $i) {
										echo '<option value="'. $i->id .'">'. $i->nombre .'</option>';
									}
								?>
                        	</select>
                        </div>
					</div>
					<div class="form-group">
						<label for="idMunicipio" class="col-md-4 control-label">Municipio</label>
						<div class="col-md-8">
							<select id="idMunicipio" name="idMunicipio" class="form-control">
								<option value="0">Seleccione</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="telefono" class="col-md-4 control-label">Teléfono</label>
						<div class="col-md-8">
							<input type="text" name="telefono" value="<?php echo $this->input->post('telefono'); ?>" class="form-control" id="telefono" maxlength="10"/>
						</div>
					</div>

					<div class = "col-sm-offset-4 col-sm-8">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-check"></i> Guardar
						</button>
						<a href="<?php echo site_url('almacen/index/'); ?>" id="botonCancelar" class="btn btn-danger">
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
		$("#idEstado option:contains('NINGUNO')").remove();

		$("#idEstado").change(function() {
    		$("#idEstado option:selected").each(function() {
                idEstado = $('#idEstado').val();
                $.post("<?php echo base_url(); ?>index.php/controllerComboBoxes/fillMunicipios", {
                	idEstado : idEstado
                }, function(data) {
                   $("#idMunicipio").html(data);
                });
            });
        });
		
    });
</script>