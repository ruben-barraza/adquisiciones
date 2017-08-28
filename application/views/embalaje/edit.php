<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Edit</h2>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
	          	<?php echo validation_errors(); ?>
				<?php echo form_open('embalaje/edit/'.$embalaje['id'],array("class"=>"form-horizontal")); ?>

					<div class="form-group">
						<label for="clave" class="col-md-4 control-label">Clave</label>
						<div class="col-md-8">
							<input type="text" name="clave" value="<?php echo ($this->input->post('clave') ? $this->input->post('clave') : $embalaje['clave']); ?>" class="form-control" id="clave" />
						</div>
					</div>
					<div class="form-group">
						<label for="descripcion" class="col-md-4 control-label">Descripcion</label>
						<div class="col-md-8">
							<input type="text" name="descripcion" value="<?php echo ($this->input->post('descripcion') ? $this->input->post('descripcion') : $embalaje['descripcion']); ?>" class="form-control" id="descripcion" />
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
