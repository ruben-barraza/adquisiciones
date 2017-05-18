<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

<style>
	td .btn.aligned {
  		position: absolute;
  		margin-top: 7px;
  		float: right;
  		margin-left: 5px;
	}

	td .lowered {
  		margin-top: 44px;
	}

	td .btn.lowered{
		margin-top: 51px;
	}

	td input {
  		float: left;
		margin-bottom: 10px;
	}

	.spacer {
  		padding-left: 35px !important;
	}

	textarea {
    	resize: none;
		margin-top: 5px;
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
							<div class="input-group">
								<input type="text" id="empleadoElabora" name="empleadoElabora" maxlength="5" class="form-control pull-right" placeholder="Ingrese RPE"/>
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-search"></i>	
								</span>
							</div>
						</div>
						<div class="col-md-4">
							<input type="text" id="empleadoElabora2" name="empleadoElabora2" class="form-control" readonly placeholder="Nombre del empleado"/>
						</div>
					</div>
					
					<div class="form-group">
						<label for="idEmpleadoAutoriza" class="col-md-1 control-label">Aprueba</label>
						<div class="col-md-2">
							<div class="input-group">
								<input type="text" id="empleadoAutoriza" name="empleadoAutoriza" maxlength="5" class="form-control pull-right" placeholder="Ingrese RPE"/>
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-search"></i>	
								</span>
							</div>
						</div>
						
						<div class="col-md-4">
							<input type="text" id="empleadoAutoriza2" name="empleadoAutoriza2" class="form-control" readonly placeholder="Nombre del empleado"/>
						</div>
					</div>

					<hr />

					<div class="form-group">
						<a id="cargarArticulos" class="btn btn-primary">
							<i class="fa "></i> Cargar artículos de familia
						</a>
						<a id="agregarRegistroArticulos" class="btn btn-primary">
							<i class="fa "></i> Agregar registro en blanco
						</a>
					</div>

					<table id="tablaFamilias" class="table table-hover">
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
							<tr>
								<td >
									<input type="text" name="partida_1" id="partida_1" class="form-control" disabled/>
								</td>
								<td >
									<input type="text" name="codigo_1" id="codigo_1" class="form-control"/>
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
									<a title="Eliminar" name="quitararticulo_1" id="quitararticulo_1" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
									<a title="Detalles" class="btn btn-info btn-xs"><span class="fa fa-info-circle"></span></a>
								</td>
							</tr>
						</tbody>
					</table>
					
					
					<hr />
					
					<h4>Proveedores</h4>

					<div class="form-group">
						<a id="cargarProveedores" class="btn btn-primary">
							<i class="fa "></i> Cargar proveedores de familia
						</a>
						<a id="agregarRegistroProveedores" class="btn btn-primary">
							<i class="fa "></i> Agregar registro en blanco
						</a>
					</div>
					
					
					<table id="tablaProveedores" class="table table-hover">
						<thead class="thead-inverse">
							<th>Clave</th>
							<th>Razón social y Dirección</th>
							<th>Contactos</th>
							<th>Teléfonos</th>
							<th></th>
						</thead>
						<tbody>
							<tr>
								<td class="col-md-2">
									<input type="text" name="clave_1" id="clave_1" class="form-control lowered"/>
								</td>
								<td class="col-md-3">
									<textarea name="razonsocial_1" id="razonsocial_1" class="form-control" id="descripcionDetallada"></textarea>
									<textarea name="direccion_1" id="direccion_1" class="form-control lowered2" id="descripcionDetallada"></textarea>
								</td>
								<td class="col-md-4">
									<input type="text" name="contacto1_1" id="contacto1_1" class="form-control" disabled/>
									<input type="text" name="contacto2_1" id="contacto2_1" class="form-control" disabled/>
									<input type="text" name="contacto3_1" id="contacto3_1" class="form-control" disabled/>
								</td>
								<td>
									<div class="row">
										<input type="text" name="telefono1_1" id="telefono1_1" class="form-control" disabled/>
										<a title="Quitar" name="quitartelefono1_1" id="quitartelefono1_1" class="btn btn-danger btn-xs aligned"><span class="fa fa-times"></span></a>
									</div>
									<div class="row">
										<input type="text" name="telefono2_1" id="telefono2_1" class="form-control" disabled/>
										<a title="Quitar" name="quitartelefono2_1" id="quitartelefono2_1" class="btn btn-danger btn-xs aligned"><span class="fa fa-times"></span></a>
									</div>
									<div class="row">
										<input type="text" name="telefono3_1" id="telefono3_1" class="form-control" disabled/>
										<a title="Quitar" name="quitartelefono3_1" id="quitartelefono3_1" class="btn btn-danger btn-xs aligned"><span class="fa fa-times"></span></a>
									</div>
								</td>
								<td class="spacer">
									<a title="Quitar"  name="quitarproveedor_1" id="quitarproveedor_1" class="btn btn-danger btn-xs lowered"><span class="fa fa-times"></span></a>
								</td>
							</tr>
						</tbody>
					</table>

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
		/*
		$('#idFamilia').change(function(){
			var id = $(this).val();
			if(id != 0){
				$.ajax({
					url: '<?php echo base_url(); ?>index.php/Im_general/obtenerDescripcionFamilia',
					method: 'POST',
					data: {
						id: id
					},
					success: function (returned) {
						var returned = JSON.parse(returned);
						jQuery.each(returned.descripcion, function( i, val ) {                   
							descripcion = val.descripcion;
						});
						$("#descripcion_1").val(descripcion);
					}
				});
			}
		});
		*/

		$("#empleadoElabora").on('keyup', function(e) {
			if ($(this).val().length == 5) {
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
			} else if ($(this).val().length < 5){
				$('#empleadoElabora2').val('');
			}
		});

		$("#empleadoAutoriza").on('keyup', function(e) {
			if ($(this).val().length == 5) {
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
						//console.log(returned.nombre.length);
						
						jQuery.each(returned.nombre, function( i, val ) {                   
							nombre = val.nombre + " " + val.apellidoPaterno + " " + val.apellidoMaterno;
						});
						$("#empleadoAutoriza2").val(nombre);
					}
				});
			} else if ($(this).val().length < 5){
				$('#empleadoAutoriza2').val('');
			}
		});

		$("#agregarRegistroArticulos").click(function(){
			var cuentaActual = $("#tablaFamilias tbody tr").length;
			var cuentaNueva = cuentaActual+1;

			$('#tablaFamilias tbody>tr:last').clone(true).insertAfter('#tablaFamilias tbody>tr:last');
			$('#tablaFamilias tbody>tr:last').find("input, select").each(function (){
				var nuevoId = $(this).attr("id").replace("_" + cuentaActual, "_" + cuentaNueva);
				var nuevoName = $(this).attr("name").replace("_" + cuentaActual, "_" + cuentaNueva);
				$(this).attr("id", nuevoId).attr("name", nuevoName);
				if($(this).is("input")){
					$(this).val("");
				}
			});
     	});

		 $("#agregarRegistroProveedores").click(function(){
			var cuentaActual = $("#tablaProveedores tbody tr").length;
			var cuentaNueva = cuentaActual+1;

			$('#tablaProveedores tbody>tr:last').clone(true).insertAfter('#tablaProveedores tbody>tr:last');
			$('#tablaProveedores tbody>tr:last').find("input, textarea, a").each(function (){
				var nuevoId = $(this).attr("id").replace("_" + cuentaActual, "_" + cuentaNueva);
				var nuevoName = $(this).attr("name").replace("_" + cuentaActual, "_" + cuentaNueva);
				$(this).attr("id", nuevoId).attr("name", nuevoName);
				if($(this).is("input")){
					$(this).val("");
				}
			});
     	});
		 
		$("#cargarProveedores").click(function(){
			var clave = $("#idFamilia option:selected").text();
			if(clave != "Seleccione"){
				$.ajax({
					url: '<?php echo base_url(); ?>index.php/Im_general/obtenerListaProveedores',
					method: 'POST',
					data: {
						clave: clave
					},
					success: function (returned) {
						var returned = JSON.parse(returned);
						var longitud = returned.listaproveedores.length;
						
						for (var i = 1; i < longitud; i++) {
							$('#tablaProveedores tbody>tr:last').clone(true).insertAfter('#tablaProveedores tbody>tr:last');
							$('#tablaProveedores tbody>tr:last').find("input, textarea, a").each(function (){
								var nuevoId = $(this).attr("id").replace("_" + i, "_" + (i+1));
								var nuevoName = $(this).attr("name").replace("_" + i, "_" + (i+1));
								$(this).attr("id", nuevoId).attr("name", nuevoName);
							});
						}
						
						jQuery.each(returned.listaproveedores, function( i, val ) {                   
							//console.log(i);
							$("#clave_" + (i+1)).val(val.clave);
							$("#razonsocial_" + (i+1)).val(val.razonSocial);
							$("#direccion_" + (i+1)).val(val.direccion);
							$("#contacto1_" + (i+1)).val(val.nombre1);
							$("#contacto2_" + (i+1)).val(val.nombre2);
							$("#contacto3_" + (i+1)).val(val.nombre3);
							$("#telefono1_" + (i+1)).val(val.telefonoFijo1);
							$("#telefono2_" + (i+1)).val(val.telefonoFijo2);
							$("#telefono3_" + (i+1)).val(val.telefonoFijo3);
						});
					}
				});
			}
			
		});

		$("#cargarArticulos").click(function(){
			var idFamilia = $("#idFamilia").val();
			if(idFamilia != 0){
				$.ajax({
					url: '<?php echo base_url(); ?>index.php/Im_general/obtenerListaArticulos',
					method: 'POST',
					data: {
						idFamilia: idFamilia
					},
					success: function (returned) {
						var returned = JSON.parse(returned);
						var longitud = returned.listaarticulos.length;
						
						for (var i = 1; i < longitud; i++) {
							$('#tablaFamilias tbody>tr:last').clone(true).insertAfter('#tablaFamilias tbody>tr:last');
							$('#tablaFamilias tbody>tr:last').find("input").each(function (){
								var nuevoId = $(this).attr("id").replace("_" + i, "_" + (i+1));
								var nuevoName = $(this).attr("name").replace("_" + i, "_" + (i+1));
								$(this).attr("id", nuevoId).attr("name", nuevoName);
							});
						}

						jQuery.each(returned.listaarticulos, function( i, val ) {                   
							//console.log(i);
							$("#codigo_" + (i+1)).val(val.codigo);
							$("#descripcion_" + (i+1)).val(val.descripcion);
							$("#plazoentrega_" + (i+1)).val(val.tiempoEntrega);
							$("#cantidad_" + (i+1)).val(val.cantidadEmbalaje);
							$("#um_" + (i+1)).val(val.unidadmedida);
						});
						
					}
				});
			}	
		});
	});
</script>