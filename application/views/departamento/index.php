<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Departamentos</h2>
                <div class="nav navbar-right">
					<a href="<?php echo site_url('departamento/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
				</div>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
  				<table class="table table-striped">
				    <tr>
						<th>Nombre</th>
						<th></th>
				    </tr>
					<?php foreach($listadepartamento as $d){ ?>
				    <tr>
						<td><?php echo $d['nombre']; ?></td>
						<td>
				            <a href="<?php echo site_url('departamento/edit/'.$d['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
				            <a href="<?php echo site_url('departamento/remove/'.$d['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
				        </td>
				    </tr>
					<?php } ?>
				</table>
          	</div>
        </div>
  	</div>
</div>
