<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Listing</h2>
                <div class="nav navbar-right">
					<a href="<?php echo site_url('po_consideracion/add'); ?>" class="btn btn-success btn-sm">Add</a> 
				</div>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
  				<table class="table table-striped">
				    <tr>
						<th>ID</th>
						<th>Idpog</th>
						<th>Fc1</th>
						<th>Fc2</th>
						<th>Fc3</th>
						<th>Fc4</th>
						<th>Fc5</th>
						<th>Fc6</th>
						<th>Fc7</th>
						<th>Fc8</th>
						<th>Fc9</th>
						<th>Fc10</th>
						<th>Fc11</th>
						<th>Fc12</th>
						<th>Fc13</th>
						<th>Fc14</th>
						<th>Fc15</th>
						<th>Fc16</th>
						<th>Fc17</th>
						<th>Fc18</th>
						<th>Actions</th>
				    </tr>
					<?php foreach($listapo_consideracion as $p){ ?>
				    <tr>
						<td><?php echo $p['id']; ?></td>
						<td><?php echo $p['idpog']; ?></td>
						<td><?php echo $p['fc1']; ?></td>
						<td><?php echo $p['fc2']; ?></td>
						<td><?php echo $p['fc3']; ?></td>
						<td><?php echo $p['fc4']; ?></td>
						<td><?php echo $p['fc5']; ?></td>
						<td><?php echo $p['fc6']; ?></td>
						<td><?php echo $p['fc7']; ?></td>
						<td><?php echo $p['fc8']; ?></td>
						<td><?php echo $p['fc9']; ?></td>
						<td><?php echo $p['fc10']; ?></td>
						<td><?php echo $p['fc11']; ?></td>
						<td><?php echo $p['fc12']; ?></td>
						<td><?php echo $p['fc13']; ?></td>
						<td><?php echo $p['fc14']; ?></td>
						<td><?php echo $p['fc15']; ?></td>
						<td><?php echo $p['fc16']; ?></td>
						<td><?php echo $p['fc17']; ?></td>
						<td><?php echo $p['fc18']; ?></td>
						<td>
				            <a href="<?php echo site_url('po_consideracion/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
				            <a href="<?php echo site_url('po_consideracion/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
				        </td>
				    </tr>
					<?php } ?>
				</table>
          	</div>
        </div>
  	</div>
</div>
