<?php
namespace raiz;
set_time_limit(2);
//error_reporting(E_ALL ^ E_DEPRECATED ^E_NOTICE);

class Globais{
    public $env;
    function __construct( ){
        $this->env = "prod";
        $this->env = "local";

        switch($this->env){
            case("local");
                $servidor= "http://localhost:81";
            break;

            case("prod");
                $servidor= "http://pb.mundivox.rio";
            break;

        }

        
        $this->Authentication_endpoint = $servidor."/PaintballSocialNetwork-AuthAPI/Auth/";


        $this->ROTA_RAIZ = $servidor."/PaintballSocialNetwork";
        $this->Players_UPDATE_endpoint = $servidor."/PaintballSocialNetwork-Players/Players/:idjogadorlogado";
        $this->Players_GET_endpoint = $servidor."/PaintballSocialNetwork-Players/Players/:idjogadorlogado";
        $this->Players_ADD_TEAM_endpoint = $servidor."/PaintballSocialNetwork-Players/Players/Experiences/";
        $this->listar_times_de_um_jogador = $servidor."/PaintballSocialNetwork-Players/Players/:idjogadorlogado/Experiences";
        $this->excluir_experiencia = $servidor."/PaintballSocialNetwork/MyProfile/Experiences/:idexperiencia";
        $this->delete_experiencia = $servidor."/PaintballSocialNetwork-Players/Players/:idjogadorlogado/Experiences/:idexperiencia";


        $this->MeusTimes = $servidor."/PaintballSocialNetwork/MySquads/";
        $this->CriarMeuTime = $servidor."/PaintballSocialNetwork/MySquads/New/";
        $this->CriarMeuTimeSalvar = $servidor."/PaintballSocialNetwork-Players/:idjogadorlogado/Teams/";
        $this->MeusTimesRemoto = $servidor."/PaintballSocialNetwork-Players/:idjogadorlogado/MySquads/";

        $this->listar_meus_times = $servidor."/PaintballSocialNetwork-Players/MyTeams/:idjogadorlogado";
        $this->jogadores_por_times = $servidor."/PaintballSocialNetwork-Players/Teams/Players/";
        $this->getTimes = $servidor."/PaintballSocialNetwork-Players/Teams/";
        $this->NewUser_endpoint_UI = $servidor."/PaintballSocialNetwork/NewUser/";
        $this->NewUser_endpoint = $servidor."/PaintballSocialNetwork-AuthAPI/NewUser/";
        $this->ProcurarTimesUI = $servidor."/PaintballSocialNetwork/SearchTeams/";
        $this->ProcurarTimes = $servidor."/PaintballSocialNetwork-Players/SearchTeams/";

        $this->MyProfileUI = $servidor."/PaintballSocialNetwork/MyProfile/";
        $this->LogoutUI = $servidor."/PaintballSocialNetwork/Logout/";
        $this->LoginUI = $servidor."/PaintballSocialNetwork/Login";





    }

}
