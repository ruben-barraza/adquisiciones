<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Listing</h2>
                <div class="nav navbar-right">
					<a href="<?php echo site_url('relacionproveedorfamilia/add'); ?>" class="btn btn-success btn-sm">Add</a> 
				</div>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
  				<table class="table table-striped">
				    <tr>
						<th>IdProveedor</th>
						<th>IdFamilia</th>
						<th>Actions</th>
				    </tr>
					<?php foreach($listarelacionproveedorfamilia as $r){ ?>
				    <tr>
						<td><?php echo $r['idProveedor']; ?></td>
						<td><?php echo $r['idFamilia']; ?></td>
						<td>
				            <a href="<?php echo site_url('relacionproveedorfamilia/edit/'.$r['idProveedor']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
				            <a href="<?php echo site_url('relacionproveedorfamilia/remove/'.$r['idProveedor']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
				        </td>
				    </tr>
					<?php } ?>
				</table>
          	</div>
        </div>
  	</div>
</div>
