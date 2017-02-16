<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Listing</h2>
                <div class="nav navbar-right">
					<a href="<?php echo site_url('empleado/add'); ?>" class="btn btn-success btn-sm">Add</a> 
				</div>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
  				<table class="table table-striped">
				    <tr>
						<th>ID</th>
						<th>Rpe</th>
						<th>Nombre</th>
						<th>ApellidoPaterno</th>
						<th>ApellidoMaterno</th>
						<th>Titulo</th>
						<th>IdDepartamento</th>
						<th>IdCategoria</th>
						<th>Actions</th>
				    </tr>
					<?php foreach($listaempleado as $e){ ?>
				    <tr>
						<td><?php echo $e['id']; ?></td>
						<td><?php echo $e['rpe']; ?></td>
						<td><?php echo $e['nombre']; ?></td>
						<td><?php echo $e['apellidoPaterno']; ?></td>
						<td><?php echo $e['apellidoMaterno']; ?></td>
						<td><?php echo $e['titulo']; ?></td>
						<td><?php echo $e['idDepartamento']; ?></td>
						<td><?php echo $e['idCategoria']; ?></td>
						<td>
				            <a href="<?php echo site_url('empleado/edit/'.$e['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
				            <a href="<?php echo site_url('empleado/remove/'.$e['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
				        </td>
				    </tr>
					<?php } ?>
				</table>
          	</div>
        </div>
  	</div>
</div>
