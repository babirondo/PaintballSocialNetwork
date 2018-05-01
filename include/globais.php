<?php
namespace raiz;
set_time_limit(2);
//error_reporting(E_ALL ^ E_DEPRECATED ^E_NOTICE);

class Globais{

    function __construct( ){

        $this->Authentication_endpoint = "http://localhost:81/PaintballSocialNetwork-AuthAPI/Auth/";


        $this->ROTA_RAIZ = "http://localhost:81/PaintballSocialNetwork";
        $this->Players_UPDATE_endpoint = "http://localhost:81/PaintballSocialNetwork-Players/Players/:idjogadorlogado";
        $this->Players_GET_endpoint = "http://localhost:81/PaintballSocialNetwork-Players/Players/:idjogadorlogado";
        $this->Players_ADD_TEAM_endpoint = "http://localhost:81/PaintballSocialNetwork-Players/Players/Experiences/";
        $this->listar_times_de_um_jogador = "http://localhost:81/PaintballSocialNetwork-Players/Players/:idjogadorlogado/Experiences";
        $this->excluir_experiencia = "http://localhost:81/PaintballSocialNetwork/MyProfile/Experiences/:idexperiencia";
        $this->delete_experiencia = "http://localhost:81/PaintballSocialNetwork-Players/Players/:idjogadorlogado/Experiences/:idexperiencia";


        $this->MeusTimes = "http://localhost:81/PaintballSocialNetwork/MySquads/";
        $this->CriarMeuTime = "http://localhost:81/PaintballSocialNetwork/MySquads/New/";
        $this->CriarMeuTimeSalvar = "http://localhost:81/PaintballSocialNetwork-Players/:idjogadorlogado/Teams/";
        $this->MeusTimesRemoto = "http://localhost:81/PaintballSocialNetwork-Players/:idjogadorlogado/MySquads/";

        $this->listar_meus_times = "http://localhost:81/PaintballSocialNetwork-Players/MyTeams/:idjogadorlogado";
        $this->jogadores_por_times = "http://localhost:81/PaintballSocialNetwork-Players/Teams/Players/";
        $this->getTimes = "http://localhost:81/PaintballSocialNetwork-Players/Teams/";
        $this->NewUser_endpoint_UI = "http://localhost:81/PaintballSocialNetwork/NewUser/";
        $this->NewUser_endpoint = "http://localhost:81/PaintballSocialNetwork-AuthAPI/NewUser/";
        $this->ProcurarTimesUI = "http://localhost:81/PaintballSocialNetwork/SearchTeams/";
        $this->ProcurarTimes = "http://localhost:81/PaintballSocialNetwork-Players/SearchTeams/";

        $this->MyProfileUI = "http://localhost:81/PaintballSocialNetwork/MyProfile/";
        $this->LogoutUI = "http://localhost:81/PaintballSocialNetwork/Logout/";
        $this->LoginUI = "http://localhost:81/PaintballSocialNetwork/Login";





    }

}
