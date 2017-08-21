<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>PO Consideraciones</h2>
                <div class="nav navbar-right">
					<a href="<?php echo site_url('po_consideracion/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
				</div>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
  				<table class="table table-striped">
				    <tr>
						<th>ID</th>
						<th>Idpog</th>
						<th></th>
				    </tr>
					<?php foreach($listapo_consideracion as $p){ ?>
				    <tr>
						<td><?php echo $p['id']; ?></td>
						<td><?php echo $p['idpog']; ?></td>
						<td>
				            <a href="<?php echo site_url('po_consideracion/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> </a> 
				            <a href="<?php echo site_url('po_consideracion/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> </a>
				        </td>
				    </tr>
					<?php } ?>
				</table>
          	</div>
        </div>
  	</div>
</div>
