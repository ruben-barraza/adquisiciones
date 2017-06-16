<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Empleados</h2>
                <div class="nav navbar-right">
					<a href="<?php echo site_url('empleado/add'); ?>" class="btn btn-success btn-sm">Agregar empleado</a> 
				</div>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
  				<table class="table table-striped">
				    <tr>
						<th>RPE</th>
						<th>Nombre</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Correo Electrónico</th>
						<th>Departamento</th>
						<th>Categoría</th>
						<th></th>
				    </tr>
					<?php foreach($listaempleado as $e){ ?>
				    <tr>
						<td><?php echo $e['rpe']; ?></td>
						<td><?php echo $e['nombre']; ?></td>
						<td><?php echo $e['apellidoPaterno']; ?></td>
						<td><?php echo $e['apellidoMaterno']; ?></td>
						<td><?php echo $e['correoElectronico']; ?></td>
						<td><?php echo $e['departamento']; ?></td>
						<td><?php echo $e['categoria']; ?></td>
						<td>
				            <a href="<?php echo site_url('empleado/edit/'.$e['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
				            <a href="<?php echo site_url('empleado/remove/'.$e['id']); ?>" onclick="return confirm('¿Desea eliminar el empleado seleccionado?');" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
				        </td>
				    </tr>
					<?php } ?>
				</table>
          	</div>
        </div>
  	</div>
</div>
