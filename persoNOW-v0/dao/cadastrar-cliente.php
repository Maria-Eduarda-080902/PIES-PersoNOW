<?php

include_once '../models/cliente.php';

    function cadastroDAO(Cliente $cli){
        require_once 'connection.php';
        

        if(!empty($cli)){
            try {
                $sql = "INSERT INTO cliente(id, nome, email, senha, cpf, telefone, genero, data_nascimento, bio, peso, altura)
                            VALUES(:id, :nome, :email, :senha, :cpf, :telefone, :genero, :datanasc, :bio, :peso, :altura)";
        
                $stmt = $pdo->prepare($sql);
        
                $stmt->bindValue(":id", $cli->getId());
                $stmt->bindValue(":nome", $cli->getNome());
                $stmt->bindValue(":email", $cli->getEmail());
                $stmt->bindValue(":senha", $cli->getSenha());
                $stmt->bindValue(":cpf",  $cli->getCpf());
                $stmt->bindValue(":telefone", $cli->getTelefone());
                $stmt->bindValue(":genero", $cli->getGenero());
                $stmt->bindValue(":bio", $cli->getBio());
                $stmt->bindValue('datanasc', $cli->getDataNasc());
                $stmt->bindValue(":peso", $cli->getPeso());
                $stmt->bindValue(":altura", $cli->getAltura());
        
                if($stmt->execute()){
                    echo 'irru deu bão';
                }
            } catch (\Exception $e) {
                echo 'deu ruim :/';
            }
        }
        else{
            header("Loation: crashcourse.php?msgErro=Erro de acesso.");
        }
    }
?>