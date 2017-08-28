<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
          		<div class="x_title">
                		<h2>Editar categoría</h2>
                		<div class="clearfix"></div>
          		</div>
			<div class="x_content">
				<?php echo validation_errors(); ?>
				<?php echo form_open('categoria/edit/'.$categoria['id'],array("class"=>"form-horizontal")); ?>
				<div class="form-group">
					<label for="nombre" class="col-md-4 control-label">Nombre</label>
					<div class="col-md-8">
						<input type="text" name="nombre" value="<?php echo ($this->input->post('nombre') ? $this->input->post('nombre') : $categoria['nombre']); ?>" class="form-control" id="nombre" />
					</div>
				</div>

				<div class = "col-sm-offset-4 col-sm-8">
					<button type="submit" class="btn btn-success">
						<i class="fa fa-check"></i> Guardar
					</button>
					<a href="<?php echo site_url('categoria/index/'); ?>" id="botonCancelar" class="btn btn-danger">
						<span class="fa fa-ban"></span> Cancelar
					</a>
				</div>
						
				<?php echo form_close(); ?>			
			</div>
		</div>
  	</div>
</div>
