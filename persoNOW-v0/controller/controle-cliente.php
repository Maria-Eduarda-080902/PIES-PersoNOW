<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Headers: Content-Type");

include_once '../dao/cadastrar-cliente.php';
include_once '../dao/contar-clientes.php';
include_once '../dao/login-cliente.php';

    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);

    $func = $data['function'];

    if($func === 'logar'){
        logar($data);
    }
    elseif ($func === 'cadastrar') {
        cadastrar($data);
    }
    else if($func === 'nextId'){
        echo getProximoId();
    }

    function logar($data){
        $email = $data['email'];
        $senha = $data['senha'];

        logarCliente($email, $senha);
    }

    function cadastrar($data){
        $id = getProximoId();
        cadastro($data, $id);
    }

    function finalizarCadastro(){

    }

    function getProximoId(){
        return contarClientes() + 1;
    }



?>
