
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>


<style>
	
</style>

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
						<div class="col-md-4 input-group pull-right">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-search"></i>	
							</span>
							<input type="text" name="busqueda" id="search" placeholder="Búsqueda" class="form-control" id="busqueda"/>
							
						</div>
					</div>
					
					<div class="form-group pull-right">
						<label for="tipo" class="control-label">Tipo</label>
						<select name="tipo" id="tipoProveedor" style="width: 344px" class="form-control">
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
					<br />
					<br />
					<br />
					<div class="familiaOcultar B pull-right">
						<div class="form-group">
							<label for="idFamilia" class="control-label">Familia</label>
							<select id="idFamilia" style="width: 344px" name="idFamilia" class="form-control">
								<option value="0">Seleccione</option>
								<?php 
									foreach ($familias as $i) {
										echo '<option value="'. $i->id .'">'. $i->clave .'</option>';
									}
								?>
							</select>
						</div>
					</div>
					
					
            	</form>
				
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
          	</div>
        </div>
  	</div>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		$('.familiaOcultar').addClass('collapse');

		$('#tipoProveedor').change(function(){
			//Saves in a variable the wanted div
			//var selector = '.opcion_' + $(this).val();
			//hide all elements
			$('.familiaOcultar').collapse('hide');
			//show only element connected to selected option
			//$(selector).collapse('show');
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

	});
</script>