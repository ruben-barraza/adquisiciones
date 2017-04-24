<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

<style>
	td .btn.aligned {
  		position: absolute;
  		margin-top: 7px;
  		float: right;
  		margin-left: 5px;
	}

	td .btn.lowered {
  		margin-top: 7px;
	}

	td input {
  		float: left;
	}

	.spacer {
  		padding-left: 30px !important;
	}
</style>

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
						<div class="col-md-2">
							<input type="text" id="empleadoElabora" name="empleadoElabora" maxlength="5" class="form-control"/>
						</div>
						
						<div class="col-md-1">
							<a id="buscarEmpleadoElabora" class="btn btn-primary">
								<i class="fa"></i> Buscar
							</a>
						</div>
						
						<div class="col-md-4">
							<input type="text" id="empleadoElabora2" name="empleadoElabora2" class="form-control" readonly/>
						</div>
					</div>
					
					<div class="form-group">
						<label for="idEmpleadoAutoriza" class="col-md-1 control-label">Aprueba</label>
						<div class="col-md-2">
							<input type="text" id="empleadoAutoriza" name="empleadoAutoriza" maxlength="5" class="form-control"/>
						</div>
						
						<div class="col-md-1">
							<a id="buscarEmpleadoAprueba" class="btn btn-primary">
								<i class="fa "></i> Buscar
							</a>
						</div>
						
						<div class="col-md-4">
							<input type="text" id="empleadoAutoriza2" name="empleadoAutoriza2" class="form-control" readonly/>
						</div>
					</div>

					<hr />

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
							<td >
								<input type="text" name="partida_1" id="partida_1" class="form-control" disabled/>
							</td>
							<td >
								<input type="text" name="codigo_1" id="" class="form-control"/>
							</td>
							<td >
								<input type="text" name="descripcion_1" id="descripcion_1" class="form-control" disabled/>
							</td>
							<td >
								<input type="text" name="plazoentrega_1" id="plazoentrega_1" class="form-control"/>
							</td>
							<td >
								<input type="text" name="cantidad_1" id="cantidad_1" class="form-control"/>
							</td>
							<td class="col-md-1">
								<input type="text" name="um_1" id="um_1" class="form-control" disabled/>
							</td>
							<td >
								<select name="lugarentrega_1" id="lugarentrega_1"></select>
							</td>
							<td class="col-md-2">
								<input type="text" name="direccionentrega_1" id="direccionentrega_1" class="form-control"/>
							</td>
							<td id="td-not">
								<a title="Eliminar" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
								<a title="Detalles" class="btn btn-info btn-xs"><span class="fa fa-info-circle"></span></a>
							</td>
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
							<td>
								<input type="text" name="" class="form-control" disabled/>
								<a title="Quitar" class="btn btn-danger btn-xs aligned"><span class="fa fa-times"></span></a>
							</td>
							<td class="spacer">
								<input type="text" name="" class="form-control" disabled/>
								<a title="Quitar" class="btn btn-danger btn-xs aligned"><span class="fa fa-times"></span></a>
							</td>
							<td class="spacer">
								<input type="text" name="" class="form-control" disabled/>
								<a title="Quitar" class="btn btn-danger btn-xs aligned"><span class="fa fa-times"></span></a>
							</td>
							<td class="spacer">
								<a title="Quitar" class="btn btn-danger btn-xs lowered"><span class="fa fa-times"></span></a>
							</td>
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

					<hr />

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

<script type="text/javascript">
	$(document).ready(function() {

		
		$("#buscarEmpleadoElabora").click(function(){
			var rpe = $('#empleadoElabora').val();
			var nombre = "";
			$.ajax({
				url: '<?php echo base_url(); ?>index.php/Im_general/obtenerNombreEmpleado',
				method: 'POST',
				data: {
					rpe: rpe
				},
				success: function (returned) {
					var returned = JSON.parse(returned);
					
            		jQuery.each( returned.nombre, function( i, val ) {                   
              			nombre = val.nombre + " " + val.apellidoPaterno + " " + val.apellidoMaterno;
            		});
					$("#empleadoElabora2").val(nombre);
				}
			});
		});

		$("#buscarEmpleadoAprueba").click(function(){
			var rpe = $('#empleadoAutoriza').val();
			var nombre = "";
			$.ajax({
				url: '<?php echo base_url(); ?>index.php/Im_general/obtenerNombreEmpleado',
				method: 'POST',
				data: {
					rpe: rpe
				},
				success: function (returned) {
					var returned = JSON.parse(returned);
					
            		jQuery.each( returned.nombre, function( i, val ) {                   
              			nombre = val.nombre + " " + val.apellidoPaterno + " " + val.apellidoMaterno;
            		});
					$("#empleadoAutoriza2").val(nombre);
				}
			});
     	});




	});
</script>