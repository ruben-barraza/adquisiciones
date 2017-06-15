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
                <h2>Editar proveedor</h2>
                <ul class="nav navbar-right panel_toolbox">
                  	<li>
                  		<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  	</li>
                </ul>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
	          	<?php echo validation_errors(); ?>
				<?php echo form_open('proveedor/edit/'.$proveedor['id'],array("class"=>"form-horizontal")); ?>

					<div class="form-group">
						<label for="clave" class="col-md-4 control-label">Clave</label>
						<div class="col-md-8">
							<input type="text" name="clave" value="<?php echo ($this->input->post('clave') ? $this->input->post('clave') : $proveedor['clave']); ?>" class="form-control" id="clave" maxlength="15"/>
						</div>
					</div>
					<div class="form-group">
						<label for="rfc" class="col-md-4 control-label">RFC</label>
						<div class="col-md-8">
							<input type="text" name="rfc" value="<?php echo ($this->input->post('rfc') ? $this->input->post('rfc') : $proveedor['rfc']); ?>" class="form-control" id="rfc" maxlength="15"/>
						</div>
					</div>
					<div class="form-group">
						<label for="razonSocial" class="col-md-4 control-label">Razón Social</label>
						<div class="col-md-8">
							<input type="text" name="razonSocial" value="<?php echo ($this->input->post('razonSocial') ? $this->input->post('razonSocial') : $proveedor['razonSocial']); ?>" class="form-control" id="razonSocial" maxlength="150"/>
						</div>
					</div>
					<div class="form-group">
						<label for="direccion" class="col-md-4 control-label">Dirección</label>
						<div class="col-md-8">
							<input type="text" name="direccion" value="<?php echo ($this->input->post('direccion') ? $this->input->post('direccion') : $proveedor['direccion']); ?>" class="form-control" id="direccion" maxlength="150"/>
						</div>
					</div>
					<div class="form-group">
						<label for="codigoPostal" class="col-md-4 control-label">Código Postal</label>
						<div class="col-md-8">
							<input type="text" name="codigoPostal" value="<?php echo ($this->input->post('codigoPostal') ? $this->input->post('codigoPostal') : $proveedor['codigoPostal']); ?>" class="form-control" id="codigoPostal" maxlength="5"/>
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
										$selected = ($value == $proveedor['estatus']) ? ' selected="selected"' : "";
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
										'A'=>'Bienes y Servicios',
									);
									foreach($tipo_values as $value => $display_text)
									{
										$selected = ($value == $proveedor['tipo']) ? ' selected="selected"' : "";
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
							<input type="text" name="nombre1" value="<?php echo ($this->input->post('nombre1') ? $this->input->post('nombre1') : $proveedor['nombre1']); ?>" class="form-control" id="nombre1" maxlength="100"/>
						</div>
					</div>
                    <div class="form-group">
						<label for="direccion1" class="col-md-4 control-label">Dirección</label>
						<div class="col-md-8">
							<input type="text" name="direccion1" value="<?php echo ($this->input->post('direccion1') ? $this->input->post('direccion1') : $proveedor['direccion1']); ?>" class="form-control" id="direccion1" maxlength="150"/>
						</div>
					</div>
					<div class="form-group">
						<label for="codigoPostal1" class="col-md-4 control-label">Código Postal</label>
						<div class="col-md-8">
							<input type="text" name="codigoPostal1" value="<?php echo ($this->input->post('codigoPostal1') ? $this->input->post('codigoPostal1') : $proveedor['codigoPostal1']); ?>" class="form-control" id="codigoPostal1" maxlength="5"/>
						</div>
					</div>
                    <div class="form-group">
                        <label for="idEstado1" class="col-md-4 control-label">Estado</label>
                        <div class="col-md-8">
                        	<select id="idEstado1" name="idEstado" class="form-control">
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
							<input type="text" name="telefonoFijo1" value="<?php echo ($this->input->post('telefonoFijo1') ? $this->input->post('telefonoFijo1') : $proveedor['telefonoFijo1']); ?>" class="form-control" id="telefonoFijo1" maxlength="11"/>
						</div>
					</div>
					<div class="form-group">
						<label for="telefonoMovil1" class="col-md-4 control-label">Teléfono Móvil</label>
						<div class="col-md-8">
							<input type="text" name="telefonoMovil1" value="<?php echo ($this->input->post('telefonoMovil1') ? $this->input->post('telefonoMovil1') : $proveedor['telefonoMovil1']); ?>" class="form-control" id="telefonoMovil1" maxlength="11"/>
						</div>
					</div>
					<div class="form-group">
						<label for="correoElectronico1" class="col-md-4 control-label">Correo Electrónico</label>
						<div class="col-md-8">
							<input type="text" name="correoElectronico1" value="<?php echo ($this->input->post('correoElectronico1') ? $this->input->post('correoElectronico1') : $proveedor['correoElectronico1']); ?>" class="form-control" id="correoElectronico1" maxlength="100"/>
						</div>
					</div>
					<div class="form-group">
						<label for="extension1" class="col-md-4 control-label">Extensión</label>
						<div class="col-md-8">
							<input type="text" name="extension1" value=
							"<?php 
								$extension1 = $proveedor['extension1']; 
								if ($extension1 != 0) {
									echo ($this->input->post('extension1') ? $this->input->post('extension1') : $extension1); 
								} else {
									echo "";
								}
							?>" class="form-control" id="extension1" maxlength="11"/>
						</div>
					</div>
                    
                    <hr />
                    <h4>Datos del contacto 2</h4>
					<div class="form-group">
						<label for="nombre2" class="col-md-4 control-label">Nombre</label>
						<div class="col-md-8">
							<input type="text" name="nombre2" value="<?php echo ($this->input->post('nombre2') ? $this->input->post('nombre2') : $proveedor['nombre2']); ?>" class="form-control" id="nombre2" maxlength="100"/>
						</div>
					</div>
					<div class="form-group">
						<label for="direccion2" class="col-md-4 control-label">Dirección</label>
						<div class="col-md-8">
							<input type="text" name="direccion2" value="<?php echo ($this->input->post('direccion2') ? $this->input->post('direccion2') : $proveedor['direccion2']); ?>" class="form-control" id="direccion2" maxlength="150"/>
						</div>
					</div>
                    <div class="form-group">
						<label for="codigoPostal2" class="col-md-4 control-label">Código Postal</label>
						<div class="col-md-8">
							<input type="text" name="codigoPostal2" value="<?php echo ($this->input->post('codigoPostal2') ? $this->input->post('codigoPostal2') : $proveedor['codigoPostal2']); ?>" class="form-control" id="codigoPostal2" maxlength="5"/>
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
							<input type="text" name="telefonoFijo2" value=
							"<?php 
								$telefonoFijo2 = $proveedor['telefonoFijo2'];
								if ($telefonoFijo2 != 0){
									echo ($this->input->post('telefonoFijo2') ? $this->input->post('telefonoFijo2') : $telefonoFijo2);
								} else {
									echo "";
								}
								 
							?>" class="form-control" id="telefonoFijo2" maxlength="11"/>
						</div>
					</div>
					<div class="form-group">
						<label for="telefonoMovil2" class="col-md-4 control-label">Teléfono Móvil</label>
						<div class="col-md-8">
							<input type="text" name="telefonoMovil2" value=
							"<?php 
								$telefonoMovil2 = $proveedor['telefonoMovil2'];
								if ($telefonoMovil2 != 0){
									echo ($this->input->post('telefonoMovil2') ? $this->input->post('telefonoMovil2') : $telefonoMovil2); 
								} else {
									echo "";
								}
							?>" class="form-control" id="telefonoMovil2" maxlength="11"/>
						</div>
					</div>
					<div class="form-group">
						<label for="correoElectronico2" class="col-md-4 control-label">Correo Electrónico</label>
						<div class="col-md-8">
							<input type="text" name="correoElectronico2" value="<?php echo ($this->input->post('correoElectronico2') ? $this->input->post('correoElectronico2') : $proveedor['correoElectronico2']); ?>" class="form-control" id="correoElectronico2" maxlength="100"/>
						</div>
					</div>
					<div class="form-group">
						<label for="extension2" class="col-md-4 control-label">Extensión</label>
						<div class="col-md-8">
							<input type="text" name="extension2" value=
							"<?php 
								$extension2 = $proveedor['extension2'];
								if ($extension2 != 0) {
									echo ($this->input->post('extension2') ? $this->input->post('extension2') : $extension2); 
								} else {
									echo "";
								}
							?>" class="form-control" id="extension2" maxlength="11"/>
						</div>
					</div>

                    <hr />
                    <h4>Datos del contacto 3</h4>
					<div class="form-group">
						<label for="nombre3" class="col-md-4 control-label">Nombre</label>
						<div class="col-md-8">
							<input type="text" name="nombre3" value="<?php echo ($this->input->post('nombre3') ? $this->input->post('nombre3') : $proveedor['nombre3']); ?>" class="form-control" id="nombre3" maxlength="100"/>
						</div>
					</div>
					<div class="form-group">
						<label for="direccion3" class="col-md-4 control-label">Direccion</label>
						<div class="col-md-8">
							<input type="text" name="direccion3" value="<?php echo ($this->input->post('direccion3') ? $this->input->post('direccion3') : $proveedor['direccion3']); ?>" class="form-control" id="direccion3" maxlength="150"/>
						</div>
					</div>
                    <div class="form-group">
						<label for="codigoPostal3" class="col-md-4 control-label">Código Postal</label>
						<div class="col-md-8">
							<input type="text" name="codigoPostal3" value="<?php echo ($this->input->post('codigoPostal3') ? $this->input->post('codigoPostal3') : $proveedor['codigoPostal3']); ?>" class="form-control" id="codigoPostal3" maxlength="5"/>
						</div>
					</div>
                    <div class="form-group">
                        <label for="idEstado3" class="col-md-4 control-label">Estado</label>
                        <div class="col-md-8">
                        	<select id="idEstado3" name="idEstado" class="form-control">
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
							<input type="text" name="telefonoFijo3" value=
							"<?php 
								$telefonoFijo3 = $proveedor['telefonoFijo3'];
								if ($telefonoFijo3 != 0) {
									echo ($this->input->post('telefonoFijo3') ? $this->input->post('telefonoFijo3') : $telefonoFijo3);
								} else {
									echo "";
								}
							?>" class="form-control" id="telefonoFijo3" maxlength="11"/>
						</div>
					</div>
					<div class="form-group">
						<label for="telefonoMovil3" class="col-md-4 control-label">Teléfono Movil</label>
						<div class="col-md-8">
							<input type="text" name="telefonoMovil3" value=
							"<?php 
								$telefonoMovil3 = $proveedor['telefonoMovil3'];
								if ($telefonoMovil3 != 0) {
									echo ($this->input->post('telefonoMovil3') ? $this->input->post('telefonoMovil3') : $telefonoMovil3); 
								} else {
									echo "";
								}
							?>" class="form-control" id="telefonoMovil3" maxlength="11"/>
						</div>
					</div>
					<div class="form-group">
						<label for="correoElectronico3" class="col-md-4 control-label">Correo Electrónico</label>
						<div class="col-md-8">
							<input type="text" name="correoElectronico3" value="<?php echo ($this->input->post('correoElectronico3') ? $this->input->post('correoElectronico3') : $proveedor['correoElectronico3']); ?>" class="form-control" id="correoElectronico3" maxlength="100"/>
						</div>
					</div>
					<div class="form-group">
						<label for="extension3" class="col-md-4 control-label">Extensión</label>
						<div class="col-md-8">
							<input type="text" name="extension3" value=
							"<?php 
								$extension3 = $proveedor['extension3'];
								if ($extension3 != 0) {
									echo ($this->input->post('extension3') ? $this->input->post('extension3') : $extension3); 
								} else {
									echo "";
								}
								
							?>" class="form-control" id="extension3" maxlength="11"/>
						</div>
					</div>
                    <hr />

					<div id="seccionOculta" class="hidden opcion_B opcion_A">
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
						<button id="botonEditar" type="submit" class="btn btn-success">
							<i class="fa fa-check"></i> Guardar
						</button>
						<a href="<?php echo site_url('proveedor/index/'); ?>" id="botonCancelar" class="btn btn-danger">
							<span class="fa fa-ban"></span> Cancelar
						</a>
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
		//console.log("<?php echo $proveedor['tipo'] ?>");
		
		/* Si el proveedor que se quiere editar es originalmente de bienes
		* se debe detectar cuando cambie a servicios y al guardar los cambios
		* se eliminarán los registros con ese proveedor en la tabla
		* relacioonproveedorfamilia
		* Muestra por default el campo para editar las familias si es proveedor de Bienes
		* Lo oculta si es proveedor de servicios
		*/
		var cambioAServicio;
		var tipoProveedor = $("#tipoProveedor").val();
		if(tipoProveedor == "B" || tipoProveedor == "A"){
			cambioAServicio = false;
			$('#seccionOculta').show();
			$('#seccionOculta').removeClass('hidden');
		} else {
			$('#seccionOculta').hide();
		}

		/*
		* Muestra los valores de estado y municipio que se habían asignado al momento de agregar el proveedor
		* (Valores obtenidos de la base de datos)
		*/

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
			
		seleccionEstado1 = '<?php echo $estadoSeleccionado1; ?>';
		if(seleccionEstado1 != 0) {
			$("#idEstado1").val(seleccionEstado1);
			$("#idEstado1 option:selected").each(function() {
				idEstado = $('#idEstado1').val();
				$.post("<?php echo base_url(); ?>index.php/controllerComboBoxes/fillMunicipios", {
					idEstado : idEstado
				}, function(data) {
					$("#idMunicipio1").html(data);
					$("#idMunicipio1").val('<?php echo $municipioSeleccionado1; ?>');
				});
			});
		}

		seleccionEstado2 =  '<?php echo $estadoSeleccionado2; ?>';
		if(seleccionEstado2 != 0) {
			$("#idEstado2").val(seleccionEstado2);
			$("#idEstado2 option:selected").each(function() {
				idEstado = $('#idEstado2').val();
				$.post("<?php echo base_url(); ?>index.php/controllerComboBoxes/fillMunicipios", {
					idEstado : idEstado
				}, function(data) {
					$("#idMunicipio2").html(data);
					$("#idMunicipio2").val('<?php echo $municipioSeleccionado2; ?>');
				});
			});
		}

		seleccionEstado3 =  '<?php echo $estadoSeleccionado3; ?>';
		if(seleccionEstado3 != 0) {
			$("#idEstado3").val(seleccionEstado3);
			$("#idEstado3 option:selected").each(function() {
				idEstado = $('#idEstado3').val();
				$.post("<?php echo base_url(); ?>index.php/controllerComboBoxes/fillMunicipios", {
					idEstado : idEstado
				}, function(data) {
					$("#idMunicipio3").html(data);
					$("#idMunicipio3").val('<?php echo $municipioSeleccionado3; ?>');
				});
			});
		}

		/*
		 * Muestra al cargar la página las familias que se habían seleccionado para
		 * el proveedor que se quiere editar
		 */
		var familiasProveedor = <?php echo json_encode($familiasSeleccionadas); ?>;
		//console.log(familiasProveedor);
		var longitudArray = familiasProveedor.length;
		for (var i=0; i < longitudArray; i++){
			$("#idFamilia option[value='"+ familiasProveedor[i] +"']").remove();
			$('#listaSeleccion').append('<li name="nombresFamilia[]">'+familiasProveedor[i]+'<button type="button" class="delete btn btn-danger btn-xs pull-right">Quitar</button></li>');
		}

		/*
		* Agrega más familias a la lista haciendo clic en el botón "Agregar +"
		*/

		$("#agregarFamilia").click(function(){
			if($('#idFamilia').val() != 0){
				var names = $('#idFamilia').find('option:selected').text();
				$("#idFamilia option:selected").remove();
				$('#listaSeleccion').append('<li name="nombresFamilia[]">'+names+'<button type="button" class="delete btn btn-danger btn-xs pull-right">Quitar</button></li>');
			}
     	});

		/*
		* Quita las familias de la lista con el botón "Quitar" y las regresa al select en orden alfabético
		*/

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
		});
		
		/*
		* Las siguientes tres funciones actualizan los municipios cada vez que se cambia el estado
		*/
		
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

		$('#tipoProveedor').change(function(){
			//Saves in a variable the wanted div
			var selector = '.opcion_' + $(this).val();
			
			//Detecta si un proveedor cambia de ser originalmente bienes a servicio
			if ($(this).val() == "S" && tipoProveedor == "B"){
				cambioAServicio=true;
			} else if ($(this).val() == "S" && tipoProveedor == "A") {

			} else {
				cambioAServicio=false;
			}

			//hide all elements
			$('#seccionOculta').hide();

			//show only element connected to selected option
			$(selector).show();
			$('#seccionOculta').removeClass('hidden');
		});

		/*
		 * Si se agregaron o quitaron nuevas familias al proveedor tipo bienes
		 * se actualiza la tabla relacionproveedorfamilia
		 * Si el proveedor cambió de bienes a servicios, se eliminan los registros
		 * en la tabla relacion proveedor familia
		 */
		$("#botonEditar").click(function(){
			if($('#tipoProveedor').val() == "B" || $('#tipoProveedor').val() == "A"){
				var seleccion = $("#listaSeleccion li");
				var familias_seleccion = [];
				var idProveedor = <?php echo $proveedor['id'] ?>;

				seleccion.each(function() {
					familias_seleccion.push($(this).text().replace(/Quitar/,''));
				});
				$.ajax({
					url: '<?php echo base_url();?>index.php/Proveedor/editarRelacion',
					method: 'POST',
					data: {
						familias_seleccion: familias_seleccion,
						idProveedor: idProveedor
					}
				});
			} else if ($('#tipoProveedor').val() == "S" && cambioAServicio==true){
				var idProveedor = <?php echo $proveedor['id'] ?>;
				$.ajax({
					url: '<?php echo base_url();?>index.php/Proveedor/eliminarRelacion',
					method: 'POST',
					data: {
						idProveedor: idProveedor
					}
				});
			}
			
     	}); 

    });
</script>
