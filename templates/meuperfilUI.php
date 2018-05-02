<!DOCTYPE html>
<!-- saved from url=(0060)https://colorlib.com/preview/theme/ramirez/theme/index.html# -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="text/css">.gm-style .gm-style-cc span, .gm-style .gm-style-cc a, .gm-style .gm-style-mtc div {
            font-size: 10px
        }
    </style>
    <style type="text/css">@media print {
            .gm-style .gmnoprint, .gmnoprint {
                display: none
            }
        }

        @media screen {
            .gm-style .gmnoscreen, .gmnoscreen {
                display: none
            }
        }</style>
    <style type="text/css">.gm-style-pbc {
            transition: opacity ease-in-out;
            background-color: rgba(0, 0, 0, 0.45);
            text-align: center
        }

        .gm-style-pbt {
            font-size: 22px;
            color: white;
            font-family: Roboto, Arial, sans-serif;
            position: relative;
            margin: 0;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%)
        }
    </style>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://colorlib.com/preview/theme/ramirez/theme/img/fav-icon.png" type="image/x-icon">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>RAMIREZ - Resume / CV / </title>

    <!-- Icon css link -->
    <link href="{{HOME.URL}}/templates/layout_files/materialdesignicons.min.css" rel="stylesheet">
    <link href="{{HOME.URL}}/templates/layout_files/font-awesome.min.css" rel="stylesheet">
    <link href="{{HOME.URL}}/templates/layout_files/style.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{HOME.URL}}/templates/layout_files/bootstrap.min.css" rel="stylesheet">

    <!-- Extra plugin css -->
    <link href="{{HOME.URL}}/templates/layout_files/owl.carousel.css" rel="stylesheet">
    <link href="{{HOME.URL}}/templates/layout_files/animate.css" rel="stylesheet">

    <link href="{{HOME.URL}}/templates/layout_files/style(1).css" rel="stylesheet">
    <link href="{{HOME.URL}}/templates/layout_files/responsive.css" rel="stylesheet">

    <link rel="stylesheet" href="{{HOME.URL}}/templates/layout_files/default.css" title="default">
    <link rel="alternate stylesheet" href="https://colorlib.com/preview/theme/ramirez/theme/css/colors/orange.css"
          title="orange" disabled="">
    <link rel="alternate stylesheet" href="https://colorlib.com/preview/theme/ramirez/theme/css/colors/pink.css"
          title="pink" disabled="">
    <link rel="alternate stylesheet" href="https://colorlib.com/preview/theme/ramirez/theme/css/colors/violet.css"
          title="violet" disabled="">
    <link rel="alternate stylesheet" href="https://colorlib.com/preview/theme/ramirez/theme/css/colors/blue.css"
          title="blue" disabled="">
    <link rel="alternate stylesheet" href="https://colorlib.com/preview/theme/ramirez/theme/css/colors/past.css"
          title="past" disabled="">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" async="" src="{{HOME.URL}}/templates/layout_files/analytics.js.download"></script>
    <script type="text/javascript" charset="UTF-8" src="{{HOME.URL}}/templates/layout_files/common.js.download"></script>
    <script type="text/javascript" charset="UTF-8" src="{{HOME.URL}}/templates/layout_files/util.js.download"></script>
    <script type="text/javascript" charset="UTF-8" src="{{HOME.URL}}/templates/layout_files/map.js.download"></script>
    <style type="text/css">.gm-style {
            font: 400 11px Roboto, Arial, sans-serif;
            text-decoration: none;
        }

        .gm-style img {
            max-width: none;
        }</style>
    <script type="text/javascript" charset="UTF-8" src="{{HOME.URL}}/templates/layout_files/onion.js.download"></script>
    <script type="text/javascript" charset="UTF-8" src="{{HOME.URL}}/templates/layout_files/controls.js.download"></script>
    <script type="text/javascript" charset="UTF-8" src="{{HOME.URL}}/templates/layout_files/stats.js.download"></script>
    <link type="text/css" rel="stylesheet" href="{{HOME.URL}}/templates/layout_files/css">


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--  <script src="{{HOME.URL}}/templates/layout_files/jquery-2.1.4.min.js.download"></script> -->
    <script src="{{HOME.URL}}/templates/layout_files/jquery.form.js.download"></script>
    <script src="{{HOME.URL}}/templates/layout_files/jquery.validate.min.js.download"></script>
    <script src="{{HOME.URL}}/templates/layout_files/jquery.counterup.min.js.download"></script>

    <script type="text/javascript" >
        $(function() {

            $( "#Time" ).autocomplete({


                source: function(request, response) {
                    $.getJSON(
                        '{{endpoint_autocomplete}}'  + request.term ,
                        function (data) {

                            response($.map(data.TIMES, function (opt) {

                                return {

                                    value: opt.nome,
                                    label: opt.nome,
                                    key: opt.id,

                                }
                            }))
                        })
                },

                select: function (event, ui) {

                    $("#IDTime").val(ui.item.key);

                }

            });

        });
    </script>
</head>
<body class="light_bg" data-spy="scroll" data-target="#bs-example-navbar-collapse-1" data-offset="80"
      data-scroll-animation="true" style="overflow: visible;">

<div id="preloader" style="display: none;">
    <div id="preloader_spinner" style="display: none;">
        <div class="spinner"></div>
    </div>
</div>

<!--================ Frist hader Area =================-->
<header class="header_area slideIn animated">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="https://colorlib.com/preview/theme/ramirez/theme/index.html"><img
                            src="{{HOME.URL}}/templates/layout_files/logo.png" alt=""></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class=""><a href="{{HOME.URL}}">{{HOME.LINK}}</a></li>

                    <li class=""><a href="{{MYPROFILE.URL}}">{{MYPROFILE.LINK}}</a></li>


                    <li class=""><a href="{{PROCURARTIMES.URL}}">{{PROCURARTIMES.LINK}}</a></li>
                    <li class=""><a href="{{MYSQUAD.URL}}">{{MYSQUAD.LINK}}</a></li>


                    <li class=""><a>USUARIO: {{USUARIO_LOGADO.ID}} </a></li>

                    <li class=""> <a href="{{LOGOUT.URL}}">{{LOGOUT.LINK}}</a> </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>
</header>
<!--================End Footer Area =================-->

<!--================Total container Area =================-->
<div class="container main_container">
    <div class="content_inner_bg row m0">



        <section class="contacsst_area pad" id="contact">
            <div class="main_title">
                <h2>My Personal Info</h2>
            </div>
            <div class="row">

                <div class="col-md-5">
                    <div  class="circlex"  >
                        <img src="{{foto}}" width=420  alt="">

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="contact_from_area wow fadeInUp  animated" style="visibility: visible; animation-name: fadeInUp;">



                        <div class="row">
                            <form action="{{FormACtion}}"  method="post" enctype="multipart/form-data">
                                <input type="hidden"  name="submitted" value="1">
                                <div class="form-group col-md-12">
                                    {{mensagem_retorno_dados}}
                                    <input type="text" class="form-control" name="nome" id="name" value="{{nome}}" placeholder="Nome*">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="idade" id="last" value="{{idade}}" placeholder="Idade*">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" name="cidade" value="{{cidade}}"  placeholder="Cidade*">
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="file" class="form-control" name="foto"  placeholder="Foto*">
                                </div>

                                <div class="form-group col-md-12">
                                    <button class="btn btn-default contact_btn" type="submit">Salvar</button>
                                </div>

                            <div id="success">
                                <p>Your text message sent successfully!</p>
                            </div>
                            <div id="error">
                                <p>Sorry! Message not sent. Something went wrong!!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="myskill_area pad" id="skill">
            <div class="main_title">
                <h2>My Skills</h2>
            </div>
            <div class="row">
                <div class="col-md-4 wow fadeInUp  animated" style="visibility: visible; animation-name: fadeInUp;">


                    <div class="skill_item_inner">
                        <div class="single_skill">
                            <h4>Snake</h4>
                            <div class="form-group skills">

                                <div class="col-xs-5 selectContainer"  style="width: 85%;">
                                    <select class="form-control" name="Snake" >
                                        <option {{Snakeno}} value="-">Sem experiencia</option>
                                        <option {{Snake1}}  value="<1">< 1 Ano</option>
                                        <option {{Snake13}}  value="1-3">1 a 3 Anos</option>
                                        <option {{Snake35}}  value="3-5">3 a 5 Anos</option>
                                        <option {{Snake5}}  value=">5">> 5 Anos</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="single_skill">
                            <h4>Snake Corner </h4>
                            <div class="form-group skills">

                                <div class="col-xs-5 selectContainer"  style="width: 85%;">
                                    <select class="form-control" name="SnakeCorner" >
                                        <option {{SnakeCornerno}} value="-">Sem experiencia</option>
                                        <option {{SnakeCorner1}}  value="<1">< 1 Ano</option>
                                        <option {{SnakeCorner13}}  value="1-3">1 a 3 Anos</option>
                                        <option {{SnakeCorner35}}  value="3-5">3 a 5 Anos</option>
                                        <option {{SnakeCorner5}}  value=">5">> 5 Anos</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp  animated" style="visibility: visible; animation-name: fadeInUp;">

                    <div class="skill_item_inner">
                        <div class="single_skill">
                            <h4>Coach</h4>

                            <div class="form-group skills">

                                <div class="col-xs-5 selectContainer"  style="width: 85%;">
                                    <select class="form-control" name="Coach" >
                                        <option {{Coachno}} value="-">Sem experiencia</option>
                                        <option {{Coach1}}  value="<1">< 1 Ano</option>
                                        <option {{Coach13}}  value="1-3">1 a 3 Anos</option>
                                        <option {{Coach35}}  value="3-5">3 a 5 Anos</option>
                                        <option {{Coach5}}  value=">5">> 5 Anos</option>
                                    </select>
                                </div>
                            </div>



                        </div>

                        <div class="single_skill">
                            <h4>Back Center</h4>
                            <div class="form-group skills">

                                <div class="col-xs-5 selectContainer"  style="width: 85%;">
                                    <select class="form-control" name="BackCenter" >
                                        <option {{BackCenterno}} value="-">Sem experiencia</option>
                                        <option {{BackCenter1}}  value="<1">< 1 Ano</option>
                                        <option {{BackCenter13}}  value="1-3">1 a 3 Anos</option>
                                        <option {{BackCenter35}}  value="3-5">3 a 5 Anos</option>
                                        <option {{BackCenter5}}  value=">5">> 5 Anos</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp  animated" style="visibility: visible; animation-name: fadeInUp;">

                    <div class="skill_item_inner">
                        <div class="single_skill">
                            <h4>Doritos</h4>
                            <div class="form-group skills">

                                <div class="col-xs-5 selectContainer"  style="width: 85%;">
                                    <select class="form-control" name="Doritos" >
                                        <option {{Doritosno}} value="-">Sem experiencia</option>
                                        <option {{Doritos1}}  value="<1">< 1 Ano</option>
                                        <option {{Doritos13}}  value="1-3">1 a 3 Anos</option>
                                        <option {{Doritos35}}  value="3-5">3 a 5 Anos</option>
                                        <option {{Doritos5}}  value=">5">> 5 Anos</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="single_skill">
                            <h4>Doritos Corner</h4>
                            <div class="form-group skills">

                                <div class="col-xs-5 selectContainer"  style="width: 85%;">
                                    <select class="form-control" name="DoritosCorner" >
                                        <option {{DoritosCornerno}} value="-">Sem experiencia</option>
                                        <option {{DoritosCorner1}}  value="<1">< 1 Ano</option>
                                        <option {{DoritosCorner13}}  value="1-3">1 a 3 Anos</option>
                                        <option {{DoritosCorner35}}  value="3-5">3 a 5 Anos</option>
                                        <option {{DoritosCorner5}}  value=">5">> 5 Anos</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>






        <section class="education_area pad" id="education">
            <div class="main_title">
                <h2>Experience</h2>
                <input type="hidden" name="idtime" id="IDTime" value="{{idtime}}">

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="contact_from_area wow fadeInUp  animated" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="contact_title">
                            <h3>Nova Experiencia</h3>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-5">
                                {{mensagem_retorno_experience}}

                                <input type="text" class="form-control" name="time" id="Time" placeholder="Time*">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" name="inicio" id="name" placeholder="Inicio* (dd/mm/yyyy)">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" name="fim" id="name" placeholder="Fim*  (dd/mm/yyyy)">
                            </div>



                            <div class="form-group col-md-1">

                                <button class="btn btn-default contact_btn" type="submit"> Add </button>
                            </div>


                        </div>
                        <div class="row">
                            <div class="form-group col-md-11">
                                 <textarea class="form-control" rows="1" id="message" name="resultados" placeholder="Your Results*"></textarea>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="main_title">
                <h2>Lista</h2>


            </div>
            <div class="row">
                <div class="education_inner_area">
                    {% for experience in experiences %}
                        <div class="education_item wow fadeInUp  animated" data-line="{{experience.Letra}}" style="visibility: visible; animation-name: fadeInUp;">
                            <div  class="circlex"  >
                                <img src="{{Times[ experience.idtime ].logotime}}" width=100  alt="">
                            </div>
                            <h6>{{experience.periodo}} <a href='{{experience.deletarExperience}}'>   Excluir</a></h6>
                            <h4>{{Times[experience.idtime].nome}}</h4>
                            <h5>{{Times[ experience.idtime ].localtreino}}</h5>
                            <p>{{experience.Resultados}}</p>
                        </div>
                    {% else %}
                            <div class="education_item wow fadeInUp  animated" data-line="-"
                                 style="visibility: visible; animation-name: fadeInUp;">
                                <h4>Nenhuma Experiencia registrada</h4>

                            </div>

                    {% endfor %}
                </div>

            </div>
        </section>
    </div>
</div>

        <!--================footer Area =================-->
        <footer class="footer_area">

            <div class="footer_copyright">
                <div class="container">

                    <div class="pull-right">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="https://colorlib.com/preview/theme/ramirez/theme/index.html#">ABOUT
                                    ME </a></li>
                            <li><a href="https://colorlib.com/preview/theme/ramirez/theme/index.html#">Skill</a></li>
                            <li><a href="https://colorlib.com/preview/theme/ramirez/theme/index.html#">Education</a></li>
                            <li><a href="https://colorlib.com/preview/theme/ramirez/theme/index.html#">SERVICES</a></li>
                            <li><a href="https://colorlib.com/preview/theme/ramirez/theme/index.html#">PORTFOLIO</a></li>
                            <li><a href="https://colorlib.com/preview/theme/ramirez/theme/index.html#">News</a></li>
                            <li><a href="https://colorlib.com/preview/theme/ramirez/theme/index.html#">CONTACT</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!--================End footer Area =================-->



        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{HOME.URL}}/templates/layout_files/bootstrap.min.js.download"></script>
        <!-- Extra plugin js -->
        <script src="{{HOME.URL}}/templates/layout_files/waypoints.min.js.download"></script>
        <script src="{{HOME.URL}}/templates/layout_files/imagesloaded.pkgd.min.js.download"></script>
        <script src="{{HOME.URL}}/templates/layout_files/isotope.pkgd.min.js.download"></script>
        <script src="{{HOME.URL}}/templates/layout_files/owl.carousel.min.js.download"></script>

        <script src="{{HOME.URL}}/templates/layout_files/styleswitcher.js.download"></script>
        <script src="{{HOME.URL}}/templates/layout_files/switcher-active.js.download"></script>

        <script src="{{HOME.URL}}/templates/layout_files/wow.min.js.download"></script>

        <!--gmaps Js-->
        <script src="{{HOME.URL}}/templates/layout_files/js"></script>
        <script src="{{HOME.URL}}/templates/layout_files/gmaps.min.js.download"></script>

        <!-- contact js -->
        <script src="{{HOME.URL}}/templates/layout_files/contact.js.download"></script>

        <script src="{{HOME.URL}}/templates/layout_files/theme.js.download"></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async="" src="{{HOME.URL}}/templates/layout_files/js(1)"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

    gtag('js', new Date());

            gtag('config', 'UA-23581568-13');
        </script>


</body>
</html>