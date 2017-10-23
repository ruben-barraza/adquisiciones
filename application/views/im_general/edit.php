<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Edit</h2>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
	          	<?php echo validation_errors(); ?>
				<?php echo form_open('im_general/edit/'.$im_general['id'],array("class"=>"form-horizontal")); ?>

					<div class="form-group">
						<label for="titulo" class="col-md-2 control-label">Título</label>
						<div class="col-md-6">
							<input type="text" name="titulo" value="<?php echo ($this->input->post('titulo') ? $this->input->post('titulo') : $im_general['titulo']); ?>" class="form-control" id="titulo" />
						</div>
					</div>

                    <div class="form-group">
                        <label for="empleadoResponsable" class="col-md-2 control-label">Empleado Responsable</label>
                        <div class="col-md-2">
                            <div class="input-group">
                                <input type="text" id="empleadoResponsable" name="empleadoResponsable" value="<?php echo $empleadoResponsable[0]['rpe']?>" maxlength="5" class="form-control pull-right" placeholder="Ingrese RPE"/>
                                <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="empleadoResponsable2" value="" name="empleadoResponsable2" class="form-control" readonly placeholder="Nombre del empleado"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="empleadoFormula" class="col-md-2 control-label">Empleado Formula</label>
                        <div class="col-md-2">
                            <div class="input-group">
                                <input type="text" id="empleadoFormula" name="empleadoFormula" value="" maxlength="5" class="form-control pull-right" placeholder="Ingrese RPE"/>
                                <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <input type="text" id="empleadoFormula2" value="" name="empleadoFormula2" class="form-control" readonly placeholder="Nombre del empleado"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="solped" class="col-md-2 control-label">SOLPED</label>
                        <div class="col-md-4">
                            <input type="text" name="solped" value="<?php echo ($this->input->post('SOLPED') ? $this->input->post('SOLPED') : $im_general['SOLPED']); ?>" class="form-control" id="solped" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="imc_estatus" class="control-label col-sm-2">Status</label>
                        <div class="col-md-4">
                            <select name="imc_estatus" id="imc_estatus" class="form-control">
                                <option value="0">Seleccione</option>
                                <?php
                                $estatus_values = array(
                                    'I'=>'Inicial',
                                    'E'=>'Enviado',
                                    'R'=>'Recepción',
                                    'T'=>'Concluido',
                                    'C'=>'Cancelado',
                                );

                                foreach($estatus_values as $value => $display_text)
                                {
                                    echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                <!--
					<div class="form-group">
							<label for="idEmpleadoFormula" class="col-md-4 control-label">IdEmpleadoFormula</label>
							<div class="col-md-8">
								<select name="idEmpleadoFormula" class="form-control">
									<option value="">select empleado</option>
									<?php
                /*
									foreach($all_listaempleado as $empleado)
									{
										$selected = ($empleado['id'] == $im_general['idEmpleadoFormula']) ? ' selected="selected"' : "";

										echo '<option value="'.$empleado['id'].'" '.$selected.'>'.$empleado['rpe'].'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
							<label for="idEmpleadoAutoriza" class="col-md-4 control-label">IdEmpleadoAutoriza</label>
							<div class="col-md-8">
								<select name="idEmpleadoAutoriza" class="form-control">
									<option value="">select empleado</option>
									<?php 
									foreach($all_listaempleado as $empleado)
									{
										$selected = ($empleado['id'] == $im_general['idEmpleadoAutoriza']) ? ' selected="selected"' : "";

										echo '<option value="'.$empleado['id'].'" '.$selected.'>'.$empleado['rpe'].'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
						<label for="fechaElaboracion" class="col-md-4 control-label">FechaElaboracion</label>
						<div class="col-md-8">
							<input type="text" name="fechaElaboracion" value="<?php echo ($this->input->post('fechaElaboracion') ? $this->input->post('fechaElaboracion') : $im_general['fechaElaboracion']); ?>" class="form-control" id="fechaElaboracion" />
						</div>
					</div>
					<div class="form-group">
							<label for="idMunicipioElaboracion" class="col-md-4 control-label">IdMunicipioElaboracion</label>
							<div class="col-md-8">
								<select name="idMunicipioElaboracion" class="form-control">
									<option value="">select municipio</option>
									<?php 
									foreach($all_listamunicipio as $municipio)
									{
										$selected = ($municipio['id'] == $im_general['idMunicipioElaboracion']) ? ' selected="selected"' : "";

										echo '<option value="'.$municipio['id'].'" '.$selected.'>'.$municipio['nombre'].'</option>';
									}
                */
									?>
								</select>
							</div>
						</div>
						-->

				    <hr />

                    <table id="tablaArticulos" class="table table-hover">
                        <thead class="thead-inverse">
                        <th>Partida</th>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>UM</th>
                        <th>Precio Unitario</th>
                        <th>Importe</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" name="" id="" value="" class="form-control"/>
                                </td>
                                <td>
                                    <input type="text" name="" id="" value="" class="form-control"/>
                                </td>
                                <td>
                                    <input type="text" name="" id="" value="" class="form-control"/>
                                </td>
                                <td>
                                    <input type="text" name="" id="" value="" class="form-control"/>
                                </td>
                                <td>
                                    <input type="text" name="" id="" value="" class="form-control"/>
                                </td>
                                <td class="col-md-1">
                                    <input type="text" name="" id="" value="" class="form-control"/>
                                </td>
                                <td>
                                    <input type="text" name="" id="" value="" class="form-control"/>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <hr />
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-8">
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
