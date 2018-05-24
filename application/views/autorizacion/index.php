<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>

<!--
<script src="https://cdn.datatables.net/autofill/2.2.2/js/dataTables.autoFill.min.js"></script>
<script src="https://cdn.datatables.net/autofill/2.2.2/js/autoFill.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.3/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/keytable/2.3.2/js/dataTables.keyTable.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.0.2/js/dataTables.rowGroup.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.3/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/scroller/1.4.4/js/dataTables.scroller.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>
-->
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<!--<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>-->
<!--<style type="https://cdn.datatables.net/buttons/1.5.1/css/buttons.bootstrap.min.css"/>-->


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

        var table = $('#tablaDdtos').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            initComplete: function () {
                // Apply the search
                table.columns().every(function () {
                    var that = this;
                    $('input', this.footer()).on('keyup change', function () {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            }
        });

        /*
    var table = $('#tabladatos').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },

        buttons: [
            'copy', 'excel', 'pdf'
        ]
    } );
*/
        table.buttons().container().appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );


//    $('#tabladatos').DataTable(	{

//        "language": {
//            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
//        },

//		buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
//    } );

//	table.buttons().container()
//		.appendTo( '#tabladatos_wrapper .col-sm-6:eq(0)' );

    } );
    /*
    var table = $('#tablaDatos').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
        initComplete: function () {
            // Apply the search
            table.columns().every( function () {
                var that = this;
                $( 'input', this.footer() ).on( 'keyup change', function() {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                });
            });
        }
    })*/
</script>