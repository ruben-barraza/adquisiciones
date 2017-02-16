<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Edit</h2>
                <ul class="nav navbar-right panel_toolbox">
                  	<li>
                  		<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  	</li>
                </ul>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
	          	<?php echo validation_errors(); ?>
				<?php echo form_open('almacen/edit/'.$almacen['id'],array("class"=>"form-horizontal")); ?>

					<div class="form-group">
						<label for="centroMM" class="col-md-4 control-label">CentroMM</label>
						<div class="col-md-8">
							<input type="text" name="centroMM" value="<?php echo ($this->input->post('centroMM') ? $this->input->post('centroMM') : $almacen['centroMM']); ?>" class="form-control" id="centroMM" />
						</div>
					</div>
					<div class="form-group">
							<label for="idEmpleadoResponsable" class="col-md-4 control-label">IdEmpleadoResponsable</label>
							<div class="col-md-8">
								<select name="idEmpleadoResponsable" class="form-control">
									<option value="">select empleado</option>
									<?php 
									foreach($all_listaempleado as $empleado)
									{
										$selected = ($empleado['id'] == $almacen['idEmpleadoResponsable']) ? ' selected="selected"' : "";

										echo '<option value="'.$empleado['id'].'" '.$selected.'>'.$empleado['rpe'].'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
						<label for="nombre" class="col-md-4 control-label">Nombre</label>
						<div class="col-md-8">
							<input type="text" name="nombre" value="<?php echo ($this->input->post('nombre') ? $this->input->post('nombre') : $almacen['nombre']); ?>" class="form-control" id="nombre" />
						</div>
					</div>
					<div class="form-group">
						<label for="domicilio" class="col-md-4 control-label">Domicilio</label>
						<div class="col-md-8">
							<input type="text" name="domicilio" value="<?php echo ($this->input->post('domicilio') ? $this->input->post('domicilio') : $almacen['domicilio']); ?>" class="form-control" id="domicilio" />
						</div>
					</div>
					<div class="form-group">
							<label for="idMunicipio" class="col-md-4 control-label">IdMunicipio</label>
							<div class="col-md-8">
								<select name="idMunicipio" class="form-control">
									<option value="">select municipio</option>
									<?php 
									foreach($all_listamunicipio as $municipio)
									{
										$selected = ($municipio['id'] == $almacen['idMunicipio']) ? ' selected="selected"' : "";

										echo '<option value="'.$municipio['id'].'" '.$selected.'>'.$municipio['nombre'].'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
						<label for="telefono" class="col-md-4 control-label">Telefono</label>
						<div class="col-md-8">
							<input type="text" name="telefono" value="<?php echo ($this->input->post('telefono') ? $this->input->post('telefono') : $almacen['telefono']); ?>" class="form-control" id="telefono" />
						</div>
					</div>
					<div class="form-group">
						<label for="codigoPostal" class="col-md-4 control-label">CodigoPostal</label>
						<div class="col-md-8">
							<input type="text" name="codigoPostal" value="<?php echo ($this->input->post('codigoPostal') ? $this->input->post('codigoPostal') : $almacen['codigoPostal']); ?>" class="form-control" id="codigoPostal" />
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-8">
							<button type="submit" class="btn btn-success">
								<i class="fa fa-check"></i> Save
							</button>
				        </div>
					</div>
					
				<?php echo form_close(); ?>			
			</div>
        </div>
  	</div>
</div>
