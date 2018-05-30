

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Autorización de Trabajo</h2>
                <div class="nav navbar-right">
                    <a href="<?php echo site_url('autorizacion/add'); ?>" class="btn btn-success btn-sm">Agregar</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="tabladatos" name="tabladatos" class="display table table-striped table-hover" style="width:100%">
                	<thead>
                        <tr>
                            <th>Número</th>
                            <th>Año</th>
                            <th>Descripción</th>
                            <!--<th>Descripción Detallada</th>-->
                            <th>Importe Sin IVA</th>
                            <th>Imp Total</th>                        
                            <th>Imp Solcon</th>
                            <th>Imp Pedido</th>
                            <th>Imp Pedido + IVA</th>
                            <th>No Asignado</th>
                            <th></th>
                        </tr>
                    </thead>
                    </tbody>
						<?php foreach($listaAT as $at){ ?>
                            <tr>
                                <td><?php echo sprintf("%'03d", $at['numero']); ?></td>
                                <td><?php echo $at['año']; ?></td>
                                <td><?php echo $at['descripcion']; ?></td>
                                <!--<td width="20%"><?php echo $at['descripcionDetallada']; ?></td>-->
                                <td> <?php echo '$ '.number_format($at['importe']/1.16, 2, '.', ',');  ?></td> 
                                <td> <?php echo '$ '.number_format($at['importe'], 2, '.', ',');  ?></td>
                                <td> <?php echo '$ '.number_format($at['IMPORTE_SOLCON'], 2, '.', ',');  ?></td>
                                <td> <?php echo '$ '.number_format($at['IMPORTE_PEDIDO'], 2, '.', ',');  ?></td>
                                <td> <?php echo '$ '.number_format($at['IMPORTE_PEDIDO_MAS_IVA'], 2, '.', ',');  ?></td>
                                <td> <?php echo '$ '.number_format($at['RECURSO_NO_ASIGNADO'], 2, '.', ',');  ?></td>
                                <td>
                                    <a href="<?php echo site_url('autorizacion/edit/'.$at['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a>
                                    <a href="<?php echo site_url('autorizacion/remove/'.$at['id']); ?>" onclick="return confirm('¿Desea eliminar la autorización seleccionada?');" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    var table = $('#tabladatos').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        dom: 'Bfrtip',
        buttons: [ 'copy', 'excel', {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            pageSize: 'LEGAL'
        }],
    });

} );
</script>