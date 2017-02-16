<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Edit</h2>
                <ul class="nav navbar-right panel_toolbox">
                  	<li>
                  		<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  	</li>
                </ul>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
	          	<?php echo validation_errors(); ?>
				<?php echo form_open('po_proveedor/edit/'.$po_proveedor['idPog'],array("class"=>"form-horizontal")); ?>

					<div class="form-group">
							<label for="contacto" class="col-md-4 control-label">Contacto</label>
							<div class="col-md-8">
								<select name="contacto" class="form-control">
									<option value="">select</option>
									<?php 
									$contacto_values = array(
						'1'=>'Contacto 1',
						'2'=>'Contacto 2',
						'3'=>'Contacto 3',
					);

									foreach($contacto_values as $value => $display_text)
									{
										$selected = ($value == $po_proveedor['contacto']) ? ' selected="selected"' : "";

										echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-8">
							<button type="submit" class="btn btn-success">
								<i class="fa fa-check"></i> Save
							</button>
				        </div>
					</div>
					
				<?php echo form_close(); ?>			
			</div>
        </div>
  	</div>
</div>
