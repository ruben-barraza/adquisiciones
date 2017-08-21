<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>IM Conceptos</h2>
                <div class="nav navbar-right">
					<a href="<?php echo site_url('im_concepto/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
				</div>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
  				<table class="table table-striped">
				    <tr>
						<th>ID</th>
						<th>Tipo</th>
						<th>IdArticulo</th>
						<th>Partida</th>
						<th>PlazoEntrega</th>
						<th>Cantidad</th>
						<th>LugarEntrega</th>
						<th>DireccionEntrega</th>
						<th></th>
				    </tr>
					<?php foreach($listaim_concepto as $i){ ?>
				    <tr>
						<td><?php echo $i['id']; ?></td>
						<td><?php echo $i['tipo']; ?></td>
						<td><?php echo $i['idArticulo']; ?></td>
						<td><?php echo $i['partida']; ?></td>
						<td><?php echo $i['plazoEntrega']; ?></td>
						<td><?php echo $i['cantidad']; ?></td>
						<td><?php echo $i['lugarEntrega']; ?></td>
						<td><?php echo $i['direccionEntrega']; ?></td>
						<td>
				            <a href="<?php echo site_url('im_concepto/edit/'.$i['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> </a> 
				            <a href="<?php echo site_url('im_concepto/remove/'.$i['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> </a>
				        </td>
				    </tr>
					<?php } ?>
				</table>
          	</div>
        </div>
  	</div>
</div>
