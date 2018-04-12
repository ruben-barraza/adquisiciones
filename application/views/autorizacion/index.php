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
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Número</th>
                        <th>Año</th>
                        <th>Descripción</th>
                        <th>Descripción Detallada</th>
                        <th>Importe</th>
                        <th></th>
                    </tr>
                    <?php foreach($listaAT as $at){ ?>
                        <tr>
                            <td><?php echo sprintf("%'03d", $at['numero']); ?></td>
                            <td><?php echo $at['año']; ?></td>
                            <td><?php echo $at['descripcion']; ?></td>
                            <td width="50%"><?php echo $at['descripcionDetallada']; ?></td>
                            <td> <?php echo '$ '.number_format($at['importe'], 2, '.', ',');  ?></td>

                            <td>
                                <a href="<?php echo site_url('autorizacion/edit/'.$at['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a>
                                <a href="<?php echo site_url('autorizacion/remove/'.$at['id']); ?>" onclick="return confirm('¿Desea eliminar la autorización seleccionada?');" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
