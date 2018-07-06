<style>
    .checklist label{
        font-size: 120%;
    }

    .checklist .form-group{
        margin-bottom: 1%;
    }

    input[type=checkbox] {
        transform: scale(1.5);
    }

    input[type=radio] {
        transform: scale(1.5);
    }
</style>

<div class="checklist">
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-5 control-label">Concurso</label>
            <div class="col-md-4">
                <div class="radio">
                    <label class="radio-inline"><input type="radio" name="concurso" class="concurso" value="NAC" checked> Nacional</label>
                </div>
                <div class="radio">
                    <label class="radio-inline"><input type="radio" name="concurso" class="concurso" value="INT"> Internacional</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 control-label">Existe frabricación nacional</label>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="fabricacionnacional" class="fabricacionnacional">
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 control-label">Proveedor aprobado</label>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="proveedoraprovado" class="proveedoraprovado">
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 control-label">Prototipo aprobado</label>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="prototipoaprovado" class="prototipoaprovado">
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 control-label">Aviso de pruebas</label>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="avisopruebas" class="avisopruebas">
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 control-label">Contrato bajo demanda</label>
            <div class="col-md-1">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" class="bajodemanda" id="bajodemanda">
                    </label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="input-group">
                    <input type="text" id="porcentajedemanda" name="porcentajedemanda"
                           value="0" maxlength="3"
                           class="form-control pull-right" disabled />
                    <span class="input-group-addon">
                        <i>%</i>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 control-label">Precios fijos</label>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="preciosfijos" class="preciosfijos">
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 control-label">Anticipo</label>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="anticipo" class="anticipo">
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 control-label">Garantía de cumplimiento</label>
            <div class="col-md-1">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" class="garantiacumplimiento" id="garantiacumplimiento">
                    </label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="input-group">
                    <input type="text" id="porcentajegarantiacumplimiento" name="porcentajegarantiacumplimiento"
                           value="0" maxlength="3"
                           class="form-control pull-right" disabled />
                    <span class="input-group-addon">
                        <i>%</i>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 control-label">Garantía de calidad</label>
            <div class="col-md-1">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" class="garantiacalidad" id="garantiacalidad">
                    </label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="input-group">
                    <input type="text" id="porcentajegarantiacalidad" name="porcentajegarantiacalidad"
                           value="0" maxlength="3"
                           class="form-control pull-right" disabled />
                    <span class="input-group-addon">
                        <i>%</i>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 control-label">Sesión de aclaraciones</label>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="sesionaclaraciones" class="sesionaclaraciones">
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-5 control-label">Muestra</label>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="requieremuestra" class="requieremuestra">
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 control-label">Cuestionarios técnicos</label>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="cuesttecnico" class="cuesttecnico">
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 control-label">Se indican marca y/o modelo</label>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="marcaespecifica" class="marcaespecifica">
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 control-label">Criterio de evaluación</label>
            <div class="col-md-4">
                <div class="radio">
                    <label class="radio-inline"><input type="radio" name="evaluacion" class="criterioevaluacion" value="PR" checked> Por precio</label>
                </div>
                <div class="radio">
                    <label class="radio-inline"><input type="radio" name="evaluacion" class="criterioevaluacion" value="PP"> Puntos y porcentajes</label>
                </div>
                <div class="radio">
                    <label class="radio-inline"><input type="radio" name="evaluacion" class="criterioevaluacion" value="CB"> Costo-Beneficio</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 control-label">Tipo de transporte</label>
            <div class="col-md-4">
                <div class="radio">
                    <label class="radio-inline"><input type="radio" name="tipotransporte" class="tipotransporte" value="IND" checked> Indistinto</label>
                </div>
                <div class="radio">
                    <label class="radio-inline"><input type="radio" name="tipotransporte" class="tipotransporte" value="PLA"> Plataforma</label>
                </div>
                <div class="radio">
                    <label class="radio-inline"><input type="radio" name="tipotransporte" class="tipotransporte" value="CAJAS"> Caja seca</label>
                </div>
                <div class="radio">
                    <label class="radio-inline"><input type="radio" name="tipotransporte" class="tipotransporte" value="CAJASA"> Caja seca-aire</label>
                </div>
                <div class="radio">
                    <label class="radio-inline"><input type="radio" name="tipotransporte" class="tipotransporte" value="PLAP"> Plataforma patín</label>
                </div>
                <div class="radio">
                    <label class="radio-inline"><input type="radio" name="tipotransporte" class="tipotransporte" value="PLAL"> Plataforma llana</label>
                </div>
                <div class="radio">
                    <label class="radio-inline"><input type="radio" name="tipotransporte" class="tipotransporte" value="PLAT"> Plataforma telescópica</label>
                </div>
                <div class="radio">
                    <label class="radio-inline"><input type="radio" name="tipotransporte" class="tipotransporte" value="AUT"> Autotanque</label>
                </div>
            </div>
        </div>
    </div>
</div>
<hr />
<hr />
<div class="form-group">
    <div class="col-sm-offset-1 col-sm-8">
        <a id="botonGuardarChecklist" class="btn btn-success">
            <span class="fa fa-check"></span> Guardar Checklist
        </a>
        <a id="botonChecklistPdf" href="<?php echo site_url('generar_pdf/checklist/' . $im_general['id']); ?>" class="btn btn-primary">
            <span class="fa fa-download"></span> PDF
        </a>
    </div>
</div>

<script>
    $(document).ready(function () {

        var idImg = <?php echo $im_general['id'] ?>;

        update_checklist(idImg);

        function update_checklist(idImg){

            $.ajax({
                url: '<?php echo base_url(); ?>index.php/Im_general/getChecklist',
                method: 'POST',
                data: {
                    idImg: idImg,
                },
                success: function (returned) {
                    var result = JSON.parse(returned);

                    //console.log(result);

                    var concurso = (result.checklist)[0].concurso;
                    $("input[name=concurso][value=" + concurso + "]").prop('checked', 'checked');

                    var fabricacionnacional = (result.checklist)[0].fabricacionnacional;
                    if(fabricacionnacional == "S")
                        $("#fabricacionnacional").prop('checked', true);
                    else
                        $("#fabricacionnacional").prop('checked', false);

                    var proveedoraprovado = (result.checklist)[0].proveedoraprovado;
                    if(proveedoraprovado == "S")
                        $("#proveedoraprovado").prop('checked', true);
                    else
                        $("#proveedoraprovado").prop('checked', false);

                    var prototipoaprovado = (result.checklist)[0].prototipoaprovado;
                    if(prototipoaprovado == "S")
                        $("#prototipoaprovado").prop('checked', true);
                    else
                        $("#prototipoaprovado").prop('checked', false);

                    var avisopruebas = (result.checklist)[0].avisopruebas;
                    if(avisopruebas == "S")
                        $("#avisopruebas").prop('checked', true);
                    else
                        $("#avisopruebas").prop('checked', false);

                    var bajodemanda = (result.checklist)[0].bajodemanda;
                    var porcentajedemanda = (result.checklist)[0].porcentajedemanda;
                    if(bajodemanda == "S"){
                        $("#bajodemanda").prop('checked', true);
                        $('#porcentajedemanda').prop('disabled', false);
                        $('#porcentajedemanda').val(porcentajedemanda);
                    }
                    else{
                        $("#bajodemanda").prop('checked', false);
                        $('#porcentajedemanda').prop('disabled', true);
                        $('#porcentajedemanda').val("0");
                    }

                    var preciosfijos = (result.checklist)[0].preciosfijos;
                    if(preciosfijos == "S")
                        $("#preciosfijos").prop('checked', true);
                    else
                        $("#preciosfijos").prop('checked', false);

                    var anticipo = (result.checklist)[0].anticipo;
                    if(anticipo == "S")
                        $("#anticipo").prop('checked', true);
                    else
                        $("#anticipo").prop('checked', false);

                    var garantiacumplimiento = (result.checklist)[0].garantiacumplimiento;
                    var porcentajegarantiacumplimiento = (result.checklist)[0].porcentajegarantiacumplimiento;
                    if(garantiacumplimiento == "S"){
                        $("#garantiacumplimiento").prop('checked', true);
                        $('#porcentajegarantiacumplimiento').prop('disabled', false);
                        $('#porcentajegarantiacumplimiento').val(porcentajegarantiacumplimiento);
                    }
                    else{
                        $("#garantiacumplimiento").prop('checked', false);
                        $('#porcentajegarantiacumplimiento').prop('disabled', true);
                        $('#porcentajegarantiacumplimiento').val("0");
                    }

                    var garantiacalidad = (result.checklist)[0].garantiacalidad;
                    var porcentajegarantiacalidad = (result.checklist)[0].porcentajegarantiacalidad;
                    if(garantiacalidad == "S"){
                        $("#garantiacalidad").prop('checked', true);
                        $('#porcentajegarantiacalidad').prop('disabled', false);
                        $('#porcentajegarantiacalidad').val(porcentajegarantiacalidad);
                    }
                    else{
                        $("#garantiacalidad").prop('checked', false);
                        $('#porcentajegarantiacalidad').prop('disabled', true);
                        $('#porcentajegarantiacalidad').val("0");
                    }

                    var sesionaclaraciones = (result.checklist)[0].sesionaclaraciones;
                    if(sesionaclaraciones == "S")
                        $("#sesionaclaraciones").prop('checked', true);
                    else
                        $("#sesionaclaraciones").prop('checked', false);

                    var requieremuestra = (result.checklist)[0].requieremuestra;
                    if(requieremuestra == "S")
                        $("#requieremuestra").prop('checked', true);
                    else
                        $("#requieremuestra").prop('checked', false);

                    var cuesttecnico = (result.checklist)[0].cuesttecnico;
                    if(cuesttecnico == "S")
                        $("#cuesttecnico").prop('checked', true);
                    else
                        $("#cuesttecnico").prop('checked', false);

                    var marcaespecifica = (result.checklist)[0].marcaespecifica;
                    if(marcaespecifica == "S")
                        $("#marcaespecifica").prop('checked', true);
                    else
                        $("#marcaespecifica").prop('checked', false);

                    var criterioevaluacion = (result.checklist)[0].criterioevaluacion;
                    $("input[name=evaluacion][value=" + criterioevaluacion + "]").prop('checked', 'checked');

                    var tipotransporte = (result.checklist)[0].tipotransporte;
                    $("input[name=tipotransporte][value=" + tipotransporte + "]").prop('checked', 'checked');
                }
            });

        }

        $('#bajodemanda').change(function() {
            if($(this).is(":checked")) {
                $('#porcentajedemanda').prop('disabled', false);
            } else {
                $('#porcentajedemanda').prop('disabled', true);
                $('#porcentajedemanda').val("0");
            }
        });

        $('#garantiacumplimiento').change(function() {
            if($(this).is(":checked")) {
                $('#porcentajegarantiacumplimiento').prop('disabled', false);
            } else {
                $('#porcentajegarantiacumplimiento').prop('disabled', true);
                $('#porcentajegarantiacumplimiento').val("0");
            }
        });

        $('#garantiacalidad').change(function() {
            if($(this).is(":checked")) {
                $('#porcentajegarantiacalidad').prop('disabled', false);
            } else {
                $('#porcentajegarantiacalidad').prop('disabled', true);
                $('#porcentajegarantiacalidad').val("0");
            }
        });

        $("#botonGuardarChecklist").click(function(){

            var concurso = $('.concurso:checked').val();
            var fabricacionnacional = $('.fabricacionnacional:checked').val() ? "S" : "N";
            var proveedoraprovado = $('.proveedoraprovado:checked').val() ? "S" : "N";
            var prototipoaprovado = $('.prototipoaprovado:checked').val() ? "S" : "N";
            var avisopruebas = $('.avisopruebas:checked').val() ? "S" : "N";
            var bajodemanda = $('.bajodemanda:checked').val() ? "S" : "N";
            var porcentajedemanda = $('#porcentajedemanda').val();
            var preciosfijos = $('.preciosfijos:checked').val() ? "S" : "N";
            var anticipo = $('.anticipo:checked').val() ? "S" : "N";
            var garantiacumplimiento = $('.garantiacumplimiento:checked').val() ? "S" : "N";
            var porcentajegarantiacumplimiento = $('#porcentajegarantiacumplimiento').val();
            var garantiacalidad = $('.garantiacalidad:checked').val() ? "S" : "N";
            var porcentajegarantiacalidad = $('#porcentajegarantiacalidad').val();
            var sesionaclaraciones = $('.sesionaclaraciones:checked').val() ? "S" : "N";
            var requieremuestra = $('.requieremuestra:checked').val() ? "S" : "N";
            var cuesttecnico = $('.cuesttecnico:checked').val() ? "S" : "N";
            var marcaespecifica = $('.marcaespecifica:checked').val() ? "S" : "N";
            var criterioevaluacion = $('.criterioevaluacion:checked').val();
            var tipotransporte = $('.tipotransporte:checked').val();

            $.ajax({
                url: '<?php echo base_url();?>index.php/Im_general/updateChecklist',
                method: 'POST',
                data: {
                    idImg: idImg,
                    concurso: concurso,
                    fabricacionnacional: fabricacionnacional,
                    proveedoraprovado: proveedoraprovado,
                    prototipoaprovado: prototipoaprovado,
                    avisopruebas: avisopruebas,
                    bajodemanda: bajodemanda,
                    porcentajedemanda: porcentajedemanda,
                    preciosfijos: preciosfijos,
                    anticipo: anticipo,
                    garantiacumplimiento: garantiacumplimiento,
                    porcentajegarantiacumplimiento: porcentajegarantiacumplimiento,
                    garantiacalidad: garantiacalidad,
                    porcentajegarantiacalidad: porcentajegarantiacalidad,
                    sesionaclaraciones: sesionaclaraciones,
                    requieremuestra: requieremuestra,
                    cuesttecnico: cuesttecnico,
                    marcaespecifica: marcaespecifica,
                    criterioevaluacion: criterioevaluacion,
                    tipotransporte: tipotransporte,
                },
                success: function(){
                    update_checklist(idImg);
                }
            });
        });

    });
</script>