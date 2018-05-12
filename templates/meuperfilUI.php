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
    <link rel="icon" href="{{HOME.URL}}/imagens/ico.png" type="image/x-icon">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{title_pagina}} </title>

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
    <script type="text/javascript" charset="UTF-8"
            src="{{HOME.URL}}/templates/layout_files/common.js.download"></script>
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
    <script type="text/javascript" charset="UTF-8"
            src="{{HOME.URL}}/templates/layout_files/controls.js.download"></script>
    <script type="text/javascript" charset="UTF-8" src="{{HOME.URL}}/templates/layout_files/stats.js.download"></script>
    <link type="text/css" rel="stylesheet" href="{{HOME.URL}}/templates/layout_files/css">


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--  <script src="{{HOME.URL}}/templates/layout_files/jquery-2.1.4.min.js.download"></script> -->
    <script src="{{HOME.URL}}/templates/layout_files/jquery.form.js.download"></script>
    <script src="{{HOME.URL}}/templates/layout_files/jquery.validate.min.js.download"></script>
    <script src="{{HOME.URL}}/templates/layout_files/jquery.counterup.min.js.download"></script>

    <script type="text/javascript">
        $(function () {

            $("#Time").autocomplete({


                source: function (request, response) {
                    $.getJSON(
                        '{{endpoint_autocomplete}}' + request.term,
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
<header class="header_area slideIn animated" style="height: 101px">
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
                <img src="{{HOME.URL}}/imagens/logo3.png" width="150px" alt=""></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class=""><a href="{{HOME.URL}}">{{HOME.LINK}}</a></li>

                    <li class=""><a href="{{MYPROFILE.URL}}">{{MYPROFILE.LINK}}</a></li>


                    <li class=""><a href="{{PROCURARTIMES.URL}}">{{PROCURARTIMES.LINK}}</a></li>
                    <li class=""><a href="{{PROCURARJOGADORES.URL}}">{{PROCURARJOGADORES.LINK}}</a></li>
                    <li class=""><a href="{{MYSQUAD.URL}}">{{MYSQUAD.LINK}}</a></li>


                    <li class=""><a>User: {{USUARIO_LOGADO.nome}} </a></li>

                    <li class=""><a href="{{LOGOUT.URL}}">{{LOGOUT.LINK}}</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>
</header>
<!--================End Footer Area =================-->

<!--================Total container Area =================-->
<div class="container main_container">
    <div class="content_inner_bg row m0">

        <form action="{{FormACtion}}" method="post" enctype="multipart/form-data">
        <section class="contacsst_area pad" id="contact">
            <div class="main_title">
                <h2>My Personal Info</h2>
            </div>
            <div class="row">

                <div class="col-md-5">
                    <div class="cardGrande">
                        {% if foto is empty %}
                        <img src="{{HOME.URL}}/imagens/user_no_image.png" alt="">
                        {% else %}
                        <img src="{{foto}}" style="max-width: 341px;" alt="">
                        {% endif %}


                    </div>
                    <div class="form-group col-md-8">
                        Photo:
                        <input type="file" class="form-control" name="foto" placeholder="Photo*">
                    </div>

                    <div class="form-group col-md-7">
                        Paintball Skill : <h2>{{PaintballSkill}}</h2>
                    </div>
                </div>


                <div class="col-md-7">
                    <div class="contact_from_area  " style="visibility: visible; animation-name: fadeInUp;">



                            <input type="hidden" name="submitted" value="1">

                            <div class="row">
                                <div class="form-group col-md-12">
                                    {{mensagem_retorno_dados}}
                                    <input type="text" class="form-control" name="nome" id="name" value="{{nome}}"
                                           placeholder="Name*">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <input type="text" class="form-control" name="idade" id="last" value="{{idade}}"
                                           placeholder="Age*">
                                </div>
                                <div class="form-group col-md-5">
                                    <input type="text" class="form-control" name="playsince" value="{{playsince}}"
                                           placeholder="Playing since ? (yyyy)*">
                                </div>

                                <div class="form-group col-md-5">
                                    <input type="text" class="form-control" name="cidade" value="{{cidade}}"
                                           placeholder="City*">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    What division are you interested to play ?
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-5">
                                    <select class="form-control"  name="nivelcompeticao">
                                        <option value="">Division</option>
                                        <option {% if nivelcompeticao == "PRO" %} selected {% endif %}   >PRO</option>
                                        <option {% if nivelcompeticao == "D1" %} selected {% endif %}  >D1</option>
                                        <option {% if nivelcompeticao == "D2" %} selected {% endif %}  >D2</option>
                                        <option {% if nivelcompeticao == "D3" %} selected {% endif %}  >D3</option>
                                        <option {% if nivelcompeticao == "D4" %} selected {% endif %}  >D4</option>
                                        <option {% if nivelcompeticao == "D5" %} selected {% endif %}  >D5</option>
                                    </select>

                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-12">
                                    What roles are you interested in ?
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <input type="checkbox" class="form-control" name="procurando[Snake]" {% if
                                           procurando.Snake is not empty %} checked {% endif %} value="Snake"
                                           placeholder="Time"> Snake
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="checkbox" class="form-control" name="procurando[SnakeCorner]" {% if
                                           procurando.SnakeCorner is not empty %} checked {% endif %}
                                           value="SnakeCorner"
                                           placeholder="Time"> Snake Corner
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="checkbox" class="form-control" name="procurando[BackCenter]" {% if
                                           procurando.BackCenter is not empty %} checked {% endif %} value="BackCenter"
                                           placeholder="Time"> Back Center
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="checkbox" class="form-control" name="procurando[Coach]" {% if
                                           procurando.Coach is not empty %} checked {% endif %} value="Coach"
                                           placeholder="Time"> Coach
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="checkbox" class="form-control" name="procurando[DoritosCorner]" {% if
                                           procurando.DoritosCorner is not empty %} checked {% endif %}
                                           value="DoritosCorner" placeholder="Time"> Doritos Corner
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="checkbox" class="form-control" name="procurando[Doritos]" {% if
                                           procurando.Doritos is not empty %} checked {% endif %} value="Doritos"
                                           placeholder="Time"> Doritos
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    What is your training availabilty ?
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <input type="checkbox" class="form-control" name="treino[Domingo]" { {% if
                                           treino.Domingo is not empty %} checked {% endif %} value="Domingo"
                                           placeholder="Time">
                                    Sunday
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="checkbox" class="form-control" name="treino[Segunda]" {% if
                                           treino.Segunda is not empty %} checked {% endif %} value="Segunda"
                                           placeholder="Time"> Monday
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="checkbox" class="form-control" name="treino[Terca]" {% if treino.Terca
                                           is not empty %} checked {% endif %} value="Terca" placeholder="Time"> Tuesday
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="checkbox" class="form-control" name="treino[Quarta]" {% if
                                           treino.Quarta is not empty %} checked {% endif %} value="Quarta"
                                           placeholder="Time"> Wednesday
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="checkbox" class="form-control" name="treino[Quinta]" {% if
                                           treino.Quinta is not empty %} checked {% endif %} value="Quinta"
                                           placeholder="Time"> Thursday
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="checkbox" class="form-control" name="treino[Sexta]" {% if treino.Sexta
                                           is not empty %} checked {% endif %} value="Sexta" placeholder="Time"> Friday
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <input type="checkbox" class="form-control" name="treino[Sabado]" {% if
                                           treino.Sabado is not empty %} checked {% endif %} value="Sabado"
                                           placeholder="Time"> Saturday
                                </div>


                            </div>

                            <div class="form-group col-md-12">
                                <button class="btn btn-default contact_btn" type="submit">Save</button>
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
    </section>

    <div class="row" style="background: white; height: 35px">
    </div>

    <section class="myskill_area pad" id="skill">
        <div class="main_title">
            <h2>My Skills</h2>
        </div>
        <div class="row">
            <div class="col-md-4  " style="visibility: visible; animation-name: fadeInUp;">


                <div class="skill_item_inner">
                    <div class="single_skill">
                        <h4>Snake</h4>
                        <div class="form-group skills">

                            <div class="col-xs-5 selectContainer" style="width: 85%;">
                                <select class="form-control" name="Snake">
                                    <option {{Snakeno}} value="-">No Experience</option>
                                    <option {{Snake1}} value="<1">< 1 Year</option>
                                    <option {{Snake13}} value="1-3">1 to 3 Years</option>
                                    <option {{Snake35}} value="3-5">3 to 5 Years</option>
                                    <option {{Snake5}} value=">5">> 5 Years</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="single_skill">
                        <h4>Snake Corner </h4>
                        <div class="form-group skills">

                            <div class="col-xs-5 selectContainer" style="width: 85%;">
                                <select class="form-control" name="SnakeCorner">
                                    <option {{SnakeCornerno}} value="-">No Experience</option>
                                    <option {{SnakeCorner1}} value="<1">< 1 Year</option>
                                    <option {{SnakeCorner13}} value="1-3">1 to 3 Years</option>
                                    <option {{SnakeCorner35}} value="3-5">3 to 5 Years</option>
                                    <option {{SnakeCorner5}} value=">5">> 5 Years</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 " style="visibility: visible; animation-name: fadeInUp;">

                <div class="skill_item_inner">
                    <div class="single_skill">
                        <h4>Coach</h4>

                        <div class="form-group skills">

                            <div class="col-xs-5 selectContainer" style="width: 85%;">
                                <select class="form-control" name="Coach">
                                    <option {{Coachno}} value="-">No Experience</option>
                                    <option {{Coach1}} value="<1">< 1 Year</option>
                                    <option {{Coach13}} value="1-3">1 to 3 Years</option>
                                    <option {{Coach35}} value="3-5">3 to 5 Years</option>
                                    <option {{Coach5}} value=">5">> 5 Years</option>
                                </select>
                            </div>
                        </div>


                    </div>

                    <div class="single_skill">
                        <h4>Back Center</h4>
                        <div class="form-group skills">

                            <div class="col-xs-5 selectContainer" style="width: 85%;">
                                <select class="form-control" name="BackCenter">
                                    <option {{BackCenterno}} value="-">No Experience</option>
                                    <option {{BackCenter1}} value="<1">< 1 Year</option>
                                    <option {{BackCenter13}} value="1-3">1 to 3 Years</option>
                                    <option {{BackCenter35}} value="3-5">3 to 5 Years</option>
                                    <option {{BackCenter5}} value=">5">> 5 Years</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4  " style="visibility: visible; animation-name: fadeInUp;">

                <div class="skill_item_inner">
                    <div class="single_skill">
                        <h4>Doritos</h4>
                        <div class="form-group skills">

                            <div class="col-xs-5 selectContainer" style="width: 85%;">
                                <select class="form-control" name="Doritos">
                                    <option {{Doritosno}} value="-">No Experience</option>
                                    <option {{Doritos1}} value="<1">< 1 Year</option>
                                    <option {{Doritos13}} value="1-3">1 to 3 Years</option>
                                    <option {{Doritos35}} value="3-5">3 to 5 Years</option>
                                    <option {{Doritos5}} value=">5">> 5 Years</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="single_skill">
                        <h4>Doritos Corner</h4>
                        <div class="form-group skills">

                            <div class="col-xs-5 selectContainer" style="width: 85%;">
                                <select class="form-control" name="DoritosCorner">
                                    <option {{DoritosCornerno}} value="-">No Experience</option>
                                    <option {{DoritosCorner1}} value="<1">< 1 Year</option>
                                    <option {{DoritosCorner13}} value="1-3">1 to 3 Years</option>
                                    <option {{DoritosCorner35}} value="3-5">3 to 5 Years</option>
                                    <option {{DoritosCorner5}} value=">5">> 5 Years</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="row" style="background: white; height: 35px">
    </div>

    <section class="education_area pad" id="education">
        <input type="hidden" name="idtime" id="IDTime" value="{{idtime}}">
        <div class="main_title">
            <h2>Experiences</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="contact_from_area " style="visibility: visible; animation-name: fadeInUp;">
                    <div class="contact_title">
                        <h3>New Experience</h3>
                        {{mensagem_retorno_experience}}
                    </div>
                    <div class="row">
                        <div class="form-group col-md-5">
                            <input type="text" class="form-control" name="time" id="Time" placeholder="Team*">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" name="inicio" id="name"
                                   placeholder="Start Date* (mm/yyyy)">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" name="fim" id="name"
                                   placeholder="End Date*  (mm/yyyy)">
                        </div>

                        <div class="form-group col-md-1">
                            <input class="btn btn-default contact_btn" type="submit" value="Add">

                        </div>


                    </div>

                    <div class="row">
                        <div class="form-group col-md-5">
                            Championship that I've played with this Team:
                            <select class="form-control" name="idevento[]">
                                {% if CampeonatosEventos is not null %}
                                <option value="">Choose the event you've played</option>
                                {% endif %}

                                {% for idevento, event in CampeonatosEventos %}
                                <option value="{{idevento}}"> {{event.combo}}`</option>
                                {% else %}
                                <option value="">No Event/Championship registered</option>
                                {% endfor %}
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            Main position that you played on this Championship ?
                            <select class="form-control" name="posicao[]">
                                <option value="">Choose the position</option>

                                <option>Coach</option>
                                <option>Snake</option>
                                <option>Snake Corner</option>
                                <option>Back Center</option>
                                <option>Doritos Corner</option>
                                <option>Doritos</option>
                            </select>
                        </div>


                        <div class="form-group col-md-2">
                            Rank
                            <select class="form-control" name="rank[]">
                                <option value="">Choose the position</option>

                                {% for i in 1..99 %}
                                <option>{{i}}</option>
                                {% endfor %}
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            Division ?
                            <select class="form-control" name="division[]">
                                <option value="">Choose the position</option>

                                <option>Pro</option>
                                <option>Division 1</option>
                                <option>Division 2</option>
                                <option>Division 3</option>
                                <option>Division 4</option>
                                <option>Division 5</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
       </form>

        <div class="row" style="background: white; height: 15px">
        </div>

        <section class="education_area pad" id="education">
        <div class="row" style="padding: 10px">
            <div class="education_inner_area">
                {% for experience in experiences %}
                <div class="education_item wow fadeInUp  animated" data-line="{{experience.Letra}}"
                     style="visibility: visible; animation-name: fadeInUp;">
                    <div class="circlex">
                        <img src="{{Times[ experience.idtime ].logotime}}" width=100 alt="">
                    </div>
                    <h6>{{experience.periodo}} <a href='{{experience.deletarExperience}}'>Delete</a> <a
                                href='{{experience.editarExperience}}'>Edit</a></h6>
                    <h4>{{Times[experience.idtime].nome}}</h4>
                    <h5>{{Times[ experience.idtime ].localtreino}}</h5>


                    {% if experience.RESULTADOS is iterable %}
                    <h5>Results:</h5>

                    <UL>
                        {% for result in experience.RESULTADOS %}
                        <LI><p> - {{result.rank_formatado}}, {{DADOS_EVENTOS[result.evento].combo}} playing
                                {{result.posicao}} </p></LI>
                        {% endfor %}
                    </UL>
                    {% endif %}
                </div>
                {% else %}
                <div class="education_item wow fadeInUp  animated" data-line="-"
                     style="visibility: visible; animation-name: fadeInUp;">
                    <h4>No Experience</h4>

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
        <div class="container" style="color: #fec608">

            It's a beta version, so expect bugs :)<BR>

            Copyright © 2018

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