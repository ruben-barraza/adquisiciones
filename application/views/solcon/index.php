<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>SOLCON</h2>
                <div class="nav navbar-right">
                    <a href="<?php echo site_url('solcon/add'); ?>" class="btn btn-success btn-sm">Agregar</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>SOLCON</th>
                        <th></th>
                    </tr>
                    <?php foreach($listaSolcon as $solcon){ ?>
                        <tr>
                            <td><?php echo $solcon['solcon']; ?></td>
                            <td>
                                <a href="<?php echo site_url('solcon/edit/'.$solcon['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a>
                                <a href="<?php echo site_url('solcon/remove/'.$solcon['id']); ?>" onclick="return confirm('¿Desea eliminar este SOLCON?');" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>