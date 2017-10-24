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
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Editar Petición Oferta</h2>
                
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
	          	<?php echo validation_errors(); ?>
				<?php echo form_open('po_general/edit/'.$po_general['id'],array("class"=>"form-horizontal")); ?>

					<div class="form-group">
						<label for="tipo" class="col-md-2 control-label">Tipo</label>
						<div class="col-md-6">
							<select name="tipo" id="tipoProveedor" class="form-control">
								<option value="0">Seleccione</option>
								<?php 
									$tipo_values = array(
										'B'=>'Bienes',
										'S'=>'Servicios',
									);

									foreach($tipo_values as $value => $display_text)
									{
										$selected = ($value == $po_general['tipo']) ? ' selected="selected"' : "";
										echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
									} 
									?>
							</select>
						</div>
					</div>

					<!-- Solo aparece si se selecciona un proveedor de tipo bienes -->
					<div class="seccion-oculta hidden">
						<div class="form-group">
							<label for="idFamilia" class="col-md-2 control-label">Familia</label>
							<div class="col-md-6">
								<select id="idFamilia" name="idFamilia" class="form-control">
									<option value="0">Seleccione</option>
									<?php 
										foreach ($familias as $i) {
											$selected = ($i->id == $po_general["idFamilia"]) ? ' selected="selected"' : "";
											echo '<option value="'. $i->id .'" '.$selected.'>'. $i->descripcion .'</option>';
										}
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="actividad" class="col-md-2 control-label">Actividad</label>
							<div class="col-md-6">
								<select name="actividad" id="actividad" class="form-control">
									<option value="0">Seleccione</option>
									<?php 
										$tipo_values = array(
											'A'=>'Adquisición',
											'R'=>'Arrendamiento',
										);

										foreach($tipo_values as $value => $display_text)
										{
											$selected = ($value == $po_general['actividad']) ? ' selected="selected"' : "";
											echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
										} 
                                    ?>
								</select>
							</div>
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
							<input type="text" name="fechaElaboracion" value="<?php
							$fecha2 = $po_general['fechaElaboracion'];
							$fechaElaboracion = date("d/m/Y", strtotime($fecha2)); 
							echo ($this->input->post('fechaElaboracion') ? $this->input->post('fechaElaboracion') : $fechaElaboracion); ?>" class="form-control" id="fechaElaboracion" />
						</div>
					</div>
					<div class="form-group">
						<label for="asunto" class="col-md-2 control-label">Asunto</label>
						<div class="col-md-6">
							<input type="text" name="asunto" value="<?php echo ($this->input->post('asunto') ? $this->input->post('asunto') : $po_general['asunto']); ?>" class="form-control" id="asunto" />
						</div>
					</div>
					<div class="form-group">
						<label for="titulo" class="col-md-2 control-label">Título</label>
						<div class="col-md-6">
							<input type="text" name="titulo" value="<?php echo $imTitulo ?>" class="form-control" id="titulo" maxlength="255"/>
						</div>
					</div>
					<div class="form-group">
						<label for="domicilio" class="col-md-2 control-label">Domicilio Remitente</label>
						<div class="col-md-6">
							<input type="text" name="domicilio" value="<?php echo ($this->input->post('domicilio') ? $this->input->post('domicilio') : $po_general['domicilio']); ?>" class="form-control" id="domicilio" />
						</div>
					</div>
					<div class="form-group">
						<label for="empleadoResponsable" class="col-md-2 control-label">Empleado Responsable</label>
						<div class="col-md-2">
							<div class="input-group">
								<input type="text" id="empleadoResponsable" name="empleadoResponsable" value="<?php echo $empleadoResponsable[0]['rpe']?>" maxlength="5" class="form-control pull-right" placeholder="Ingrese RPE"/>
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-search"></i>	
								</span>
							</div>
						</div>
						<div class="col-md-4">
							<input type="text" id="empleadoResponsable2" value="<?php echo  $empleadoResponsable[0]['nombre'].' '.$empleadoResponsable[0]['apellidoPaterno'].' '.$empleadoResponsable[0]['apellidoMaterno']?>" name="empleadoResponsable2" class="form-control" readonly placeholder="Nombre del empleado"/>
						</div>
					</div>
					<div class="form-group">
						<label for="empleadoFormula" class="col-md-2 control-label">Empleado Formula</label>
						<div class="col-md-2">
							<div class="input-group">
								<input type="text" id="empleadoFormula" name="empleadoFormula" value="<?php echo $empleadoFormula[0]['rpe']?>" maxlength="5" class="form-control pull-right" placeholder="Ingrese RPE"/>
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-search"></i>	
								</span>
							</div>
						</div>
						
						<div class="col-md-4">
							<input type="text" id="empleadoFormula2" value="<?php echo  $empleadoFormula[0]['nombre'].' '.$empleadoFormula[0]['apellidoPaterno'].' '.$empleadoFormula[0]['apellidoMaterno']?>" name="empleadoFormula2" class="form-control" readonly placeholder="Nombre del empleado"/>
						</div>
					</div>
					<div class="form-group">
						<label for="fechaLimitePresentacion" class="col-md-2 control-label">Fecha Límite de Presentacion</label>
						<div class="col-md-6">
							<input type="text" name="fechaLimitePresentacion" value="<?php 
								$fecha1 = $po_general['fechaLimitePresentacion'];
								$fechaLimitePresentacion = date("d/m/Y", strtotime($fecha1));
								echo ($this->input->post('fechaLimitePresentacion') ? $this->input->post('fechaLimitePresentacion') : $fechaLimitePresentacion); ?>" class="form-control" id="fechaLimitePresentacion" />
						</div>
					</div>
					<div class="form-group">
						<label for="horaLimitePresentacion" class="col-md-2 control-label">Hora Límite de Presentación</label>
						<div class="col-md-6">
							<input type="text" name="horaLimitePresentacion" value="<?php echo ($this->input->post('horaLimitePresentacion') ? $this->input->post('horaLimitePresentacion') : $po_general['horaLimitePresentacion']); ?>" class="form-control timepicker" id="horaLimitePresentacion" />
						</div>
					</div>
					<div class="form-group">
						<label for="ccp1" class="col-md-2 control-label">CCP 1</label>
						<div class="col-md-6">
							<input type="text" name="ccp1" value="<?php echo ($this->input->post('ccp1') ? $this->input->post('ccp1') : $po_general['ccp1']); ?>" class="form-control" id="ccp1" />
						</div>
					</div>
					<div class="form-group">
						<label for="ccp2" class="col-md-2 control-label">CCP 2</label>
						<div class="col-md-6">
							<input type="text" name="ccp2" value="<?php echo ($this->input->post('ccp2') ? $this->input->post('ccp2') : $po_general['ccp2']); ?>" class="form-control" id="ccp2" />
						</div>
					</div>
					<div class="form-group">
						<label for="ccp3" class="col-md-2 control-label">CCP 3</label>
						<div class="col-md-6">
							<input type="text" name="ccp3" value="<?php echo ($this->input->post('ccp3') ? $this->input->post('ccp3') : $po_general['ccp3']); ?>" class="form-control" id="ccp3" />
						</div>
					</div>
					<div class="form-group">
						<label for="fechaUltimaModificacion" class="col-md-2 control-label">Fecha de Última Modificación</label>
						<div class="col-md-6">
							<input type="text" name="fechaUltimaModificacion" value="<?php 
							$fecha3 = $po_general['fechaUltimaModificacion'];
							$fechaUltimaModificacion = date("d/m/Y H:i:s", strtotime($fecha3));
							echo ($this->input->post('fechaUltimaModificacion') ? $this->input->post('fechaUltimaModificacion') : $fechaUltimaModificacion); ?>" class="form-control" id="fechaUltimaModificacion" disabled/>
						</div>
					</div>

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
								<?php
									$rows = count($proveedoresPog);
									for($i = 0; $i < $rows; $i++){
										$html = '
											<tr>
												<td class="col-md-2">
													<input type="text" name="clave_'.($i+1).'" id="clave_'.($i+1).'" value="'.$proveedoresPog[$i]["clave"].'" class="form-control lowered" maxlength="15"/>
												</td>
												<td class="col-md-3">
													<textarea name="razonsocial_'.($i+1).'" id="razonsocial_'.($i+1).'" class="form-control">'.$proveedoresPog[$i]["razonSocial"].'</textarea>
													<textarea name="direccion_'.($i+1).'" id="direccion_'.($i+1).'" class="form-control lowered2">'.$proveedoresPog[$i]["direccion"].'</textarea>
												</td>
												<td class="col-md-4">
													<input type="text" name="contacto1_'.($i+1).'" id="contacto1_'.($i+1).'" value="'.$proveedoresPog[$i]["nombre1"].'" class="form-control" disabled/>
													<input type="text" name="contacto2_'.($i+1).'" id="contacto2_'.($i+1).'" value="'.$proveedoresPog[$i]["nombre2"].'" class="form-control" disabled/>
													<input type="text" name="contacto3_'.($i+1).'" id="contacto3_'.($i+1).'" value="'.$proveedoresPog[$i]["nombre3"].'" class="form-control" disabled/>
												</td>
												<td>
													<div class="row">
														<input type="text" name="correo1_'.($i+1).'" id="correo1_'.($i+1).'" value="'.$proveedoresPog[$i]["correoElectronico1"].'" class="form-control" disabled/>
														<a name="quitarcontacto1_'.($i+1).'" id="quitarcontacto1_'.($i+1).'" class="btn btn-danger btn-xs aligned quitarcontacto"><span class="fa fa-times"></span></a>
													</div>
													<div class="row">
														<input type="text" name="correo2_'.($i+1).'" id="correo2_'.($i+1).'" value="'.$proveedoresPog[$i]["correoElectronico2"].'" class="form-control" disabled/>
														<a name="quitarcontacto2_'.($i+1).'" id="quitarcontacto2_'.($i+1).'" class="btn btn-danger btn-xs aligned quitarcontacto"><span class="fa fa-times"></span></a>
													</div>
													<div class="row">
														<input type="text" name="correo3_'.($i+1).'" id="correo3_'.($i+1).'" value="'.$proveedoresPog[$i]["correoElectronico3"].'" class="form-control" disabled/>
														<a name="quitarcontacto3_'.($i+1).'" id="quitarcontacto3_'.($i+1).'" class="btn btn-danger btn-xs aligned quitarcontacto"><span class="fa fa-times"></span></a>
													</div>
												</td>
												<td class="spacer">
													<a  name="quitarproveedor_'.($i+1).'" id="quitarproveedor_'.($i+1).'" class="btn btn-danger btn-xs lowered quitarproveedor aligned-right"><span class="fa fa-trash"></span></a>
													<a name="buscarproveedor_'.($i+1).'" id="buscarproveedor_'.($i+1).'" class="btn btn-info btn-xs buscarproveedor aligned-right"><span class="fa fa-search"></span></a>
												</td>
											</tr>
										';
										echo $html;
									}
								?>

							</tbody>
						</table>

						<hr />
					</div>

					<div class="seccion-articulos hidden">
					
						<h2>Artículos</h2>
						<h4>Seleccione los artículos de la familia seleccionada para enviar a los proveddores junto con la Petición Oferta</h4>
						
						<br />
						<div class="form-group">
							<a id="cargarArticulos" class="btn btn-primary">
								<i class="fa "></i> Cargar artículos de familia
							</a>
							<a id="agregarRegistroArticulos" class="btn btn-primary">
								<i class="fa "></i> Agregar registro en blanco
							</a>
						</div>

						<br />
						

						<table id="tablaArticulos" class="table table-hover">
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
								<?php
									$rowsim = count($imConcepto);
									for($i = 0; $i < $rowsim; $i++){
										$html_im = '
											<tr>
												<td >
													<input type="text" name="partida_'.($i+1).'" id="partida_'.($i+1).'" value="'.$imConcepto[$i]["partida"].'" class="form-control partida" disabled/> 
												</td>
												<td >
													<input type="text" name="codigo_'.($i+1).'" id="codigo_'.($i+1).'" value="'.$imConcepto[$i]["codigo"].'" class="form-control" maxlength="10"/>
												</td>
												<td >
													<input type="text" name="descripcion_'.($i+1).'" id="descripcion_'.($i+1).'" value="'.$imConcepto[$i]["descripcion"].'" class="form-control" disabled/>
												</td>
												<td >
													<input type="text" name="plazoentrega_'.($i+1).'" id="plazoentrega_'.($i+1).'" value="'.$imConcepto[$i]["plazoEntrega"].'" class="form-control" maxlength="11"/>
												</td>
												<td >
													<input type="text" name="cantidad_'.($i+1).'" id="cantidad_'.($i+1).'" value="'.$imConcepto[$i]["cantidad"].'" class="form-control" maxlength="11"/>
												</td>
												<td class="col-md-1">
													<input type="text" name="um_'.($i+1).'" id="um_'.($i+1).'" value="'.$imConcepto[$i]["clave"].'" class="form-control" disabled/>
												</td>
												<td >
													<select name="lugarentrega_'.($i+1).'" id="lugarentrega_'.($i+1).'" class="form-control select-lugar">
													</select>
												</td>';
										$html_im .= '
												<td class="col-md-2">
													<input type="text" name="direccionentrega_'.($i+1).'" id="direccionentrega_'.($i+1).'"  value="'.$imConcepto[$i]["direccionEntrega"].'" class="form-control input-direccion" disabled/>
												</td>
												<td>
													<a name="quitararticulo_'.($i+1).'" id="quitararticulo_'.($i+1).'" class="btn btn-danger btn-xs quitararticulo"><span class="fa fa-trash"></span></a>
													<a name="buscararticulo_'.($i+1).'" id="buscararticulo_'.($i+1).'" class="btn btn-info btn-xs buscararticulo"><span class="fa fa-search"></span></a>
												</td>
											</tr>';
										echo $html_im;
									}
								?>
							</tbody>
						</table>
						
						
						<hr />
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-8">
							<button id="botonEditar" type="submit" class="btn btn-success">
								<i class="fa fa-arrow-right"></i> Continuar
							</button>
							<a href="<?php echo site_url('po_general/index/'); ?>" id="botonCancelar" class="btn btn-danger">
								<span class="fa fa-ban"></span> Cancelar
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

		console.log("<?php echo $imTitulo ?>");

		var options = {
			twentyFour: true,
			timeSeparator: ':',
			title: "Formato 24 Hrs"
		}

		$("#horaLimitePresentacion").click(function(){
			$('.timepicker').wickedpicker(options);
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
			$("#fechaLimitePresentacion").datepicker();
			$("#fechaElaboracion").datepicker();
		});
		
		var tipoProveedor = "<?php echo $po_general['tipo'] ?>";
		if (tipoProveedor == "B"){
			$('.seccion-oculta').removeClass('hidden');
			$('.seccion-oculta').show();
			$('.seccion-proveedores').removeClass('hidden');
			$('.seccion-proveedores').show();
			$('#cargarProveedoresBienes').removeClass('hidden');
			$('#cargarProveedoresBienes').show();
			$('#cargarProveedoresServicios').hide();
			$('.seccion-articulos').removeClass('hidden');
			$('.seccion-articulos').show();
		} else if (tipoProveedor == "S"){
			$('.seccion-oculta').hide();
			$('.seccion-proveedores').removeClass('hidden');
			$('.seccion-proveedores').show();
			$('#cargarProveedoresServicios').removeClass('hidden');
			$('#cargarProveedoresServicios').show();
			$('#cargarProveedoresBienes').hide();
			$('.seccion-articulos').hide();
		} else {
			$('.seccion-oculta').hide();
			$('.seccion-proveedores').hide();
			$('.seccion-articulos').hide();
		}

		//Oculta secciones dependiendo de la elección de tipo de proveedor
		$('#tipoProveedor').change(function(){
			var val = $(this).val();
			
			if (val == "B"){
				$('.seccion-oculta').removeClass('hidden');
				$('.seccion-oculta').show();
				$('.seccion-proveedores').removeClass('hidden');
				$('.seccion-proveedores').show();
				$('#cargarProveedoresBienes').removeClass('hidden');
				$('#cargarProveedoresBienes').show();
				$('#cargarProveedoresServicios').hide();
				$('.seccion-articulos').removeClass('hidden');
				$('.seccion-articulos').show();
			} else if (val == "S"){
				$('.seccion-oculta').hide();
				$('.seccion-proveedores').removeClass('hidden');
				$('.seccion-proveedores').show();
				$('#cargarProveedoresServicios').removeClass('hidden');
				$('#cargarProveedoresServicios').show();
				$('#cargarProveedoresBienes').hide();
				$('.seccion-articulos').hide();
			} else {
				$('.seccion-oculta').hide();
				$('.seccion-proveedores').hide();
				$('.seccion-articulos').hide();
			}
		});


		/*
		* Muestra los valores de estado y municipio que se habían asignado al momento de agregar el proveedor
		* (Valores obtenidos de la base de datos)
		*/
		$("#idEstado option:contains('NINGUNO')").remove();
		seleccionEstado = '<?php echo $estadoSeleccionado; ?>';
		if(seleccionEstado != 0){
			$("#idEstado").val(seleccionEstado);
			$("#idEstado option:selected").each(function() {
				idEstado = $('#idEstado').val();
				$.post("<?php echo base_url(); ?>index.php/controllerComboBoxes/fillMunicipios", {
					idEstado : idEstado
				}, function(data) {
					$("#idMunicipio").html(data);
					$("#idMunicipio").val('<?php echo $municipioSeleccionado; ?>');
				});
			});
		}


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

		//Poblar los selects de lugar de entrega
		$rowsArticulos = $("#tablaArticulos > tbody > tr").length;
		
		for($j = 0; $j < $rowsArticulos; $j++){
			var htmlOptions = '<?php 
				
				echo '<option value="0">Seleccione</option>';
				foreach ($almacenes as $i) {
					echo '<option value="'. $i->id .'">'. $i->centroMM .' - '. mb_strtoupper($i->nombre) .'</option>';
				}
				echo '<option value="'.sizeof($almacenes).'">OTRO</option>';
			?>';
			$("#lugarentrega_" + ($j+1)).append(htmlOptions);
		}

		//Seleccionar el lugar de entrega correspondiente para cada select
		var arrayFromPHP = <?php echo json_encode($imConcepto); ?>;
		//console.log(arrayFromPHP);
		var arrayLength = arrayFromPHP.length;

		for (i = 0; i < arrayLength; i++){
			$("#lugarentrega_" + (i+1) + " option:contains(" + (arrayFromPHP[i].lugarEntrega).toUpperCase() + ")").prop("selected", true);
			if(arrayFromPHP[i].lugarEntrega == "OTRO"){
				$("#direccionentrega_" + (i+1)).prop("disabled", false);
			}
		}

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

		//Agrega una fila en blanco a la tabla de artículos
		$("#agregarRegistroArticulos").click(function(){
			//Busca el valor de la última partida
			var ultimaPartida = parseInt($("#tablaArticulos tr:last input.partida").val());

			var cuentaActual = $("#tablaArticulos tbody tr:last input:last").attr("name").split("_").pop();
			var cuentaNueva = parseInt(cuentaActual) + 1;

			$('#tablaArticulos tbody>tr:last').clone(true).insertAfter('#tablaArticulos tbody>tr:last');
			$('#tablaArticulos tbody>tr:last').find("input, select, a").each(function (){
				var nuevoId = $(this).attr("id").replace("_" + cuentaActual, "_" + cuentaNueva);
				var nuevoName = $(this).attr("name").replace("_" + cuentaActual, "_" + cuentaNueva);
				$(this).attr("id", nuevoId).attr("name", nuevoName);
				if($(this).is("input")){
					$(this).val("");
				}
				$("#partida_" + cuentaNueva).val(ultimaPartida + 1);
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
				}
			});
		});

		//Carga los artículos relacionados con la familia seleccionada
		$("#cargarArticulos").click(function(){
			var idFamilia = $("#idFamilia").val();
			if(idFamilia != 0){
				$.ajax({
					url: '<?php echo base_url(); ?>index.php/Po_general/obtenerListaArticulos',
					method: 'POST',
					data: {
						idFamilia: idFamilia
					},
					success: function (returned) {
						var returned = JSON.parse(returned);
						var longitud = returned.listaarticulos.length;

						$("#tablaArticulos").find("tr:gt(1)").remove();
						
						var cuentaActual = $("#tablaArticulos tbody tr:last input:last").attr("name").split("_").pop();
						$('#tablaArticulos tbody>tr:last').find("input, select, a").each(function (){
							var nuevoId = $(this).attr("id").replace("_" + cuentaActual, "_1");
							var nuevoName = $(this).attr("name").replace("_" + cuentaActual, "_1");
							$(this).attr("id", nuevoId).attr("name", nuevoName);
							$(this).removeAttr("style");
							if($(this).is("input")){
								$(this).val("");
							}
						});

						
						for (var i = 1; i < longitud; i++) {
							$('#tablaArticulos tbody>tr:last').clone(true).insertAfter('#tablaArticulos tbody>tr:last');
							$('#tablaArticulos tbody>tr:last').find("input, select, a").each(function (){
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
							$("#um_" + (i+1)).val(val.unidadmedida);
						});
					}
				});
			}	
		});

		$("#botonEditar").click(function(){
			var id = <?php echo $po_general['id'] ?>

			$.ajax({
				url: '<?php echo base_url();?>index.php/Po_general/eliminarRelaciones',
				method: 'POST',
				async: false,
				data: {
					id: id,
				}
			});

			//Longitud - 1 para el número real de renglones en la tabla
			var longitudTabla = $("#tablaProveedores tr").length - 1;
			var numOficios = 0;
			//obtiene los proveedores y contactos involucrados en esta PO y los manda a la tabla po_proveedor
			for(i = 0; i < longitudTabla; i++){
				var cuentaActual1 = $("#tablaProveedores tbody tr:eq(" + i + ") input:first").attr("name").split("_").pop();
				var clave = $("#clave_" + cuentaActual1).val();
				if(clave != ""){
					for(j = 1; j <= 3; j++){
						var contacto = $("#contacto" + j + "_" + cuentaActual1);
						if(contacto.val() != "" && contacto.css('display') != 'none')
						{	
							$.ajax({
								url: '<?php echo base_url();?>index.php/Po_general/crearRelacionProveedor',
								method: 'POST',
								async: false,
								data: {
									id: id,
									clave: clave,
									numcontacto: j
								}
							});
							numOficios++;
						}
					}
				}
			}

			var fecha = $('#fechaElaboracion').val();
			//Crear los números de oficio que se enviaran a los proveedores
			//Estos números serán visibles en los PDFs
			for(i = 0; i < numOficios; i++){
				$.ajax({
					url: '<?php echo base_url();?>index.php/Po_general/crearNumeroOficio',
					method: 'POST',
					async: false,
					data: {
						id: id,
						fecha: fecha,
					}
				});
			}
			

			//insertar en la tabla IM_GENERAL
			if($('#titulo').val() != ""){
				var titulo = $('#titulo').val();
				var idMunicipio = $('#idMunicipio').val();
				var rpe1 = $('#empleadoResponsable').val();
				var rpe2 = $('#empleadoFormula').val();
				$.ajax({
					url: '<?php echo base_url();?>index.php/Po_general/crearRelacionIMGeneral',
					method: 'POST',
					async: false,
					data: {
						id: id,
						titulo: titulo,
						rpe1: rpe1,
						rpe2: rpe2,
						idMunicipio: idMunicipio,
						fecha: fecha
					}
				});
			}

			var tipoProveedor = $('#tipoProveedor').val();
			var longitudTablaArticulo = $("#tablaArticulos tr").length - 1;

			for(k = 0; k < longitudTablaArticulo; k++){
				var cuentaActual2 = $("#tablaArticulos tbody tr:eq(" + k + ") input:first").attr("name").split("_").pop();
				var articuloCodigo = $("#codigo_" + cuentaActual2).val();
				var partida = $("#partida_" + cuentaActual2).val();
				var plazoEntrega = $("#plazoentrega_" + cuentaActual2).val();
				var cantidad = $("#cantidad_" + cuentaActual2).val();
				var lugar = $("#lugarentrega_" + cuentaActual2 + " option:selected").text();
				var lugarEntrega = lugar.split("- ").pop();
				var direccion = $("#direccionentrega_" + cuentaActual2).val();
				$.ajax({
					url: '<?php echo base_url();?>index.php/Po_general/crearRelacionIMConcepto',
					method: 'POST',
					async: false,
					data: {
						id: id,
						tipo: tipoProveedor,
						articuloCodigo: articuloCodigo,
						partida: partida,
						plazoEntrega: plazoEntrega,
						cantidad: cantidad,
						lugarEntrega: lugarEntrega,
						direccion: direccion 
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
				url: '<?php echo base_url(); ?>index.php/Po_general/obtenerDireccionAlmacen',
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
		if($("#tablaArticulos tbody tr").length > 1){
			var tableRow = $(this).closest('tr');
    		tableRow.find('td').fadeOut('fast', 
        		function(){ 
            		tableRow.remove();
					//Renumera la partida después de quitar un renglón
					longitudNueva = $("#tablaArticulos tbody tr").length;
					for (i = 1; i <= longitudNueva; i++) { 
						$("#tablaArticulos tr:eq(" + i + ") input.partida").val(i);
					}                    
        		}
    		);
		} else {
			var cuentaActual = $("#tablaArticulos tbody tr:last input:last").attr("name").split("_").pop();
			$('#tablaArticulos tbody>tr:last').find("input, select, a").each(function (){
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

	$(document).on("click", "a.btn.buscararticulo" ,function() {
		var $this = $(this);
		var $codigo = $this.closest('tr').find('input:eq(1)').val();
		var $row = $this.attr("name").split("_").pop();
		if($codigo != ""){
			$.ajax({
				url: '<?php echo base_url(); ?>index.php/Po_general/obtenerArticuloCodigo',
				method: 'POST',
				data: {
					codigo: $codigo
				},
				success: function (returned) {
					var result = JSON.parse(returned);
					jQuery.each(result.articulo, function( i, val ) {    
						$("#codigo_" + ($row)).val(val.codigo);
						$("#descripcion_" + ($row)).val(val.descripcion);
						$("#plazoentrega_" + ($row)).val(val.tiempoEntrega);
						//$("#cantidad_" + ($row)).val(val.cantidadEmbalaje);
						$("#um_" + ($row)).val(val.unidadmedida);
					});
				}
			});
		}
	});
	
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
				url: '<?php echo base_url(); ?>index.php/Po_general/obtenerProveedorClave',
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
