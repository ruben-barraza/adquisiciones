<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Agregar artículo</h2>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
				<?php echo validation_errors(); ?>
				<?php echo form_open('articulo/add',array("class"=>"form-horizontal")); ?>

					<div class="form-group">
						<label for="codigo" class="col-md-4 control-label">Código</label>
						<div class="col-md-8">
							<input type="text" name="codigo" value="<?php echo $this->input->post('codigo'); ?>" class="form-control" id="codigo" maxlength="10"/>
						</div>
					</div>
					<div class="form-group">
						<label for="idFamilia" class="col-md-4 control-label">Familia</label>
						<div class="col-md-8">
							<select name="idFamilia" class="form-control">
								<option value="">Seleccione</option>
								<?php 
									foreach($all_listafamilia as $familia)
									{
										$selected = ($familia['id'] == $this->input->post('idFamilia')) ? ' selected="selected"' : "";
										echo '<option value="'.$familia['id'].'" '.$selected.'>'.$familia['descripcion'].'</option>';
									} 
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="idUnidadMedida" class="col-md-4 control-label">Unidad Medida</label>
						<div class="col-md-8">
							<select name="idUnidadMedida" class="form-control">
								<option value="">Seleccione</option>
								<?php 
									foreach($all_listaunidadmedida as $unidadmedida)
									{
										$selected = ($unidadmedida['id'] == $this->input->post('idUnidadMedida')) ? ' selected="selected"' : "";

										echo '<option value="'.$unidadmedida['id'].'" '.$selected.'>'.$unidadmedida['clave'].'</option>';
									} 
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="descripcion" class="col-md-4 control-label">Descripción</label>
						<div class="col-md-8">
							<input type="text" name="descripcion" value="<?php echo $this->input->post('descripcion'); ?>" class="form-control" id="descripcion" maxlength="150"/>
						</div>
					</div>
					<div class="form-group">
						<label for="descripcionDetallada" class="col-md-4 control-label">Descripción Detallada</label>
						<div class="col-md-8">
							<textarea name="descripcionDetallada" class="form-control" id="descripcionDetallada" maxlength="500"><?php echo $this->input->post('descripcionDetallada'); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="especificacion" class="col-md-4 control-label">Especificación</label>
						<div class="col-md-8">
							<input type="text" name="especificacion" value="<?php echo $this->input->post('especificacion'); ?>" class="form-control" id="especificacion" maxlength="50" />
						</div>
					</div>
					<div class="form-group">
						<label for="precioUnitario" class="col-md-4 control-label">Precio Unitario</label>
						<div class="col-md-8">
							<input type="text" name="precioUnitario" value="<?php echo $this->input->post('precioUnitario'); ?>" class="form-control" id="precioUnitario" maxlength="16"/>
						</div>
					</div>
					<div class="form-group">
						<label for="cantidadEmbalaje" class="col-md-4 control-label">Cantidad Embalaje</label>
						<div class="col-md-8">
							<input type="text" name="cantidadEmbalaje" value="<?php echo $this->input->post('cantidadEmbalaje'); ?>" class="form-control" id="cantidadEmbalaje" maxlength="16"/>
						</div>
					</div>
					<div class="form-group">
						<label for="tiempoEntrega" class="col-md-4 control-label">Tiempo de Entrega (en días)</label>
						<div class="col-md-8">
							<input type="text" name="tiempoEntrega" value="<?php echo $this->input->post('tiempoEntrega'); ?>" class="form-control" id="tiempoEntrega" maxlength="11"/>
						</div>
					</div>
					<div class="form-group">
						<label for="status" class="col-md-4 control-label">Status</label>
						<div class="col-md-8">
							<select name="status" class="form-control">
								<option value="">Seleccione</option>
								<?php 
									$status_values = array(
										'A'=>'Activo',
										'B'=>'Bloqueado',
									);

									foreach($status_values as $value => $display_text)
									{
										$selected = ($value == $this->input->post('status')) ? ' selected="selected"' : "";
										echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
									} 
								?>
							</select>
						</div>
					</div>

					<div class = "col-sm-offset-4 col-sm-8">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-check"></i> Guardar
						</button>
						<a href="<?php echo site_url('articulo/index/'); ?>" id="botonCancelar" class="btn btn-danger">
							<span class="fa fa-ban"></span> Cancelar
						</a>
					</div>

				<?php echo form_close(); ?>
			</div>
    	</div>
  	</div>
</div>