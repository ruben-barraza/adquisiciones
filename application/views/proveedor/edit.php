<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Editar</h2>
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
							<input type="text" name="clave" value="<?php echo ($this->input->post('clave') ? $this->input->post('clave') : $proveedor['clave']); ?>" class="form-control" id="clave" />
						</div>
					</div>
					<div class="form-group">
						<label for="rfc" class="col-md-4 control-label">RFC</label>
						<div class="col-md-8">
							<input type="text" name="rfc" value="<?php echo ($this->input->post('rfc') ? $this->input->post('rfc') : $proveedor['rfc']); ?>" class="form-control" id="rfc" />
						</div>
					</div>
					<div class="form-group">
						<label for="razonSocial" class="col-md-4 control-label">Razón Social</label>
						<div class="col-md-8">
							<input type="text" name="razonSocial" value="<?php echo ($this->input->post('razonSocial') ? $this->input->post('razonSocial') : $proveedor['razonSocial']); ?>" class="form-control" id="razonSocial" />
						</div>
					</div>
					<div class="form-group">
						<label for="direccion" class="col-md-4 control-label">Dirección</label>
						<div class="col-md-8">
							<input type="text" name="direccion" value="<?php echo ($this->input->post('direccion') ? $this->input->post('direccion') : $proveedor['direccion']); ?>" class="form-control" id="direccion" />
						</div>
					</div>
					<div class="form-group">
						<label for="codigoPostal" class="col-md-4 control-label">Código Postal</label>
						<div class="col-md-8">
							<input type="text" name="codigoPostal" value="<?php echo ($this->input->post('codigoPostal') ? $this->input->post('codigoPostal') : $proveedor['codigoPostal']); ?>" class="form-control" id="codigoPostal" />
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
								<select name="tipo" class="form-control">
									<option value="">Seleccione</option>
									<?php 
									$tipo_values = array(
						'B'=>'Bienes',
						'S'=>'Servicios',
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
							<input type="text" name="nombre1" value="<?php echo ($this->input->post('nombre1') ? $this->input->post('nombre1') : $proveedor['nombre1']); ?>" class="form-control" id="nombre1" />
						</div>
					</div>
					
                    <div class="form-group">
						<label for="direccion1" class="col-md-4 control-label">Dirección</label>
						<div class="col-md-8">
							<input type="text" name="direccion1" value="<?php echo ($this->input->post('direccion1') ? $this->input->post('direccion1') : $proveedor['direccion1']); ?>" class="form-control" id="direccion1" />
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
						<label for="codigoPostal1" class="col-md-4 control-label">Código Postal</label>
						<div class="col-md-8">
							<input type="text" name="codigoPostal1" value="<?php echo ($this->input->post('codigoPostal1') ? $this->input->post('codigoPostal1') : $proveedor['codigoPostal1']); ?>" class="form-control" id="codigoPostal1" />
						</div>
					</div>
					<div class="form-group">
						<label for="telefonoFijo1" class="col-md-4 control-label">Teléfono Fijo</label>
						<div class="col-md-8">
							<input type="text" name="telefonoFijo1" value="<?php echo ($this->input->post('telefonoFijo1') ? $this->input->post('telefonoFijo1') : $proveedor['telefonoFijo1']); ?>" class="form-control" id="telefonoFijo1" />
						</div>
					</div>
					<div class="form-group">
						<label for="telefonoMovil1" class="col-md-4 control-label">Teléfono Móvil</label>
						<div class="col-md-8">
							<input type="text" name="telefonoMovil1" value="<?php echo ($this->input->post('telefonoMovil1') ? $this->input->post('telefonoMovil1') : $proveedor['telefonoMovil1']); ?>" class="form-control" id="telefonoMovil1" />
						</div>
					</div>
					<div class="form-group">
						<label for="correoElectronico1" class="col-md-4 control-label">Correo Electrónico</label>
						<div class="col-md-8">
							<input type="text" name="correoElectronico1" value="<?php echo ($this->input->post('correoElectronico1') ? $this->input->post('correoElectronico1') : $proveedor['correoElectronico1']); ?>" class="form-control" id="correoElectronico1" />
						</div>
					</div>
					<div class="form-group">
						<label for="extension1" class="col-md-4 control-label">Extensión</label>
						<div class="col-md-8">
							<input type="text" name="extension1" value="<?php echo ($this->input->post('extension1') ? $this->input->post('extension1') : $proveedor['extension1']); ?>" class="form-control" id="extension1" />
						</div>
					</div>
                    
                    <hr />
                    <h4>Datos del contacto 2</h4>
					<div class="form-group">
						<label for="nombre2" class="col-md-4 control-label">Nombre</label>
						<div class="col-md-8">
							<input type="text" name="nombre2" value="<?php echo ($this->input->post('nombre2') ? $this->input->post('nombre2') : $proveedor['nombre2']); ?>" class="form-control" id="nombre2" />
						</div>
					</div>
					<div class="form-group">
						<label for="direccion2" class="col-md-4 control-label">Dirección</label>
						<div class="col-md-8">
							<input type="text" name="direccion2" value="<?php echo ($this->input->post('direccion2') ? $this->input->post('direccion2') : $proveedor['direccion2']); ?>" class="form-control" id="direccion2" />
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
						<label for="codigoPostal2" class="col-md-4 control-label">Código Postal</label>
						<div class="col-md-8">
							<input type="text" name="codigoPostal2" value="<?php echo ($this->input->post('codigoPostal2') ? $this->input->post('codigoPostal2') : $proveedor['codigoPostal2']); ?>" class="form-control" id="codigoPostal2" />
						</div>
					</div>
					<div class="form-group">
						<label for="telefonoFijo2" class="col-md-4 control-label">Teléfono Fijo</label>
						<div class="col-md-8">
							<input type="text" name="telefonoFijo2" value="<?php echo ($this->input->post('telefonoFijo2') ? $this->input->post('telefonoFijo2') : $proveedor['telefonoFijo2']); ?>" class="form-control" id="telefonoFijo2" />
						</div>
					</div>
					<div class="form-group">
						<label for="telefonoMovil2" class="col-md-4 control-label">Teléfono Móvil</label>
						<div class="col-md-8">
							<input type="text" name="telefonoMovil2" value="<?php echo ($this->input->post('telefonoMovil2') ? $this->input->post('telefonoMovil2') : $proveedor['telefonoMovil2']); ?>" class="form-control" id="telefonoMovil2" />
						</div>
					</div>
					<div class="form-group">
						<label for="correoElectronico2" class="col-md-4 control-label">Correo Electrónico</label>
						<div class="col-md-8">
							<input type="text" name="correoElectronico2" value="<?php echo ($this->input->post('correoElectronico2') ? $this->input->post('correoElectronico2') : $proveedor['correoElectronico2']); ?>" class="form-control" id="correoElectronico2" />
						</div>
					</div>
					<div class="form-group">
						<label for="extension2" class="col-md-4 control-label">Extensión</label>
						<div class="col-md-8">
							<input type="text" name="extension2" value="<?php echo ($this->input->post('extension2') ? $this->input->post('extension2') : $proveedor['extension2']); ?>" class="form-control" id="extension2" />
						</div>
					</div>
                    <hr />
                    <h4>Datos del contacto 3</h4>
					<div class="form-group">
						<label for="nombre3" class="col-md-4 control-label">Nombre</label>
						<div class="col-md-8">
							<input type="text" name="nombre3" value="<?php echo ($this->input->post('nombre3') ? $this->input->post('nombre3') : $proveedor['nombre3']); ?>" class="form-control" id="nombre3" />
						</div>
					</div>
					<div class="form-group">
						<label for="direccion3" class="col-md-4 control-label">Direccion</label>
						<div class="col-md-8">
							<input type="text" name="direccion3" value="<?php echo ($this->input->post('direccion3') ? $this->input->post('direccion3') : $proveedor['direccion3']); ?>" class="form-control" id="direccion3" />
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
									<<option value="0">Seleccione</option>
								</select>
							</div>
						</div>
					<div class="form-group">
						<label for="codigoPostal3" class="col-md-4 control-label">Código Postal</label>
						<div class="col-md-8">
							<input type="text" name="codigoPostal3" value="<?php echo ($this->input->post('codigoPostal3') ? $this->input->post('codigoPostal3') : $proveedor['codigoPostal3']); ?>" class="form-control" id="codigoPostal3" />
						</div>
					</div>
					<div class="form-group">
						<label for="telefonoFijo3" class="col-md-4 control-label">Teléfono Fijo</label>
						<div class="col-md-8">
							<input type="text" name="telefonoFijo3" value="<?php echo ($this->input->post('telefonoFijo3') ? $this->input->post('telefonoFijo3') : $proveedor['telefonoFijo3']); ?>" class="form-control" id="telefonoFijo3" />
						</div>
					</div>
					<div class="form-group">
						<label for="telefonoMovil3" class="col-md-4 control-label">Teléfono Movil</label>
						<div class="col-md-8">
							<input type="text" name="telefonoMovil3" value="<?php echo ($this->input->post('telefonoMovil3') ? $this->input->post('telefonoMovil3') : $proveedor['telefonoMovil3']); ?>" class="form-control" id="telefonoMovil3" />
						</div>
					</div>
					<div class="form-group">
						<label for="correoElectronico3" class="col-md-4 control-label">Correo Electrónico</label>
						<div class="col-md-8">
							<input type="text" name="correoElectronico3" value="<?php echo ($this->input->post('correoElectronico3') ? $this->input->post('correoElectronico3') : $proveedor['correoElectronico3']); ?>" class="form-control" id="correoElectronico3" />
						</div>
					</div>
					<div class="form-group">
						<label for="extension3" class="col-md-4 control-label">Extensión</label>
						<div class="col-md-8">
							<input type="text" name="extension3" value="<?php echo ($this->input->post('extension3') ? $this->input->post('extension3') : $proveedor['extension3']); ?>" class="form-control" id="extension3" />
						</div>
					</div>
                    <hr />
					<div class="form-group">
							<label for="idFamilia" class="col-md-4 control-label">Familia</label>
							<div class="col-md-7">
								<select name="idMunicipio" class="form-control">
									<option value="">Seleccione</option>
                                    <option value="todos">Todos</option>
									<?php

										mysql_connect('localhost', 'root', '');
										mysql_select_db('adquisiciones');
										
										$sql = "SELECT clave FROM familia";
										$result = mysql_query($sql);
										while ($row = mysql_fetch_array($result)) {
											echo "<option value='" . $row['clave'] . "'>" . $row['clave'] . "</option>";
										}
									
									?>
								</select>
							</div>

                            <div class="col-md-1">
                                	<button type="submit" class="btn btn-success">
										<i class="fa fa-plus"></i> Agregar 
									</button>
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
    });
</script>

<script type="text/javascript">
	$("#idEstado").find("option").eq(1).remove();
	$("#idEstado1").find("option").eq(1).remove();
	$("#idEstado2").find("option").eq(1).remove();
	$("#idEstado3").find("option").eq(1).remove();
</script>
