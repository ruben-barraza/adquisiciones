<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Categorías</h2>
                <div class="nav navbar-right">
					<a href="<?php echo site_url('categoria/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
				</div>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
  				<table class="table table-striped">
				    <tr>
						<th>Nombre</th>
						<th></th>
				    </tr>
					<?php foreach($listacategoria as $c){ ?>
				    <tr>
						<td><?php echo $c['nombre']; ?></td>
						<td>
				            <a href="<?php echo site_url('categoria/edit/'.$c['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
				            <a href="<?php echo site_url('categoria/remove/'.$c['id']); ?>" onclick="return confirm('¿Desea eliminar la categoría seleccionada?');" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
				        </td>
				    </tr>
					<?php } ?>
				</table>
          	</div>
        </div>
  	</div>
</div>
