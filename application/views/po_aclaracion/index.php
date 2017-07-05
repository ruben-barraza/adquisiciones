<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>PO Aclaraciones</h2>
                <div class="nav navbar-right">
					<a href="<?php echo site_url('po_aclaracion/add'); ?>" class="btn btn-success btn-sm">Add</a> 
				</div>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
  				<table class="table table-striped">
				    <tr>
						<th>IdPog</th>
						<th>IdEmpleado</th>
						<th>Actions</th>
				    </tr>
					<?php foreach($listapo_aclaracion as $p){ ?>
				    <tr>
						<td><?php echo $p['idPog']; ?></td>
						<td><?php echo $p['idEmpleado']; ?></td>
						<td>
				            <a href="<?php echo site_url('po_aclaracion/edit/'.$p['idPog']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
				            <a href="<?php echo site_url('po_aclaracion/remove/'.$p['idPog']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
				        </td>
				    </tr>
					<?php } ?>
				</table>
          	</div>
        </div>
  	</div>
</div>
