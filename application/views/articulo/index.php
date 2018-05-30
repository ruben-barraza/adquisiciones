<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Artículos</h2>
                <div class="nav navbar-right">
					<a href="<?php echo site_url('articulo/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
				</div>
                <div class="clearfix"></div>
          	</div>
          	<class="x_content">
                <form action="" class="form-horizontal">
                    <div class="container">
                        <div class="row">
                            <!--
                            <form class="form-horizontal">
                                <div class="form-group">

                                </div>
                                <div class="form-group">
                                    <select name="status" id="status" style="width: 383px"
                                            class="form-control pull-right">
                                        <option value="A">Activo</option>
                                        <option value="B">Bloqueado</option>
                                    </select>
                                    <label for="status" class="control-label col-sm-2 pull-right">Status</label>
                                </div>
                            </form>
                            -->
                            <form class="row">
                                    <div class="form-inline">
                                        <label for="idFamilia" class="control-label col-sm-1">Familia</label>
                                        <select name="idFamilia" id="idFamilia" class="form-control col-sm-3">
                                            <option value="0">Seleccione</option>
                                            <option value="T">TODOS</option>
                                            <?php
                                            foreach ($familias as $i) {
                                                echo '<option value="' . $i->clave . '">' . $i->descripcion .'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-inline">
                                        <label for="status" class="control-label col-sm-1">Status</label>
                                        <select name="status" id="status" class="form-control col-sm-2">
                                            <option value="A">Activo</option>
                                            <option value="B">Bloqueado</option>
                                        </select>
                                    </div>
                            </form>
                        </div>
                    </div>
                </form>

                <hr/>

  				<table id="table" class="table table-striped hidden">
                    <thead>
                        <tr>

                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Unidad Medida</th>
                            <th>Familia</th>
                            <th>Descripción Detallada</th>
                            <th>Especificación</th>
                            <th>Cantidad Embalaje</th>
                            <th>Tiempo Entrega</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>

                            <th>Código</th>
                            <th>Descripción</th>
                            <th></th>
                            <th>Familia</th>
                            <th></th>
                            <th>Especificación</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody id="tbody">
                    <?php  foreach($listaarticulo as $a){ ?>
                        <tr>
                            <td><?php echo $a['codigo']; ?></td>
                            <td><?php echo $a['descripcion']; ?>
                            <td><?php echo $a['unidadmedida']; ?></td>
                            <td><?php echo $a['familia']; ?></td>
                            <td><?php echo $a['descripcionDetallada']; ?></td>
                            <td><?php echo $a['especificacion']; ?></td>
                            <td><?php echo $a['cantidadEmbalaje']; ?></td>
                            <td><?php echo $a['tiempoEntrega']; ?></td>
                            <td><?php echo $a['status']; ?></td>
                            <td>
                                <a href="<?php echo site_url('articulo/edit/'.$a['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a>
                                <a href="<?php echo site_url('articulo/remove/'.$a['id']); ?>" onclick="return confirm('¿Desea eliminar el artículo seleccionado?');" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
					<?php }  ?>
                    </tbody>
				</table>
          	</div>
        </div>
  	</div>
</div>


<script type="text/javascript">


    $(document).ready(function () {

        $('#table tfoot th').each( function () {
            var title = $(this).text();
            if(title == "Código" || title == "Descripción" || title == "Familia" || title == "Especificación"){
                $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
            }

        } );





        var table = $('#table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
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
        });

        $('#idFamilia').change(function () {
            $('#table').removeClass("hidden");
            var idFamilia = $("#idFamilia").val();
            if (idFamilia == "0") {
                $('#table').hide();
            } else if (idFamilia == "T"){
                $('#table').show();
                $('#table').DataTable().search().draw();
            }
            else {
                $('#table').show();
                $('#table').DataTable().column(3).search(idFamilia).draw();

            }
        });

        $('#status').change(function () {
            $('#table').DataTable().column(8).search($(this).val()).draw();
        });

        var articulo_edit = "<?php echo(isset($familia_selected)) ? $familia_selected : "0"; ?>"

        $("#idFamilia").val(articulo_edit).trigger('change');


    });
</script>