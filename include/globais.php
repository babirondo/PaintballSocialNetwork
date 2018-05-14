<?php
namespace raiz;
set_time_limit(2);
//error_reporting(E_ALL ^ E_DEPRECATED ^E_NOTICE);

class Globais{
    public $env;
    public $banco;

    function __construct( ){

        if ( $_SERVER["CONTEXT_DOCUMENT_ROOT"] == "/var/www/html")
            $this->banco = $this->env = "prod";
        else{
            $this->banco= "local";
            $this->env = "local";
        }

        switch($this->env){

            case("local");
                $servidor= "http://localhost:81";
                $this->verbose=1;
                break;

            case("prod");
                $servidor= "http://pb.mundivox.rio";
                $this->verbose=1;
                break;

        }
        switch($this->banco){

            case("local");
                $this->localhost = "localhost";
                $this->username = "postgres";
                $this->password = "bruno";
                $this->db ="usuarios_local";
                break;

            case("prod");
                $this->localhost = "localhost";
                $this->username = "pb";
                $this->password = "Rodr1gues";
                $this->db ="usuarios";
                break;

        }

        
        $this->Authentication_endpoint = $servidor."/PaintballSocialNetwork-AuthAPI/Auth/";

        $this->Titulo = "PaintballIN";

        $this->ROTA_RAIZ = $servidor."/PaintballSocialNetwork";

        // ROTAS DE JOGADOR
        $this->Players_UPDATE_endpoint = $servidor."/PaintballSocialNetwork-Players/Players/:idjogadorlogado";
        $this->Players_GET_endpoint = $servidor."/PaintballSocialNetwork-Players/Players/:idjogadorlogado";
        $this->Players_ADD_TEAM_endpoint = $servidor."/PaintballSocialNetwork-Players/Players/Experiences/";
        $this->listar_times_de_um_jogador = $servidor."/PaintballSocialNetwork-Players/Players/:idjogadorlogado/Experiences";
        $this->delete_experiencia = $servidor."/PaintballSocialNetwork-Players/Players/:idjogadorlogado/Experiences/:idexperiencia";
        $this->editar_experiencia = $servidor."/PaintballSocialNetwork-Players/Players/:idjogadorlogado/Experiences/:idexperiencia/";
        $this->ProcurarJogadores = $servidor."/PaintballSocialNetwork-Players/SearchPlayers/";
        $this->listar_meus_times = $servidor."/PaintballSocialNetwork-Players/MyTeams/:idjogadorlogado";
        $this->jogadores_por_times = $servidor."/PaintballSocialNetwork-Players/Teams/Players/";
        $this->getTimes = $servidor."/PaintballSocialNetwork-Players/Teams/";
        $this->ProcurarTimes = $servidor."/PaintballSocialNetwork-Players/SearchTeams/";
        $this->CriarMeuTimeSalvar = $servidor."/PaintballSocialNetwork-Players/:idjogadorlogado/Teams/";
        $this->MeusTimesRemoto = $servidor."/PaintballSocialNetwork-Players/:idjogadorlogado/MySquads/";
        $this->DeletarJogador = $servidor."/PaintballSocialNetwork-Players/Players/:idjogadorlogado/";


        //ROTAS de UI
        $this->NewUser_endpoint_UI = $servidor."/PaintballSocialNetwork/NewUser/";
        $this->ProcurarTimesUI = $servidor."/PaintballSocialNetwork/SearchTeams/";
        $this->excluir_experiencia = $servidor."/PaintballSocialNetwork/MyProfile/Experiences/:idexperiencia/Remove";
        $this->editar_experienciaUI = $servidor."/PaintballSocialNetwork/MyProfile/Experiences/:idexperiencia/Edit";
        $this->MyProfileUI = $servidor."/PaintballSocialNetwork/MyProfile/";
        $this->LogoutUI = $servidor."/PaintballSocialNetwork/Logout/";
        $this->LoginUI = $servidor."/PaintballSocialNetwork/Login";
        $this->ProcurarJogadoresUI = $servidor."/PaintballSocialNetwork/SearchPlayers/";
        $this->CampeonatosUI = $servidor."/PaintballSocialNetwork/Tournaments/";
        $this->NovoCampeonatoUI = $servidor."/PaintballSocialNetwork/Tournaments/New/";
        $this->EditCampeonatoUI = $servidor."/PaintballSocialNetwork/Tournaments/:idtorneio/";
        $this->DeleteCampeonatoUI = $servidor."/PaintballSocialNetwork/Tournaments/:idtorneio/";
        $this->CampeonatoEtapasUI = $servidor."/PaintballSocialNetwork/Tournaments/:idtorneio/Etapas/";
        $this->NovaEtapaUI = $servidor."/PaintballSocialNetwork/Tournaments/:idtorneio/Etapas/New/";
        $this->EtapaEditUI = $servidor."/PaintballSocialNetwork/Tournaments/:idtorneio/Etapas/:idevento/Edit/";
        $this->Editar_Squad = $servidor."/PaintballSocialNetwork/MySquads/:idtime/";
        $this->MeusTimes = $servidor."/PaintballSocialNetwork/MySquads/";
        $this->CriarMeuTime = $servidor."/PaintballSocialNetwork/MySquads/New/";


        //ROTAS de AUTENTICACAO
        $this->NewUser_endpoint = $servidor."/PaintballSocialNetwork-AuthAPI/NewUser/";





        //ROTAS de CAMPEONATO
        $this->Campeonatos = $servidor."/PaintballSocialNetwork-Championship/Tournaments/";
        $this->getCampeonato = $servidor."/PaintballSocialNetwork-Championship/Tournaments/:idtorneio/";
        $this->NovoCampeonato = $servidor."/PaintballSocialNetwork-Championship/Tournaments/";
        $this->NovoCampeonatoAlterar = $servidor."/PaintballSocialNetwork-Championship/Tournaments/:idtorneio/";
        $this->CampeonatoEtapas = $servidor."/PaintballSocialNetwork-Championship/Tournaments/:idtorneio/Etapas/";
        $this->NovaEtapa = $servidor."/PaintballSocialNetwork-Championship/Tournaments/:idtorneio/Etapas/";
        $this->getEtapa = $servidor."/PaintballSocialNetwork-Championship/Tournaments/:idtorneio/Etapas/:idetapa/";
        $this->AlterarEtapa = $servidor."/PaintballSocialNetwork-Championship/Tournaments/:idtorneio/Etapas/:idetapa/";
        $this->getCampeonatosEventos = $servidor."/PaintballSocialNetwork-Championship/Tournaments/Etapas/";
        $this->getEventos = $servidor."/PaintballSocialNetwork-Championship/Tournaments/Etapas/";





    }

    Function ArrayMergeKeepKeys() {
        $arg_list = func_get_args();
        foreach((array)$arg_list as $arg){
            if (is_array ($arg) )
            {
                foreach((array)$arg as $K => $V){
                    $Zoo[$K]=$V;
                }
            }
        }
        return $Zoo;
    }

}
