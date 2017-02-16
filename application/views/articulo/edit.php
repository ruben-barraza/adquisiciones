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
				<?php echo form_open('articulo/edit/'.$articulo['id'],array("class"=>"form-horizontal")); ?>

					<div class="form-group">
						<label for="codigo" class="col-md-4 control-label">Codigo</label>
						<div class="col-md-8">
							<textarea name="codigo" class="form-control" id="codigo"><?php echo ($this->input->post('codigo') ? $this->input->post('codigo') : $articulo['codigo']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="descripcion" class="col-md-4 control-label">Descripcion</label>
						<div class="col-md-8">
							<input type="text" name="descripcion" value="<?php echo ($this->input->post('descripcion') ? $this->input->post('descripcion') : $articulo['descripcion']); ?>" class="form-control" id="descripcion" />
						</div>
					</div>
					<div class="form-group">
							<label for="idUnidadMedida" class="col-md-4 control-label">IdUnidadMedida</label>
							<div class="col-md-8">
								<select name="idUnidadMedida" class="form-control">
									<option value="">select unidadmedida</option>
									<?php 
									foreach($all_listaunidadmedida as $unidadmedida)
									{
										$selected = ($unidadmedida['id'] == $articulo['idUnidadMedida']) ? ' selected="selected"' : "";

										echo '<option value="'.$unidadmedida['id'].'" '.$selected.'>'.$unidadmedida['clave'].'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
						<label for="descripcionDetallada" class="col-md-4 control-label">DescripcionDetallada</label>
						<div class="col-md-8">
							<textarea name="descripcionDetallada" class="form-control" id="descripcionDetallada"><?php echo ($this->input->post('descripcionDetallada') ? $this->input->post('descripcionDetallada') : $articulo['descripcionDetallada']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="especificacion" class="col-md-4 control-label">Especificacion</label>
						<div class="col-md-8">
							<textarea name="especificacion" class="form-control" id="especificacion"><?php echo ($this->input->post('especificacion') ? $this->input->post('especificacion') : $articulo['especificacion']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
							<label for="idFamilia" class="col-md-4 control-label">IdFamilia</label>
							<div class="col-md-8">
								<select name="idFamilia" class="form-control">
									<option value="">select familia</option>
									<?php 
									foreach($all_listafamilia as $familia)
									{
										$selected = ($familia['id'] == $articulo['idFamilia']) ? ' selected="selected"' : "";

										echo '<option value="'.$familia['id'].'" '.$selected.'>'.$familia['descripcion'].'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
						<label for="precioUnitario" class="col-md-4 control-label">PrecioUnitario</label>
						<div class="col-md-8">
							<input type="text" name="precioUnitario" value="<?php echo ($this->input->post('precioUnitario') ? $this->input->post('precioUnitario') : $articulo['precioUnitario']); ?>" class="form-control" id="precioUnitario" />
						</div>
					</div>
					<div class="form-group">
							<label for="status" class="col-md-4 control-label">Status</label>
							<div class="col-md-8">
								<select name="status" class="form-control">
									<option value="">select</option>
									<?php 
									$status_values = array(
						'A'=>'Activo',
						'B'=>'Bloqueado',
					);

									foreach($status_values as $value => $display_text)
									{
										$selected = ($value == $articulo['status']) ? ' selected="selected"' : "";

										echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
							<label for="idUMEmbalaje" class="col-md-4 control-label">IdUMEmbalaje</label>
							<div class="col-md-8">
								<select name="idUMEmbalaje" class="form-control">
									<option value="">select unidadmedida</option>
									<?php 
									foreach($all_listaunidadmedida as $unidadmedida)
									{
										$selected = ($unidadmedida['id'] == $articulo['idUMEmbalaje']) ? ' selected="selected"' : "";

										echo '<option value="'.$unidadmedida['id'].'" '.$selected.'>'.$unidadmedida['clave'].'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
						<label for="cantidadEmbalaje" class="col-md-4 control-label">CantidadEmbalaje</label>
						<div class="col-md-8">
							<textarea name="cantidadEmbalaje" class="form-control" id="cantidadEmbalaje"><?php echo ($this->input->post('cantidadEmbalaje') ? $this->input->post('cantidadEmbalaje') : $articulo['cantidadEmbalaje']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="tiempoEntrega" class="col-md-4 control-label">TiempoEntrega</label>
						<div class="col-md-8">
							<input type="text" name="tiempoEntrega" value="<?php echo ($this->input->post('tiempoEntrega') ? $this->input->post('tiempoEntrega') : $articulo['tiempoEntrega']); ?>" class="form-control" id="tiempoEntrega" />
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
