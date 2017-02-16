<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Listing</h2>
                <div class="nav navbar-right">
					<a href="<?php echo site_url('po_general/add'); ?>" class="btn btn-success btn-sm">Add</a> 
				</div>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
  				<table class="table table-striped">
				    <tr>
						<th>ID</th>
						<th>Tipo</th>
						<th>Domicilio</th>
						<th>IdEmpleadoResponsable</th>
						<th>IdEmpleadoFormula</th>
						<th>FechaLimitePresentacion</th>
						<th>Ccp1</th>
						<th>Ccp2</th>
						<th>Ccp3</th>
						<th>FechaElaboracion</th>
						<th>Asunto</th>
						<th>IdMunicipio</th>
						<th>FechaUltimaModificacion</th>
						<th>Actions</th>
				    </tr>
					<?php foreach($listapo_general as $p){ ?>
				    <tr>
						<td><?php echo $p['id']; ?></td>
						<td><?php echo $p['tipo']; ?></td>
						<td><?php echo $p['domicilio']; ?></td>
						<td><?php echo $p['idEmpleadoResponsable']; ?></td>
						<td><?php echo $p['idEmpleadoFormula']; ?></td>
						<td><?php echo $p['fechaLimitePresentacion']; ?></td>
						<td><?php echo $p['ccp1']; ?></td>
						<td><?php echo $p['ccp2']; ?></td>
						<td><?php echo $p['ccp3']; ?></td>
						<td><?php echo $p['fechaElaboracion']; ?></td>
						<td><?php echo $p['asunto']; ?></td>
						<td><?php echo $p['idMunicipio']; ?></td>
						<td><?php echo $p['fechaUltimaModificacion']; ?></td>
						<td>
				            <a href="<?php echo site_url('po_general/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
				            <a href="<?php echo site_url('po_general/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
				        </td>
				    </tr>
					<?php } ?>
				</table>
          	</div>
        </div>
  	</div>
</div>
