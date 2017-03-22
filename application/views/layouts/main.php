<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Adquisiciones</title>

        <!-- Bootstrap -->
        <link href="<?php echo site_url('resources/css/bootstrap.min.css');?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo site_url('resources/css/font-awesome.min.css');?>" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?php echo site_url('resources/css/nprogress.css');?>" rel="stylesheet">
        <!-- iCheck -->
        <link href="<?php echo site_url('resources/css/green.css');?>" rel="stylesheet">
        <!-- bootstrap-wysiwyg -->
        <link href="<?php echo site_url('resources/css/prettify.min.css');?>" rel="stylesheet">
        <!-- Select2 -->
        <link href="<?php echo site_url('resources/css/select2.min.css');?>" rel="stylesheet">
        <!-- Switchery -->
        <link href="<?php echo site_url('resources/css/switchery.min.css');?>" rel="stylesheet">
        <!-- starrr -->
        <link href="<?php echo site_url('resources/css/starrr.css');?>" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="<?php echo site_url('resources/css/custom.min.css');?>" rel="stylesheet">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Adquisiciones</span></a>
                        </div>
                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile">
                            <div class="profile_pic">
                                <img src="<?php echo site_url('resources/img/img.jpg');?>" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Bienvenido,</span>
                                <h2>John Doe</h2>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->
                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <h3>General</h3>
                                <ul class="nav side-menu">
						                        <li>
                                        <a href="<?php echo site_url('almacen/index');?>"><i class="fa fa-table"></i> Almacén</a>
                                    </li>
						                        <li>
                                        <a href="<?php echo site_url('articulo/index');?>"><i class="fa fa-table"></i> Artículo</a>
                                    </li>
						                        <li>
                                        <a href="<?php echo site_url('categoria/index');?>"><i class="fa fa-table"></i> Categoría</a>
                                    </li>
						                        <li>
                                        <a href="<?php echo site_url('departamento/index');?>"><i class="fa fa-table"></i> Departamento</a>
                                    </li>
						                        <!--
                                    <li>
                                        <a href="<?php echo site_url('embalaje/index');?>"><i class="fa fa-table"></i> Embalaje</a>
                                    </li>
                                    -->
						                        <li>
                                        <a href="<?php echo site_url('empleado/index');?>"><i class="fa fa-table"></i> Empleado</a>
                                    </li>
						                        <li>
                                        <a href="<?php echo site_url('estado/index');?>"><i class="fa fa-table"></i> Estado</a>
                                    </li>
						                        <li>
                                        <a href="<?php echo site_url('familia/index');?>"><i class="fa fa-table"></i> Familia</a>
                                    </li>
						                        <li>
                                        <a href="<?php echo site_url('consideraciformularioconsideracion/index');?>"><i class="fa fa-table"></i> Formulario consideración</a>
                                    </li>
						                        <li>
                                        <a href="<?php echo site_url('im_concepto/index');?>"><i class="fa fa-table"></i> IM Concepto</a>
                                    </li>
						                        <li>
                                        <a href="<?php echo site_url('im_general/index');?>"><i class="fa fa-table"></i> IM General</a>
                                    </li>
						                        <li>
                                        <a href="<?php echo site_url('municipio/index');?>"><i class="fa fa-table"></i> Municipio</a>
                                    </li>
						                        <li>
                                        <a href="<?php echo site_url('po_aclaracion/index');?>"><i class="fa fa-table"></i> PO Aclaración</a>
                                    </li>
						                        <li>
                                        <a href="<?php echo site_url('po_acuse/index');?>"><i class="fa fa-table"></i> PO Acuse</a>
                                    </li>
						                        <li>
                                        <a href="<?php echo site_url('po_consideracion/index');?>"><i class="fa fa-table"></i> PO Consideración</a>
                                    </li>
						                        <li>
                                        <a href="<?php echo site_url('po_general/index');?>"><i class="fa fa-table"></i> PO General</a>
                                    </li>
						                        <li>
                                        <a href="<?php echo site_url('po_proveedor/index');?>"><i class="fa fa-table"></i> PO Proveedor</a>
                                    </li>
						                        <li>
                                        <a href="<?php echo site_url('proveedor/index');?>"><i class="fa fa-table"></i> Proveedor</a>
                                    </li>
						                        <li>
                                        <a href="<?php echo site_url('relacionproveedorfamilia/index');?>"><i class="fa fa-table"></i> Relación Proveedor Familia</a>
                                    </li>
						                        <li>
                                        <a href="<?php echo site_url('unidadmedida/index');?>"><i class="fa fa-table"></i> Unidad de medida</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /sidebar menu -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="<?php echo site_url('resources/img/img.jpg');?>" alt="">John Doe
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="javascript:;"> Perfil</a></li>
                                        <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Cerrar sesión</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3></h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                            <?php                            
                            if(isset($_view) && $_view)
                                $this->load->view($_view);
                            ?>
                        </div>
                    </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?php echo site_url('resources/js/jquery.min.js');?>"></script>
        <!-- Bootstrap -->
        <script src="<?php echo site_url('resources/js/bootstrap.min.js');?>"></script>
        <!-- FastClick -->
        <script src="<?php echo site_url('resources/js/fastclick.js');?>"></script>
        <!-- NProgress -->
        <script src="<?php echo site_url('resources/js/nprogress.js');?>"></script>
        <!-- bootstrap-progressbar -->
        <script src="<?php echo site_url('resources/js/bootstrap-progressbar.min.js');?>"></script>
        <!-- iCheck -->
        <script src="<?php echo site_url('resources/js/icheck.min.js');?>"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="<?php echo site_url('resources/js/moment.min.js');?>"></script>
        <script src="<?php echo site_url('resources/js/daterangepicker.js');?>"></script>
        <!-- bootstrap-wysiwyg -->
        <script src="<?php echo site_url('resources/js/bootstrap-wysiwyg.min.js');?>"></script>
        <script src="<?php echo site_url('resources/js/jquery.hotkeys.js');?>"></script>
        <script src="<?php echo site_url('resources/js/prettify.js');?>"></script>
        <!-- jQuery Tags Input -->
        <script src="<?php echo site_url('resources/js/jquery.tagsinput.js');?>"></script>
        <!-- Switchery -->
        <script src="<?php echo site_url('resources/js/switchery.min.js');?>"></script>
        <!-- Select2 -->
        <script src="<?php echo site_url('resources/js/select2.full.min.js');?>"></script>
        <!-- Parsley -->
        <script src="<?php echo site_url('resources/js/parsley.min.js');?>"></script>
        <!-- Autosize -->
        <script src="<?php echo site_url('resources/js/autosize.min.js');?>"></script>
        <!-- jQuery autocomplete -->
        <script src="<?php echo site_url('resources/js/jquery.autocomplete.min.js');?>"></script>
        <!-- starrr -->
        <script src="<?php echo site_url('resources/js/starrr.js');?>"></script>

        <!-- Custom Theme Scripts -->
        <script src="<?php echo site_url('resources/js/custom.min.js');?>"></script>

        <!-- bootstrap-daterangepicker -->
        <script>
          $(document).ready(function() {
            $('#birthday').daterangepicker({
              singleDatePicker: true,
              calender_style: "picker_4"
            }, function(start, end, label) {
              console.log(start.toISOString(), end.toISOString(), label);
            });
          });
        </script>
        <!-- /bootstrap-daterangepicker -->

        <!-- bootstrap-wysiwyg -->
        <script>
          $(document).ready(function() {
            function initToolbarBootstrapBindings() {
              var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                  'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                  'Times New Roman', 'Verdana'
                ],
                fontTarget = $('[title=Font]').siblings('.dropdown-menu');
              $.each(fonts, function(idx, fontName) {
                fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
              });
              $('a[title]').tooltip({
                container: 'body'
              });
              $('.dropdown-menu input').click(function() {
                  return false;
                })
                .change(function() {
                  $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                })
                .keydown('esc', function() {
                  this.value = '';
                  $(this).change();
                });

              $('[data-role=magic-overlay]').each(function() {
                var overlay = $(this),
                  target = $(overlay.data('target'));
                overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
              });

              if ("onwebkitspeechchange" in document.createElement("input")) {
                var editorOffset = $('#editor').offset();

                $('.voiceBtn').css('position', 'absolute').offset({
                  top: editorOffset.top,
                  left: editorOffset.left + $('#editor').innerWidth() - 35
                });
              } else {
                $('.voiceBtn').hide();
              }
            }

            function showErrorAlert(reason, detail) {
              var msg = '';
              if (reason === 'unsupported-file-type') {
                msg = "Unsupported format " + detail;
              } else {
                console.log("error uploading file", reason, detail);
              }
              $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
            }

            initToolbarBootstrapBindings();

            $('#editor').wysiwyg({
              fileUploadError: showErrorAlert
            });

            window.prettyPrint;
            prettyPrint();
          });
        </script>
        <!-- /bootstrap-wysiwyg -->

        <!-- Select2 -->
        <script>
          $(document).ready(function() {
            $(".select2_single").select2({
              placeholder: "Select a state",
              allowClear: true
            });
            $(".select2_group").select2({});
            $(".select2_multiple").select2({
              maximumSelectionLength: 4,
              placeholder: "With Max Selection limit 4",
              allowClear: true
            });
          });
        </script>
        <!-- /Select2 -->

        <!-- jQuery Tags Input -->
        <script>
          function onAddTag(tag) {
            alert("Added a tag: " + tag);
          }

          function onRemoveTag(tag) {
            alert("Removed a tag: " + tag);
          }

          function onChangeTag(input, tag) {
            alert("Changed a tag: " + tag);
          }

          $(document).ready(function() {
            $('#tags_1').tagsInput({
              width: 'auto'
            });
          });
        </script>
        <!-- /jQuery Tags Input -->

        <!-- Parsley -->
        <script>
          $(document).ready(function() {
            $.listen('parsley:field:validate', function() {
              validateFront();
            });
            $('#demo-form .btn').on('click', function() {
              $('#demo-form').parsley().validate();
              validateFront();
            });
            var validateFront = function() {
              if (true === $('#demo-form').parsley().isValid()) {
                $('.bs-callout-info').removeClass('hidden');
                $('.bs-callout-warning').addClass('hidden');
              } else {
                $('.bs-callout-info').addClass('hidden');
                $('.bs-callout-warning').removeClass('hidden');
              }
            };
          });

          $(document).ready(function() {
            $.listen('parsley:field:validate', function() {
              validateFront();
            });
            $('#demo-form2 .btn').on('click', function() {
              $('#demo-form2').parsley().validate();
              validateFront();
            });
            var validateFront = function() {
              if (true === $('#demo-form2').parsley().isValid()) {
                $('.bs-callout-info').removeClass('hidden');
                $('.bs-callout-warning').addClass('hidden');
              } else {
                $('.bs-callout-info').addClass('hidden');
                $('.bs-callout-warning').removeClass('hidden');
              }
            };
          });
          try {
            hljs.initHighlightingOnLoad();
          } catch (err) {}
        </script>
        <!-- /Parsley -->

        <!-- Autosize -->
        <script>
          $(document).ready(function() {
            autosize($('.resizable_textarea'));
          });
        </script>
        <!-- /Autosize -->

        <!-- jQuery autocomplete -->
        <script>
          $(document).ready(function() {
            var countries = { AD:"Andorra",A2:"Andorra Test",AE:"United Arab Emirates",AF:"Afghanistan",AG:"Antigua and Barbuda",AI:"Anguilla",AL:"Albania",AM:"Armenia",AN:"Netherlands Antilles",AO:"Angola",AQ:"Antarctica",AR:"Argentina",AS:"American Samoa",AT:"Austria",AU:"Australia",AW:"Aruba",AX:"Åland Islands",AZ:"Azerbaijan",BA:"Bosnia and Herzegovina",BB:"Barbados",BD:"Bangladesh",BE:"Belgium",BF:"Burkina Faso",BG:"Bulgaria",BH:"Bahrain",BI:"Burundi",BJ:"Benin",BL:"Saint Barthélemy",BM:"Bermuda",BN:"Brunei",BO:"Bolivia",BQ:"British Antarctic Territory",BR:"Brazil",BS:"Bahamas",BT:"Bhutan",BV:"Bouvet Island",BW:"Botswana",BY:"Belarus",BZ:"Belize",CA:"Canada",CC:"Cocos [Keeling] Islands",CD:"Congo - Kinshasa",CF:"Central African Republic",CG:"Congo - Brazzaville",CH:"Switzerland",CI:"Côte d’Ivoire",CK:"Cook Islands",CL:"Chile",CM:"Cameroon",CN:"China",CO:"Colombia",CR:"Costa Rica",CS:"Serbia and Montenegro",CT:"Canton and Enderbury Islands",CU:"Cuba",CV:"Cape Verde",CX:"Christmas Island",CY:"Cyprus",CZ:"Czech Republic",DD:"East Germany",DE:"Germany",DJ:"Djibouti",DK:"Denmark",DM:"Dominica",DO:"Dominican Republic",DZ:"Algeria",EC:"Ecuador",EE:"Estonia",EG:"Egypt",EH:"Western Sahara",ER:"Eritrea",ES:"Spain",ET:"Ethiopia",FI:"Finland",FJ:"Fiji",FK:"Falkland Islands",FM:"Micronesia",FO:"Faroe Islands",FQ:"French Southern and Antarctic Territories",FR:"France",FX:"Metropolitan France",GA:"Gabon",GB:"United Kingdom",GD:"Grenada",GE:"Georgia",GF:"French Guiana",GG:"Guernsey",GH:"Ghana",GI:"Gibraltar",GL:"Greenland",GM:"Gambia",GN:"Guinea",GP:"Guadeloupe",GQ:"Equatorial Guinea",GR:"Greece",GS:"South Georgia and the South Sandwich Islands",GT:"Guatemala",GU:"Guam",GW:"Guinea-Bissau",GY:"Guyana",HK:"Hong Kong SAR China",HM:"Heard Island and McDonald Islands",HN:"Honduras",HR:"Croatia",HT:"Haiti",HU:"Hungary",ID:"Indonesia",IE:"Ireland",IL:"Israel",IM:"Isle of Man",IN:"India",IO:"British Indian Ocean Territory",IQ:"Iraq",IR:"Iran",IS:"Iceland",IT:"Italy",JE:"Jersey",JM:"Jamaica",JO:"Jordan",JP:"Japan",JT:"Johnston Island",KE:"Kenya",KG:"Kyrgyzstan",KH:"Cambodia",KI:"Kiribati",KM:"Comoros",KN:"Saint Kitts and Nevis",KP:"North Korea",KR:"South Korea",KW:"Kuwait",KY:"Cayman Islands",KZ:"Kazakhstan",LA:"Laos",LB:"Lebanon",LC:"Saint Lucia",LI:"Liechtenstein",LK:"Sri Lanka",LR:"Liberia",LS:"Lesotho",LT:"Lithuania",LU:"Luxembourg",LV:"Latvia",LY:"Libya",MA:"Morocco",MC:"Monaco",MD:"Moldova",ME:"Montenegro",MF:"Saint Martin",MG:"Madagascar",MH:"Marshall Islands",MI:"Midway Islands",MK:"Macedonia",ML:"Mali",MM:"Myanmar [Burma]",MN:"Mongolia",MO:"Macau SAR China",MP:"Northern Mariana Islands",MQ:"Martinique",MR:"Mauritania",MS:"Montserrat",MT:"Malta",MU:"Mauritius",MV:"Maldives",MW:"Malawi",MX:"Mexico",MY:"Malaysia",MZ:"Mozambique",NA:"Namibia",NC:"New Caledonia",NE:"Niger",NF:"Norfolk Island",NG:"Nigeria",NI:"Nicaragua",NL:"Netherlands",NO:"Norway",NP:"Nepal",NQ:"Dronning Maud Land",NR:"Nauru",NT:"Neutral Zone",NU:"Niue",NZ:"New Zealand",OM:"Oman",PA:"Panama",PC:"Pacific Islands Trust Territory",PE:"Peru",PF:"French Polynesia",PG:"Papua New Guinea",PH:"Philippines",PK:"Pakistan",PL:"Poland",PM:"Saint Pierre and Miquelon",PN:"Pitcairn Islands",PR:"Puerto Rico",PS:"Palestinian Territories",PT:"Portugal",PU:"U.S. Miscellaneous Pacific Islands",PW:"Palau",PY:"Paraguay",PZ:"Panama Canal Zone",QA:"Qatar",RE:"Réunion",RO:"Romania",RS:"Serbia",RU:"Russia",RW:"Rwanda",SA:"Saudi Arabia",SB:"Solomon Islands",SC:"Seychelles",SD:"Sudan",SE:"Sweden",SG:"Singapore",SH:"Saint Helena",SI:"Slovenia",SJ:"Svalbard and Jan Mayen",SK:"Slovakia",SL:"Sierra Leone",SM:"San Marino",SN:"Senegal",SO:"Somalia",SR:"Suriname",ST:"São Tomé and Príncipe",SU:"Union of Soviet Socialist Republics",SV:"El Salvador",SY:"Syria",SZ:"Swaziland",TC:"Turks and Caicos Islands",TD:"Chad",TF:"French Southern Territories",TG:"Togo",TH:"Thailand",TJ:"Tajikistan",TK:"Tokelau",TL:"Timor-Leste",TM:"Turkmenistan",TN:"Tunisia",TO:"Tonga",TR:"Turkey",TT:"Trinidad and Tobago",TV:"Tuvalu",TW:"Taiwan",TZ:"Tanzania",UA:"Ukraine",UG:"Uganda",UM:"U.S. Minor Outlying Islands",US:"United States",UY:"Uruguay",UZ:"Uzbekistan",VA:"Vatican City",VC:"Saint Vincent and the Grenadines",VD:"North Vietnam",VE:"Venezuela",VG:"British Virgin Islands",VI:"U.S. Virgin Islands",VN:"Vietnam",VU:"Vanuatu",WF:"Wallis and Futuna",WK:"Wake Island",WS:"Samoa",YD:"People's Democratic Republic of Yemen",YE:"Yemen",YT:"Mayotte",ZA:"South Africa",ZM:"Zambia",ZW:"Zimbabwe",ZZ:"Unknown or Invalid Region" };

            var countriesArray = $.map(countries, function(value, key) {
              return {
                value: value,
                data: key
              };
            });

            // initialize autocomplete with custom appendTo
            $('#autocomplete-custom-append').autocomplete({
              lookup: countriesArray
            });
          });
        </script>
        <!-- /jQuery autocomplete -->

        <!-- Starrr -->
        <script>
          $(document).ready(function() {
            $(".stars").starrr();

            $('.stars-existing').starrr({
              rating: 4
            });

            $('.stars').on('starrr:change', function (e, value) {
              $('.stars-count').html(value);
            });

            $('.stars-existing').on('starrr:change', function (e, value) {
              $('.stars-count-existing').html(value);
            });
          });
        </script>
        <!-- /Starrr -->
    </body>
</html>
