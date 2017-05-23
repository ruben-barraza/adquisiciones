<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

<style>
	#listaSeleccion li {
		margin-bottom:10px
	}

	.hidden { 
		display: none; 
	}
</style>

<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Agregar proveedor</h2>
                <ul class="nav navbar-right panel_toolbox">
                  	<li>
                  		<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  	</li>
                </ul>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
				<?php echo validation_errors(); ?>
                
				<?php echo form_open('proveedor/add',array("class"=>"form-horizontal")); ?>

					<div class="form-group">
						<label for="clave" class="col-md-4 control-label">Clave</label>
						<div class="col-md-8">
							<input type="text" name="clave" value="<?php echo $this->input->post('clave'); ?>" class="form-control" id="clave" maxlength="15"/>
						</div>
					</div>
					<div class="form-group">
						<label for="rfc" class="col-md-4 control-label">RFC</label>
						<div class="col-md-8">
							<input type="text" name="rfc" value="<?php echo $this->input->post('rfc'); ?>" class="form-control" id="rfc" maxlength="15"/>
						</div>
					</div>
					<div class="form-group">
						<label for="razonSocial" class="col-md-4 control-label">Razón Social</label>
						<div class="col-md-8">
							<input type="text" name="razonSocial" value="<?php echo $this->input->post('razonSocial'); ?>" class="form-control" id="razonSocial" maxlength="150"/>
						</div>
					</div>
					<div class="form-group">
						<label for="direccion" class="col-md-4 control-label">Dirección</label>
						<div class="col-md-8">
							<input type="text" name="direccion" value="<?php echo $this->input->post('direccion'); ?>" class="form-control" id="direccion" maxlength="150"/>
						</div>
					</div>
					<div class="form-group">
						<label for="codigoPostal" class="col-md-4 control-label">Código Postal</label>
						<div class="col-md-8">
							<input type="text" name="codigoPostal" value="<?php echo $this->input->post('codigoPostal'); ?>" class="form-control" id="codigoPostal" maxlength="5"/>
						</div>
					</div>
                    <div class="form-group">
                    	<label for="idEstado" class="col-md-4 control-label">Estado</label>
                        <div class="col-md-8">
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
						<label for="idMunicipio" class="col-md-4 control-label">Municipio</label>
						<div class="col-md-8">
							<select id="idMunicipio" name="idMunicipio" class="form-control">
								<option value="0">Seleccione</option>
							</select>
						</div>
					</div>                                                            
                    <div class="form-group">
						<label for="estatus" class="col-md-4 control-label">Estatus</label>
						<div class="col-md-8">
							<select name="estatus" class="form-control">
								<option value="">Seleccione</option>
								<?php 
									$estatus_values = array(
										'A'=>'Activo',
										'B'=>'Bloqueado',
									);

									foreach($estatus_values as $value => $display_text)
									{
										$selected = ($value == $this->input->post('estatus')) ? ' selected="selected"' : "";
										echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
									} 
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="tipo" class="col-md-4 control-label">Tipo</label>
						<div class="col-md-8">
							<select id="tipoProveedor" name="tipo" class="form-control">
								<option value="">Seleccione</option>
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
                    
					<hr />
						
					<h4>Datos del contacto 1</h4>
					<div class="form-group">
						<label for="nombre1" class="col-md-4 control-label">Nombre</label>
						<div class="col-md-8">
							<input type="text" name="nombre1" value="<?php echo $this->input->post('nombre1'); ?>" class="form-control" id="nombre1" maxlength="100"/>
						</div>
					</div>
					<div class="form-group">
						<label for="direccion1" class="col-md-4 control-label">Dirección</label>
						<div class="col-md-8">
							<input type="text" name="direccion1" value="<?php echo $this->input->post('direccion1'); ?>" class="form-control" id="direccion1" maxlength="150"/>
						</div>
					</div>
					<div class="form-group">
						<label for="codigoPostal1" class="col-md-4 control-label">Código Postal</label>
						<div class="col-md-8">
							<input type="text" name="codigoPostal1" value="<?php echo $this->input->post('codigoPostal1'); ?>" class="form-control" id="codigoPostal1" maxlength="5"/>
						</div>
					</div>
                    <div class="form-group">
                        <label for="idEstado1" class="col-md-4 control-label">Estado</label>
                        <div class="col-md-8">
                        	<select id="idEstado1" name="idEstado1" class="form-control">
                            	<option value="0">Seleccione</option>
								<?php 
									foreach ($estados1 as $i) {
										echo '<option value="'. $i->id .'">'. $i->nombre .'</option>';
									}
								?>
                            </select>
                        </div>
					</div>
					<div class="form-group">
						<label for="idMunicipio1" class="col-md-4 control-label">Municipio</label>
						<div class="col-md-8">
							<select id="idMunicipio1" name="idMunicipio1" class="form-control">
								<option value="0">Seleccione</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="telefonoFijo1" class="col-md-4 control-label">Teléfono Fijo</label>
						<div class="col-md-8">
							<input type="text" name="telefonoFijo1" value="<?php echo $this->input->post('telefonoFijo1'); ?>" class="form-control" id="telefonoFijo1" maxlength="11"/>
						</div>
					</div>
					<div class="form-group">
						<label for="telefonoMovil1" class="col-md-4 control-label">Teléfono Móvil</label>
						<div class="col-md-8">
							<input type="text" name="telefonoMovil1" value="<?php echo $this->input->post('telefonoMovil1'); ?>" class="form-control" id="telefonoMovil1" maxlength="11"/>
						</div>
					</div>
					<div class="form-group">
						<label for="correoElectronico1" class="col-md-4 control-label">Correo Electrónico</label>
						<div class="col-md-8">
							<input type="text" name="correoElectronico1" value="<?php echo $this->input->post('correoElectronico1'); ?>" class="form-control" id="correoElectronico1" maxlength="100"/>
						</div>
					</div>
					<div class="form-group">
						<label for="extension1" class="col-md-4 control-label">Extensión</label>
						<div class="col-md-8">
							<input type="text" name="extension1" value="<?php echo $this->input->post('extension1'); ?>" class="form-control" id="extension1" maxlength="11"/>
						</div>
					</div>
                    
					<hr  />

                    <h4>Datos del contacto 2</h4>
					<div class="form-group">
						<label for="nombre2" class="col-md-4 control-label">Nombre</label>
						<div class="col-md-8">
							<input type="text" name="nombre2" value="<?php echo $this->input->post('nombre2'); ?>" class="form-control" id="nombre2" maxlength="100"/>
						</div>
					</div>
					<div class="form-group">
						<label for="direccion2" class="col-md-4 control-label">Dirección</label>
						<div class="col-md-8">
							<input type="text" name="direccion2" value="<?php echo $this->input->post('direccion2'); ?>" class="form-control" id="direccion2" maxlength="150"/>
						</div>
					</div>
					<div class="form-group">
						<label for="codigoPostal2" class="col-md-4 control-label">Código Postal</label>
						<div class="col-md-8">
							<input type="text" name="codigoPostal2" value="<?php echo $this->input->post('codigoPostal2'); ?>" class="form-control" id="codigoPostal2" maxlength="5"/>
						</div>
					</div>
                    <div class="form-group">
                        <label for="idEstado2" class="col-md-4 control-label">Estado</label>
                        <div class="col-md-8">
                        	<select id="idEstado2" name="idEstado2" class="form-control">
                            	<option value="0">Seleccione</option>
								<?php 
									foreach ($estados2 as $i) {
										echo '<option value="'. $i->id .'">'. $i->nombre .'</option>';
									}
								?>
                         	</select>
                		</div>
					</div>
					<div class="form-group">
						<label for="idMunicipio2" class="col-md-4 control-label">Municipio</label>
						<div class="col-md-8">
							<select id="idMunicipio2" name="idMunicipio2" class="form-control">
								<option value="0">Seleccione</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="telefonoFijo2" class="col-md-4 control-label">Teléfono Fijo</label>
						<div class="col-md-8">
							<input type="text" name="telefonoFijo2" value="<?php echo $this->input->post('telefonoFijo2'); ?>" class="form-control" id="telefonoFijo2" maxlength="11"/>
						</div>
					</div>
					<div class="form-group">
						<label for="telefonoMovil2" class="col-md-4 control-label">Teléfono Móvil</label>
						<div class="col-md-8">
							<input type="text" name="telefonoMovil2" value="<?php echo $this->input->post('telefonoMovil2'); ?>" class="form-control" id="telefonoMovil2" maxlength="11"/>
						</div>
					</div>
					<div class="form-group">
						<label for="correoElectronico2" class="col-md-4 control-label">Correo Electrónico</label>
						<div class="col-md-8">
							<input type="text" name="correoElectronico2" value="<?php echo $this->input->post('correoElectronico2'); ?>" class="form-control" id="correoElectronico2" maxlength="100"/>
						</div>
					</div>
					<div class="form-group">
						<label for="extension2" class="col-md-4 control-label">Extensión</label>
						<div class="col-md-8">
							<input type="text" name="extension2" value="<?php echo $this->input->post('extension2'); ?>" class="form-control" id="extension2" maxlength="11"/>
						</div>
					</div>

                    <hr />

                    <h4>Datos del contacto 3</h4>
					<div class="form-group">
						<label for="nombre3" class="col-md-4 control-label">Nombre</label>
						<div class="col-md-8">
							<input type="text" name="nombre3" value="<?php echo $this->input->post('nombre3'); ?>" class="form-control" id="nombre3" maxlength="100"/>
						</div>
					</div>
					<div class="form-group">
						<label for="direccion3" class="col-md-4 control-label">Dirección</label>
						<div class="col-md-8">
							<input type="text" name="direccion3" value="<?php echo $this->input->post('direccion3'); ?>" class="form-control" id="direccion3" maxlength="150"/>
						</div>
					</div>
					<div class="form-group">
						<label for="codigoPostal3" class="col-md-4 control-label">Código Postal</label>
						<div class="col-md-8">
							<input type="text" name="codigoPostal3" value="<?php echo $this->input->post('codigoPostal3'); ?>" class="form-control" id="codigoPostal3" maxlength="5"/>
						</div>
					</div>
                    <div class="form-group">
                        <label for="idEstado3" class="col-md-4 control-label">Estado</label>
                        <div class="col-md-8">
                        	<select id="idEstado3" name="idEstado3" class="form-control">
                            	<option value="0">Seleccione</option>
								<?php 
									foreach ($estados3 as $i) {
										echo '<option value="'. $i->id .'">'. $i->nombre .'</option>';
									}
								?>
                            </select>
                        </div>
					</div>
					<div class="form-group">
						<label for="idMunicipio3" class="col-md-4 control-label">Municipio</label>
						<div class="col-md-8">
							<select id="idMunicipio3" name="idMunicipio3" class="form-control">
								<option value="0">Seleccione</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="telefonoFijo3" class="col-md-4 control-label">Teléfono Fijo</label>
						<div class="col-md-8">
							<input type="text" name="telefonoFijo3" value="<?php echo $this->input->post('telefonoFijo3'); ?>" class="form-control" id="telefonoFijo3" maxlength="11"/>
						</div>
					</div>
					<div class="form-group">
						<label for="telefonoMovil3" class="col-md-4 control-label">Teléfono Móvil</label>
						<div class="col-md-8">
							<input type="text" name="telefonoMovil3" value="<?php echo $this->input->post('telefonoMovil3'); ?>" class="form-control" id="telefonoMovil3" maxlength="11"/>
						</div>
					</div>
					<div class="form-group">
						<label for="correoElectronico3" class="col-md-4 control-label">Correo Electrónico</label>
						<div class="col-md-8">
							<input type="text" name="correoElectronico3" value="<?php echo $this->input->post('correoElectronico3'); ?>" class="form-control" id="correoElectronico3" maxlength="100"/>
						</div>
					</div>
					<div class="form-group">
						<label for="extension3" class="col-md-4 control-label">Extensión</label>
						<div class="col-md-8">
							<input type="text" name="extension3" value="<?php echo $this->input->post('extension3'); ?>" class="form-control" id="extension3" />
						</div>
					</div>
					
					<hr />

					<div id="seccionOculta" class="hidden">
						<!-- Sección para agregar las familias asociadas con el proveedor -->
						<h4>Familias asociadas con el proveedor</h4>

						<div class="form-group">
							<label for="idFamilia" class="col-md-4 control-label">Familias</label>
							<div class="col-md-6">
								<select id="idFamilia" name="idFamilia" class="form-control">
									<option value="0">Seleccione</option>
										<?php 
											foreach ($familias as $i) {
												echo '<option value="'. $i->clave .'">'. $i->clave .'</option>';
											}
										?>
								</select>
							</div>
							
							<div class="col-md-2">
								<a style="display:block;width:145px" id="agregarFamilia" class="btn btn-primary">
									<span class="fa fa-plus"></span> Agregar
								</a>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label"></label>
							<div class="col-md-6">
								<ul id="listaSeleccion"></ul>
							</div>
							<div class="col-md-2">
								
							</div>
						</div>

						<hr />
					</div>

					<div class = "col-sm-offset-4 col-sm-8">
						<a href="<?php echo site_url('proveedor/index/'); ?>" id="botonCancelar" class="btn btn-danger">
							<span class="fa fa-ban"></span> Cancelar
						</a>
						<button id="botonGuardar" type="submit" class="btn btn-success">
							<i class="fa fa-check"></i> Guardar
						</button>
					</div>
				<?php echo form_close(); ?>
			</div>
    	</div>
  	</div>
</div>

<script type="text/javascript">   
    $(document).ready(function() {
		$("#idEstado option:contains('NINGUNO')").remove();
		$("#idEstado1 option:contains('NINGUNO')").remove();
		$("#idEstado2 option:contains('NINGUNO')").remove();
		$("#idEstado3 option:contains('NINGUNO')").remove();

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

		$("#idEstado1").change(function() {
    		$("#idEstado1 option:selected").each(function() {
                idEstado = $('#idEstado1').val();
                $.post("<?php echo base_url(); ?>index.php/controllerComboBoxes/fillMunicipios", {
                	idEstado : idEstado
                }, function(data) {
                   $("#idMunicipio1").html(data);
                });
            });
        });

		$("#idEstado2").change(function() {
    		$("#idEstado2 option:selected").each(function() {
                idEstado = $('#idEstado2').val();
                $.post("<?php echo base_url(); ?>index.php/controllerComboBoxes/fillMunicipios", {
                	idEstado : idEstado
                }, function(data) {
                   $("#idMunicipio2").html(data);
                });
            });
        });

		$("#idEstado3").change(function() {
    		$("#idEstado3 option:selected").each(function() {
                idEstado = $('#idEstado3').val();
                $.post("<?php echo base_url(); ?>index.php/controllerComboBoxes/fillMunicipios", {
                	idEstado : idEstado
                }, function(data) {
                   $("#idMunicipio3").html(data);
                });
            });
        });

		$("#agregarFamilia").click(function(){
			if($('#idFamilia').val() != 0){
				var names = $('#idFamilia').find('option:selected').text();
				$("#idFamilia option:selected").remove();
				$('#listaSeleccion').append('<li name="nombresFamilia[]">'+names+'<button type="button" class="delete btn btn-danger btn-xs pull-right">Quitar</button></li>');
				$('#botonGuardar').prop('disabled', false);
			}
     	});
		
		$("body").on("click",".delete", function() {
			var name = $(this).parent().text().replace(/Quitar/,'');
			$(this).parent().remove();
			$("#idFamilia").append($("<option></option>").val(name).html(name));
			//Regresa el elemento removido a la lista en orden alfabético
			var foption = $('#idFamilia option:first');
			var soptions = $('#idFamilia option:not(:first)').sort(function(a, b) {
				return a.text == b.text ? 0 : a.text < b.text ? -1 : 1
			});
			$('#idFamilia').html(soptions).prepend(foption);
			if ($('#listaSeleccion li').length == 0){
				$('#botonGuardar').prop('disabled', true);
			}
		});

		$('#tipoProveedor').change(function(){
			var val = $(this).val();
			if (val == "B"){
				$('#seccionOculta').removeClass('hidden');
				$('#seccionOculta').show();
				$('#botonGuardar').prop('disabled', true);
			} else {
				$('#seccionOculta').hide();
				$('#botonGuardar').prop('disabled', false);
			}
		});

		/*
		 * Si el proveedor es de tipo bienes, primero se guarda en un arreglo
		 * las familias seleccionadas y después se envía a la base de datos
		 * para guardar en la tabla relacionproveedorfamilia
		 */
		$("#botonGuardar").click(function(){
			if($('#tipoProveedor').val() == "B"){
				if ($('#listaSeleccion li').length == 0){
					alert("Necesita agregar las familias para el proveedor");
				} else {
					var seleccion = $("#listaSeleccion li");
					var familias_seleccion = [];

					seleccion.each(function() {
						familias_seleccion.push($(this).text().replace(/Quitar/,''));
					});
					$.ajax({
						url: '<?php echo base_url();?>index.php/Proveedor/crearRelacion',
						method: 'POST',
						data: {familias_seleccion: familias_seleccion}
					});
				}
			}
     	});
    });


</script>
