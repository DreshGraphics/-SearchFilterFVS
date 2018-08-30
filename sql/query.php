<?php

require_once 'conexao.php';

function lista(){
  try {
    $con = getConexao();

    $prepare = $con->prepare('SELECT * FROM Artigo');

    $prepare->execute();

    return $prepare->fetchAll(PDO::FETCH_ASSOC);
  }catch(Exception $e){
     return array();
  }
}


/*<td><?php echo strlen($artigo['Resumo']) >100 ? substr($artigo['Resumo'], 0, 100) : $artigo['Resumo'] ?></td>*/