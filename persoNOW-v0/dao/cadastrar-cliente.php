<?php

    function cadastro($data, $id){
            try {
               require_once 'connection.php';

                $sql = "INSERT INTO cliente(id, nome, email, senha, genero, data_nascimento, peso, altura)
                            VALUES(:id, :nome, :email, :senha, :genero, :datanasc, :peso, :altura)";

                $stmt = $pdo->prepare($sql);
        
                $stmt->bindValue(":id", $id);
                $stmt->bindValue(":nome", $data['nome']);
                $stmt->bindValue(":email", $data['email']);
                $stmt->bindValue(":senha", $data['senha']);
                $stmt->bindValue(":genero", $data['genero']);
                $stmt->bindValue('datanasc', $data['data_nasc']);
                $stmt->bindValue(":peso", $data['peso']);
                $stmt->bindValue(":altura", $data['altura']);
        
                if($stmt->execute()){
                    echo 'irru deu bão';
                }
            } catch (Exception $e) {
                echo $e;
            }
        }
?>
