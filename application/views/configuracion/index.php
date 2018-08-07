<style>
    .myAlert-top{
        display: none;
        position: fixed;
        top: 5%;
        left: 45%;
        width: 20%;
        font-size: 20px;
    }

    .modal {
        display:    none;
        position:   fixed;
        z-index:    1000;
        top:        0;
        left:       0;
        height:     100%;
        width:      100%;
        background: rgba( 255, 255, 255, .8 )
        url('../resources/img/ajax-loader.gif')
        50% 50%
        no-repeat;
    }

    /* When the body has the loading class, we turn
       the scrollbar off with overflow:hidden */
    body.loading .modal {
        overflow: hidden;
    }

    /* Anytime the body has the loading class, our
       modal element will be visible */
    body.loading .modal {
        display: block;
    }
</style>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Configuración</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class = "col-sm-offset-4 col-sm-8">
                    <button class="btn btn-primary" id="btnUpdateDatos">
                        <i class="fa fa-refresh"></i> Actualizar datos
                    </button>
                </div>

            </div>
            <div class="modal">
            </div>
            <div class="myAlert-top alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Datos actualizados</strong>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $body = $("body");

        function myAlertTop(){
            $(".myAlert-top").show();
            setTimeout(function(){
                $(".myAlert-top").hide();
            }, 2000);
        }

        $(document).on({
            ajaxStart: function(){ $body.addClass("loading"); },
            ajaxStop: function(){ $body.removeClass("loading"); }
        });

        // Initiates an AJAX request on click
        $("#btnUpdateDatos").click(function(){
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/Configuracion/updateDatos',
                method: 'POST',
                success: function (returned) {
                    myAlertTop();
                },
                error: function () {
                    alert("Error: no se pudieron actualizar los datos.");
                }
            });
        });
    });
</script>