<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Agregar aspectos a considerar</h2>
                <ul class="nav navbar-right panel_toolbox">
                  	<li>
                  		<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  	</li>
                </ul>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
				<?php echo validation_errors(); ?>
				<?php echo form_open('po_consideracion/add',array("class"=>"form-horizontal")); ?>

					<div class="form-group">
						<label for="idpog" class="col-md-4 control-label">Seleccione el PO General</label>
						<div class="col-md-8">
							<select name="idpog" class="form-control">
								<option value="">Seleccione</option>
									<?php 
									foreach($all_listapo_general as $po_general)
									{
										$selected = ($po_general['id'] == $this->input->post('idpog')) ? ' selected="selected"' : "";

										echo '<option value="'.$po_general['id'].'" '.$selected.'>'.$po_general['id'].'</option>';
									} 
									?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="fc1" class="col-md-4 control-label">Punto 1</label>
						<div class="col-md-8">
							<textarea name="fc1" class="form-control summernote" id="fc1">
								<?php echo $this->input->post('fc1'); ?>
								<p>1.- Los datos de los bienes, arrendamientos o servicios a cotizar (mismos que se especifican en el anexo de la solicitud de cotización).</p>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc2" class="col-md-4 control-label">Punto 2</label>
						<div class="col-md-8">
							<textarea name="fc2" class="form-control summernote" id="fc2">
								<?php echo $this->input->post('fc2'); ?>
								<p>2.- Condiciones de entrega:</p>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc3" class="col-md-4 control-label">Condiciones</label>
						<div class="col-md-8">
							<textarea name="fc3" class="form-control summernote" id="fc3">
								<?php echo $this->input->post('fc3'); ?>
								<p>En una sola exhibición de <u>cantidad de días señalada en documento anexo</u>&nbsp;días naturales posteriores a la recepción de la orden de surtimiento.</p><ul><li>Entregas parciales con una vigencia máxima (fechas o plazo) <b><u>N/A.</u></b></li><li>El lugar de entrega será: <b><u>El señalado en el documento anexo.</u></b></li></ul>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc4" class="col-md-4 control-label">Punto 3</label>
						<div class="col-md-8">
							<textarea name="fc4" class="form-control summernote" id="fc4">
								<?php echo $this->input->post('fc4'); ?>
								<p>3.- Considerar en su cotización que el pago es a los 20 días naturales posteriores a la entrega de la factura, previa entrega de los bienes o prestación de los servicios a satisfacción.</p>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc5" class="col-md-4 control-label">Punto 4</label>
						<div class="col-md-8">
							<textarea name="fc5" class="form-control summernote" id="fc5">
								<?php echo $this->input->post('fc5'); ?>
								<p>4.- Señalar en su caso, el porcentaje de anticipo: <b><u>N/A.</u></b></p>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc6" class="col-md-4 control-label">Punto 5</label>
						<div class="col-md-8">
							<textarea name="fc6" class="form-control summernote" id="fc6">
								<?php echo $this->input->post('fc6'); ?>
								<p>5.- El porcentaje de garantía de cumplimiento será del <b><u>10%.</u></b></p>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc7" class="col-md-4 control-label">Punto 6</label>
						<div class="col-md-8">
							<textarea name="fc7" class="form-control summernote" id="fc7">
								<?php echo $this->input->post('fc7'); ?>
								<p>6.- Penas convencionales por atraso en la entrega de bienes y/o servicios será del <b><u>10%.</u></b></p>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc8" class="col-md-4 control-label">Especificaciones</label>
						<div class="col-md-8">
							<textarea name="fc8" class="form-control summernote" id="fc8">
								<?php echo $this->input->post('fc8'); ?>
								<p>El archivo adjunto de especificaciones técnicas se hace consistir en <u style="font-weight: bold;">&nbsp;2 </u>&nbsp;fojas.</p>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc9" class="col-md-4 control-label">Punto 7</label>
						<div class="col-md-8">
							<textarea name="fc9" class="form-control summernote" id="fc9">
								<?php echo $this->input->post('fc9'); ?>
								<p>7.- En su caso, los métodos de prueba que empleará el ente público para determinar el cumplimiento de las especificaciones solicitadas.</p><ul><li>Normas que deben cumplirse.</li><li>Registros Sanitarios o Permisos Especiales, en su caso.</li></ul>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc10" class="col-md-4 control-label">Punto 8</label>
						<div class="col-md-8">
							<textarea name="fc10" class="form-control summernote" id="fc10">
								<?php echo $this->input->post('fc10'); ?>
								<p>8.- Origen de los Bienes (Nacional o de Importación): <u>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; .</u></p>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc11" class="col-md-4 control-label">Punto 9</label>
						<div class="col-md-8">
							<textarea name="fc11" class="form-control summernote" id="fc11">
								<?php echo $this->input->post('fc11'); ?>
								<p>9.- En caso de bienes de importación la moneda en que cotiza.</p>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc12" class="col-md-4 control-label">Punto 10</label>
						<div class="col-md-8">
							<textarea name="fc12" class="form-control summernote" id="fc12">
								<?php echo $this->input->post('fc12'); ?>
								<p>10.- En caso de que el proceso de fabricación de los bienes requeridos sea superior a 60 días, señale el tiempo que correspondería a su producción: <u>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; .</u></p>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc13" class="col-md-4 control-label">Punto 11</label>
						<div class="col-md-8">
							<textarea name="fc13" class="form-control summernote" id="fc13">
								<?php echo $this->input->post('fc13'); ?>
								<p>11.- En su caso, especificar si el costo incluye:</p><ul><li>Instalación.</li><li>Capacitación.</li><li>Puesta en marcha.</li></ul>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc14" class="col-md-4 control-label">Punto 12</label>
						<div class="col-md-8">
							<textarea name="fc14" class="form-control summernote" id="fc14">
								<?php echo $this->input->post('fc14'); ?>
								<p>12.- Otras garantías que se deben considerar, indicar el o los tipos de garantía, o de responsabilidad civil señalando su vigencia: <b><u>N/A.</u></b></p>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc15" class="col-md-4 control-label">Punto 13</label>
						<div class="col-md-8">
							<textarea name="fc15" class="form-control summernote" id="fc15">
								<?php echo $this->input->post('fc15'); ?>
								<p>13.- La condición de precios será (fijos o variables): <b><u>FIJOS.</u></b>&nbsp;</p>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc16" class="col-md-4 control-label">Punto 14</label>
						<div class="col-md-8">
							<textarea name="fc16" class="form-control summernote" id="fc16">
								<?php echo $this->input->post('fc16'); ?>
								<p>14.- Señalar los años de experiencia con los que cuenta la empresa: <b><u>N/A.</u></b></p>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc17" class="col-md-4 control-label">Punto 15</label>
						<div class="col-md-8">
							<textarea name="fc17" class="form-control summernote" id="fc17">
								<?php echo $this->input->post('fc17'); ?>
								<p>15.- Señalar el número de contratos similares al del alcance presente, durante los años de experiencia de la empresa: <b><u>N/A.</u></b></p>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc18" class="col-md-4 control-label">Vigencia</label>
						<div class="col-md-8">
							<textarea name="fc18" class="form-control summernote" id="fc18">
								<?php echo $this->input->post('fc18'); ?>
								<p>Vigencia de oferta: <b><u>30 días.</u></b></p>
							</textarea>
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
		$('.summernote').summernote({
			height: 150,
			toolbar: [
				// [groupName, [list of button]]
				['style', ['bold', 'italic', 'underline', 'clear']],
				['fontsize', ['fontsize']],
				['para', ['ul', 'ol', 'paragraph']],
  			]
		});
    });
</script>