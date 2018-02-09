<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Agregar aspectos a considerar</h2>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
				<?php echo validation_errors(); ?>
				<?php echo form_open('po_consideracion/add',array("class"=>"form-horizontal")); ?>

					<div class="form-group">
						<label for="idpog" class="col-md-4 control-label">Seleccione el PO General</label>
						<div class="col-md-8">
							<select id="idpog" name="idpog" class="form-control">
								<option value="">Seleccione</option>
									<?php 
									foreach($all_listapo_general as $po_general)
									{
										$selected = ($po_general['id'] == $this->input->post('idpog')) ? ' selected="selected"' : "";
										$fecha = $po_general['fechaElaboracion'];
										$fechaElaboracion = date("d/m/Y", strtotime($fecha)); 
										$yrElaboracion = date('Y', strtotime($fecha));
										echo '<option value="'.$po_general['id'].'" '.$selected.'>Oficio No. 137-'.$po_general['oficioNumero'].'/'.$yrElaboracion.'   -   Fecha de Elaboración: '.$fechaElaboracion.'</option>';
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
								<i>Especificaciones Técnicas </i>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc2" class="col-md-4 control-label">Punto 2</label>
						<div class="col-md-8">
							<textarea name="fc2" class="form-control summernote" id="fc2">
								<?php echo $this->input->post('fc2'); ?>
								<i>Plazo de entrega del bien o de la prestación del servicio: será </i>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc3" class="col-md-4 control-label">Punto 3</label>
						<div class="col-md-8">
							<textarea name="fc3" class="form-control summernote" id="fc3">
								<?php echo $this->input->post('fc3'); ?>
								<i>El lugar de entrega será </i>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc4" class="col-md-4 control-label">Punto 4</label>
						<div class="col-md-8">
							<textarea name="fc4" class="form-control summernote" id="fc4">
								<?php echo $this->input->post('fc4'); ?>
								<i>Considerar en su cotización que el pago será de <u><?php echo $poc_inicial[0]["tiempopago"] ?></u> días naturales a partir de la aceptación de la factura, por entrega realizada.</i>
							</textarea>
						</div>
					</div>

                    <?php
                        if($poc_inicial[0]["condicionprecio"] == "F")
                            $condicion = "FIJO";
                        else
                            $condicion = "VARIABLE";
                    ?>

					<div class="form-group">
						<label for="fc5" class="col-md-4 control-label">Punto 5</label>
						<div class="col-md-8">
							<textarea name="fc5" class="form-control summernote" id="fc5">
								<?php echo $this->input->post('fc5'); ?>
								<i>Condición de los precios será: <u><?php echo $condicion ?></u></i>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc6" class="col-md-4 control-label">Punto 6</label>
						<div class="col-md-8">
							<textarea name="fc6" class="form-control summernote" id="fc6">
								<?php echo $this->input->post('fc6'); ?>
								<i>El porcentaje de la garantía de cumplimiento que deberá aplicarse a los contratos que sean generados de los procedimientos de contratación, será del 10% y será divisible.</i>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc7" class="col-md-4 control-label">Punto 7</label>
						<div class="col-md-8">
							<textarea name="fc7" class="form-control summernote" id="fc7">
								<?php echo $this->input->post('fc7'); ?>
								<i>La condición de los precios será <u><?php echo $condicion ?></u></i>
							</textarea>
						</div>
					</div>
                    <?php
                        if($poc_inicial[0]["moneda"] == "MXN")
                            $moneda = "moneda nacional. PESOS MXN.";
                        else
                            $moneda = "dólares. USD.";
                    ?>
					<div class="form-group">
						<label for="fc8" class="col-md-4 control-label">Punto 8</label>
						<div class="col-md-8">
							<textarea name="fc8" class="form-control summernote" id="fc8">
								<?php echo $this->input->post('fc8'); ?>
								<i>Moneda a cotizar será en <?php echo $moneda ?></i>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc9" class="col-md-4 control-label">Punto 9</label>
						<div class="col-md-8">
							<textarea name="fc9" class="form-control summernote" id="fc9">
								<?php echo $this->input->post('fc9'); ?>
								<i>Idioma de cotización: Español México</i>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc10" class="col-md-4 control-label">Punto 10</label>
						<div class="col-md-8">
							<textarea name="fc10" class="form-control summernote" id="fc10">
								<?php echo $this->input->post('fc10'); ?>
								<i>Porcentaje de Garantía: <u><?php echo $poc_inicial[0]["porcentajegarantia"]."%" ?></u></i>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc11" class="col-md-4 control-label">Punto 11</label>
						<div class="col-md-8">
							<textarea name="fc11" class="form-control summernote" id="fc11">
								<?php echo $this->input->post('fc11'); ?>
								<i>Modalidad de Garantía: garantía de sostenimiento de oferta, de anticipo, de cumplimiento, de calidad, de los vicios ocultos, de cualquier otra responsabilidad.</i>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc12" class="col-md-4 control-label">Punto 12</label>
						<div class="col-md-8">
							<textarea name="fc12" class="form-control summernote" id="fc12">
								<?php echo $this->input->post('fc12'); ?>
								<i>Penas Convencionales: Por atraso en el cumplimiento de las obligaciones, <b><u><?php echo $poc_inicial[0]["penaconvencional"] ?>% diario</u></b> el cual en su conjunto <b><u>no podrá exceder del <?php echo $poc_inicial[0]["maxpenalizacion"] ?> del monto total del contrato sin incluir el IVA.</u></b></i>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc13" class="col-md-4 control-label">Punto 13</label>
						<div class="col-md-8">
							<textarea name="fc13" class="form-control summernote" id="fc13">
								<?php echo $this->input->post('fc13'); ?>
								<i>Deducciones:<u> <?php echo $poc_inicial[0]["deducciones"] ?></u></i>
							</textarea>
						</div>
					</div>
                    <?php
                    if($poc_inicial[0]["entregaanticipada"] == "S")
                        $entrega = "SÍ";
                    else
                        $entrega = "NO";
                    ?>
					<div class="form-group">
						<label for="fc14" class="col-md-4 control-label">Punto 14</label>
						<div class="col-md-8">
							<textarea name="fc14" class="form-control summernote" id="fc14">
								<?php echo $this->input->post('fc14'); ?>
                                <i>Se aceptan entregas parciales y anticipadas. <u><?php echo $entrega ?>.</u></i>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc15" class="col-md-4 control-label">Punto 15</label>
						<div class="col-md-8">
							<textarea name="fc15" class="form-control summernote" id="fc15">
								<?php echo $this->input->post('fc15'); ?>
								<i>Vigencia de la Cotización <?php echo $poc_inicial[0]["vigenciacotizacion"] ?> días</i>
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

		$("#idpog")[0].selectedIndex = 1;
		

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