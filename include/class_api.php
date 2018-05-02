<?php
namespace raiz;
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

class class_API
{

    function __construct( ){


    }

    function CallAPI($method, $url, $data = false)
    {
        GLOBAL $verbose;

        $curl = curl_init();
        $verbose=1;
        set_time_limit(10);

        switch ($method)
        {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data){
                    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                }
                if ($verbose) $debug.= " <BR><FONT COLOR='red'> curl -H 'Content-Type: application/json' -X $method -d '$data' $url </FONT>";

            break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($curl, CURLOPT_POSTFIELDS,http_build_query(json_decode($data)));

                if ($verbose) $debug .=  " <BR><FONT COLOR='green'> curl -H 'Content-Type: application/json' -X $method -d '$data' $url </FONT> ";
                break;

            case "DELETE":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            //    curl_setopt($curl, CURLOPT_POSTFIELDS,http_build_query(json_decode($data)));

                if ($verbose) $debug .=  " <BR><FONT COLOR='green'> curl -H 'Content-Type: application/json' -X $method -d '$data' $url </FONT> ";
                break;

            default:
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
                if ($verbose) $debug.=  " <BR> <FONT COLOR='#9acd32'>   $url </FONT> ";
                if ($data) $url = sprintf("%s?%s", $url, http_build_query($data));

        }
        // Optional Authentication:
        //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        //curl_setopt($curl, CURLOPT_USERPWD, "username:password");
        try {
            ini_set('display_errors', '1');

            curl_setopt($curl, CURLOPT_URL, $url);
//            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//            curl_setopt($curl, CURLOPT_VERBOSE, true);
            curl_setopt($curl, CURLOPT_TIMEOUT, 5);

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

//            $result = (curl_exec($curl) or die("ERRO DO CURL ".curl_error($ch)));
            $result = curl_exec($curl);
//            echo curl_error($curl);



            $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            if ($http_code != 200) echo $debug." <- Curl (HTTP CODE: $http_code): ";
           // IF ($verbose == 1)echo $debug." <- Curl (HTTP CODE: $http_code): ";
            $teste_json_result = $result;


            json_decode($teste_json_result);

            if  (json_last_error() == JSON_ERROR_NONE){
              //  if ($verbose)   echo $debug."Sucesso Curl ($http_code): ";
                curl_close($curl);
                return  json_decode( $result , true);
            }
            else{
                //if ($verbose)  echo $debug."Erro Curl: ";

                curl_close($curl);
                return  $result;

            }

        } catch (Exception $e) {
            echo $debug. $e->getMessage()." Exception Curl: HTTPD CODE:$http_code ";

            return false;
        }



    }

}
