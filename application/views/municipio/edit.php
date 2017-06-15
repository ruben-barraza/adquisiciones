<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Editar municipio</h2>
                <ul class="nav navbar-right panel_toolbox">
                  	<li>
                  		<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  	</li>
                </ul>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
	          	<?php echo validation_errors(); ?>
				<?php echo form_open('municipio/edit/'.$municipio['id'],array("class"=>"form-horizontal")); ?>

					<div class="form-group">
							<label for="idEstado" class="col-md-4 control-label">Estado</label>
							<div class="col-md-8">
								<select name="idEstado" id="idEstado" class="form-control">
									<option value="">Seleccione</option>
									<?php 
									foreach($all_listaestado as $estado)
									{
										$selected = ($estado['id'] == $municipio['idEstado']) ? ' selected="selected"' : "";
										if($estado['nombre'] != "NINGUNO"){
											echo '<option value="'.$estado['id'].'" '.$selected.'>'.$estado['nombre'].'</option>';
										}
									} 
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
						<label for="nombre" class="col-md-4 control-label">Nombre</label>
						<div class="col-md-8">
							<input type="text" name="nombre" value="<?php echo ($this->input->post('nombre') ? $this->input->post('nombre') : $municipio['nombre']); ?>" class="form-control" id="nombre" />
						</div>
					</div>
					
					<div class = "col-sm-offset-4 col-sm-8">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-check"></i> Guardar
						</button>
						<a href="<?php echo site_url('municipio/index/'); ?>" id="botonCancelar" class="btn btn-danger">
							<span class="fa fa-ban"></span> Cancelar
						</a>
					</div>
					
				<?php echo form_close(); ?>			
			</div>
        </div>
  	</div>
</div>

<script type="text/javascript">   
    $(document).ready(function() {
		$("#idEstado option[value=0]").remove();
    });
</script>
