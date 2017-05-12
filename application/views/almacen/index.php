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
						<th>ID</th>
						<th>Centro MM</th>
						<th>Id Empleado Responsable</th>
						<th>Nombre</th>
						<th>Domicilio</th>
						<th>Id Municipio</th>
						<th>Teléfono</th>
						<th>Código Postal</th>
						<th>Actions</th>
				    </tr>
					<?php foreach($listaalmacen as $a){ ?>
				    <tr>
						<td><?php echo $a['id']; ?></td>
						<td><?php echo $a['centroMM']; ?></td>
						<td><?php echo $a['idEmpleadoResponsable']; ?></td>
						<td><?php echo $a['nombre']; ?></td>
						<td><?php echo $a['domicilio']; ?></td>
						<td><?php echo $a['idMunicipio']; ?></td>
						<td><?php echo $a['telefono']; ?></td>
						<td><?php echo $a['codigoPostal']; ?></td>
						<td>
				            <a href="<?php echo site_url('almacen/edit/'.$a['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
				            <a href="<?php echo site_url('almacen/remove/'.$a['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
				        </td>
				    </tr>
					<?php } ?>
				</table>
          	</div>
        </div>
  	</div>
</div>
