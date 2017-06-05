<script src="https://code.jquery.com/jquery-1.12.4.js"></script>


<style>
	
	.hidden { 
		display: none; 
	}
	
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
		margin-top: 38px;
	}

	td .btn.aligned-right{
		float: right;
	}

	td input {
  		float: left;
		margin-bottom: 10px;
	}

	.spacer {
  		padding-left: 25px !important;
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
						<label for="tipo" class="col-md-1 control-label">Tipo</label>
						<div class="col-md-6">
							<select id="tipoProveedor" name="tipo" class="form-control">
								<option value="0">Seleccione</option>
								<option value="B">Bienes</option>
								<option value="S">Servicios</option>
							</select>
						</div>
					</div>

					<div class="form-group seccion-familia hidden">
						<label for="idFamilia" class="col-md-1 control-label">Familia</label>
						<div class="col-md-6">
							<select id="idFamilia" name="idFamilia" class="form-control">
								<option value="0">Seleccione</option>
								<?php 
									foreach ($familias as $i) {
										echo '<option value="'. $i->id .'">'. $i->descripcion .'</option>';
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

					<div class="form-group">
						<label for="asunto" class="col-md-1 control-label">Asunto</label>
						<div class="col-md-6">
							<input type="text" name="asunto" class="form-control" id="asunto" />
						</div>
					</div>

					<div class="form-group">
						<label for="fechalimite" class="col-md-1 control-label">Fecha límite</label>
						<div class="col-md-6">
							<input type="text" name="fechalimite" class="form-control" id="fechalimite" />
						</div>
					</div>

					<div class="form-group">
                    	<label for="idEstado" class="col-md-1 control-label">Estado</label>
                        <div class="col-md-6">
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
						<label for="idMunicipio" class="col-md-1 control-label">Municipio</label>
						<div class="col-md-6">
							<select id="idMunicipio" name="idMunicipio" class="form-control">
								<option value="0">Seleccione</option>
							</select>
						</div>
					</div> 

					<div class="form-group">
						<label for="ccp1" class="col-md-1 control-label">CCP 1</label>
						<div class="col-md-6">
							<input type="text" name="ccp1" class="form-control" id="ccp1" />
						</div>
					</div>

					<div class="form-group">
						<label for="ccp2" class="col-md-1 control-label">CCP 2</label>
						<div class="col-md-6">
							<input type="text" name="ccp2" class="form-control" id="ccp2" />
						</div>
					</div>

					<div class="form-group">
						<label for="ccp3" class="col-md-1 control-label">CCP 3</label>
						<div class="col-md-6">
							<input type="text" name="ccp3" class="form-control" id="ccp3" />
						</div>
					</div>

					<hr />

					<div class="seccion-servicios hidden">
						<h4>Servicios</h4>

						<a id="agregarRegistroServicios" class="btn btn-primary">
							<i class="fa "></i> Agregar registro en blanco
						</a>
							
						<table id="tablaServicios" class="table table-hover">
							<thead class="thead-inverse">
								<th>Descripción</th>
								<th>Cantidad</th>
								<th>Plazo de entrega (días)</th>
								<th></th>
							</thead>
							<tbody>
								<tr>
									<td >
										<input type="text" name="descripcionservicio_1" id="descripcionservicio_1" class="form-control partida"/> 
									</td>
									<td class="col-md-2">
										<input type="text" name="cantidadservicio_1" id="cantidadservicio_1" class="form-control partida"/> 
									</td>
									<td class="col-md-2">
										<div class="row">
											<input type="text" name="plazoentregaservicio_1" id="plazoentregaservicio_1" class="form-control partida"/> 
											<a name="quitarservicio_1" id="quitarservicio_1" class="btn btn-danger btn-xs aligned quitarservicio"><span class="fa fa-trash"></span></a>
										</div>
									</td>
								</tr>
							</tbody>
						</table>

						<hr />
					</div>

					<div class="seccion-articulos hidden">
					
						<h4>Artículos</h4>

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
								<th>Plazo de entrega (días)</th>
								<th>Cantidad</th>
								<th>UM</th>
								<th>Lugar de entrega</th>
								<th>Dirección de entrega</th>
								<th></th>
							</thead>
							<tbody>
								<tr>
									<td >
										<input type="text" name="partida_1" id="partida_1" class="form-control partida" value=1 disabled/> 
									</td>
									<td >
										<input type="text" name="codigo_1" id="codigo_1" class="form-control" maxlength="10"/>
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
										<select name="lugarentrega_1" id="lugarentrega_1" class="form-control select-lugar">
											<option value="0">Seleccione</option>
											<?php 
												foreach ($almacenes as $i) {
													echo '<option value="'. $i->id .'">'. $i->centroMM .' - '. $i->nombre .'</option>';
												}
											?>
											<option value="<?php echo sizeof($almacenes)+1?>">OTRO</option>
										</select>
									</td>
									<td class="col-md-2">
										<input type="text" name="direccionentrega_1" id="direccionentrega_1" class="form-control input-direccion" disabled/>
									</td>
									<td>
										<a name="quitararticulo_1" id="quitararticulo_1" class="btn btn-danger btn-xs quitararticulo"><span class="fa fa-trash"></span></a>
										<a name="buscararticulo_1" id="buscararticulo_1" class="btn btn-info btn-xs buscararticulo"><span class="fa fa-search"></span></a>
									</td>
								</tr>
							</tbody>
						</table>
						
						
						<hr />
					</div>

					<div class="seccion-proveedores hidden">

						<h4>Proveedores</h4>

						<div class="form-group">
							<a id="cargarProveedoresBienes" class="btn btn-primary hidden">
								<i class="fa "></i> Cargar proveedores de familia
							</a>
							<a id="cargarProveedoresServicios" class="btn btn-primary hidden">
								<i class="fa "></i> Cargar proveedores de servicios
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
								<th>Correos electrónicos</th>
								<th></th>
							</thead>
							<tbody>
								<tr>
									<td class="col-md-2">
										<input type="text" name="clave_1" id="clave_1" class="form-control lowered" maxlength="15"/>
									</td>
									<td class="col-md-3">
										<textarea name="razonsocial_1" id="razonsocial_1" class="form-control"></textarea>
										<textarea name="direccion_1" id="direccion_1" class="form-control lowered2"></textarea>
									</td>
									<td class="col-md-4">
										<input type="text" name="contacto1_1" id="contacto1_1" class="form-control" disabled/>
										<input type="text" name="contacto2_1" id="contacto2_1" class="form-control" disabled/>
										<input type="text" name="contacto3_1" id="contacto3_1" class="form-control" disabled/>
									</td>
									<td>
										<div class="row">
											<input type="text" name="correo1_1" id="correo1_1" class="form-control" disabled/>
											<a name="quitarcontacto1_1" id="quitarcontacto1_1" class="btn btn-danger btn-xs aligned quitarcontacto"><span class="fa fa-times"></span></a>
										</div>
										<div class="row">
											<input type="text" name="correo2_1" id="correo2_1" class="form-control" disabled/>
											<a name="quitarcontacto2_1" id="quitarcontacto2_1" class="btn btn-danger btn-xs aligned quitarcontacto"><span class="fa fa-times"></span></a>
										</div>
										<div class="row">
											<input type="text" name="correo3_1" id="correo3_1" class="form-control" disabled/>
											<a name="quitarcontacto3_1" id="quitarcontacto3_1" class="btn btn-danger btn-xs aligned quitarcontacto"><span class="fa fa-times"></span></a>
										</div>
									</td>
									<td class="spacer">
										<a  name="quitarproveedor_1" id="quitarproveedor_1" class="btn btn-danger btn-xs lowered quitarproveedor aligned-right"><span class="fa fa-trash"></span></a>
										<a name="buscarproveedor_1" id="buscarproveedor_1" class="btn btn-info btn-xs buscarproveedor aligned-right"><span class="fa fa-search"></span></a>
									</td>
								</tr>
							</tbody>
						</table>

						<hr />
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<!--
							<button type="submit" class="btn btn-success">
								<i class="fa fa-check"></i> Guardar
							</button>
							-->
							<a id="botonGenerar" name="botonGenerar" class="btn btn-success">
								<i class="fa "></i> Generar oficios IM
							</a>
							<a id="botonContinuar" name="botonContinuar" href="<?php echo site_url('po_consideracion/edit/1'); ?>" class="btn btn-info">
								<i class="fa fa-arrow-right"></i> Continuar
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

		$('#botonGenerar').attr('disabled', true);
		$('#botonContinuar').attr('disabled', true);

		$('#tipoProveedor').change(function(){
			var val = $(this).val();
			if (val == "B"){
				$('.seccion-familia').removeClass('hidden');
				$('.seccion-familia').show();
				$('.seccion-articulos').removeClass('hidden');
				$('.seccion-articulos').show();
				$('.seccion-proveedores').removeClass('hidden');
				$('.seccion-proveedores').show();
				$('#cargarProveedoresBienes').removeClass('hidden');
				$('#cargarProveedoresBienes').show();
				$('.seccion-servicios').hide();
				$('#cargarProveedoresServicios').hide();
				$('#botonGenerar').attr('disabled', false);
				$('#botonContinuar').attr('disabled', false);
			} else if (val == "S"){
				$('.seccion-servicios').removeClass('hidden');
				$('.seccion-servicios').show();
				$('.seccion-proveedores').removeClass('hidden');
				$('.seccion-proveedores').show();
				$('#cargarProveedoresServicios').removeClass('hidden');
				$('#cargarProveedoresServicios').show();
				$('.seccion-familia').hide();
				$('.seccion-articulos').hide();
				$('#cargarProveedoresBienes').hide();
				$('#botonGenerar').attr('disabled', false);
				$('#botonContinuar').attr('disabled', false);
			} else {
				$('.seccion-familia').hide();
				$('.seccion-articulos').hide();
				$('.seccion-proveedores').hide();
				$('.seccion-servicios').hide();
				$('#botonGenerar').attr('disabled', true);
				$('#botonContinuar').attr('disabled', true);
			}
		});
		
		//Cambia el idioma del datepicker a español
		$.datepicker.regional['es'] = {
			closeText: 'Cerrar',
			prevText: '< Ant',
			nextText: 'Sig >',
			currentText: 'Hoy',
			monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
			dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
			dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
			dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
			weekHeader: 'Sm',
			dateFormat: 'dd/mm/yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''
 		};
 		$.datepicker.setDefaults($.datepicker.regional['es']);

		
		$(function () {
			$("#fechalimite").datepicker();
		});
		
		//Busca el nombre del empleado una vez que el input tenga 5 caracteres
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

		//Funcionamientos de los combos de estado y municipio
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

		//Agrega una fila en blanco a la tabla
		$("#agregarRegistroArticulos").click(function(){
			//Busca el valor de la última partida
			var ultimaPartida = parseInt($("#tablaFamilias tr:last input.partida").val());

			var cuentaActual = $("#tablaFamilias tbody tr:last input:last").attr("name").split("_").pop();
			var cuentaNueva = parseInt(cuentaActual) + 1;

			$('#tablaFamilias tbody>tr:last').clone(true).insertAfter('#tablaFamilias tbody>tr:last');
			$('#tablaFamilias tbody>tr:last').find("input, select, a").each(function (){
				var nuevoId = $(this).attr("id").replace("_" + cuentaActual, "_" + cuentaNueva);
				var nuevoName = $(this).attr("name").replace("_" + cuentaActual, "_" + cuentaNueva);
				$(this).attr("id", nuevoId).attr("name", nuevoName);
				if($(this).is("input")){
					$(this).val("");
				}
				$("#partida_" + cuentaNueva).val(ultimaPartida + 1);
			});
     	});

		 $("#agregarRegistroServicios").click(function(){
			var cuentaActual = $("#tablaServicios tbody tr:last input:last").attr("name").split("_").pop();
			var cuentaNueva = parseInt(cuentaActual) + 1;
			$("#tablaServicios tbody>tr:last").clone(true).insertAfter("#tablaServicios tbody>tr:last");
			$("#tablaServicios tbody>tr:last").find("input, a").each(function(){
				var nuevoId = $(this).attr("id").replace("_" + cuentaActual, "_" + cuentaNueva);
				var nuevoName = $(this).attr("name").replace("_" + cuentaActual, "_" + cuentaNueva);
				$(this).attr("id", nuevoId).attr("name", nuevoName);
				if($(this).is("input")){
					$(this).val("");
				}
			});
		 });

		 $("#agregarRegistroProveedores").click(function(){
			var cuentaActual = $("#tablaProveedores tbody tr:last input:last").attr("name").split("_").pop();
			var cuentaNueva = parseInt(cuentaActual) + 1;

			$('#tablaProveedores tbody>tr:last').clone(true).insertAfter('#tablaProveedores tbody>tr:last');
			$('#tablaProveedores tbody>tr:last').find("input, textarea, a").each(function (){
				var nuevoId = $(this).attr("id").replace("_" + cuentaActual, "_" + cuentaNueva);
				var nuevoName = $(this).attr("name").replace("_" + cuentaActual, "_" + cuentaNueva);
				$(this).attr("id", nuevoId).attr("name", nuevoName);
				$(this).removeAttr("style");
				if($(this).is("input") || $(this).is("textarea")){
					$(this).val("");
				}
			});
			
     	});
		 
		//Carga los proveedores que manejen la familia seleccionada 
		$("#cargarProveedoresBienes").click(function(){
			var idFamilia = $("#idFamilia").val();
			if(idFamilia != 0){
				$.ajax({
					url: '<?php echo base_url(); ?>index.php/Im_general/obtenerListaProveedores',
					method: 'POST',
					data: {
						idFamilia: idFamilia
					},
					success: function (returned) {
						
						var returned = JSON.parse(returned);
						var longitud = returned.listaproveedores.length;
						
						$("#tablaProveedores").find("tr:gt(1)").remove();
						
						var cuentaActual = $("#tablaProveedores tbody tr:last input:last").attr("name").split("_").pop();
						$('#tablaProveedores tbody>tr:last').find("input, textarea, a").each(function (){
							var nuevoId = $(this).attr("id").replace("_" + cuentaActual, "_1");
							var nuevoName = $(this).attr("name").replace("_" + cuentaActual, "_1");
							$(this).attr("id", nuevoId).attr("name", nuevoName);
							$(this).removeAttr("style");
							if($(this).is("input") || $(this).is("textarea")){
								$(this).val("");
							}
						});

						for (var i = 1; i < longitud; i++) {
							$('#tablaProveedores tbody>tr:last').clone(true).insertAfter('#tablaProveedores tbody>tr:last');
							$('#tablaProveedores tbody>tr:last').find("input, textarea, a").each(function (){
								var nuevoId = $(this).attr("id").replace("_" + i, "_" + (i+1));
								var nuevoName = $(this).attr("name").replace("_" + i, "_" + (i+1));
								$(this).attr("id", nuevoId).attr("name", nuevoName);
								$(this).removeAttr("style");
								if($(this).is("input") || $(this).is("textarea")){
									$(this).val("");
								}
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
							$("#correo1_" + (i+1)).val(val.correoElectronico1);
							$("#correo2_" + (i+1)).val(val.correoElectronico2);
							$("#correo3_" + (i+1)).val(val.correoElectronico3);
						});
					}
				});
			}
		});

		//Carga los proveedores de servicios
		$("#cargarProveedoresServicios").click(function(){
			$.ajax({
				url: '<?php echo base_url(); ?>index.php/Im_general/obtenerListaProveedoresServicio',
				method: 'GET',
				success: function (returned) {
					var returned = JSON.parse(returned);
					var longitud = returned.listaproveedoresservicio.length;
					$("#tablaProveedores").find("tr:gt(1)").remove();
						
					var cuentaActual = $("#tablaProveedores tbody tr:last input:last").attr("name").split("_").pop();
					$('#tablaProveedores tbody>tr:last').find("input, textarea, a").each(function (){
						var nuevoId = $(this).attr("id").replace("_" + cuentaActual, "_1");
						var nuevoName = $(this).attr("name").replace("_" + cuentaActual, "_1");
						$(this).attr("id", nuevoId).attr("name", nuevoName);
						$(this).removeAttr("style");
						if($(this).is("input") || $(this).is("textarea")){
							$(this).val("");
						}
					});

					for (var i = 1; i < longitud; i++) {
						$('#tablaProveedores tbody>tr:last').clone(true).insertAfter('#tablaProveedores tbody>tr:last');
						$('#tablaProveedores tbody>tr:last').find("input, textarea, a").each(function (){
							var nuevoId = $(this).attr("id").replace("_" + i, "_" + (i+1));
							var nuevoName = $(this).attr("name").replace("_" + i, "_" + (i+1));
							$(this).attr("id", nuevoId).attr("name", nuevoName);
							$(this).removeAttr("style");
							if($(this).is("input") || $(this).is("textarea")){
								$(this).val("");
							}
						});
					}
						
					jQuery.each(returned.listaproveedoresservicio, function( i, val ) {                   
						//console.log(i);
						$("#clave_" + (i+1)).val(val.clave);
						$("#razonsocial_" + (i+1)).val(val.razonSocial);
						$("#direccion_" + (i+1)).val(val.direccion);
						$("#contacto1_" + (i+1)).val(val.nombre1);
						$("#contacto2_" + (i+1)).val(val.nombre2);
						$("#contacto3_" + (i+1)).val(val.nombre3);
						$("#correo1_" + (i+1)).val(val.correoElectronico1);
						$("#correo2_" + (i+1)).val(val.correoElectronico2);
						$("#correo3_" + (i+1)).val(val.correoElectronico3);
					});
				}
			});
		});

		//Carga los artículos relacionados con esa familia
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

						$("#tablaFamilias").find("tr:gt(1)").remove();
						
						var cuentaActual = $("#tablaFamilias tbody tr:last input:last").attr("name").split("_").pop();
						$('#tablaFamilias tbody>tr:last').find("input, select, a").each(function (){
							var nuevoId = $(this).attr("id").replace("_" + cuentaActual, "_1");
							var nuevoName = $(this).attr("name").replace("_" + cuentaActual, "_1");
							$(this).attr("id", nuevoId).attr("name", nuevoName);
							$(this).removeAttr("style");
							if($(this).is("input")){
								$(this).val("");
							}
						});

						
						for (var i = 1; i < longitud; i++) {
							$('#tablaFamilias tbody>tr:last').clone(true).insertAfter('#tablaFamilias tbody>tr:last');
							$('#tablaFamilias tbody>tr:last').find("input, select, a").each(function (){
								var nuevoId = $(this).attr("id").replace("_" + i, "_" + (i+1));
								var nuevoName = $(this).attr("name").replace("_" + i, "_" + (i+1));
								$(this).attr("id", nuevoId).attr("name", nuevoName);
								if($(this).is("input")){
									$(this).val("");
								}
							});
						}

						jQuery.each(returned.listaarticulos, function( i, val ) {    
							$("#partida_" + (i+1)).val(i+1);
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

	//Carga la dirección del almacén seleccionado en el campo de dirección
	//Si se selecciona Otro el campo se vuelve editable
	$(document).on("change", ".select-lugar", function(){
   		var $mySelect = $(this);
		var $row = $mySelect.closest('tr'); // the row where this select element is in.
		var idAlmacen = $mySelect.val();
		var opcion = $mySelect.find('option:selected').text();
		if(opcion != "Seleccione" && opcion != "OTRO"){
			$.ajax({
				url: '<?php echo base_url(); ?>index.php/Im_general/obtenerDireccionAlmacen',
				method: 'POST',
				data: {
					idAlmacen: idAlmacen
				},
				success: function (returned) {
					var result = JSON.parse(returned);
					var domicilio = ((result.almacen)[0].domicilio);
					$row.find('.input-direccion').val(domicilio);
					$row.find('.input-direccion').prop("disabled", true);
				}
			});
		} else if (opcion == "OTRO"){
			$row.find('.input-direccion').prop("disabled", false);
			$row.find('.input-direccion').val("")
		} else if (opcion == "Seleccione"){
			$row.find('.input-direccion').prop("disabled", true);
			$row.find('.input-direccion').val("")
		}
		
	});	



	$(document).on("click", "a.btn.quitararticulo" ,function() {
		if($("#tablaFamilias tbody tr").length > 1){
			var tableRow = $(this).closest('tr');
    		tableRow.find('td').fadeOut('fast', 
        		function(){ 
            		tableRow.remove();
					//Renumera la partida después de quitar un renglón
					longitudNueva = $("#tablaFamilias tbody tr").length;
					for (i = 1; i <= longitudNueva; i++) { 
						$("#tablaFamilias tr:eq(" + i + ") input.partida").val(i);
					}                    
        		}
    		);
		} else {
			var cuentaActual = $("#tablaFamilias tbody tr:last input:last").attr("name").split("_").pop();
			$('#tablaFamilias tbody>tr:last').find("input, select, a").each(function (){
				var nuevoId = $(this).attr("id").replace("_" + cuentaActual, "_1");
				var nuevoName = $(this).attr("name").replace("_" + cuentaActual, "_1");
				$(this).attr("id", nuevoId).attr("name", nuevoName);
				$(this).removeAttr("style");
				if($(this).is("input")){
					$(this).val("");
				}
				$("#partida_1").val(1);
			});
		}
		
	});

	$(document).on("click", "a.btn.quitarservicio", function() {
		if($("#tablaServicios tbody tr").length > 1){
			var tableRow = $(this).closest("tr");
			tableRow.find("td").fadeOut("fast",
				function(){
					tableRow.remove();
				}
			);
		} else {
			var cuentaActual = $("#tablaServicios tbody tr:last input:last").attr("name").split("_").pop();
			$('#tablaServicios tbody>tr:last').find("input, a").each(function (){
				var nuevoId = $(this).attr("id").replace("_" + cuentaActual, "_1");
				var nuevoName = $(this).attr("name").replace("_" + cuentaActual, "_1");
				$(this).attr("id", nuevoId).attr("name", nuevoName);
				if($(this).is("input")){
					$(this).val("");
				}
			});
		}
	});

	$(document).on("click", "a.btn.buscararticulo" ,function() {
		var $this = $(this);
		var $codigo = $this.closest('tr').find('input:eq(1)').val();
		var $row = $this.attr("name").split("_").pop();
		if($codigo != ""){
			$.ajax({
				url: '<?php echo base_url(); ?>index.php/Im_general/obtenerArticuloCodigo',
				method: 'POST',
				data: {
					codigo: $codigo
				},
				success: function (returned) {
					var result = JSON.parse(returned);
					jQuery.each(result.articulo, function( i, val ) {    
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

	$(document).on("click", "a.btn.quitarcontacto" ,function() {
		var name = $(this).attr("name");
		var numcontacto = name.substr(name.length - 3);

		$( "#contacto" + numcontacto ).fadeOut( "fast" );
		$( "#correo" + numcontacto ).fadeOut( "fast" );
		$( "#quitarcontacto" + numcontacto ).fadeOut( "fast" );
	});

	$(document).on("click", "a.btn.quitarproveedor" ,function() {
		//var tabfila = name.split("_").pop();
		if($("#tablaProveedores tbody tr").length > 1){
			var tableRow = $(this).closest('tr');
    		tableRow.find('td').fadeOut('fast', 
        		function(){ 
            		tableRow.remove();                    
        		}
    		);
		} else {
			var cuentaActual = $("#tablaProveedores tbody tr:last input:last").attr("name").split("_").pop();
			$('#tablaProveedores tbody>tr:last').find("input, textarea, a").each(function (){
				var nuevoId = $(this).attr("id").replace("_" + cuentaActual, "_1");
				var nuevoName = $(this).attr("name").replace("_" + cuentaActual, "_1");
				$(this).attr("id", nuevoId).attr("name", nuevoName);
				$(this).removeAttr("style");
				if($(this).is("input") || $(this).is("textarea")){
					$(this).val("");
				}
			});
		}
	});

	$(document).on("click", "a.btn.buscarproveedor", function(){
		var $this = $(this);
		var $clave = $this.closest('tr').find('input:eq(0)').val();
		var $row = $this.attr("name").split("_").pop();
		if($clave != ""){
			$.ajax({
				url: '<?php echo base_url(); ?>index.php/Im_general/obtenerProveedorClave',
				method: 'POST',
				data: {
					clave: $clave
				},
				success: function (returned) {
					var result = JSON.parse(returned);
					jQuery.each(result.proveedor, function( i, val ) {     
						$("#clave_" + (i+1)).val(val.clave);
						$("#razonsocial_" + (i+1)).val(val.razonSocial);
						$("#direccion_" + (i+1)).val(val.direccion);
						$("#contacto1_" + (i+1)).val(val.nombre1);
						$("#contacto2_" + (i+1)).val(val.nombre2);
						$("#contacto3_" + (i+1)).val(val.nombre3);
						$("#correo1_" + (i+1)).val(val.correoElectronico1);
						$("#correo2_" + (i+1)).val(val.correoElectronico2);
						$("#correo3_" + (i+1)).val(val.correoElectronico3);
					});
				}
			});
		}
	});
	
	$(document).on('mouseover', '.btn.quitarservicio', function(){
		$(this).prop("title", "Quitar servicio");
	});

	$(document).on('mouseover', '.btn.quitararticulo', function(){
		$(this).prop("title", "Quitar artículo");
	});

	$(document).on('mouseover', '.btn.buscararticulo', function(){
		$(this).prop("title", "Buscar artículo por código");
	});
	
	$(document).on('mouseover', '.btn.quitarcontacto', function(){
		$(this).prop("title", "Quitar contacto");
	});

	$(document).on('mouseover', '.btn.quitarproveedor', function(){
		$(this).prop("title", "Quitar proveedor");
	});

	$(document).on('mouseover', '.btn.buscarproveedor', function(){
		$(this).prop("title", "Buscar proveedor por código");
	});

	
</script>