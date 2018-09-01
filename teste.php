<?php

include_once 'sql/conexao.php';

$con = getConexao();

$result_pg = $con->prepare('SELECT COUNT(IDArtigo) AS num_result FROM Artigo');

$result_pg->execute();

$num_result = $result_pg->fetch(PDO::FETCH_ASSOC);

$result_pg->closeCursor();

echo "Existem " .$num_result['num_result']. " Registros";

$quantidade_pg = ceil(intval($row_pg['num_result']) / $qnt_result_pg);