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
				<?php echo form_open('im_concepto/edit/'.$im_concepto['id'],array("class"=>"form-horizontal")); ?>

					<div class="form-group">
							<label for="idImg" class="col-md-4 control-label">IdImg</label>
							<div class="col-md-8">
								<select name="idImg" class="form-control">
									<option value="">select im_general</option>
									<?php 
									foreach($all_listaim_general as $im_general)
									{
										$selected = ($im_general['id'] == $im_concepto['idImg']) ? ' selected="selected"' : "";

										echo '<option value="'.$im_general['id'].'" '.$selected.'>'.$im_general['id'].'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
							<label for="tipo" class="col-md-4 control-label">Tipo</label>
							<div class="col-md-8">
								<select name="tipo" class="form-control">
									<option value="">select</option>
									<?php 
									$tipo_values = array(
						'B'=>'Bienes',
						'S'=>'Servicios',
					);

									foreach($tipo_values as $value => $display_text)
									{
										$selected = ($value == $im_concepto['tipo']) ? ' selected="selected"' : "";

										echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
						<label for="idConcepto" class="col-md-4 control-label">IdConcepto</label>
						<div class="col-md-8">
							<input type="text" name="idConcepto" value="<?php echo ($this->input->post('idConcepto') ? $this->input->post('idConcepto') : $im_concepto['idConcepto']); ?>" class="form-control" id="idConcepto" />
						</div>
					</div>
					<div class="form-group">
						<label for="partida" class="col-md-4 control-label">Partida</label>
						<div class="col-md-8">
							<input type="text" name="partida" value="<?php echo ($this->input->post('partida') ? $this->input->post('partida') : $im_concepto['partida']); ?>" class="form-control" id="partida" />
						</div>
					</div>
					<div class="form-group">
						<label for="plazoEntrega" class="col-md-4 control-label">PlazoEntrega</label>
						<div class="col-md-8">
							<input type="text" name="plazoEntrega" value="<?php echo ($this->input->post('plazoEntrega') ? $this->input->post('plazoEntrega') : $im_concepto['plazoEntrega']); ?>" class="form-control" id="plazoEntrega" />
						</div>
					</div>
					<div class="form-group">
						<label for="cantidad" class="col-md-4 control-label">Cantidad</label>
						<div class="col-md-8">
							<input type="text" name="cantidad" value="<?php echo ($this->input->post('cantidad') ? $this->input->post('cantidad') : $im_concepto['cantidad']); ?>" class="form-control" id="cantidad" />
						</div>
					</div>
					<div class="form-group">
						<label for="lugarEntrega" class="col-md-4 control-label">LugarEntrega</label>
						<div class="col-md-8">
							<input type="text" name="lugarEntrega" value="<?php echo ($this->input->post('lugarEntrega') ? $this->input->post('lugarEntrega') : $im_concepto['lugarEntrega']); ?>" class="form-control" id="lugarEntrega" />
						</div>
					</div>
					<div class="form-group">
						<label for="direccionEntrega" class="col-md-4 control-label">DireccionEntrega</label>
						<div class="col-md-8">
							<textarea name="direccionEntrega" class="form-control" id="direccionEntrega"><?php echo ($this->input->post('direccionEntrega') ? $this->input->post('direccionEntrega') : $im_concepto['direccionEntrega']); ?></textarea>
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
