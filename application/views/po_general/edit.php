<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Edit</h2>
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
										$selected = ($value == $po_general['tipo']) ? ' selected="selected"' : "";

										echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
						<label for="oficioNumero" class="col-md-4 control-label">Oficio No.</label>
						<div class="col-md-8">
							<input type="text" name="oficioNumero" value="<?php echo ($this->input->post('oficioNumero') ? $this->input->post('oficioNumero') : $po_general['oficioNumero']); ?>" class="form-control" id="oficioNumero" />
						</div>
					</div>
					<div class="form-group">
						<label for="fechaElaboracion" class="col-md-4 control-label">FechaElaboracion</label>
						<div class="col-md-8">
							<input type="text" name="fechaElaboracion" value="<?php
							$fecha2 = $po_general['fechaElaboracion'];
							$fechaElaboracion = date("d/m/Y", strtotime($fecha2)); 
							echo ($this->input->post('fechaElaboracion') ? $this->input->post('fechaElaboracion') : $fechaElaboracion); ?>" class="form-control" id="fechaElaboracion" />
						</div>
					</div>
					<div class="form-group">
						<label for="asunto" class="col-md-4 control-label">Asunto</label>
						<div class="col-md-8">
							<input type="text" name="asunto" value="<?php echo ($this->input->post('asunto') ? $this->input->post('asunto') : $po_general['asunto']); ?>" class="form-control" id="asunto" />
						</div>
					</div>
					<div class="form-group">
						<label for="domicilio" class="col-md-4 control-label">Domicilio Remitente</label>
						<div class="col-md-8">
							<input type="text" name="domicilio" value="<?php echo ($this->input->post('domicilio') ? $this->input->post('domicilio') : $po_general['domicilio']); ?>" class="form-control" id="domicilio" />
						</div>
					</div>
					<div class="form-group">
							<label for="idEmpleadoResponsable" class="col-md-4 control-label">Empleado Responsable</label>
							<div class="col-md-8">
								<select name="idEmpleadoResponsable" class="form-control">
									<option value="">select empleado</option>
									<?php 
									foreach($all_listaempleado as $empleado)
									{
										$selected = ($empleado['id'] == $po_general['idEmpleadoResponsable']) ? ' selected="selected"' : "";

										echo '<option value="'.$empleado['id'].'" '.$selected.'>'.$empleado['rpe'].'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
							<label for="idEmpleadoFormula" class="col-md-4 control-label">Empleado Formula</label>
							<div class="col-md-8">
								<select name="idEmpleadoFormula" class="form-control">
									<option value="">select empleado</option>
									<?php 
									foreach($all_listaempleado as $empleado)
									{
										$selected = ($empleado['id'] == $po_general['idEmpleadoFormula']) ? ' selected="selected"' : "";

										echo '<option value="'.$empleado['id'].'" '.$selected.'>'.$empleado['rpe'].'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
						<label for="fechaLimitePresentacion" class="col-md-4 control-label">Fecha Límite de Presentacion</label>
						<div class="col-md-8">
							<input type="text" name="fechaLimitePresentacion" value="<?php 
								$fecha1 = $po_general['fechaLimitePresentacion'];
								$fechaLimitePresentacion = date("d/m/Y", strtotime($fecha1));
								echo ($this->input->post('fechaLimitePresentacion') ? $this->input->post('fechaLimitePresentacion') : $fechaLimitePresentacion); ?>" class="form-control" id="fechaLimitePresentacion" />
						</div>
					</div>
					<div class="form-group">
						<label for="horaLimitePresentacion" class="col-md-4 control-label">Hora Límite de Presentación</label>
						<div class="col-md-8">
							<input type="text" name="horaLimitePresentacion" value="<?php echo ($this->input->post('horaLimitePresentacion') ? $this->input->post('horaLimitePresentacion') : $po_general['horaLimitePresentacion']); ?>" class="form-control timepicker" id="horaLimitePresentacion" />
						</div>
					</div>
					<div class="form-group">
						<label for="ccp1" class="col-md-4 control-label">CCP 1</label>
						<div class="col-md-8">
							<input type="text" name="ccp1" value="<?php echo ($this->input->post('ccp1') ? $this->input->post('ccp1') : $po_general['ccp1']); ?>" class="form-control" id="ccp1" />
						</div>
					</div>
					<div class="form-group">
						<label for="ccp2" class="col-md-4 control-label">CCP 2</label>
						<div class="col-md-8">
							<input type="text" name="ccp2" value="<?php echo ($this->input->post('ccp2') ? $this->input->post('ccp2') : $po_general['ccp2']); ?>" class="form-control" id="ccp2" />
						</div>
					</div>
					<div class="form-group">
						<label for="ccp3" class="col-md-4 control-label">CCP 3</label>
						<div class="col-md-8">
							<input type="text" name="ccp3" value="<?php echo ($this->input->post('ccp3') ? $this->input->post('ccp3') : $po_general['ccp3']); ?>" class="form-control" id="ccp3" />
						</div>
					</div>
					
					<div class="form-group">
							<label for="idMunicipio" class="col-md-4 control-label">Municipio</label>
							<div class="col-md-8">
								<select name="idMunicipio" class="form-control">
									<option value="">select municipio</option>
									<?php 
									foreach($all_listamunicipio as $municipio)
									{
										$selected = ($municipio['id'] == $po_general['idMunicipio']) ? ' selected="selected"' : "";

										echo '<option value="'.$municipio['id'].'" '.$selected.'>'.$municipio['nombre'].'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
						<label for="fechaUltimaModificacion" class="col-md-4 control-label">Fecha de Ultima Modificación</label>
						<div class="col-md-8">
							<input type="text" name="fechaUltimaModificacion" value="<?php 
							$fecha3 = $po_general['fechaUltimaModificacion'];
							$fechaUltimaModificacion = date("d/m/Y H:i:s", strtotime($fecha3));
							echo ($this->input->post('fechaUltimaModificacion') ? $this->input->post('fechaUltimaModificacion') : $fechaUltimaModificacion); ?>" class="form-control" id="fechaUltimaModificacion" disabled/>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-8">
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
	});


	
</script>
