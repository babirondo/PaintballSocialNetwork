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

            <section class="education_area pad" id="education">
                <input type="hidden" name="idtime" id="IDTime" value="{{experience.idtime}}">
                <input type="hidden" name="editarExperience" value="1">
                <input type="hidden" name="idexperience" value="{{idexperience}}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact_from_area wow fadeInUp  animated"
                             style="visibility: visible; animation-name: fadeInUp;">
                            <div class="contact_title">
                                <h3>Editing Experience</h3>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-2">
                                    <img src="{{Times[ experience.idtime ].logotime}}" width=100 alt="">
                                </div>
                                <div class="form-group col-md-3">
                                    {{mensagem_retorno_experience}}

                                    <input type="text" class="form-control" name="time" id="Time"
                                           value="{{Times[experience.idtime].nome}}" placeholder="Team*">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="inicio" id="name"
                                           value="{{experience.inicio}}" placeholder="Start Date* (mm/yyyy)">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="fim" id="name"
                                           value="{{experience.fim}}" placeholder="End Date*  (mm/yyyy)">
                                </div>





                            </div>

                            <div class="row">
                                <div class="form-group col-md-11">
                                    <textarea class="form-control" rows="1" id="message" name="resultados"
                                              placeholder="Your Results*">{{experience.Resultados}}</textarea>
                                </div>

                            </div>

                            <div class="row">
                                <h5>Results:</h5>
                            </div>


                                {% if experience.RESULTADOS is iterable %}

                                {% for idresultado, result in experience.RESULTADOS %}
                                <div class="row">
                                <input type="hidden" name="results[]" values="{{idresultado}}">
                                <div class="form-group col-md-3">
                                    Rank:
                                    <select class="form-control" name="rank[{{idresultado}}]">


                                        {% for i in 1..99 %}
                                        <option {% if i== result.rank %} selected {% endif %}>{{i}}</option>
                                        {% endfor %}

                                    </select>

                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-control" name="idevento[{{idresultado}}]">
                                        {% if CampeonatosEventos is not null %}
                                        <option value="">Choose the event you've played</option>
                                        {% endif %}

                                        {% for idevento, event in CampeonatosEventos %}
                                        <option {% if result.idevento== idevento %} selected {% endif %}
                                                value="{{idevento}}"> {{event.combo}}`
                                        </option>
                                        {% else %}
                                        <option value="">No Event/Championship registered</option>
                                        {% endfor %}
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <select class="form-control" name="posicao[{{idresultado}}]">


                                        <option {% if result.posicao=="Coach" %} selected {% endif %} >Coach</option>
                                        <option {% if result.posicao==
                                        "Snake" %} selected {% endif %} >Snake</option>
                                        <option {% if result.posicao==
                                        "Snake Corner" %} selected {% endif %} >Snake Corner</option>
                                        <option {% if result.posicao==
                                        "Back Center" %} selected {% endif %} >Back Center</option>
                                        <option {% if result.posicao==
                                        "Doritos Corner" %} selected {% endif %} >Doritos Corner</option>
                                        <option {% if result.posicao==
                                        "Doritos" %} selected {% endif %} >Doritos</option>
                                    </select>

                                </div>
                            </div>
                                {% endfor %}

                               {% endif %}


                            {% for i in -2..-4%}
                            <div class="row">
                                
                                <input type="hidden" name="results[{{i}}]" values="{{i}}">
                                <div class="form-group col-md-3">
                                    Rank:
                                    <select class="form-control" name="rank[{{i}}]">
                                        <option value="">Choose the position</option>

                                        {% for i in 1..99 %}
                                        <option  >{{i}}</option>
                                        {% endfor %}

                                    </select>

                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-control" name="idevento[{{i}}]">

                                        <option value="">Choose the event you've played</option>


                                        {% for idevento, event in CampeonatosEventos %}
                                        <option   value="{{idevento}}"> {{event.combo}}  </option>
                                        {% else %}
                                        <option value="">No Event/Championship registered</option>
                                        {% endfor %}
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <select class="form-control" name="posicao[{{i}}]">
                                        <option value="">Choose the position</option>

                                        <option {% if result.posicao=="Coach" %} selected {% endif %} >Coach</option>
                                        <option {% if result.posicao==
                                        "Snake" %} selected {% endif %} >Snake</option>
                                        <option {% if result.posicao==
                                        "Snake Corner" %} selected {% endif %} >Snake Corner</option>
                                        <option {% if result.posicao==
                                        "Back Center" %} selected {% endif %} >Back Center</option>
                                        <option {% if result.posicao==
                                        "Doritos Corner" %} selected {% endif %} >Doritos Corner</option>
                                        <option {% if result.posicao==
                                        "Doritos" %} selected {% endif %} >Doritos</option>
                                    </select>

                                </div>
                            </div>
                            {% endfor %}

                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <button class="btn btn-default contact_btn" type="submit"> Save</button>
                            </div>
                        </div>

                    </div>
                </div>
    </div>
    </form>

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
        \
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