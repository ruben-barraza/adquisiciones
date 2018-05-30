
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Solicitudes de Contratacion (SOLCON)</h2>
                                            <div class="nav navbar-right">
                                                <a href="<?php echo site_url('solcon/add'); ?>" class="btn btn-success btn-sm">Agregar</a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <table id="tabladatos_at" name="tabladatos_at" class="display table table-striped table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Número</th>
                                                        <th>Origen</th>
                                                        <th>Ejercicio</th>                                                        
                                                        <th>Origen</th>
                                                        <th>Tipo</th>
                                                        <th>Fondo</th>
                                                        <th>AT 1</th>
                                                        <th>AT 2</th>
                                                        <th>AT 3</th>
                                                        <th>Importe</th>
                                                        <th>Importe Pedido</th>                        
                                                        <th>Recurso Liberado</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                </tbody>
                                                    <?php foreach($listaSolcon as $solcon){ ?>
                                                        <tr>
                                                            <td><?php echo $solcon['solcon']; ?></td>
                                                            <td><?php echo $solcon['titulo']; ?></td>
                                                            <td><?php echo $solcon['anioEjercicio']; ?></td>                                                            
                                                            <td><?php echo $solcon['origenRecurso']; ?></td>
                                                            <td><?php echo $solcon['tipoCompra']; ?></td>
                                                            <td><?php echo $solcon['fondo']; ?></td>
                                                            <td><?php echo $solcon['numeroAt1']; ?></td>
                                                            <td><?php echo $solcon['numeroAt2']; ?></td>
                                                            <td><?php echo $solcon['numeroAt3']; ?></td>
                                                            <td> <?php echo '$ '.number_format($solcon['IMPORTE_SOLPED'], 2, '.', ',');  ?></td> 
                                                            <td> <?php echo '$ '.number_format($solcon['IMPORTE_PEDIDO'], 2, '.', ',');  ?></td>
                                                            <td> <?php echo '$ '.number_format($solcon['SALDO_LIBERADO_PARTIDA'], 2, '.', ',');  ?></td>
                                                            <td>
                                                                <a href="<?php echo site_url('solcon/edit/'.$solcon['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a>
                                                                <a href="<?php echo site_url('solcon/remove/'.$solcon['id']); ?>" onclick="return confirm('¿Desea eliminar la solcon seleccionada?');" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>                          
                            
                        </div>



<script>
$(document).ready(function() {

    var table_at = $('#tabladatos_at').DataTable({
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