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
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <select name="idFamilia" id="idFamilia" style="width: 383px"
                                            class="form-control pull-right">
                                        <option value="0">Seleccione</option>
                                        <?php
                                        foreach ($familias as $i) {
                                            echo '<option value="' . $i->id . '">' . $i->clave . ' - '. $i->descripcion .'</option>';
                                        }
                                        ?>
                                    </select>
                                    <label for="idFamilia" class="control-label col-sm-2 pull-right">Familia</label>
                                </div>

                                <div class="form-group">

                                    <input type="text" name="busqueda" id="search" style="width: 21%"
                                           placeholder="Búsqueda" class="form-control pull-right"/>
                                    <select name="idFamilia" id="idFamilia" style="width: 15%" class="form-control pull-right">
                                        <option value="0">Seleccione</option>
                                        <option value="C">Código</option>
                                        <option value="D">Descripción</option>
                                        <option value="E">Especificación</option>
                                    </select>
                                    <label for="idFamilia" class="control-label col-sm-2 pull-right">Buscar por</label>

                                </div>


                            </form>
                        </div>
                    </div>
                </form>

                <hr/>
                <!--
  				<table class="table table-striped">
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
                    <tbody id="tbody">
                    <?php /* foreach($listaarticulo as $a){ ?>
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
                    </tbody>

					<?php } */ ?>
				</table>
				-->

                <div id="tablaOculta" class="hidden">
                    <table id="tablafamilias" class="table table-striped">
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

                        <tbody>
                        </tbody>
                    </table>
                </div>

          	</div>
        </div>
  	</div>
</div>


<script type="text/javascript">


    $(document).ready(function () {

        //Función para la búsqueda de proveedores
        var $rows = $('#tablafamilias tbody tr');

        $('#search').keyup(function () {
            var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
                reg = RegExp(val, 'i'),
                text;

            $rows.show().filter(function () {
                text = $(this).text().replace(/\s+/g, ' ');
                return !reg.test(text);
            }).hide();
        });

        var tbody = $('#tablafamilias tbody');
        var indices = ["codigo", "descripcion", "unidadmedida", "familia", "descripcionDetallada", "especificacion", "cantidadEmbalaje", "tiempoEntrega", "status"];
        var indiceBotones = ["id"];

        $('#idFamilia').change(function () {
            $('#tablaOculta').removeClass('hidden');
            $('#tablaOculta').show();
            $('#table').hide();
            $('#tablafamilias tbody').empty();
            var idFamilia = $("#idFamilia").val();
            if (idFamilia == "0") {
                $('#tablaOculta').hide();
                $('#table').show();
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/Articulo/obtenerListaArticuloFamilia',
                    method: 'POST',
                    data: {
                        idFamilia: idFamilia
                    },
                    success: function (returned) {
                        var returned = JSON.parse(returned);

                        var selectArray = [];
                        jQuery.each(returned.listaarticulofamilia, function (i, val) {
                            //alert('razonSocial= '+ val.razonSocial + 'nombre1' + val.nombre1);
                            selectArray.push({
                                "id": val.id,
                                "codigo": val.codigo,
                                "descripcion": val.descripcion,
                                "unidadmedida": val.unidadmedida,
                                "familia": val.familia,
                                "descripcionDetallada": val.descripcionDetallada,
                                "especificacion": val.especificacion,
                                "cantidaEmbalaje": val.cantidaEmbalaje,
                                "tiempoEntrega": val.tiempoEntrega,
                                "status": val.status,
                            });
                        });

                        $.each(selectArray, function (i, selected) {
                            var tr = $('<tr>');
                            $.each(indices, function (i, indice) {
                                $('<td>').html(selected[indice]).appendTo(tr);
                            });
                            $.each(indiceBotones, function (i, indiceBoton) {
                                $('<td>').html(
                                    '<a title="Editar" href="' + SITE_ROOT + 'articulo/edit/' + selected[indiceBoton] + '" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a>'
                                    + '<a title="Eliminar" href="' + SITE_ROOT + 'articulo/remove/' + selected[indiceBoton] + '" onclick="return confirm(\'¿Desea eliminar el proveedor seleccionado?\');"class="btn eliminar btn-danger btn-xs"><span class="fa fa-trash"></span></a>'
                                ).appendTo(tr);
                            });
                            tbody.append(tr);
                        });

                    }
                });
            }
        });


    });
</script>