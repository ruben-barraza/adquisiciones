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
						<label for="fc1" class="col-md-4 control-label">Fc1</label>
						<div class="col-md-8">
							<input type="text" name="fc1" value="<?php echo ($this->input->post('fc1') ? $this->input->post('fc1') : $po_consideracion['fc1']); ?>" class="form-control" id="fc1" />
						</div>
					</div>
					<div class="form-group">
						<label for="fc2" class="col-md-4 control-label">Fc2</label>
						<div class="col-md-8">
							<input type="text" name="fc2" value="<?php echo ($this->input->post('fc2') ? $this->input->post('fc2') : $po_consideracion['fc2']); ?>" class="form-control" id="fc2" />
						</div>
					</div>
					<div class="form-group">
						<label for="fc3" class="col-md-4 control-label">Fc3</label>
						<div class="col-md-8">
							<input type="text" name="fc3" value="<?php echo ($this->input->post('fc3') ? $this->input->post('fc3') : $po_consideracion['fc3']); ?>" class="form-control" id="fc3" />
						</div>
					</div>
					<div class="form-group">
						<label for="fc4" class="col-md-4 control-label">Fc4</label>
						<div class="col-md-8">
							<input type="text" name="fc4" value="<?php echo ($this->input->post('fc4') ? $this->input->post('fc4') : $po_consideracion['fc4']); ?>" class="form-control" id="fc4" />
						</div>
					</div>
					<div class="form-group">
						<label for="fc5" class="col-md-4 control-label">Fc5</label>
						<div class="col-md-8">
							<input type="text" name="fc5" value="<?php echo ($this->input->post('fc5') ? $this->input->post('fc5') : $po_consideracion['fc5']); ?>" class="form-control" id="fc5" />
						</div>
					</div>
					<div class="form-group">
						<label for="fc6" class="col-md-4 control-label">Fc6</label>
						<div class="col-md-8">
							<input type="text" name="fc6" value="<?php echo ($this->input->post('fc6') ? $this->input->post('fc6') : $po_consideracion['fc6']); ?>" class="form-control" id="fc6" />
						</div>
					</div>
					<div class="form-group">
						<label for="fc7" class="col-md-4 control-label">Fc7</label>
						<div class="col-md-8">
							<input type="text" name="fc7" value="<?php echo ($this->input->post('fc7') ? $this->input->post('fc7') : $po_consideracion['fc7']); ?>" class="form-control" id="fc7" />
						</div>
					</div>
					<div class="form-group">
						<label for="fc8" class="col-md-4 control-label">Fc8</label>
						<div class="col-md-8">
							<input type="text" name="fc8" value="<?php echo ($this->input->post('fc8') ? $this->input->post('fc8') : $po_consideracion['fc8']); ?>" class="form-control" id="fc8" />
						</div>
					</div>
					<div class="form-group">
						<label for="fc9" class="col-md-4 control-label">Fc9</label>
						<div class="col-md-8">
							<input type="text" name="fc9" value="<?php echo ($this->input->post('fc9') ? $this->input->post('fc9') : $po_consideracion['fc9']); ?>" class="form-control" id="fc9" />
						</div>
					</div>
					<div class="form-group">
						<label for="fc10" class="col-md-4 control-label">Fc10</label>
						<div class="col-md-8">
							<input type="text" name="fc10" value="<?php echo ($this->input->post('fc10') ? $this->input->post('fc10') : $po_consideracion['fc10']); ?>" class="form-control" id="fc10" />
						</div>
					</div>
					<div class="form-group">
						<label for="fc11" class="col-md-4 control-label">Fc11</label>
						<div class="col-md-8">
							<input type="text" name="fc11" value="<?php echo ($this->input->post('fc11') ? $this->input->post('fc11') : $po_consideracion['fc11']); ?>" class="form-control" id="fc11" />
						</div>
					</div>
					<div class="form-group">
						<label for="fc12" class="col-md-4 control-label">Fc12</label>
						<div class="col-md-8">
							<input type="text" name="fc12" value="<?php echo ($this->input->post('fc12') ? $this->input->post('fc12') : $po_consideracion['fc12']); ?>" class="form-control" id="fc12" />
						</div>
					</div>
					<div class="form-group">
						<label for="fc13" class="col-md-4 control-label">Fc13</label>
						<div class="col-md-8">
							<input type="text" name="fc13" value="<?php echo ($this->input->post('fc13') ? $this->input->post('fc13') : $po_consideracion['fc13']); ?>" class="form-control" id="fc13" />
						</div>
					</div>
					<div class="form-group">
						<label for="fc14" class="col-md-4 control-label">Fc14</label>
						<div class="col-md-8">
							<input type="text" name="fc14" value="<?php echo ($this->input->post('fc14') ? $this->input->post('fc14') : $po_consideracion['fc14']); ?>" class="form-control" id="fc14" />
						</div>
					</div>
					<div class="form-group">
						<label for="fc15" class="col-md-4 control-label">Fc15</label>
						<div class="col-md-8">
							<input type="text" name="fc15" value="<?php echo ($this->input->post('fc15') ? $this->input->post('fc15') : $po_consideracion['fc15']); ?>" class="form-control" id="fc15" />
						</div>
					</div>
					<div class="form-group">
						<label for="fc16" class="col-md-4 control-label">Fc16</label>
						<div class="col-md-8">
							<input type="text" name="fc16" value="<?php echo ($this->input->post('fc16') ? $this->input->post('fc16') : $po_consideracion['fc16']); ?>" class="form-control" id="fc16" />
						</div>
					</div>
					<div class="form-group">
						<label for="fc17" class="col-md-4 control-label">Fc17</label>
						<div class="col-md-8">
							<input type="text" name="fc17" value="<?php echo ($this->input->post('fc17') ? $this->input->post('fc17') : $po_consideracion['fc17']); ?>" class="form-control" id="fc17" />
						</div>
					</div>
					<div class="form-group">
						<label for="fc18" class="col-md-4 control-label">Fc18</label>
						<div class="col-md-8">
							<input type="text" name="fc18" value="<?php echo ($this->input->post('fc18') ? $this->input->post('fc18') : $po_consideracion['fc18']); ?>" class="form-control" id="fc18" />
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
