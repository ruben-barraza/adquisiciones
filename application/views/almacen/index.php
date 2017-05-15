<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Almacenes</h2>
                <div class="nav navbar-right">
					<a href="<?php echo site_url('almacen/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
				</div>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
  				<table class="table table-striped">
				    <tr>
						<th>Centro MM</th>
						<th>Empleado Responsable</th>
						<th>Nombre</th>
						<th>Domicilio</th>
						<th>Código Postal</th>
						<th>Estado</th>
						<th>Municipio</th>
						<th>Teléfono</th>
						<th></th>
				    </tr>
					<?php foreach($listaalmacen as $a){ ?>
				    <tr>
						<td><?php echo $a['centroMM']; ?></td>
						<td><?php echo $a['empleadoNombre'].' '.$a['empleadoAP'].' '.$a['empleadoAM']; ?></td>
						<td><?php echo $a['almacenNombre']; ?></td>
						<td><?php echo $a['domicilio']; ?></td>
						<td><?php echo $a['codigoPostal']; ?></td>
						<td><?php echo $a['estado']; ?></td>
						<td><?php echo $a['municipio']; ?></td>
						<td><?php echo $a['telefono']; ?></td>
						<td>
				            <a href="<?php echo site_url('almacen/edit/'.$a['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
				            <a href="<?php echo site_url('almacen/remove/'.$a['id']); ?>" onclick="return confirm('¿Desea eliminar el proveedor seleccionado?');" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
				        </td>
				    </tr>
					<?php } ?>
				</table>
          	</div>
        </div>
  	</div>
</div>
