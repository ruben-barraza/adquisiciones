<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<style>
  .textoderecha{
    text-align:right;
  }
</style>
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
                 <div class="x_content">          
  <table class="table table-striped">
  
   
      <tr>
        <th>PARTIDA</th>
        <th>CODIGO</th>
        <th>DESCRIPCI&Oacute;N</th>
        <th>CANTIDAD</th>
        <th>UM</th>
        <th>PRECIO UNITARIO</th>
        <th>IMPORTE</th>
   
        
      </tr>
 
 
     <?php foreach($listaim_concepto as $i){ ?>
      <tr>
        <td><?php echo $i['partida']; ?></td>
          <td><?php echo $i['codigo']; ?></td>
            <td><?php echo $i['descripcion']; ?></td>
              <td><input type="text" name="cantidad" id='cantidadId' value="<?php $cantidad=$i['cantidadIM'];
        
                if($cantidad<=0){

                  echo ('N/C');
        
                    }
                      else
                          {
                            echo $cantidad;
                            }  
                              ?>">
                                
                                </td>



           <td><?php echo $i['clave'];?></td>
               <td><input type="text" id="preciounitarioid" name="precio-unitario" value="<?php $preciounitario=$i['precioUnitario'];  echo $preciounitario; ?>"></td>
                 <td id="importeid" ><?php $importe=($cantidad)*($preciounitario); echo $importe;?></td>
        <?php } ?>
       
      </tr>
 
   
  
  </table>

   
      
  <p class="text-center lead">Subtotal ($): &nbsp;&nbsp;<?php $subtotal=$sumas['subtotal']; $subtotalConFormato=number_format($subtotal,2, '.', ',');  echo($subtotalConFormato);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
  <p  class="text-center lead">IVA ($): &nbsp;&nbsp;<?php $iva=$subtotal*0.16; $ivaConFormato=number_format($iva,2, '.', ','); echo($ivaConFormato);?></p>
  <p  class="text-center lead">Total ($): &nbsp;&nbsp;<?php $total=$subtotal+$iva; $totalConFormato=number_format($total,2, '.', ','); echo($totalConFormato);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

  <br>
  <br>
          <!--Capturas generales-->
           <form class="form-horizontal">
    <div class="form-group">
     <div class="row">
						<label for="solped" class="col-md-4 control-label">SOLPED</label>
						<div class="col-md-3">
							<div class="input-group">
								<input type="text" id="solped" name="solped" maxlength="5" class="form-control pull-right" placeholder="Ingrese SOLPED"/>
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-search"></i>	
								</span>
							</div>
						</div>
            <div class="col-md-4">
							<input type="text" id="empleadoResponsable2" name="empleadoResponsable2" class="form-control" readonly placeholder="Nombre del empleado"/>
						</div>
            </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="elaboro">ELABOR&Oacute;</label>
      <div class="col-sm-3">          
        <input type="elaboro" class="form-control" id="elaboro" placeholder="Persona que elabor&oacute;" name="elaboro">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="aprobo">APROB&Oacute;</label>
      <div class="col-sm-3">          
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


    $("#solped").on('keyup', function(e) {
			if ($(this).val().length == 5) {
				var rpe = $('#solped').val();
				var nombre = "";
				$.ajax({
					url: '<?php echo base_url(); ?>index.php/Im_general/obtenerNombreEmpleadoImGeneral',
					method: 'POST',
					data: {
						rpe: rpe
					},
					success: function (returned) {
						var returned = JSON.parse(returned);
						jQuery.each( returned.nombre, function( i, val ) {                   
							nombre = val.nombre + " " + val.apellidoPaterno + " " + val.apellidoMaterno;
						});
						$("#empleadoResponsable2").val(nombre);
					}
				});
			} else if ($(this).val().length < 5){

				$('#empleadoResponsable2').val('');
			}
		});
 
     $(document).ready(function(){

       
        $("#cantidadId").keyup(function(){

          var cambiarImporte = parseInt($("#cantidadId").val()) * parseInt($("#preciounitarioid").val());
          $("#importeid").html(cambiarImporte);
        });

      });

</script>