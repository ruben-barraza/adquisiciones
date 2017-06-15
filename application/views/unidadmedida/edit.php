<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Editar unidad de medida</h2>
                <ul class="nav navbar-right panel_toolbox">
                  	<li>
                  		<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  	</li>
                </ul>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
	          	<?php echo validation_errors(); ?>
				<?php echo form_open('unidadmedida/edit/'.$unidadmedida['id'],array("class"=>"form-horizontal")); ?>

					<div class="form-group">
						<label for="clave" class="col-md-4 control-label">Clave</label>
						<div class="col-md-8">
							<input type="text" name="clave" value="<?php echo ($this->input->post('clave') ? $this->input->post('clave') : $unidadmedida['clave']); ?>" class="form-control" id="clave" />
						</div>
					</div>
					<div class="form-group">
						<label for="descripcion" class="col-md-4 control-label">Descripción</label>
						<div class="col-md-8">
							<input type="text" name="descripcion" value="<?php echo ($this->input->post('descripcion') ? $this->input->post('descripcion') : $unidadmedida['descripcion']); ?>" class="form-control" id="descripcion" />
						</div>
					</div>
					
					
					<div class = "col-sm-offset-4 col-sm-8">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-check"></i> Guardar
						</button>
						<a href="<?php echo site_url('unidadmedida/index/'); ?>" id="botonCancelar" class="btn btn-danger">
							<span class="fa fa-ban"></span> Cancelar
						</a>
					</div>
					
				<?php echo form_close(); ?>			
			</div>
        </div>
  	</div>
</div>
