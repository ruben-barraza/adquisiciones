<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>PO Generales</h2>
                <div class="nav navbar-right">
					<a href="<?php echo site_url('po_general/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
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

				<hr />
				<table id="table" class="table table-striped">
					<thead>
						<tr>
							<th>Tipo</th>
							<th>Familia</th>
							<th>Título</th>
							<th>Empleado Responsable</th>
							<th>Fecha de Elaboración</th>
							<th></th>
							<th></th>
						</tr>					
					</thead>
				    
					<tbody>
						<?php foreach($listapo_general as $p){ ?>
						<tr>
							<td><?php echo $p['tipo']; ?></td>
							<td><?php echo $p['clave']; ?></td>
							<td><?php echo $p['titulo']; ?></td>
							<?php 
								$fecha = $p['fechaElaboracion'];
								$fechaElaboracion = date("d/m/Y", strtotime($fecha));
							?>

							<td><?php echo $p['nombre']; ?></td>
							<td><?php echo $fechaElaboracion; ?></td>
							<td>
								<a href="<?php echo site_url('po_general/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
								<a href="<?php echo site_url('po_general/remove/'.$p['id']); ?>" onclick="return confirm('¿Desea eliminar el PO General seleccionado?');" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
							</td>
							<td>
								<a href="<?php echo site_url('generar_pdf/pdf/'.$p['id']); ?>"  class="btn btn-primary btn-xs"><span class="fa fa-print"></span></a> 
							</td>
						</tr>
					</tbody>
					
					<?php } ?>
				</table>

				<div id="tablaOculta" class="hidden">
					<table id="tablafamilias" class="table table-striped">
						<thead>
							<tr>
								<th>Tipo</th>
								<th>Familia</th>
								<th>Título</th>
								<th>Empleado Responsable</th>
								<th>Fecha de Elaboración</th>
								<th></th>
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

		var tbody = $('#tablafamilias tbody'),
    	indices = ["tipo", "clave", "titulo", "nombre", "fechaElaboracion"];
		indiceBotones = ["id"];

		function convertDate(inputFormat) {
			function pad(s) { return (s < 10) ? '0' + s : s; }
			var d = new Date(inputFormat);
			return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('/');
		}

		$('#idFamilia').change(function(){
			$('#tablaOculta').removeClass('hidden');
			$('#tablaOculta').show();
			$('#table').hide();
			$('#tablafamilias tbody').empty();
			var clave = $("#idFamilia option:selected").text();
			if (clave == "Seleccione"){
				$('#tablaOculta').hide();
				$('#table').show();
			} else {
				$.ajax({
					url: '<?php echo base_url(); ?>index.php/Po_general/obtenerListaProveedorFamilia',
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
								"id": val.id,
								"tipo": val.tipo, 
								"clave": val.clave,
								"titulo": val.titulo,
								"nombre": val.nombre,
								"fechaElaboracion": (val.fechaElaboracion).split("-").reverse().join("/"),
							});
						});

						$.each(selectArray, function(i, selected) {
							var tr = $('<tr>');
							$.each(indices, function(i, indice) {
								$('<td>').html(selected[indice]).appendTo(tr);
							});
							$.each(indiceBotones, function(i, indiceBoton){
								$('<td>').html(
                     				'<a title="Editar" href="' + SITE_ROOT + 'proveedor/edit/' + selected[indiceBoton] +'" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a>' 
                   					+ '<a title="Eliminar" href="' + SITE_ROOT + 'proveedor/remove/' + selected[indiceBoton] + '" onclick="return confirm(\'¿Desea eliminar el proveedor seleccionado?\');"class="btn eliminar btn-danger btn-xs"><span class="fa fa-trash"></span></a>'
                  				).appendTo(tr);
								$('<td>').html(
                     				'<a title="Generar PDF" href="' + SITE_ROOT + 'generar_pdf/pdf/' + selected[indiceBoton] +'" class="btn btn-info btn-xs"><span class="fa fa-print"></span></a>' 
                  				).appendTo(tr);  
							});
							tbody.append(tr);
						});
					}
				});
			}
		});


	});
</script>