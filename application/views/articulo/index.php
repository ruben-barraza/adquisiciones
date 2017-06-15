<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Artículos</h2>
                <div class="nav navbar-right">
					<a href="<?php echo site_url('articulo/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
				</div>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
  				<table class="table table-striped">
				    <tr>
						<th>Código</th>
						<th>Familia</th>
						<th>Unidad Medida</th>
						<th>Descripción</th>
						<th>Descripción Detallada</th>
						<th>Especificación</th>
						<th>Precio Unitario</th>
						<th>Cantidad Embalaje</th>
						<th>Tiempo Entrega</th>
						<th>Status</th>
						<th></th>
				    </tr>
					<?php foreach($listaarticulo as $a){ ?>
				    <tr>
						<td><?php echo $a['codigo']; ?></td>
						<td><?php echo $a['familia']; ?></td>
						<td><?php echo $a['unidadmedida']; ?></td>
						<td><?php echo $a['descripcion']; ?></td>
						<td><?php echo $a['descripcionDetallada']; ?></td>
						<td><?php echo $a['especificacion']; ?></td>
						<td><?php echo $a['precioUnitario']; ?></td>
						<td><?php echo $a['cantidadEmbalaje']; ?></td>
						<td><?php echo $a['tiempoEntrega']; ?></td>
						<td><?php echo $a['status']; ?></td>
						<td>
				            <a href="<?php echo site_url('articulo/edit/'.$a['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
				            <a href="<?php echo site_url('articulo/remove/'.$a['id']); ?>" onclick="return confirm('¿Desea eliminar el artículo seleccionado?');" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
				        </td>
				    </tr>
					<?php } ?>
				</table>
          	</div>
        </div>
  	</div>
</div>
