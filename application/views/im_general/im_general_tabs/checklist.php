<style>
    .checklist label{
        font-size: 120%;
    }

    .checklist .form-group{
        margin-bottom: 2%;
    }

    input[type=checkbox] {
        transform: scale(1.5);
    }

    input[type=radio] {
        transform: scale(1.5);
    }
</style>

<div class="checklist">
    <div class="form-group">
        <label class="col-md-5 control-label">Concurso</label>
        <div class="col-md-4">
            <div class="radio">
                <label class="radio-inline"><input type="radio" name="optradio" class="tipoconcurso" value="nacional" checked> Nacional</label>
            </div>
            <div class="radio">
                <label class="radio-inline"><input type="radio" name="optradio" class="tipoconcurso" value="internacional"> Internacional</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-5 control-label">Existe frabricación nacional</label>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" class="fabricacionnacional">
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-5 control-label">Proveedor aprobado</label>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" class="proveedoraprovado">
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-5 control-label">Prototipo aprobado</label>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" class="prototipoaprovado">
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-5 control-label">Aviso de pruebas</label>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" class="avisopruebas">
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-5 control-label">Contrato bajo demanda</label>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" class="bajodemanda" id="bajodemanda">
                </label>
            </div>
        </div>
    </div>
    <div class="form-group hide" id="porcentajedemanda-input">
        <label for="porcentajedemanda" class="col-md-5 control-label">Porcentaje</label>
        <div class="col-md-1">
            <div class="input-group">
                <input type="text" id="porcentajedemanda" name="porcentajedemanda"
                       value="0" maxlength="3"
                       class="form-control pull-right" />
                <span class="input-group-addon">
                    <i>%</i>
                </span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-5 control-label">Precios fijos</label>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="">
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-5 control-label">Anticipo</label>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="">
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-5 control-label">Garantía de cumplimiento</label>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="">
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-5 control-label">Porcentaje</label>
        <div class="col-md-1">
            <div class="input-group">
                <input type="text" id="" name=""
                       value="" maxlength=""
                       class="form-control pull-right" />
                <span class="input-group-addon">
                    <i>%</i>
                </span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-5 control-label">Garantía de calidad</label>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="">
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-5 control-label">Porcentaje</label>
        <div class="col-md-1">
            <div class="input-group">
                <input type="text" id="" name=""
                       value="" maxlength=""
                       class="form-control pull-right" />
                <span class="input-group-addon">
                    <i>%</i>
                </span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-5 control-label">Sesión de aclaraciones</label>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="">
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-5 control-label">Muestra</label>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="">
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-5 control-label">Cuestionarios técnicos</label>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="">
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-5 control-label">Se indican marca y/o modelo</label>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="">
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-5 control-label">Criterio de evaluación</label>
        <div class="col-md-4">
            <div class="radio">
                <label class="radio-inline"><input type="radio" name="optradio"> Por precio</label>
            </div>
            <div class="radio">
                <label class="radio-inline"><input type="radio" name="optradio"> Puntos y porcentajes</label>
            </div>
            <div class="radio">
                <label class="radio-inline"><input type="radio" name="optradio"> Costo-Beneficio</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-5 control-label">Tipo de transporte</label>
        <div class="col-md-4">
            <div class="radio">
                <label class="radio-inline"><input type="radio" name="optradio"> Indistinto</label>
            </div>
            <div class="radio">
                <label class="radio-inline"><input type="radio" name="optradio"> Plataforma</label>
            </div>
            <div class="radio">
                <label class="radio-inline"><input type="radio" name="optradio"> Caja seca</label>
            </div>
            <div class="radio">
                <label class="radio-inline"><input type="radio" name="optradio"> Caja seca-aire</label>
            </div>
            <div class="radio">
                <label class="radio-inline"><input type="radio" name="optradio"> Plataforma patín</label>
            </div>
            <div class="radio">
                <label class="radio-inline"><input type="radio" name="optradio"> Plataforma llana</label>
            </div>
            <div class="radio">
                <label class="radio-inline"><input type="radio" name="optradio"> Plataforma telescópica</label>
            </div>
            <div class="radio">
                <label class="radio-inline"><input type="radio" name="optradio"> Autotanque</label>
            </div>
        </div>
    </div>
</div>
<hr/>
<div class="form-group">
    <div class="col-sm-offset-5 col-sm-8">
        <a id="botonGuardarChecklist" class="btn btn-success">
            <span class="fa fa-check"></span> Guardar Checklist
        </a>
    </div>
</div>

<script>
    $(document).ready(function () {


        $('#bajodemanda').change(function() {
            if($(this).is(":checked")) {
                $('#porcentajedemanda-input').removeClass("hide");
            } else {
                $('#porcentajedemanda-input').addClass("hide");
            }
        });

        $("#botonGuardarChecklist").click(function(){
            var tipoconcurso = $('.tipoconcurso:checked').val();
            console.log("tipo concurso: " + tipoconcurso);

            var fabricacionnacional = $('.fabricacionnacional:checked').val() ? "S" : "N";
            console.log("fabricacion nacional: " + fabricacionnacional);

            var proveedoraprovado = $('.proveedoraprovado:checked').val() ? "S" : "N";
            console.log("proveedor aprovado: " + proveedoraprovado);

            var prototipoaprovado = $('.prototipoaprovado:checked').val() ? "S" : "N";
            console.log("prototipo aprovado: " + prototipoaprovado);

            var avisopruebas = $('.avisopruebas:checked').val() ? "S" : "N";
            console.log("aviso de pruebas: " + avisopruebas);

            var bajodemanda = $('.bajodemanda:checked').val() ? "S" : "N";
            console.log("bajodemanda: " + bajodemanda);

        });

    });
</script>