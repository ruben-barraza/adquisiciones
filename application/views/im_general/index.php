<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>IM Generales</h2>
                <div class="nav navbar-right">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <form action="" class="form-horizontal">
                    <div class="container">
                        <div class="row">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="busqueda" id="search" style="width: 344px"
                                               placeholder="Búsqueda" class="form-control pull-right" id="busqueda"/>
                                        <span class="input-group-addon">
											<i class="glyphicon glyphicon-search"></i>
										</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select name="idFamilia" id="idFamilia" style="width: 383px"
                                            class="form-control pull-right">
                                        <option value="0">Seleccione</option>
                                        <?php
                                        foreach ($familias as $i) {
                                            echo '<option value="' . $i->id . '">' . $i->clave . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <label for="idFamilia" class="control-label col-sm-2 pull-right">Familia</label>
                                </div>
                                <div class="form-group">
                                    <select name="imc_estatus" id="imc_estatus" style="width: 383px" class="form-control pull-right">
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
                                    <label for="idFamilia" class="control-label col-sm-2 pull-right">Status</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>

                <hr />
                <table id="table" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Familia</th>
                            <th>Tipo</th>
                            <th>Descripción</th>
                            <th>Status</th>
                            <th>SOLPED</th>
                            <th>Fecha</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                    </tbody>

                    <?php  foreach ($listaim_general as $i) { ?>
                        <tr>
                            <td><?php echo $i['descripcion']; ?></td>
                            <td><?php echo $i['tipo']; ?></td>
                            <td><?php echo $i['titulo']; ?></td>
                            <td><?php echo $i['estatus']; ?></td>
                            <td><?php echo $i['SOLPED']; ?></td>
                            <?php
                            $fecha = $i['fechaElaboracion'];
                            $fechaElaboracion = date("d/m/Y", strtotime($fecha));
                            ?>
                            <td><?php echo $fechaElaboracion; ?></td>
                            <td>
                                <a title="Editar" href="<?php echo site_url('im_general/edit/' . $i['id']); ?>"
                                   class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> </a>
                                <!--
                                <a href="<?php echo site_url('im_general/remove/' . $i['id']); ?>"
                                   class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> </a>
                                   -->
                            </td>
                            <td align="center">
                                <a title="Reporte IM" href="<?php echo site_url('generar_pdf/pdf_imc/' . $i['id']); ?>"
                                   class="btn btn-primary btn-xs"><span class="fa fa-download"></span></a>
                            </td>
                            <td align="center">
                                <a title="Cuadro Resumen ICM" href="<?php echo site_url('generar_pdf/resumen_icm/' . $i['id']); ?>"
                                   class="btn btn-primary btn-xs"><span class="fa fa-download"></span></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

                <div id="tablaOculta" class="hidden">
                    <table id="tablafamilias" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Familia</th>
                            <th>Tipo</th>
                            <th>Descripción</th>
                            <th>Status</th>
                            <th>SOLPED</th>
                            <th>Fecha</th>
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

    //Función para la caja de búsqueda
    var $rows = $('#table tbody tr');

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
    var indices = ["descripcion", "tipo", "titulo", "estatus", "SOLPED", "importe", "fechaElaboracion"];
    var indiceBotones = ["id"];

    $('#idFamilia').change(function () {
        $('#tablaOculta').removeClass('hidden');
        $('#tablaOculta').show();
        $('#table').hide();
        $('#tablafamilias tbody').empty();
        var clave = $("#idFamilia option:selected").text();
        if (clave == "Seleccione") {
            $('#tablaOculta').hide();
            $('#table').show();
        } else {
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/Im_general/obtenerListaIMCFamilia',
                method: 'POST',
                data: {
                    clave: clave
                },
                success: function (returned) {
                    var returned = JSON.parse(returned);
                    var selectArray = [];
                    jQuery.each(returned.listaimcfamilia, function (i, val) {
                        selectArray.push({
                            "id": val.id,
                            "descripcion": val.descripcion,
                            "tipo": val.tipo,
                            "titulo": val.titulo,
                            "estatus": val.estatus,
                            "SOLPED": val.SOLPED,
                            "importe": 0,
                            "fechaElaboracion": (val.fechaElaboracion).split("-").reverse().join("/"),
                        });
                    });

                    $.each(selectArray, function (i, selected) {
                        var tr = $('<tr>');
                        $.each(indices, function (i, indice) {
                            $('<td>').html(selected[indice]).appendTo(tr);
                        });
                        $.each(indiceBotones, function (i, indiceBoton) {
                            $('<td>').html(
                                '<a title="Editar" href="' + SITE_ROOT + 'im_general/edit/' + selected[indiceBoton] + '" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a>'
                                + '<a title="Eliminar" href="' + SITE_ROOT + 'im_general/remove/' + selected[indiceBoton] + '" onclick="return confirm(\'¿Desea eliminar el proveedor seleccionado?\');"class="btn eliminar btn-danger btn-xs"><span class="fa fa-trash"></span></a>'
                            ).appendTo(tr);
                        });
                        tbody.append(tr);
                    });
                }
            });
        }
    });

</script>