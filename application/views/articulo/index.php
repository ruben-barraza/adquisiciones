<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Listing</h2>
                <div class="nav navbar-right">
					<a href="<?php echo site_url('articulo/add'); ?>" class="btn btn-success btn-sm">Add</a> 
				</div>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
  				<table class="table table-striped">
				    <tr>
						<th>ID</th>
						<th>Codigo</th>
						<th>Descripcion</th>
						<th>IdUnidadMedida</th>
						<th>DescripcionDetallada</th>
						<th>Especificacion</th>
						<th>IdFamilia</th>
						<th>PrecioUnitario</th>
						<th>Status</th>
						<th>IdUMEmbalaje</th>
						<th>CantidadEmbalaje</th>
						<th>TiempoEntrega</th>
						<th>Actions</th>
				    </tr>
					<?php foreach($listaarticulo as $a){ ?>
				    <tr>
						<td><?php echo $a['id']; ?></td>
						<td><?php echo $a['codigo']; ?></td>
						<td><?php echo $a['descripcion']; ?></td>
						<td><?php echo $a['idUnidadMedida']; ?></td>
						<td><?php echo $a['descripcionDetallada']; ?></td>
						<td><?php echo $a['especificacion']; ?></td>
						<td><?php echo $a['idFamilia']; ?></td>
						<td><?php echo $a['precioUnitario']; ?></td>
						<td><?php echo $a['status']; ?></td>
						<td><?php echo $a['idUMEmbalaje']; ?></td>
						<td><?php echo $a['cantidadEmbalaje']; ?></td>
						<td><?php echo $a['tiempoEntrega']; ?></td>
						<td>
				            <a href="<?php echo site_url('articulo/edit/'.$a['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
				            <a href="<?php echo site_url('articulo/remove/'.$a['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
				        </td>
				    </tr>
					<?php } ?>
				</table>
          	</div>
        </div>
  	</div>
</div>
