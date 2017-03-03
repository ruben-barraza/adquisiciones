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
				<?php echo form_open('im_general/add',array("class"=>"form-horizontal")); ?>

					<div class="form-group">
							<label for="idFamilia" class="col-md-1 control-label">Familias</label>
							<div class="col-md-6">
								<select id="idFamilia" name="idFamilia" class="form-control">
									<option value="0">Seleccione</option>
										<?php 
											foreach ($familias as $i) {
												echo '<option value="'. $i->id .'">'. $i->clave .'</option>';
											}
										?>
								</select>
							</div>
						</div>
					
					<div class="form-group">
						<label for="titulo" class="col-md-1 control-label">Título</label>
						<div class="col-md-6">
							<input type="text" name="titulo" value="<?php echo $this->input->post('titulo'); ?>" class="form-control" id="titulo" />
						</div>
					</div>

					<div class="form-group">
						<label for="idEmpleadoFormula" class="col-md-1 control-label">Elabora</label>
						<div class="col-md-3">
							<input type="text" name="empleadoElabora" class="form-control"/>
						</div>
						
						<div class="col-md-1">
							<a id="buscarEmpleado" class="btn btn-primary">
								<i class="fa"></i> Buscar
							</a>
						</div>
						
						<div class="col-md-4">
							<input type="text" name="empleadoElabora2" class="form-control"/>
						</div>
					</div>
					
					<div class="form-group">
						<label for="idEmpleadoAutoriza" class="col-md-1 control-label">Aprueba</label>
						<div class="col-md-3">
							<input type="text" name="empleadoAutoriza" class="form-control"/>
						</div>
						
						<div class="col-md-1">
							<a id="buscarEmpleado" class="btn btn-primary">
								<i class="fa "></i> Buscar
							</a>
						</div>
						
						<div class="col-md-4">
							<input type="text" name="empleadoAutoriza2" class="form-control"/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-2">
							<a class="btn btn-primary">
								<i class="fa "></i> Cargar conceptos de familia
							</a>
						</div>
					</div>

					<table class="table table-hover">
						<thead class="thead-inverse">
							<th>Partida</th>
							<th>Código</th>
							<th>Descripción</th>
							<th>Plazo de entrega</th>
							<th>Cantidad</th>
							<th>UM</th>
							<th>Lugar de entrega</th>
							<th>Dirección de entrega</th>
							<th></th>
						</thead>
						<tbody>
							<td class="col-md-1"></td>
							<td class="col-md-1">
								<input type="text" name="" class="form-control"/>
							</td>
							<td class="col-md-2"></td>
							<td class="col-md-1">
								<input type="text" name="" class="form-control"/>
							</td>
							<td class="col-md-1">
								<input type="text" name="" class="form-control"/>
							</td>
							<td class="col-md-1"></td>
							<td class="col-md-1"></td>
							<td class="col-md-2">
								<input type="text" name="" class="form-control"/>
							</td>
							<td class="col-md-1">Eliminar/Detalle</td>
						</tbody>
					</table>
					
					
					<hr />
					
					<h4>Proveedores</h4>

					<div class="form-group">
						<div class="col-md-2">
							<a class="btn btn-primary">
								<i class="fa "></i> Cargar proveedores de familia
							</a>
						</div>
					</div>
					
					<table class="table table-hover">
						<thead class="thead-inverse">
							<th>Clave</th>
							<th>Razón social</th>
							<th>Contacto 1</th>
							<th>Contacto 2</th>
							<th>Contacto 3</th>
							<th></th>
						</thead>
						<tbody>
							<td class="col-md-1">
								<input type="text" name="" class="form-control"/>
							</td>
							<td class="col-md-3">
								<input type="text" name="" class="form-control"/>
							</td>
							<td class="col-md-2"></td>
							<td class="col-md-2"></td>
							<td class="col-md-2"></td>
							<td class="col-md-1">Eliminar/Detalle</td>
						</tbody>
					</table>
					<!--
					<div class="form-group">
							<label for="idEmpleadoFormula" class="col-md-4 control-label">Elabora</label>
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
							<label for="idEmpleadoAutoriza" class="col-md-4 control-label">Aprueba</label>
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
					-->
					<div class="form-group">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-success">
								<i class="fa fa-check"></i> Guardar
							</button>
							<a class="btn btn-success">
								<i class="fa "></i> Generar oficios IM
							</a>
				        </div>
					</div>

				<?php echo form_close(); ?>
			</div>
    	</div>
  	</div>
</div>