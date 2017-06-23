<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<div class="container">

<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        	<div class="x_panel">
			<div class="x_title">
      
				<div class="nav navbar-right panel-toolboox">
        
					<a href="<?php echo site_url('im_general/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
          
				</div>
        
				<div class="clearfix"></div>
			</div>
          		<div class="x_content">
                  <div class="row">

                  <!--Este dropdown carga todas las PO activas o en proceso
                      y al seleccionar una PO deberan cargarse los conceptos
                      relacionados (bienes o servicios)-->
                     <div class="col-md-6">
				    <div class="form-group">
							<label for="peticionoferta" class="col-md-4 control-label">PETICI&Oacute;N DE OFERTA</label>
								<select name="peticionoferta" class="form-control" id="peticionoferta">
                  <option value="0">Seleccione una Petición Oferta</option>
						            <?php 
									foreach ($peticiones as $i) {
										echo '<option value="'. $i->id .'">'. $i->asunto .'</option>';
									}
								?>
					
								</select>

						</div>
        </div>
               
                <!--este dropdown despliega los proveedores asociados a la PO seleccionada arriba-->
                 <div class="col-md-6">
				    <div class="form-group">
							<label for="proveedor" class="col-md-4 control-label">PROVEEDOR</label>
								<select name="proveedor" class="form-control" id="proveedor">
									<option value="0">Seleccione</option>
								</select>

						</div>
        </div>
   </div>

                         <br>
                         <br>
                         
                    <!-- Esta tabla captura los datos escritos y precio unitario-->
                 <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>PARTIDA</th>
        <th>CODIGO</th>
        <th>DESCRIPCI&Oacute;N</th>
        <th>CANTIDAD</th>
        <th>UM</th>
        <th>PRECIO UNITARIO</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><input type="text" name="precio-unitario" value=""></td>
      </tr>
    </tbody>
      <tbody>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><input type="text" name="precio-unitario" value=""></td>
      </tr>
    </tbody>
  </table>
  </div>
  <br>
  <br>
          <!--Capturas generales-->
           <form class="form-horizontal">
    <div class="form-group">
      <label class="control-label col-sm-1" for="">SOLPED</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="solped" placeholder="Indrotuzca SOLPED" name="solped">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="elaboro">ELABOR&Oacute;</label>
      <div class="col-sm-10">          
        <input type="elaboro" class="form-control" id="elaboro" placeholder="Persona que elabor&oacute;" name="elaboro">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="aprobo">APROB&Oacute;</label>
      <div class="col-sm-10">          
        <input type="aprobo" class="form-control" id="aprobo" placeholder="Persona que aprob&oacute;" name="aprobo">
      </div>
    </div>
    <br>
    <br>
    <!--Boton guardar-->
    <div class="form-group">        
      <div class="col-sm-offset-5 col-sm-7">
        <button type="GUARDAR" class="btn btn-primary">GUARDAR</button>
      </div>
    </div>
  </form>

                 
	</div>
        </div>
			 </div>
        	       </div>


  	</div>
</div>
</div>


<script type="text/javascript">   
    $(document).ready(function() {
		    $("#peticionoferta").change(function() {
    		    $("#peticionoferta option:selected").each(function() {
                 peticionoferta = $('#peticionoferta').val();
                console.log(proveedor);
                $.post("<?php echo base_url(); ?>index.php/controllerComboBoxes/fillProveedores", {
                	peticionoferta : peticionoferta
                }, function(data) {
                   $("#proveedor").html(data);
                });
            });
        });
		
    });
</script>