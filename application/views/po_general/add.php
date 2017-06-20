<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<style>
	
	.hidden { 
		display: none; 
	}

	.ui-datepicker { 
		position: relative; 
		z-index: 10000 !important; 
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
	<div class="col-md-22 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Elaborar nueva Petición Oferta</h2>
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
						<label for="tipo" class="col-md-2 control-label">Tipo</label>
						<div class="col-md-6">
							<select name="tipo" class="form-control" id="tipoProveedor">
								<option value="0">Seleccione</option>
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

					<!-- Solo aparece si se selecciona un proveedor de tipo bienes -->
					<div class="form-group seccion-familia hidden">
						<label for="idFamilia" class="col-md-2 control-label">Familia</label>
						<div class="col-md-6">
							<select id="idFamilia" name="idFamilia" class="form-control">
								<option value="0">Seleccione</option>
								<?php 
									foreach ($familias as $i) {
										$selected = ($i == $this->input->post('idFamilia')) ? ' selected="selected"' : "";
										echo '<option value="'. $i->id .'" '.$selected.'>'. $i->descripcion .'</option>';
									}
								?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="oficioNumero" class="col-md-2 control-label">Oficio No.</label>
						<div class="col-md-6">
							<input type="text" name="oficioNumero" value="<?php echo $this->input->post('oficioNumero'); ?>" class="form-control" id="oficioNumero" />
						</div>
					</div>
					<div class="form-group">
                    	<label for="idEstado" class="col-md-2 control-label">Estado</label>
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
						<label for="idMunicipio" class="col-md-2 control-label">Municipio</label>
						<div class="col-md-6">
							<select id="idMunicipio" name="idMunicipio" class="form-control">
								<option value="0">Seleccione</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="fechaElaboracion" class="col-md-2 control-label">Fecha de Elaboración</label>
						<div class="col-md-6">
							<input type="text" name="fechaElaboracion" value="<?php echo $this->input->post('fechaElaboracion'); ?>" class="form-control" id="fechaElaboracion" />
						</div>
					</div>
					<div class="form-group">
						<label for="asunto" class="col-md-2 control-label">Asunto</label>
						<div class="col-md-6">
							<input type="text" name="asunto" value="<?php echo $this->input->post('asunto'); ?>" class="form-control" id="asunto" />
						</div>
					</div>	
					<div class="form-group">
						<label for="domicilio" class="col-md-2 control-label">Domicilio Remitente</label>
						<div class="col-md-6">
							<input type="text" name="domicilio" value="<?php echo $this->input->post('domicilio'); ?>" class="form-control" id="domicilio" />
						</div>
					</div>
					<div class="form-group">
						<label for="empleadoResponsable" class="col-md-2 control-label">Empleado Responsable</label>
						<div class="col-md-2">
							<div class="input-group">
								<input type="text" id="empleadoResponsable" name="empleadoResponsable" maxlength="5" class="form-control pull-right" placeholder="Ingrese RPE"/>
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-search"></i>	
								</span>
							</div>
						</div>
						<div class="col-md-4">
							<input type="text" id="empleadoResponsable2" name="empleadoResponsable2" class="form-control" readonly placeholder="Nombre del empleado"/>
						</div>
					</div>
					<div class="form-group">
						<label for="empleadoFormula" class="col-md-2 control-label">Empleado Formula</label>
						<div class="col-md-2">
							<div class="input-group">
								<input type="text" id="empleadoFormula" name="empleadoFormula" maxlength="5" class="form-control pull-right" placeholder="Ingrese RPE"/>
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-search"></i>	
								</span>
							</div>
						</div>
						
						<div class="col-md-4">
							<input type="text" id="empleadoFormula2" name="empleadoFormula2" class="form-control" readonly placeholder="Nombre del empleado"/>
						</div>
					</div>
					<div class="form-group">
						<label for="fechaLimitePresentacion" class="col-md-2 control-label">Fecha Límite de Presentación</label>
						<div class="col-md-6">
							<input type="text" name="fechaLimitePresentacion" value="<?php echo $this->input->post('fechaLimitePresentacion'); ?>" class="form-control" id="fechaLimitePresentacion" />
						</div>
					</div>
					<div class="form-group">
						<label for="horaLimitePresentacion" class="col-md-2 control-label">Hora Límite de Presentación</label>
						<div class="col-md-6">
							<input type="text" name="horaLimitePresentacion" value="<?php echo $this->input->post('horaLimitePresentacion'); ?>" class="form-control timepicker" id="horaLimitePresentacion" />
						</div>
					</div>
					<div class="form-group">
						<label for="ccp1" class="col-md-2 control-label">CCP 1</label>
						<div class="col-md-6">
							<input type="text" name="ccp1" value="<?php echo $this->input->post('ccp1'); ?>" class="form-control" id="ccp1" />
						</div>
					</div>
					<div class="form-group">
						<label for="ccp2" class="col-md-2 control-label">CCP 2</label>
						<div class="col-md-6">
							<input type="text" name="ccp2" value="<?php echo $this->input->post('ccp2'); ?>" class="form-control" id="ccp2" />
						</div>
					</div>
					<div class="form-group">
						<label for="ccp3" class="col-md-2 control-label">CCP 3</label>
						<div class="col-md-6">
							<input type="text" name="ccp3" value="<?php echo $this->input->post('ccp3'); ?>" class="form-control" id="ccp3" />
						</div>
					</div>
					
					<!-- Este campo se va a llenar con la fecha y hora actual, solo se mostrara en EDIT
					<div class="form-group">
						<label for="fechaUltimaModificacion" class="col-md-2 control-label">FechaUltimaModificacion</label>
						<div class="col-md-6">
							<input type="text" name="fechaUltimaModificacion" value="<?php echo $this->input->post('fechaUltimaModificacion'); ?>" class="form-control" id="fechaUltimaModificacion" />
						</div>
					</div>
					-->

					<hr />

					<div class="seccion-proveedores hidden">
						<h2> Proveedores</h4>
						<h4> Seleccione a los proveedores y a los contactos a los que estará dirigido esta Petición Oferta</h2>
						<br />
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

					<a id="botonCrear" class="btn btn-primary">
						<i class="fa "></i> Crear relacion proveedores
					</a>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-8">
							<button id="botonGuardar" type="submit" class="btn btn-success">
								<i class="fa fa-check"></i> Guardar
							</button>
				        </div>
					</div>

				<?php echo form_close(); ?>
			</div>
    	</div>
  	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

		var options = {
			twentyFour: true,
			timeSeparator: ':',
			title: "Formato 24 Hrs"
		}

		$('.timepicker').wickedpicker(options);
		

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
			$("#fechaLimitePresentacion").datepicker();
			$("#fechaElaboracion").datepicker();
		});

		//Oculta secciones dependiendo de la elección de tipo de proveedor
		$('#tipoProveedor').change(function(){
			var val = $(this).val();
			
			if (val == "B"){
				$('.seccion-familia').removeClass('hidden');
				$('.seccion-familia').show();
				$('.seccion-proveedores').removeClass('hidden');
				$('.seccion-proveedores').show();
				$('#cargarProveedoresBienes').removeClass('hidden');
				$('#cargarProveedoresBienes').show();
				$('#cargarProveedoresServicios').hide();
			} else if (val == "S"){
				$('.seccion-familia').hide();
				$('.seccion-proveedores').removeClass('hidden');
				$('.seccion-proveedores').show();
				$('#cargarProveedoresServicios').removeClass('hidden');
				$('#cargarProveedoresServicios').show();
				$('#cargarProveedoresBienes').hide();
			} else {
				$('.seccion-familia').hide();
				$('.seccion-proveedores').hide();
			}
		});

		//Busca el nombre del empleado una vez que el input tenga 5 caracteres
		$("#empleadoResponsable").on('keyup', function(e) {
			if ($(this).val().length == 5) {
				var rpe = $('#empleadoResponsable').val();
				var nombre = "";
				$.ajax({
					url: '<?php echo base_url(); ?>index.php/Po_general/obtenerNombreEmpleado',
					method: 'POST',
					data: {
						rpe: rpe
					},
					success: function (returned) {
						var returned = JSON.parse(returned);
						jQuery.each( returned.nombre, function( i, val ) {                   
							nombre = val.nombre + " " + val.apellidoPaterno + " " + val.apellidoMaterno;
						});
						$("#empleadoResponsable2").val(nombre);
					}
				});
			} else if ($(this).val().length < 5){
				$('#empleadoResponsable2').val('');
			}
		});

		$("#empleadoFormula").on('keyup', function(e) {
			if ($(this).val().length == 5) {
				var rpe = $('#empleadoFormula').val();
				var nombre = "";
				$.ajax({
					url: '<?php echo base_url(); ?>index.php/Po_general/obtenerNombreEmpleado',
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
						$("#empleadoFormula2").val(nombre);
					}
				});
			} else if ($(this).val().length < 5){
				$('#empleadoFormula2').val('');
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

		//Agrega una fila en blanco a la tabla de proveedores
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
					url: '<?php echo base_url(); ?>index.php/Po_general/obtenerListaProveedores',
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


		//Carga los provedoores de servicios y de bienes y servicios (tipo S Y A)
		$("#cargarProveedoresServicios").click(function(){
			$.ajax({
				url: '<?php echo base_url(); ?>index.php/Po_general/obtenerListaProveedoresServicio',
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

					//ocultar los campos de contacto que esten vacios
					for (var i = 1; i < longitud; i++) {
						$('#tablaProveedores tbody>tr:eq('+ i + ')').find("input").each(function (){
							if($(this).is("input") || $(this).val() == ""){
								$(this).css('display','none');
							}
						});
					}
				}
			});
		});

		$("#botonCrear").click(function(){
			//Longitud - 1 para el número real de renglones en la tabla
			var longitudTabla = $("#tablaProveedores tr").length - 1;

			for(i = 0; i < longitudTabla; i++){
				var cuentaActual = $("#tablaProveedores tbody tr:eq(" + i + ") input:first").attr("name").split("_").pop();
				var clave = $("#clave_" + cuentaActual).val();
				if(clave != ""){

					for(j = 1; j <= 3; j++){
						var contacto = $("#contacto" + j + "_" + cuentaActual);
						if(contacto.val() != "" && contacto.css('display') != 'none')
						{
							console.log("[" + clave + ", " + j + "]");
						}
					}
				}


			}
     	});

		$("#botonGuardar").click(function(){
			if($('#empleadoResponsable').val() != "" || $('#empleadoFormula').val() != ""){
				var rpe1 = $('#empleadoResponsable').val();
				var rpe2 = $('#empleadoFormula').val();
				$.ajax({
					url: '<?php echo base_url();?>index.php/Po_general/crearRelacion',
					method: 'POST',
					data: {
						rpe1: rpe1,
						rpe2: rpe2
					}
				});
			}
     	});


	});
	
	//$(document).on("click", "#botonCrearo" ,function() {
	//	var longitudTabla = $("#tablaProveedores").length;
	//	console.log(longitudTabla);
	//});
	
	//Quita el nombre y correo electrónico de un proveedor
	$(document).on("click", "a.btn.quitarcontacto" ,function() {
		var name = $(this).attr("name");
		var numcontacto = name.substr(name.length - 3);

		$( "#contacto" + numcontacto ).fadeOut( "fast" );
		$( "#correo" + numcontacto ).fadeOut( "fast" );
		$( "#quitarcontacto" + numcontacto ).fadeOut( "fast" );
	});

	//Quita la información completa de un proveedor de la tabla
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

	//Busca un proveedor de acuerdo a la clave que se escriba en el campo CLAVE
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
						$("#clave_" + ($row)).val(val.clave);
						$("#razonsocial_" + ($row)).val(val.razonSocial);
						$("#direccion_" + ($row)).val(val.direccion);
						$("#contacto1_" + ($row)).val(val.nombre1);
						$("#contacto2_" + ($row)).val(val.nombre2);
						$("#contacto3_" + ($row)).val(val.nombre3);
						$("#correo1_" + ($row)).val(val.correoElectronico1);
						$("#correo2_" + ($row)).val(val.correoElectronico2);
						$("#correo3_" + ($row)).val(val.correoElectronico3);
					});
				}
			});
		}
	});


	
	
</script>