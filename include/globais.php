<?php
namespace raiz;
set_time_limit(2);
//error_reporting(E_ALL ^ E_DEPRECATED ^E_NOTICE);

class Globais{

    function __construct( ){

        $this->ROTA_RAIZ = "http://localhost:81/PaintballSocialNetwork";
        $this->Players_UPDATE_endpoint = "http://localhost:81/PaintballSocialNetwork-Players/Players/";
        $this->Players_GET_endpoint = "http://localhost:81/PaintballSocialNetwork-Players/Players/";
        $this->Players_ADD_TEAM_endpoint = "http://localhost:81/PaintballSocialNetwork-Players/Players/";
        $this->listar_times_de_um_jogador = "http://localhost:81/PaintballSocialNetwork-Players/Players/:idusuariologado/Experiences";
        $this->excluir_experiencia = "http://localhost:81/PaintballSocialNetwork/MyProfile/Experiences/:idexperiencia";
        $this->delete_experiencia = "http://localhost:81/PaintballSocialNetwork-Players/Players/:idusuariologado/Experiences/:idexperiencia";

        $Authentication_folder = "PaintballSocialNetwork-AuthAPI/";
        $Authentication_port = ":81/";
        $this->Authentication_endpoint = "http://localhost".$Authentication_port.$Authentication_folder."Auth/";



    }

}
