<?php
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);
require('vendor/autoload.php');

class RegressionTest extends PHPUnit\Framework\TestCase
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

    /*
    public function testCriandoUsuario()
    {
        set_time_limit(10);
        $this->rand = rand(500,8500);
        $this->nome = "test Player John Doe ".$this->rand;
        $this->email = $this->rand."@test.com";
        $this->senha = $senha1 = "$this->rand";
        $senha2 = "$this->rand";

        echo " \n Iniciando Regressao, ".$this->email."/".$this->senha;


        $JSON = json_decode( "  {\"nome\":\"".$this->nome."\",\"email\":\"". $this->email."\",\"senha1\":\"$senha1\",\"senha2\":\"$senha2\",\"usuarioTeste\":\"1\"} " , true);
        if ($JSON == NULL ) die(" JSON erro de formacao");

        $trans = null;$trans = array(":idtorneio" => null );
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
            echo " \n Usuario Criado. IdJogador:".$this->idjogador;


        }
        $this->assertEquals('SUCESSO', $jsonRetorno["resultado"] );
        $this->Logando();


    }

    public function Logando()
    {

        $JSON = json_decode( "  {\"email\":\"".$this->email."\",\"senha\":\"".$this->senha."\" } " , true);
        if ($JSON == NULL ) die(" JSON erro de formacao");

        //var_dump( $this->idjogador);
        $response = $this->client -> request('POST', $this->Globais->Authentication_endpoint

            ,array(
                'headers' => array('Content-type' => 'application/x-www-form-urlencoded'),
                'form_params' => $JSON,
                'timeout' => 10,

            )
        );
        $jsonRetorno = json_decode($response->getBody()->getContents() ,1);
        //var_dump(  $jsonRetorno );

        if ($jsonRetorno["resultado"] != "SUCESSO"){
            echo $response->getBody();
        }

        else
            echo "\n Logado";

        $this->assertEquals(   'SUCESSO',  $jsonRetorno["resultado"]  );
        $this->AtualizaPerfil();
    }

    public function AtualizaPerfil()
    {


        $this->nome .= " Alterado";
        $this->playsince = "2010";
        $this->idade = "78";
        $this->cidade = "Dublin";

        $this->posicao["Snake"] = ">5";
        $this->posicao["SnakeCorner"] = ">5";
        $this->posicao["BackCenter"] = ">5";
        $this->posicao["Doritos"] = ">5";
        $this->posicao["DoritosCorner"] = ">5";
        $this->posicao["Coach"] = ">5";

        $this->treino["Domingo"] = "2010";
        $this->treino["Segunda"] = "2010";
        $this->treino["Terca"] = "2010";
        $this->treino["Quarta"] = "2010";
        $this->treino["Quinta"] = "2010";
        $this->treino["Sexta"] = "2010";
        $this->treino["Sabado"] = "2010";
        $this->nivelcompeticao = "D1";

        $this->procurando["Snake"] = "Snake";
        $this->procurando["SnakeCorner"] = "SnakeCorner";
        $this->procurando["BackCenter"] = "BackCenter";
        $this->procurando["Doritos"] = "Doritos";
        $this->procurando["DoritosCorner"] = "DoritosCorner";
        $this->procurando["Coach"] = "Coach";

        $JSON = json_decode( " {\"nome\":\"".$this->nome."\",\"playsince\":\"".$this->playsince."\" ,\"foto\":{\"name\":\"\",\"type\":\"\",\"tmp_name\":\"\",\"error\":4,\"size\":0},\"idade\":\"".$this->idade."\",\"cidade\":\"".$this->cidade."\",\"Snake\":\"".$this->posicao["Snake"]."\",\"SnakeCorner\":\"".$this->posicao["SnakeCorner"]."\",\"BackCenter\":\"".$this->posicao["BackCenter"]."\",\"Doritos\":\"".$this->posicao["Doritos"]."\",\"DoritosCorner\":\"".$this->posicao["DoritosCorner"]."\",\"Coach\":\"".$this->posicao["Coach"]."\",\"treino\":{\"Domingo\":\"".$this->treino["Domingo"]."\",\"Segunda\":\"".$this->treino["Segunda"]."\",\"Terca\":\"".$this->treino["Terca"]."\",\"Quarta\":\"".$this->treino["Quarta"]."\",\"Quinta\":\"".$this->treino["Quinta"]."\",\"Sexta\":\"".$this->treino["Sexta"]."\",\"Sabado\":\"".$this->treino["Sabado"]."\"},\"nivelcompeticao\":\"".$this->nivelcompeticao."\",\"procurando\":{\"Snake\":\"".$this->procurando["Snake"]."\",\"SnakeCorner\":\"".$this->procurando["SnakeCorner"]."\",\"BackCenter\":\"".$this->procurando["BackCenter"]."\",\"Coach\":\"".$this->procurando["Coach"]."\",\"DoritosCorner\":\"".$this->procurando["DoritosCorner"]."\",\"Doritos\":\"".$this->procurando["Doritos"]."\"} }" , true);
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


        $this->novotime="test Time `Regressao de Jogador` ".$this->rand;
        $inicioTime = "02/1998 ";
        $fimTime = "";

        $campeonatojogandode = "Snake Corner";
        $rank = 3;
        $idevento = 9;
        $divisionexperience= "D1";

        $idtime="";

        $JSON = json_decode( " {\"time\":\"". $this->novotime."\",\"inicio\":\"$inicioTime\",\"idtime\":\"$idtime\",\"posicao\":[\"$campeonatojogandode\"],\"rank\":[\"$rank\"],\"idevento\":[\"$idevento\"],\"division\":[\"$divisionexperience\"],\"fim\":\"$fimTime\",\"resultados\":null,\"idjogadorlogado\":".$this->idjogador."} " , true);

        if ($JSON == NULL ) die(" JSON erro de formacao");

        $trans = null;$trans = array(":idjogadorlogado" => $this->idjogador);
        //var_dump($JSON);
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

            $this->DeletarExperience();
        }
    }

    public function DeletarExperience()
    {

        set_time_limit(5);



        //var_dump($JSON);

        $trans = null;$trans = array(":idjogadorlogado" => $this->idjogador,":idexperiencia" => $this->idexperience );
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
            echo "\n Experience deletada ";

            $this->assertEquals('SUCESSO', $jsonRetorno["resultado"] );

            $this->ReAdicionarMeuTimeaoMeuCurriculo();
        }
    }

    public function ReAdicionarMeuTimeaoMeuCurriculo()
    {

        $inicioTime = "02/1998 ";
        $fimTime = "";

        $campeonatojogandode = "Doritos";
        $rank = 2;
        $idevento = 9;
        $divisionexperience= "D2";

        $JSON = json_decode( " {\"time\":\"NAODEVIAAPARECER\",\"inicio\":\"$inicioTime\",\"idtime\":\"".$this->idtime."\",\"posicao\":[\"$campeonatojogandode\"],\"rank\":[\"$rank\"],\"idevento\":[\"$idevento\"],\"division\":[\"$divisionexperience\"],\"fim\":\"$fimTime\",\"resultados\":null,\"idjogadorlogado\":".$this->idjogador."} " , true);

        if ($JSON == NULL ) die(" JSON erro de formacao");

        $trans = null;$trans = array(":idjogadorlogado" => $this->idjogador);
        //var_dump($JSON);
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
            var_dump($JSON);
            echo "\n retorno da api: ".$response->getBody();
        }
        else{
            echo "\n Time `".$this->novotime."` re-associado ao jogador";

            $this->idexperience = $jsonRetorno["idexperience"];
            $this->ideventos = $jsonRetorno["ideventos"];
            $this->assertEquals('SUCESSO', $jsonRetorno["resultado"] );

            $this->EditarExperiences();
        }
    }

    public function EditarExperiences()
    {

        set_time_limit(5);

        $inicioTime = "02/2008 ";
        $fimTime = "";

        $campeonatojogandode[ $this->ideventos[0] ] = "Coach";
        $rank[ $this->ideventos[0] ] = 1;
        $idevento[ $this->ideventos[0] ] = 9;
        $divisionexperience[ $this->ideventos[0] ] = "D3";

//"time":"Legiao Carioca",
        $JSONraw = ( "  {\"inicio\":\"$inicioTime\",\"fim\":\"$fimTime\",\"idtime\":\"".$this->idtime."\",\"resultados\":null,\"idjogadorlogado\":".$this->idjogador.",\"rank\":{\"".$this->ideventos[0]."\":\"".$rank[ $this->ideventos[0] ]."\"} ,\"posicao\":{\"".$this->ideventos[0]."\":\"".$campeonatojogandode[ $this->ideventos[0] ]."\"} ,\"idevento\": {\"".$this->ideventos[0]."\":\"".$idevento[ $this->ideventos[0] ]."\"},\"division\":null }" );
        $JSON = json_decode($JSONraw,true);

        if ($JSON == NULL ) {  var_dump($JSONraw);die(" \n JSON erro de formacao"); }

        $trans = null;$trans = array(":idjogadorlogado" => $this->idjogador,":idexperiencia" => $this->idexperience );

        $response = $this->client->request('PUT', strtr($this->Globais->editar_experiencia, $trans)

            , array(
                'headers' => array('Content-type' => 'application/x-www-form-urlencoded'),
                'timeout' => 10, // Response timeout
                'form_params' => $JSON,
                'connect_timeout' => 10 // Connection timeout


            )
        );
        $jsonRetorno = json_decode($response->getBody()->getContents(), 1);

        if ($jsonRetorno["resultado"] != "SUCESSO"){
            var_dump($JSON);
            echo "\n retorno da api: ".$response->getBody();
        }
        else{
            echo "\n Experiencia `".$this->idexperience."` editada";

           // $this->idexperience = $jsonRetorno["idexperience"];
            $this->ideventos = $jsonRetorno["ideventos"];
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

            $this->DeletarExperienceSobrou();
        }
    }

    public function DeletarExperienceSobrou()
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
            echo "\n Experience deletada ";

            $this->assertEquals('SUCESSO', $jsonRetorno["resultado"] );

          //  $this->ReAdicionarMeuTimeaoMeuCurriculo();
        }
    }
    */

}
