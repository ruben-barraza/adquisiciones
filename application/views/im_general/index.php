<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Listing</h2>
                <div class="nav navbar-right">
					<a href="<?php echo site_url('im_general/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
				</div>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
  				<table class="table table-striped">
				    <tr>
						<th>ID</th>
						<th>Titulo</th>
						<th>IdEmpleadoFormula</th>
						<th>IdEmpleadoAutoriza</th>
						<th>FechaElaboracion</th>
						<th>IdMunicipioElaboracion</th>
						<th>Actions</th>
				    </tr>
					<?php foreach($listaim_general as $i){ ?>
				    <tr>
						<td><?php echo $i['id']; ?></td>
						<td><?php echo $i['titulo']; ?></td>
						<td><?php echo $i['idEmpleadoFormula']; ?></td>
						<td><?php echo $i['idEmpleadoAutoriza']; ?></td>
						<td><?php echo $i['fechaElaboracion']; ?></td>
						<td><?php echo $i['idMunicipioElaboracion']; ?></td>
						<td>
				            <a href="<?php echo site_url('im_general/edit/'.$i['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> 
				            <a href="<?php echo site_url('im_general/remove/'.$i['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Borrar</a>
				        </td>
				    </tr>
					<?php } ?>
				</table>
          	</div>
        </div>
  	</div>
</div>
