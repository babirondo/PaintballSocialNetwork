<?php
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);
require('vendor/autoload.php');

class RegressionSquadOwnerTest extends PHPUnit\Framework\TestCase
{

    protected $client;
    public $nome;
    public $idjogador;
    public $email;
    public $senha;

    protected function setUp()
    {
        $this->client = new GuzzleHttp\Client( );

        require_once("include/globais.php");

        $this->Globais = new raiz\Globais();

    }
    

    public function testGet_HealthCheck()
    {
        $response = $this->client->request('GET', $this->Globais->healthcheck
            , array(
                'headers' => array('Content-type' => 'application/x-www-form-urlencoded'),
                'timeout' => 10, // Response timeout
                'connect_timeout' => 10 // Connection timeout
            )
        );
        $jsonRetorno = json_decode($response->getBody()->getContents(), 1);
        //var_dump(  $jsonRetorno );
        $this->assertEquals('SUCESSO', $jsonRetorno["resultado"]);
    }    
/*
    public function testCriandoUsuario()
    {
        set_time_limit(10);

        $this->rand = rand(500,8500);
        $this->nome = "test Squad Owner John Doe ".$this->rand;
        $this->email = $this->rand."@test.com";
        $this->senha = $senha1 = "$this->rand";
        $senha2 = "$this->rand";

        echo " \n Iniciando Regressao, ".$this->email."/".$this->senha;


        $JSON = json_decode( "  {\"nome\":\"".$this->nome."\",\"email\":\"". $this->email."\",\"senha1\":\"$senha1\",\"senha2\":\"$senha2\",\"usuarioTeste\":\"1\"} " , true);
        if ($JSON == NULL ) die(" JSON erro de formacao");

        $trans = null;$trans = array(":idtorneio" => null );
        //var_dump( strtr($this->Globais->NewUser_endpoint, $trans));exit;

        $response = $this->client->request('POST', strtr($this->Globais->NewUser_endpoint, $trans)

            , array(
                'headers' => array('Content-type' => 'application/x-www-form-urlencoded'),
                'timeout' => 10, // Response timeout
                'form_params' => $JSON,
                'connect_timeout' => 10 // Connection timeout


            )
        );
        $jsonRetorno = json_decode($response->getBody()->getContents(), 1);
        $this->idjogador= $jsonRetorno["idjogador"];



        if ($jsonRetorno["resultado"] != "SUCESSO"){
            echo $response->getBody();
        }
        else{
            echo " \n Usuario Criado";
            $this->Logando();
        }
        $this->assertEquals('SUCESSO', $jsonRetorno["resultado"] );
    }

    public function Logando()
    {


        $JSONraw = ( "  {\"email\":\"".$this->email."\",\"senha\":\"".$this->senha."\" } " );
        $JSON = json_decode( $JSONraw , true);
        //var_dump($JSON);

        if ($JSON == NULL ) die(" JSON erro de formacao");

        //var_dump( $this->idjogador);
        $response = $this->client -> request('POST', $this->Globais->Authentication_endpoint
            ,array(
                'headers' => array('Content-type' => 'application/x-www-form-urlencoded'),
                'form_params' => $JSON,
                'timeout' => 10,
            )
        );
        $jsonRetorno = json_decode($response->getBody()->getContents(), 1);

        if ($jsonRetorno["resultado"] != "SUCESSO"){
            echo "\n retorno da api: ".$jsonRetorno["resultado"].$response->getBody();
        }
        else{
            echo "\n Logado";
    //        $this->idexperience = $jsonRetorno["idexperience"];
//            $this->ideventos = $jsonRetorno["ideventos"];
//            $this->idtime = $jsonRetorno["idtime"];

            $this->AtualizaPerfil();
            $this->assertEquals(   'SUCESSO',  $jsonRetorno["resultado"]  );
        }
    }

    public function AtualizaPerfil()
    {


        $this->nome .= " Alterado";
        $this->playsince = "2010";
        $this->idade = "78";

        $this->cidade = "Dublin";
        $this->nivelcompeticao = "D1";

        $this->posicao["Snake"] = ">5";
        $this->posicao["SnakeCorner"] = ">5";
        $this->posicao["BackCenter"] = ">5";
        $this->posicao["Doritos"] = ">5";
        $this->posicao["DoritosCorner"] = ">5";
        $this->posicao["Coach"] = ">5";

        $this->treino["Domingo"] = "Domingo";
        $this->treino["Segunda"] = "Segunda";
        $this->treino["Terca"] = "Terca";
        $this->treino["Quarta"] = "Quarta";
        $this->treino["Quinta"] = "Quinta";
        $this->treino["Sexta"] = "Sexta";
        $this->treino["Sabado"] = "Sabado";

        $this->procurando["Snake"] = "Snake";
        $this->procurando["SnakeCorner"] = "SnakeCorner";
        $this->procurando["BackCenter"] = "BackCenter";
        $this->procurando["Doritos"] = "Doritos";
        $this->procurando["DoritosCorner"] = "DoritosCorner";
        $this->procurando["Coach"] = "Coach";

        $JSONraw =  ( " {\"nome\":\"".$this->nome."\",\"playsince\":\"".$this->playsince."\" ,\"foto\":{\"name\":\"\",\"type\":\"\",\"tmp_name\":\"\",\"error\":4,\"size\":0},\"idade\":\"".$this->idade."\",\"cidade\":\"".$this->cidade."\",\"Snake\":\"".$this->posicao["Snake"]."\",\"SnakeCorner\":\"".$this->posicao["SnakeCorner"]."\",\"BackCenter\":\"".$this->posicao["BackCenter"]."\",\"Doritos\":\"".$this->posicao["Doritos"]."\",\"DoritosCorner\":\"".$this->posicao["DoritosCorner"]."\",\"Coach\":\"".$this->posicao["Coach"]."\",\"treino\":{\"Domingo\":\"".$this->treino["Domingo"]."\",\"Segunda\":\"".$this->treino["Segunda"]."\",\"Terca\":\"".$this->treino["Terca"]."\",\"Quarta\":\"".$this->treino["Quarta"]."\",\"Quinta\":\"".$this->treino["Quinta"]."\",\"Sexta\":\"".$this->treino["Sexta"]."\",\"Sabado\":\"".$this->treino["Sabado"]."\"},\"nivelcompeticao\":\"".$this->nivelcompeticao."\",      \"procurando\":{\"Doritos\":\"".$this->procurando["Doritos"]."\",\"DoritosCorner\":\"".$this->procurando["DoritosCorner"]."\",\"BackCenter\":\"".$this->procurando["BackCenter"]."\",\"Snake\":\"".$this->procurando["Snake"]."\",\"SnakeCorner\":\"".$this->procurando["SnakeCorner"]."\",\"Coach\":\"".$this->procurando["Coach"]."\"}  }" );
        $JSON = json_decode( $JSONraw , true);

        //var_dump($JSON);

        if ($JSON == NULL ) die(" JSON erro de formacao");

        $trans = null;$trans = array(":idjogadorlogado" => $this->idjogador);
        $response = $this->client->request('PUT', strtr($this->Globais->Players_UPDATE_endpoint, $trans)

            , array(
                'headers' => array('Content-type' => 'application/x-www-form-urlencoded'),
                'form_params' => $JSON,
                'timeout' => 10,


            )
        );
        $jsonRetorno = json_decode($response->getBody()->getContents(), 1);

        if ($jsonRetorno["resultado"] != "SUCESSO"){
            echo $response->getBody();
        }

        else{
            echo "\n Profile atualizado";
            $this->assertEquals('SUCESSO', $jsonRetorno["resultado"] );
            $this->AdicionarMeuTimeaoMeuCurriculo();
        }
    }


    public function AdicionarMeuTimeaoMeuCurriculo()
    {


        $this->novotime="test Time `Criado pelo Owner` ".$this->rand;
        $inicioTime = "02/2018 ";
        $fimTime = "";

        $campeonatojogandode = "";
        $rank = "";
        $idevento = "";
        $divisionexperience= "";

        $idtime="";

        $JSONraw =  ( " {\"time\":\"". $this->novotime."\",\"inicio\":\"$inicioTime\",\"idtime\":\"$idtime\",\"posicao\":[\"$campeonatojogandode\"],\"rank\":[\"$rank\"],\"idevento\":[\"$idevento\"],\"division\":[\"$divisionexperience\"],\"fim\":\"$fimTime\",\"resultados\":null,\"idjogadorlogado\":".$this->idjogador."} " );
        $JSON = json_decode( $JSONraw , true);

        if ($JSON == NULL ) die(" JSON erro de formacao");

        $trans = null;$trans = array(":idjogadorlogado" => $this->idjogador);

        //echo " \n "; var_dump( strtr($this->Globais->Players_ADD_TEAM_endpoint, $trans) );
        //echo " \n "; var_dump( $JSON );

        $response = $this->client->request('POST', strtr($this->Globais->Players_ADD_TEAM_endpoint, $trans)

            , array(
                'headers' => array('Content-type' => 'application/x-www-form-urlencoded'),
                'form_params' => $JSON,
                'timeout' => 10, // Response timeout
                'connect_timeout' => 10 // Connection timeout


            )
        );

        $jsonRetorno = json_decode($response->getBody()->getContents(), 1);

        if ($jsonRetorno["resultado"] != "SUCESSO"){
            echo "\n retorno da api: ".$jsonRetorno["resultado"].$response->getBody();
        }
        else{
            echo "\n Time `". $this->novotime."` (como owner) associado ao jogador";
            $this->idexperience = $jsonRetorno["idexperience"];
            $this->ideventos = $jsonRetorno["ideventos"];
            $this->idtime = $jsonRetorno["idtime"];
            $this->assertEquals('SUCESSO', $jsonRetorno["resultado"] );

            $this->AlterandoDadosMeuTime_Owner();
        }
    }

    public function AlterandoDadosMeuTime_Owner()
    {

        set_time_limit(10);


        $this->novotime="test Time `Criado pelo Owner` ALTERADO ".$this->rand;

        $this->nivelcompeticao = "D1";
        $this->cidade = "Dublin";

        $this->procurando["Snake"] = "Snake";
        $this->procurando["SnakeCorner"] = "";
        $this->procurando["BackCenter"] = "BackCenter";
        $this->procurando["Doritos"] = "Doritos";
        $this->procurando["DoritosCorner"] = "DoritosCorner";
        $this->procurando["Coach"] = "";

        $this->treino["Domingo"] = "Domingo";
        $this->treino["Segunda"] = "Segunda";
        $this->treino["Terca"] = "";
        $this->treino["Quarta"] = "";
        $this->treino["Quinta"] = "";
        $this->treino["Sexta"] = "Sexta";
        $this->treino["Sabado"] = "Sabado";

        $JSON = json_decode( " {\"time\":\"".$this->novotime."\",\"treino\":{\"Domingo\":\"".$this->treino["Domingo"]."\",\"Segunda\":\"".$this->treino["Segunda"]."\",\"Terca\":\"".$this->treino["Terca"]."\",\"Quarta\":\"".$this->treino["Quarta"]."\",\"Quinta\":\"".$this->treino["Quinta"]."\",\"Sexta\":\"".$this->treino["Sexta"]."\",\"Sabado\":\"".$this->treino["Sabado"]."\"},\"nivelcompeticao\":\"".$this->nivelcompeticao."\",\"procurando\":{\"Doritos\":\"".$this->procurando["Doritos"]."\",\"DoritosCorner\":\"".$this->procurando["DoritosCorner"]."\",\"BackCenter\":\"".$this->procurando["BackCenter"]."\",\"Snake\":\"".$this->procurando["Snake"]."\",\"SnakeCorner\":\"".$this->procurando["SnakeCorner"]."\",\"Coach\":\"".$this->procurando["Coach"]."\"},\"localtreino\":\"".$this->cidade ."\",\"foto\":{\"name\":\"\",\"type\":\"\",\"tmp_name\":\"\",\"error\":4,\"size\":0},\"idtime\":\"".$this->idtime."\"} " , true);
        if ($JSON == NULL ) die(" JSON erro de formacao");

        $trans = null;$trans = array(":idjogadorlogado" => $this->idjogador );
        //var_dump(strtr($this->Globais->MeusTimesRemoto, $trans));

        $response = $this->client->request('PUT', strtr($this->Globais->CriarMeuTimeSalvar, $trans)

            , array(
                'headers' => array('Content-type' => 'application/x-www-form-urlencoded'),
                'timeout' => 10, // Response timeout
                'form_params' => $JSON,
                'connect_timeout' => 10 ,// Connection timeout,



            )
        );
        $jsonRetorno = json_decode($response->getBody()->getContents(), 1);
        if ($jsonRetorno["resultado"] != "SUCESSO"){
            echo "\n retorno da api: ".$jsonRetorno["resultado"].$response->getBody();
        }
        else{
            echo "\n Time `". $this->novotime."` (como owner) associado ao jogador";
           // $this->idexperience = $jsonRetorno["idexperience"];
            $this->ideventos = $jsonRetorno["ideventos"];
            $this->idtime = $jsonRetorno["idtime"];
            $this->assertEquals('SUCESSO', $jsonRetorno["resultado"] );

              $this->CriandoNovoTime_Owner();
        }
    }


    public function CriandoNovoTime_Owner()
    {

        set_time_limit(10);

        $this->novotimeB="test Time `MySquad Owner`  ".$this->rand;

        $this->nivelcompeticao = "D5";
        $this->cidade = "Dublin";

        $this->procurando["Snake"] = "Snake";
        $this->procurando["SnakeCorner"] = "";
        $this->procurando["BackCenter"] = "";
        $this->procurando["Doritos"] = "Doritos";
        $this->procurando["DoritosCorner"] = "";
        $this->procurando["Coach"] = "";

        $this->treino["Domingo"] = "";
        $this->treino["Segunda"] = "Segunda";
        $this->treino["Terca"] = "";
        $this->treino["Quarta"] = "";
        $this->treino["Quinta"] = "";
        $this->treino["Sexta"] = "Sexta";
        $this->treino["Sabado"] = "";

        $JSON = json_decode( " {\"time\":\"$this->novotimeB\", \"treino\":{\"Domingo\":\"".$this->treino["Domingo"]."\",\"Segunda\":\"".$this->treino["Segunda"]."\",\"Terca\":\"".$this->treino["Terca"]."\",\"Quarta\":\"".$this->treino["Quarta"]."\",\"Quinta\":\"".$this->treino["Quinta"]."\",\"Sexta\":\"".$this->treino["Sexta"]."\",\"Sabado\":\"".$this->treino["Sabado"]."\"},\"nivelcompeticao\":\"".$this->nivelcompeticao."\",\"procurando\":{\"Doritos\":\"".$this->procurando["Doritos"]."\",\"DoritosCorner\":\"".$this->procurando["DoritosCorner"]."\",\"BackCenter\":\"".$this->procurando["BackCenter"]."\",\"Snake\":\"".$this->procurando["Snake"]."\",\"SnakeCorner\":\"".$this->procurando["SnakeCorner"]."\",\"Coach\":\"".$this->procurando["Coach"]."\"},\"localtreino\":\"".$this->cidade ."\",\"foto\":{\"name\":\"\",\"type\":\"\",\"tmp_name\":\"\",\"error\":4,\"size\":0}} " , true);
        if ($JSON == NULL ) die(" JSON erro de formacao");

        $trans = null;$trans = array(":idjogadorlogado" => $this->idjogador );
        //var_dump(strtr($this->Globais->MeusTimesRemoto, $trans));

        $response = $this->client->request('POST', strtr($this->Globais->CriarMeuTimeSalvar, $trans)

            , array(
                'headers' => array('Content-type' => 'application/x-www-form-urlencoded'),
                'timeout' => 10, // Response timeout
                'form_params' => $JSON,
                'connect_timeout' => 10 // Connection timeout


            )
        );
        $jsonRetorno = json_decode($response->getBody()->getContents(), 1);
        if ($jsonRetorno["resultado"] != "SUCESSO"){
            echo "\n retorno da api: ".$jsonRetorno["resultado"].$response->getBody();
        }
        else{
            echo "\n Time `". $this->novotimeB."` criado pelo owner ";
//            $this->idexperienceB = $jsonRetorno["idexperience"];
//            $this->ideventos = $jsonRetorno["ideventos"];
            $this->idtimeB = $jsonRetorno["idtime"];
            $this->assertEquals('SUCESSO', $jsonRetorno["resultado"] );

              $this->AssociandoaoCurriculoNovoTime_fromMySquad();
        }
    }
    public function AssociandoaoCurriculoNovoTime_fromMySquad()
    {


        //$this->novotime="test Time `Criado pelo Owner` ".$this->rand;
        $inicioTime = "05/2018 ";
        $fimTime = "";

        $campeonatojogandode = "";
        $rank = "";
        $idevento = "";
        $divisionexperience= "";

        $JSONraw =  ( " { \"inicio\":\"$inicioTime\",\"idtime\":\"".$this->idtimeB."\",\"posicao\":[\"$campeonatojogandode\"],\"rank\":[\"$rank\"],\"idevento\":[\"$idevento\"],\"division\":[\"$divisionexperience\"],\"fim\":\"$fimTime\",\"resultados\":null,\"idjogadorlogado\":".$this->idjogador."} " );
        $JSON = json_decode( $JSONraw , true);

        if ($JSON == NULL ) die(" JSON erro de formacao");

        $trans = null;$trans = array(":idjogadorlogado" => $this->idjogador);

        //echo " \n "; var_dump( strtr($this->Globais->Players_ADD_TEAM_endpoint, $trans) );
        //echo " \n "; var_dump( $JSON );

        $response = $this->client->request('POST', strtr($this->Globais->Players_ADD_TEAM_endpoint, $trans)

            , array(
                'headers' => array('Content-type' => 'application/x-www-form-urlencoded'),
                'form_params' => $JSON,
                'timeout' => 10, // Response timeout
                'connect_timeout' => 10 // Connection timeout


            )
        );

        $jsonRetorno = json_decode($response->getBody()->getContents(), 1);



        if ($jsonRetorno["resultado"] != "SUCESSO" || $response->getStatusCode() > 400 ){
            echo "\n retorno da api: ".$jsonRetorno["resultado"].$response->getBody();
        }
        else{
            echo "\n Time `". $this->novotimeB."` associado ao jogador";
            $this->idexperienceB = $jsonRetorno["idexperience"];
            $this->ideventos = $jsonRetorno["ideventos"];
            $this->idtime = $jsonRetorno["idtime"];
            $this->assertEquals('SUCESSO', $jsonRetorno["resultado"] );

            $this->DeletarJogador();
        }
    }
    public function DeletarJogador()
    {

        set_time_limit(5);

        $inicioTime = "02/2008 ";
        $fimTime = "";

        $JSONraw = ( "  { \"idjogadorlogado\":".$this->idjogador."}" );
        $JSON = json_decode($JSONraw,true);

        //var_dump($JSON);

        if ($JSON == NULL ) {  var_dump($JSONraw);die(" \n JSON erro de formacao"); }

        $trans = null;$trans = array(":idjogadorlogado" => $this->idjogador,":idexperiencia" => $this->idexperience );
//        var_dump( strtr($this->Globais->DeletarJogador, $trans));

        $response = $this->client->request('DELETE', strtr($this->Globais->DeletarJogador, $trans)

            , array(
                'headers' => array('Content-type' => 'application/x-www-form-urlencoded'),
                'timeout' => 10, // Response timeout
                'form_params' => $JSON,
                'connect_timeout' => 10 // Connection timeout


            )
        );
//        var_dump($response->getBody()->getContents());
        $jsonRetorno = json_decode($response->getBody()->getContents(), 1);
//        var_dump( $jsonRetorno);

        if ($jsonRetorno["resultado"] != "SUCESSO"){
            var_dump($JSON);
            echo "\n retorno da api: ".$response->getBody();
        }
        else{
            echo "\n Jogador `".$this->nome."` deletado";

            $this->assertEquals('SUCESSO', $jsonRetorno["resultado"] );

            $this->DeletarExperienceA();
        }
    }
    public function DeletarExperienceA()
    {

        set_time_limit(5);

        //var_dump($JSON);

        $trans = null;$trans = array(":idjogadorlogado" => $this->idjogador,":idexperiencia" => $this->idexperience );
        //var_dump( strtr($this->Globais->delete_experiencia, $trans));exit;
        $response = $this->client->request('DELETE', strtr($this->Globais->delete_experiencia, $trans)

            , array(
                'headers' => array('Content-type' => 'application/x-www-form-urlencoded'),
                'timeout' => 10, // Response timeout
                'connect_timeout' => 10 // Connection timeout


            )
        );
        $jsonRetorno = json_decode($response->getBody()->getContents(), 1);

        if ($jsonRetorno["resultado"] != "SUCESSO"){
            echo "\n retorno da api: ".$response->getBody();
        }
        else{
            echo "\n Experience A deletada ";

            $this->assertEquals('SUCESSO', $jsonRetorno["resultado"] );

              $this->DeletarExperienceB();
        }
    }
    public function DeletarExperienceB()
    {

        set_time_limit(5);

        //var_dump($JSON);

        $trans = null;$trans = array(":idjogadorlogado" => $this->idjogador,":idexperiencia" => $this->idexperienceB );
        //var_dump( strtr($this->Globais->delete_experiencia, $trans));exit;
        $response = $this->client->request('DELETE', strtr($this->Globais->delete_experiencia, $trans)

            , array(
                'headers' => array('Content-type' => 'application/x-www-form-urlencoded'),
                'timeout' => 10, // Response timeout
                'connect_timeout' => 10 // Connection timeout


            )
        );
        $jsonRetorno = json_decode($response->getBody()->getContents(), 1);

        if ($jsonRetorno["resultado"] != "SUCESSO"){
            echo "\n retorno da api: ".$response->getBody();
        }
        else{
            echo "\n Experience B deletada ";

            $this->assertEquals('SUCESSO', $jsonRetorno["resultado"] );

            //  $this->ReAdicionarMeuTimeaoMeuCurriculo();
        }
    }
*/
}
