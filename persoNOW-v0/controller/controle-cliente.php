<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Headers: Content-Type");

include_once '../models/cliente.php';
include_once '../dao/cadastrar-cliente.php';
include_once '../dao/contar-clientes.php';
include_once '../dao/login-cliente.php';

    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);

    $func = $data['function'];

    if($func === 'logar'){
        logar($data);
    }
    else if($func === 'nextId'){
        echo getProximoId();
    }

    function logar($data){
        $email = $data['email'];
        $senha = $data['senha'];

        logarCliente($email, $senha);
    }

//    function cadastrarCliente(){
//        $request_body = file_get_contents('php://input');
//        $data = json_decode($request_body, true);


//        $nome = $data['nome'];
//        $email = $data['email'];
//        $senha = $data['senha'];
//        cadastroDAO();
//    }

    function getProximoId(){
        return contarClientes() + 1;
    }



?>
