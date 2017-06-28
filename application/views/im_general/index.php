<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Listing</h2>
                <div class="nav navbar-right">
					<a href="<?php echo site_url('im_general/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
				</div>
                <div class="clearfix"></div>
          	</div>
			  <div class="form-group">
						<label for="tipo" class="col-md-1 control-label">Tipo</label>
						<div class="col-md-3">
							<select name="tipo" class="form-control" id="tipoProveedor">
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

					<!-- Solo aparece si se selecciona un proveedor de tipo bienes -->
					<div class="form-group seccion-familia hidden">
						<label for="idFamilia" class="col-md-1 control-label">Familia</label>
						<div class="col-md-3">
							<select id="idFamilia" name="idFamilia" class="form-control">
								<option value="0">Seleccione</option>
								<?php 
									foreach ($familias as $i) {
										echo '<option value="'. $i->id .'">'. $i->descripcion .'</option>';
									}
								?>
							</select>
						</div>
					</div>

					 <div class="form-group">
						<label for="tipo" class="col-md-1 control-label">Estatus</label>
						<div class="col-md-3">
							<select name="estatus" class="form-control" id="estatus">
								<option value="">Seleccione</option>
								<?php 
									$estatus_values = array(
										'I'=>'Inicial',
										'E'=>'Enviado',
										'R'=>'Recepcion',
										'T'=>'Concluido',
										'C'=>'Cancelado',
										
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



          	<div class="x_content">
  				<table class="table table-striped">
				    <tr>
						<th>Familia</th>
						<th>Descripcion</th>
						<th>Propuestas</th>
						<th>SOLPED</th>
						<th>Importe</th>
						<th>Status</th>
						<th>Fecha</th>
						
					
				    </tr>
					<?php foreach($listaim_general as $i){ ?>
				    <tr>
						<td><?php echo $i['id']; ?></td>
						<td><?php echo $i['titulo']; ?></td>
						<td><?php echo $i['idEmpleadoFormula']; ?></td>
						<td><?php echo $i['idEmpleadoAutoriza']; ?></td>
						<td><?php echo $i['fechaElaboracion']; ?></td>
						<td><?php echo $i['idMunicipioElaboracion']; ?></td>
						<td></td>
						<td></td>
						<td>
				            <a href="<?php echo site_url('im_general/edit/'.$i['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> 
				            <a href="<?php echo site_url('im_general/remove/'.$i['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Borrar</a>
				        </td>
				    </tr>
					<?php } ?>
				</table>
          	</div>
        </div>
  	</div>
</div>
<script type="text/javascript">

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

</script>