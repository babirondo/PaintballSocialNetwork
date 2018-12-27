<?php
namespace raiz;

//error_reporting(E_ALL ^ E_DEPRECATED ^E_NOTICE);

class Globais{
  public $env;
	public $banco;
	public $config;
  private $password;

   function __construct( ){
     /*
        if ( $_SERVER["HTTP_HOST"] == $host["AWS"] || $_SERVER["HOSTNAME"] == $host["AWS"] )
            $this->banco = $this->env = "prod";
        else{
          */
            $this->banco= "local";
            $this->env = "local";
    //    }

        $servidor["UI"] = $servidor["frontend"] = "http://192.168.0.150:81";
	      $servidor["UI"] = $servidor["frontend"] = "http://188.141.84.69:81";
        $servidor["autenticacao"] = "http://192.168.0.150:82";
        $servidor["campeonato"] = "http://192.168.0.150:84";
        $servidor["players"] = "http://192.168.0.150:83";
        $servidor["images"] = "http://192.168.0.150:85";
        $servidor["times"] = "http://192.168.0.150:86";

         $this->verbose=1;

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
                $this->password = "xxx";
                $this->db ="usuarios";
                break;

        }
        // extraindo configuracoes adicionais do arquivo config.json
       	$configuracoes_externas = file_get_contents('include/config.json');
       	$config_parsed = json_decode($configuracoes_externas,true);
       	$this->config = $config_parsed;


        //ROTAS de AUTENTICACAO
        $this->Authentication_endpoint = $servidor["autenticacao"]."/PaintballSocialNetwork-AuthAPI/Auth/";
        $this->NewUser_endpoint = $servidor["autenticacao"]."/PaintballSocialNetwork-AuthAPI/NewUser/";



        $this->Titulo = "PaintballIN";

        $this->ROTA_RAIZ = $servidor["frontend"]."/PaintballSocialNetwork";

        //$this->SaveImage = $servidor["images"]."/PaintballSocialNetwork-Images/Analyze/Image/:idjogador";

        //ROTAS DE IMAGEM
        $this->Player_Images = $servidor["images"]."/PaintballSocialNetwork-Images/Player/:idusuario";
        $this->Players_Images = $servidor["images"]."/PaintballSocialNetwork-Images/Players/";

        ///ROTAS DE TIME
        $this->listar_meus_times = $servidor["times"]."/PaintballSocialNetwork-Teams/MyTeams/:idjogadorlogado";
        $this->getTimes = $servidor["times"]."/PaintballSocialNetwork-Teams/Teams/";
        $this->ProcurarTimes = $servidor["times"]."/PaintballSocialNetwork-Teams/SearchTeams/";
        $this->CriarMeuTimeSalvar = $servidor["times"]."/PaintballSocialNetwork-Teams/:idjogadorlogado/Teams/";
        $this->MeusTimesRemoto = $servidor["times"]."/PaintballSocialNetwork-Teams/:idjogadorlogado/MySquads/";

        // ROTAS DE JOGADOR
        $this->Players_UPDATE_endpoint = $servidor["players"]."/PaintballSocialNetwork-Players/Players/:idjogadorlogado";
        $this->jogadores_por_times = $servidor["players"]."/PaintballSocialNetwork-Players/Teams/Players/";

        $this->Players_GET_endpoint = $servidor["players"]."/PaintballSocialNetwork-Players/Players/:idjogadorlogado";
        $this->Players_ADD_TEAM_endpoint = $servidor["players"]."/PaintballSocialNetwork-Players/Players/Experiences/";
        $this->listar_times_de_um_jogador = $servidor["players"]."/PaintballSocialNetwork-Players/Players/:idjogadorlogado/Experiences";
        $this->delete_experiencia = $servidor["players"]."/PaintballSocialNetwork-Players/Players/:idjogadorlogado/Experiences/:idexperiencia";
        $this->editar_experiencia = $servidor["players"]."/PaintballSocialNetwork-Players/Players/:idjogadorlogado/Experiences/:idexperiencia/";
        $this->ProcurarJogadores = $servidor["players"]."/PaintballSocialNetwork-Players/SearchPlayers/";
        $this->DeletarJogador = $servidor["players"]."/PaintballSocialNetwork-Players/Players/:idjogadorlogado/";


        //ROTAS de UI
        $this->NewUser_endpoint_UI = $servidor["UI"]."/PaintballSocialNetwork/NewUser/";
        $this->ProcurarTimesUI = $servidor["UI"]."/PaintballSocialNetwork/SearchTeams/";
        $this->excluir_experiencia = $servidor["UI"]."/PaintballSocialNetwork/MyProfile/Experiences/:idexperiencia/Remove";
        $this->editar_experienciaUI = $servidor["UI"]."/PaintballSocialNetwork/MyProfile/Experiences/:idexperiencia/Edit";
        $this->MyProfileUI = $servidor["UI"]."/PaintballSocialNetwork/MyProfile/";
        $this->LogoutUI = $servidor["UI"]."/PaintballSocialNetwork/Logout/";
        $this->LoginUI = $servidor["UI"]."/PaintballSocialNetwork/Login";
        $this->ProcurarJogadoresUI = $servidor["UI"]."/PaintballSocialNetwork/SearchPlayers/";
        $this->CampeonatosUI = $servidor["UI"]."/PaintballSocialNetwork/Tournaments/";
        $this->NovoCampeonatoUI = $servidor["UI"]."/PaintballSocialNetwork/Tournaments/New/";
        $this->EditCampeonatoUI = $servidor["UI"]."/PaintballSocialNetwork/Tournaments/:idtorneio/";
        $this->DeleteCampeonatoUI = $servidor["UI"]."/PaintballSocialNetwork/Tournaments/:idtorneio/Delete";
        $this->CampeonatoEtapasUI = $servidor["UI"]."/PaintballSocialNetwork/Tournaments/:idtorneio/Etapas/";
        $this->NovaEtapaUI = $servidor["UI"]."/PaintballSocialNetwork/Tournaments/:idtorneio/Etapas/New/";
        $this->EtapaEditUI = $servidor["UI"]."/PaintballSocialNetwork/Tournaments/:idtorneio/Etapas/:idevento/Edit/";
        $this->EtapaDeleteUI = $servidor["UI"]."/PaintballSocialNetwork/Tournaments/:idtorneio/Etapas/:idevento/Delete";
        $this->Editar_Squad = $servidor["UI"]."/PaintballSocialNetwork/MySquads/:idtime/";
        $this->MeusTimes = $servidor["UI"]."/PaintballSocialNetwork/MySquads/";
        $this->CriarMeuTime = $servidor["UI"]."/PaintballSocialNetwork/MySquads/New/";







        //ROTAS de CAMPEONATO
        $this->Campeonatos = $servidor["campeonato"]."/PaintballSocialNetwork-Championship/Tournaments/";
        $this->getCampeonato = $servidor["campeonato"]."/PaintballSocialNetwork-Championship/Tournaments/:idtorneio/";
        $this->NovoCampeonato = $servidor["campeonato"]."/PaintballSocialNetwork-Championship/Tournaments/";
        $this->NovoCampeonatoAlterar = $servidor["campeonato"]."/PaintballSocialNetwork-Championship/Tournaments/:idtorneio/";
        $this->CampeonatoEtapas = $servidor["campeonato"]."/PaintballSocialNetwork-Championship/Tournaments/:idtorneio/Etapas/";
        $this->NovaEtapa = $servidor["campeonato"]."/PaintballSocialNetwork-Championship/Tournaments/:idtorneio/Etapas/";
        $this->getEtapa = $servidor["campeonato"]."/PaintballSocialNetwork-Championship/Tournaments/:idtorneio/Etapas/:idetapa/";
        $this->AlterarEtapa = $servidor["campeonato"]."/PaintballSocialNetwork-Championship/Tournaments/:idtorneio/Etapas/:idetapa/";
        $this->getCampeonatosEventos = $servidor["campeonato"]."/PaintballSocialNetwork-Championship/Tournaments/Etapas/";
        $this->getEventos = $servidor["campeonato"]."/PaintballSocialNetwork-Championship/Tournaments/Etapas/";
        $this->deleteCampeonato = $servidor["campeonato"]."/PaintballSocialNetwork-Championship/Tournaments/:idtorneio/";
        $this->deleteEtapa = $servidor["campeonato"]."/PaintballSocialNetwork-Championship/Tournaments/:idtorneio/Etapas/:idetapa/";





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
