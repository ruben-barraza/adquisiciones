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
				<?php echo form_open('im_general/add',array("class"=>"form-horizontal")); ?>

					<div class="form-group">
						<label for="titulo" class="col-md-4 control-label">Titulo</label>
						<div class="col-md-8">
							<input type="text" name="titulo" value="<?php echo $this->input->post('titulo'); ?>" class="form-control" id="titulo" />
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
							<label for="idEmpleadoAutoriza" class="col-md-4 control-label">IdEmpleadoAutoriza</label>
							<div class="col-md-8">
								<select name="idEmpleadoAutoriza" class="form-control">
									<option value="">select empleado</option>
									<?php 
									foreach($all_listaempleado as $empleado)
									{
										$selected = ($empleado['id'] == $this->input->post('idEmpleadoAutoriza')) ? ' selected="selected"' : "";

										echo '<option value="'.$empleado['id'].'" '.$selected.'>'.$empleado['rpe'].'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
						<label for="fechaElaboracion" class="col-md-4 control-label">FechaElaboracion</label>
						<div class="col-md-8">
							<input type="text" name="fechaElaboracion" value="<?php echo $this->input->post('fechaElaboracion'); ?>" class="form-control" id="fechaElaboracion" />
						</div>
					</div>
					<div class="form-group">
							<label for="idMunicipioElaboracion" class="col-md-4 control-label">IdMunicipioElaboracion</label>
							<div class="col-md-8">
								<select name="idMunicipioElaboracion" class="form-control">
									<option value="">select municipio</option>
									<?php 
									foreach($all_listamunicipio as $municipio)
									{
										$selected = ($municipio['id'] == $this->input->post('idMunicipioElaboracion')) ? ' selected="selected"' : "";

										echo '<option value="'.$municipio['id'].'" '.$selected.'>'.$municipio['nombre'].'</option>';
									} 
									?>
								</select>
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