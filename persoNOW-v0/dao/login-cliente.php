<?php

function logarCliente($email, $senha){

    session_start();

    try {
        require_once 'connection.php';

        $email = "'". $email . "'";
        $senha = "'" . $senha . "'";

        $sql = "SELECT * FROM cliente WHERE email = ${email}  AND senha = ${senha}";


        $stmt = $pdo->query($sql);

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['nome_usuario_logado'] = $row['nome'];
        }

        echo $_SESSION['id'];
        echo $_SESSION['nome_usuario_logado'];

    } catch (PDOException $ex) {
        echo $ex;
    }
}

?>