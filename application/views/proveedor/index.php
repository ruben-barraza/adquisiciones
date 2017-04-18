
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>




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

					<div class="container">
						<div class="row">
							<form class="form-horizontal">
								<div class="form-group">
									<div class="input-group">
										<input type="text" name="busqueda" id="search" style="width: 344px" placeholder="Búsqueda" class="form-control pull-right" id="busqueda"/>
										<span class="input-group-addon">
											<i class="glyphicon glyphicon-search"></i>	
										</span>
									</div>
								</div>
								<div class="form-group">
									<select name="tipo" id="tipoProveedor" style="width: 383px" class="form-control pull-right">
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
									<label for="tipo" class="control-label col-sm-2 pull-right">Tipo</label>
								</div>
								<div class="form-group familiaOcultar B">
									<select name="idFamilia" id="idFamilia" style="width: 383px" class="form-control pull-right">
										<option value="0">Seleccione</option>
										<?php 
											foreach ($familias as $i) {
												echo '<option value="'. $i->id .'">'. $i->clave .'</option>';
											}
										?>
									</select>
									<label for="idFamilia" class="control-label col-sm-2 pull-right">Familia</label>
								</div>
							</form>
						</div>
					</div>	
            	</form>
				
				<div class="col-md-2">
					<a style="display:block;width:145px" id="botonprueba" class="btn btn-primary">
						<span class="fa fa-plus"></span> Boton prueba
					</a>
				</div>

				<hr />
  				<table id="table" class="table table-striped">
				    <thead>
						<tr>
							<th>Razón Social</th>
							<th>Contacto</th>
							<th>Teléfono Fijo</th>
							<th>Teléfono Móvil</th>
							<th>Correo Electrónico</th>
							<th>Tipo</th>
							<th></th>
				    	</tr>
					</thead>
					
					<tbody>
						<?php foreach($listaproveedor as $p){ ?>
						<tr class="<?php echo $p['tipo']; ?>">
							<td><?php echo $p['razonSocial']; ?></td>
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
					</tbody>
				</table>

				<div id="secciontabla">
					<table id="tablaoculta" class="table table-striped">
						<thead>
							<tr>
								<th>Razón Social</th>
								<th>Contacto</th>
								<th>Teléfono Fijo</th>
								<th>Teléfono Móvil</th>
								<th>Correo Electrónico</th>
								<th>Familia</th>
								<th></th>
							</tr>
						</thead>
						
						<tbody>
						</tbody>
					</table>
				</div>

          	</div>
        </div>
  	</div>
</div>


<script type="text/javascript">
	$(document).ready(function() {


		$('.familiaOcultar').addClass('collapse');

		//Función para la búsqueda de proveedores
		var $rows = $('#table tbody tr');
		
		$('#search').keyup(function() {
			var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
        		reg = RegExp(val, 'i'),
        		text;

    		$rows.show().filter(function() {
        		text = $(this).text().replace(/\s+/g, ' ');
        		return !reg.test(text);
    		}).hide();
		});
		
		//Funcion para mostrar ocultar el select Familia
		//dependiendo del tipo de proveedor que se seleccione
		$('#tipoProveedor').change(function(){
			$('.familiaOcultar').collapse('hide');
			$('.familiaOcultar.B').hide();
			var val = $(this).val();
			if (val == "todos"){
				$('.B td').show();
         		$('.S td').show();
				$('.familiaOcultar.B').hide();
			} else if (val == 'B'){
				$('.B td').show();
         		$('.S td').hide();
				$('.familiaOcultar.B').show();
			} else {
				$('.B td').hide();
         		$('.S td').show();
				$('.familiaOcultar.B').hide(); 
			}
		});

		var tbody = $('#tablaoculta tbody'),
    	indices = ["razonSocial", "nombre1", "telefonoFijo1", "telefonoMovil1", "correoElectronico1", "clave"];

		$('#idFamilia').change(function(){
			$('#tablaoculta tbody').remove();
			var clave = $("#idFamilia option:selected").text();
			if (clave != "Seleccione"){
				$.ajax({
					url: '<?php echo base_url(); ?>index.php/Proveedor/obtenerListaProveedorFamilia',
					method: 'POST',
					data: {
						clave: clave
					},
					success: function (returned) {
						var returned = JSON.parse(returned);
						var selectArray = [];
						
						jQuery.each(returned.listaproveedorfamilia, function(i, val) {                   
							//alert('razonSocial= '+ val.razonSocial + 'nombre1' + val.nombre1);
							selectArray.push({
								"razonSocial": val.razonSocial, 
								"nombre1": val.nombre1,
								"telefonoFijo1": val.telefonoFijo1,
								"telefonoMovil1": val.telefonoMovil1,
								"correoElectronico1": val.correoElectronico1,
								"clave": val.clave
							});
						});

						$.each(selectArray, function(i, selected) {
							var tr = $('<tr>');
							$.each(indices, function(i, indice) {
								$('<td>').html(selected[indice]).appendTo(tr);  
							});
							tbody.append(tr);
						});
						


					}
				});
			}
		});

		$('#tablaprueba').append(
				"<table id=\"table\" class=\"table table-striped\">" +
					"<thead>" +
						"<tr>" +
							"<th>Razón Social</th>" +
							"<th>Contacto</th>" +
							"<th>Teléfono Fijo</th>" +
							"<th>Teléfono Móvil</th>" +
							"<th>Correo Electrónico</th>" +
							"<th>Tipo</th>" + 
							"<th>Familia</th>" + 
							"<th></th>" +
						"</tr>" +
					"</thead>" +
					"<tbody>" +
					/*
						"<?php foreach($listaproveedorfamilia as $p){ ?>" +
						"<tr>" +
							"<td><?php echo $p['razonSocial']; ?></td>" +
							"<td><?php echo $p['nombre1']; ?></td>" +
							"<td><?php echo $p['telefonoFijo1']; ?></td>" +
							"<td><?php echo $p['telefonoMovil1']; ?></td>" +
							"<td><?php echo $p['correoElectronico1']; ?></td>" +
							"<td><?php echo $p['tipo']; ?></td>" +
							"<td><?php echo $p['clave']; ?></td>" +
							"<td>" +
								"<a title=\"Editar\" href=\"<?php echo site_url('proveedor/edit/'.$p['id']); ?>\" class=\"btn btn-info btn-xs\"><span class=\"fa fa-pencil\"></span></a>" +
								"<a title=\"Eliminar\" href=\"<?php echo site_url('proveedor/remove/'.$p['id']); ?>\" class=\"btn btn-danger btn-xs\"><span class=\"fa fa-trash\"></span></a>" +
							"</td>" +
						"</tr>" 
						"<?php } ?>" +
						*/
					"</tbody>" +
				"</table>" 
		);

	});
</script>