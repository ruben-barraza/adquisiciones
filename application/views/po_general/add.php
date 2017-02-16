<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Add</h2>
                <ul class="nav navbar-right panel_toolbox">
                  	<li>
                  		<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  	</li>
                </ul>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
				<?php echo validation_errors(); ?>
				<?php echo form_open('po_general/add',array("class"=>"form-horizontal")); ?>

					<div class="form-group">
							<label for="tipo" class="col-md-4 control-label">Tipo</label>
							<div class="col-md-8">
								<select name="tipo" class="form-control">
									<option value="">select</option>
									<?php 
									$tipo_values = array(
						'B'=>'Bienes',
						'S'=>'Servicios',
					);

									foreach($tipo_values as $value => $display_text)
									{
										$selected = ($value == $this->input->post('tipo')) ? ' selected="selected"' : "";

										echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
						<label for="domicilio" class="col-md-4 control-label">Domicilio</label>
						<div class="col-md-8">
							<input type="text" name="domicilio" value="<?php echo $this->input->post('domicilio'); ?>" class="form-control" id="domicilio" />
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
										$selected = ($empleado['id'] == $this->input->post('idEmpleadoResponsable')) ? ' selected="selected"' : "";

										echo '<option value="'.$empleado['id'].'" '.$selected.'>'.$empleado['rpe'].'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
							<label for="idEmpleadoFormula" class="col-md-4 control-label">IdEmpleadoFormula</label>
							<div class="col-md-8">
								<select name="idEmpleadoFormula" class="form-control">
									<option value="">select empleado</option>
									<?php 
									foreach($all_listaempleado as $empleado)
									{
										$selected = ($empleado['id'] == $this->input->post('idEmpleadoFormula')) ? ' selected="selected"' : "";

										echo '<option value="'.$empleado['id'].'" '.$selected.'>'.$empleado['rpe'].'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
						<label for="fechaLimitePresentacion" class="col-md-4 control-label">FechaLimitePresentacion</label>
						<div class="col-md-8">
							<input type="text" name="fechaLimitePresentacion" value="<?php echo $this->input->post('fechaLimitePresentacion'); ?>" class="form-control" id="fechaLimitePresentacion" />
						</div>
					</div>
					<div class="form-group">
						<label for="ccp1" class="col-md-4 control-label">Ccp1</label>
						<div class="col-md-8">
							<input type="text" name="ccp1" value="<?php echo $this->input->post('ccp1'); ?>" class="form-control" id="ccp1" />
						</div>
					</div>
					<div class="form-group">
						<label for="ccp2" class="col-md-4 control-label">Ccp2</label>
						<div class="col-md-8">
							<input type="text" name="ccp2" value="<?php echo $this->input->post('ccp2'); ?>" class="form-control" id="ccp2" />
						</div>
					</div>
					<div class="form-group">
						<label for="ccp3" class="col-md-4 control-label">Ccp3</label>
						<div class="col-md-8">
							<input type="text" name="ccp3" value="<?php echo $this->input->post('ccp3'); ?>" class="form-control" id="ccp3" />
						</div>
					</div>
					<div class="form-group">
						<label for="fechaElaboracion" class="col-md-4 control-label">FechaElaboracion</label>
						<div class="col-md-8">
							<input type="text" name="fechaElaboracion" value="<?php echo $this->input->post('fechaElaboracion'); ?>" class="form-control" id="fechaElaboracion" />
						</div>
					</div>
					<div class="form-group">
						<label for="asunto" class="col-md-4 control-label">Asunto</label>
						<div class="col-md-8">
							<input type="text" name="asunto" value="<?php echo $this->input->post('asunto'); ?>" class="form-control" id="asunto" />
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
										$selected = ($municipio['id'] == $this->input->post('idMunicipio')) ? ' selected="selected"' : "";

										echo '<option value="'.$municipio['id'].'" '.$selected.'>'.$municipio['nombre'].'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
						<label for="fechaUltimaModificacion" class="col-md-4 control-label">FechaUltimaModificacion</label>
						<div class="col-md-8">
							<input type="text" name="fechaUltimaModificacion" value="<?php echo $this->input->post('fechaUltimaModificacion'); ?>" class="form-control" id="fechaUltimaModificacion" />
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