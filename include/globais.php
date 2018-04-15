<?php
namespace raiz;
set_time_limit(2);
//error_reporting(E_ALL ^ E_DEPRECATED ^E_NOTICE);

class Globais{

    function __construct( ){

        $this->ROTA_RAIZ = "http://localhost:81/PaintballSocialNetwork";
        $this->Players_UPDATE_endpoint = "http://localhost:81/PaintballSocialNetwork-Players/Players/";
        $this->Players_GET_endpoint = "http://localhost:81/PaintballSocialNetwork-Players/Players/";

        $Authentication_folder = "PaintballSocialNetwork-AuthAPI/";
        $Authentication_port = ":81/";
        $this->Authentication_endpoint = "http://localhost".$Authentication_port.$Authentication_folder."Auth/";



    }

}
