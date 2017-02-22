<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Unidades de medida</h2>
                <div class="nav navbar-right">
					<a href="<?php echo site_url('unidadmedida/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
				</div>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
  				<table class="table table-striped">
				    <tr>
						<th>Clave</th>
						<th>Descripción</th>
						<th></th>
				    </tr>
					<?php foreach($listaunidadmedida as $u){ ?>
				    <tr>
						<td><?php echo $u['clave']; ?></td>
						<td><?php echo $u['descripcion']; ?></td>
						<td>
				            <a href="<?php echo site_url('unidadmedida/edit/'.$u['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
				            <a href="<?php echo site_url('unidadmedida/remove/'.$u['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
				        </td>
				    </tr>
					<?php } ?>
				</table>
          	</div>
        </div>
  	</div>
</div>
