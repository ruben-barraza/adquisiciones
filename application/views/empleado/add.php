<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Agregar</h2>
                <ul class="nav navbar-right panel_toolbox">
                  	<li>
                  		<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  	</li>
                </ul>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
				<?php echo validation_errors(); ?>
				<?php echo form_open('empleado/add',array("class"=>"form-horizontal")); ?>

					<div class="form-group">
						<label for="rpe" class="col-md-4 control-label">RPE</label>
						<div class="col-md-8">
							<input type="text" name="rpe" value="<?php echo $this->input->post('rpe'); ?>" class="form-control" id="rpe" />
						</div>
					</div>
					<div class="form-group">
						<label for="nombre" class="col-md-4 control-label">Nombre</label>
						<div class="col-md-8">
							<input type="text" name="nombre" value="<?php echo $this->input->post('nombre'); ?>" class="form-control" id="nombre" />
						</div>
					</div>
					<div class="form-group">
						<label for="apellidoPaterno" class="col-md-4 control-label">Apellido Paterno</label>
						<div class="col-md-8">
							<input type="text" name="apellidoPaterno" value="<?php echo $this->input->post('apellidoPaterno'); ?>" class="form-control" id="apellidoPaterno" />
						</div>
					</div>
					<div class="form-group">
						<label for="apellidoMaterno" class="col-md-4 control-label">Apellido Materno</label>
						<div class="col-md-8">
							<input type="text" name="apellidoMaterno" value="<?php echo $this->input->post('apellidoMaterno'); ?>" class="form-control" id="apellidoMaterno" />
						</div>
					</div>
					<div class="form-group">
						<label for="titulo" class="col-md-4 control-label">Título</label>
						<div class="col-md-8">
							<input type="text" name="titulo" value="<?php echo $this->input->post('titulo'); ?>" class="form-control" id="titulo" />
						</div>
					</div>
					<div class="form-group">
						<label for="idDepartamento" class="col-md-4 control-label">Departamento</label>
						<div class="col-md-8">
							<select name="idDepartamento" class="form-control">
								<option value="">Seleccione</option>
								<?php 
									foreach($all_listadepartamento as $departamento)
									{
										$selected = ($departamento['id'] == $this->input->post('idDepartamento')) ? ' selected="selected"' : "";

										echo '<option value="'.$departamento['id'].'" '.$selected.'>'.$departamento['nombre'].'</option>';
									} 
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="idCategoria" class="col-md-4 control-label">Categoría</label>
						<div class="col-md-8">
							<select name="idCategoria" class="form-control">
								<option value="">Seleccione</option>
								<?php 
									foreach($all_listacategoria as $categoria)
									{
										$selected = ($categoria['id'] == $this->input->post('idCategoria')) ? ' selected="selected"' : "";

										echo '<option value="'.$categoria['id'].'" '.$selected.'>'.$categoria['nombre'].'</option>';
									} 
								?>
							</select>
						</div>
					</div>
					<div class = "col-sm-offset-4 col-sm-8">
						<a href="<?php echo site_url('empleado/index/'); ?>" id="botonCancelar" class="btn btn-danger">
							<span class="fa fa-ban"></span> Cancelar
						</a>
						<button type="submit" class="btn btn-success">
							<i class="fa fa-check"></i> Guardar
						</button>
					</div>

				<?php echo form_close(); ?>
			</div>
    	</div>
  	</div>
</div>