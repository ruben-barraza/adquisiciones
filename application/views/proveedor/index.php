<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Proveedores</h2>
                <div class="nav navbar-right">
					<a href="<?php echo site_url('proveedor/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
				</div>
                <div class="clearfix"></div>
          	</div>
            
            <div class="x_content">
            	<form action="" class="form-horizontal">

					<div class="form-group">
						<label for="busqueda" class="col-md-4 control-label">Búsqueda rápida</label>
						<div class="col-md-4 input-group">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-search"></i>	
							</span>
							<input type="text" name="busqueda" class="form-control" id="busqueda"/>
							
						</div>
					</div>
					
					<div class="form-group">
						<label for="tipo" class="col-md-4 control-label">Tipo</label>
						<div class="col-md-4">
							<select name="tipo" class="form-control">
								<option value="">Seleccione</option>
								<option value="todos">Todos</option>
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

					<div class="form-group">
						<label for="idFamilia" class="col-md-4 control-label">Familia</label>
						<div class="col-md-4">
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
					</div>
            	</form>
				
  				<table class="table table-striped">
				    <tr>
						<th>Razón Social</th>
						<th>Dirección</th>
						<th>Contacto</th>
						<th>Teléfono Fijo</th>
						<th>Teléfono Móvil</th>
						<th>Correo Electrónico</th>
						<th>Tipo</th>
						<th></th>
				    </tr>
					<?php foreach($listaproveedor as $p){ ?>
				    <tr>
						<td><?php echo $p['razonSocial']; ?></td>
						<td><?php echo $p['direccion']; ?></td>
						<td><?php echo $p['nombre1']; ?></td>
						<td><?php echo $p['telefonoFijo1']; ?></td>
						<td><?php echo $p['telefonoMovil1']; ?></td>
						<td><?php echo $p['correoElectronico1']; ?></td>
						<td><?php echo $p['tipo']; ?></td>
						<td>
				            <a title="Editar" href="<?php echo site_url('proveedor/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
				            <a title="Eliminar" href="<?php echo site_url('proveedor/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
				        </td>
				    </tr>
					<?php } ?>
				</table>
          	</div>
        </div>
  	</div>
</div>
