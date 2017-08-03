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
                <ul class="nav navbar-right panel_toolbox">
                  	<li>
                  		<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  	</li>
                </ul>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
	          	<?php echo validation_errors(); ?>
				<?php echo form_open('po_general/edit/'.$po_general['id'],array("class"=>"form-horizontal")); ?>

					<div class="form-group">
						<label for="tipo" class="col-md-2 control-label">Tipo</label>
						<div class="col-md-6">
							<select name="tipoProveedor" id="tipoProveedor" class="form-control">
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
					<div class="form-group seccion-familia hidden">
						<label for="idFamilia" class="col-md-2 control-label">Familia</label>
						<div class="col-md-6">
							<select id="idFamilia" name="idFamilia" class="form-control">
								<option value="0">Seleccione</option>
								<?php 
									foreach ($familias as $i) {
										$selected = ($i->id == $po_general["idFamilia"] ? ' selected="selected"' : "";
										echo '<option value="'. $i->id .'" '.$selected.'>'. $i->descripcion .'</option>';
									}
								?>
							</select>
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
					
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-8">
							<button type="submit" class="btn btn-success">
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
			$('.seccion-familia').removeClass('hidden');
			$('.seccion-familia').show();
			$('.seccion-proveedores').removeClass('hidden');
			$('.seccion-proveedores').show();
			$('#cargarProveedoresBienes').removeClass('hidden');
			$('#cargarProveedoresBienes').show();
			$('#cargarProveedoresServicios').hide();
			$('.seccion-articulos').removeClass('hidden');
			$('.seccion-articulos').show();
		} else if (tipoProveedor == "S"){
			$('.seccion-familia').hide();
			$('.seccion-proveedores').removeClass('hidden');
			$('.seccion-proveedores').show();
			$('#cargarProveedoresServicios').removeClass('hidden');
			$('#cargarProveedoresServicios').show();
			$('#cargarProveedoresBienes').hide();
			$('.seccion-articulos').hide();
		} else {
			$('.seccion-familia').hide();
			$('.seccion-proveedores').hide();
			$('.seccion-articulos').hide();
		}

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
				$('.seccion-articulos').removeClass('hidden');
				$('.seccion-articulos').show();
			} else if (val == "S"){
				$('.seccion-familia').hide();
				$('.seccion-proveedores').removeClass('hidden');
				$('.seccion-proveedores').show();
				$('#cargarProveedoresServicios').removeClass('hidden');
				$('#cargarProveedoresServicios').show();
				$('#cargarProveedoresBienes').hide();
				$('.seccion-articulos').hide();
			} else {
				$('.seccion-familia').hide();
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

	});


	
</script>
