<?php

    function contarClientes(){
        require_once 'connection.php';

        $sql = 'SELECT COUNT(*) FROM cliente';

        $stmt = $pdo->query($sql);

        $numcli;
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $numcli = $row['count'];
        }

        return $numcli;
    }

?>