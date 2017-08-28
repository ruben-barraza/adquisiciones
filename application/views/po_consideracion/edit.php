<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<style>
	
</style>

<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Editar aspectos a considerar</h2>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
	          	<?php echo validation_errors(); ?>
				<?php echo form_open('po_consideracion/edit/'.$po_consideracion['id'],array("class"=>"form-horizontal")); ?>

					<div class="form-group">
							<label for="idpog" class="col-md-4 control-label">Idpog</label>
							<div class="col-md-8">
								<select name="idpog" class="form-control">
									<option value="">select po_general</option>
									<?php 
									foreach($all_listapo_general as $po_general)
									{
										$selected = ($po_general['id'] == $po_consideracion['idpog']) ? ' selected="selected"' : "";

										echo '<option value="'.$po_general['id'].'" '.$selected.'>'.$po_general['id'].'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
						<label for="fc1" class="col-md-4 control-label">Punto 1</label>
						<div class="col-md-8">
							<textarea name="fc1" class="form-control summernote" id="fc1"><?php echo ($this->input->post('fc1') ? $this->input->post('fc1') : $po_consideracion['fc1']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc2" class="col-md-4 control-label">Punto 2</label>
						<div class="col-md-8">
							<textarea name="fc2" class="form-control summernote" id="fc2"><?php echo ($this->input->post('fc2') ? $this->input->post('fc2') : $po_consideracion['fc2']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc3" class="col-md-4 control-label">Condiciones</label>
						<div class="col-md-8">
							<textarea name="fc3" class="form-control summernote" id="fc3"><?php echo ($this->input->post('fc3') ? $this->input->post('fc3') : $po_consideracion['fc3']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc4" class="col-md-4 control-label">Punto 3</label>
						<div class="col-md-8">
							<textarea name="fc4" class="form-control summernote" id="fc4"><?php echo ($this->input->post('fc4') ? $this->input->post('fc4') : $po_consideracion['fc4']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc5" class="col-md-4 control-label">Punto 4</label>
						<div class="col-md-8">
							<textarea name="fc5" class="form-control summernote" id="fc5"><?php echo ($this->input->post('fc5') ? $this->input->post('fc5') : $po_consideracion['fc5']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc6" class="col-md-4 control-label">Punto 5</label>
						<div class="col-md-8">
							<textarea name="fc6" class="form-control summernote" id="fc6"><?php echo ($this->input->post('fc6') ? $this->input->post('fc6') : $po_consideracion['fc6']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc7" class="col-md-4 control-label">Punto 6</label>
						<div class="col-md-8">
							<textarea name="fc7" class="form-control summernote" id="fc7"><?php echo ($this->input->post('fc7') ? $this->input->post('fc7') : $po_consideracion['fc7']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc8" class="col-md-4 control-label">Especificaciones</label>
						<div class="col-md-8">
							<textarea name="fc8" class="form-control summernote" id="fc8"><?php echo ($this->input->post('fc8') ? $this->input->post('fc8') : $po_consideracion['fc8']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc9" class="col-md-4 control-label">Punto 7</label>
						<div class="col-md-8">
							<textarea name="fc9" class="form-control summernote" id="fc9"><?php echo ($this->input->post('fc9') ? $this->input->post('fc9') : $po_consideracion['fc9']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc10" class="col-md-4 control-label">Punto 8</label>
						<div class="col-md-8">
							<textarea name="fc10" class="form-control summernote" id="fc10"><?php echo ($this->input->post('fc10') ? $this->input->post('fc10') : $po_consideracion['fc10']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc11" class="col-md-4 control-label">Punto 9</label>
						<div class="col-md-8">
							<textarea name="fc11" class="form-control summernote" id="fc11"><?php echo ($this->input->post('fc11') ? $this->input->post('fc11') : $po_consideracion['fc11']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc12" class="col-md-4 control-label">Punto 10</label>
						<div class="col-md-8">
							<textarea name="fc12" class="form-control summernote" id="fc12"><?php echo ($this->input->post('fc12') ? $this->input->post('fc12') : $po_consideracion['fc12']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc13" class="col-md-4 control-label">Punto 11</label>
						<div class="col-md-8">
							<textarea name="fc13" class="form-control summernote" id="fc13"><?php echo ($this->input->post('fc13') ? $this->input->post('fc13') : $po_consideracion['fc13']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc14" class="col-md-4 control-label">Punto 12</label>
						<div class="col-md-8">
							<textarea name="fc14" class="form-control summernote" id="fc14"><?php echo ($this->input->post('fc14') ? $this->input->post('fc14') : $po_consideracion['fc14']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc15" class="col-md-4 control-label">Punto 13</label>
						<div class="col-md-8">
							<textarea name="fc15" class="form-control summernote" id="fc15"><?php echo ($this->input->post('fc15') ? $this->input->post('fc15') : $po_consideracion['fc15']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc16" class="col-md-4 control-label">Punto 14</label>
						<div class="col-md-8">
							<textarea name="fc16" class="form-control summernote" id="fc16"><?php echo ($this->input->post('fc16') ? $this->input->post('fc16') : $po_consideracion['fc16']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc17" class="col-md-4 control-label">Punto 15</label>
						<div class="col-md-8">
							<textarea name="fc17" class="form-control summernote" id="fc17"><?php echo ($this->input->post('fc17') ? $this->input->post('fc17') : $po_consideracion['fc17']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="fc18" class="col-md-4 control-label">Vigencia</label>
						<div class="col-md-8">
							<textarea name="fc18" class="form-control summernote" id="fc18"><?php echo ($this->input->post('fc18') ? $this->input->post('fc18') : $po_consideracion['fc18']); ?></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-8">
							<button type="submit" class="btn btn-success">
								<i class="fa fa-check"></i> Guardar
							</button>
				        </div>
					</div>
					
				<?php echo form_close(); ?>			
			</div>
        </div>
  	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
        $('.summernote').summernote({
			height: 150,
			toolbar: [
				// [groupName, [list of button]]
				//['fontname', ['fontname']],
				['style', ['bold', 'italic', 'underline', 'clear']],
				['fontsize', ['fontsize']],
				['para', ['ul', 'ol', 'paragraph']],
  			]
		});
    });
</script>