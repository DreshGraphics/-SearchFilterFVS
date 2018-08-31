<?php

require_once 'conexao.php';


function listaPorFiltro($campo, $valorCampo,$curso){	
  try {

    $con = getConexao(); 

    $prepare = $con->prepare('SELECT * FROM artigo WHERE '.$campo.' LIKE "%'.$valorCampo.'%" AND Curso ="'.$curso.'"');
	
    $prepare->execute();

    return $prepare->fetchAll(PDO::FETCH_ASSOC);
  }catch(Exception $e){
     return array();
  }
}

function listaTodos(){	
  try {

    $con = getConexao(); 

    $prepare = $con->prepare('SELECT * FROM artigo');
	
    $prepare->execute();

    return $prepare->fetchAll(PDO::FETCH_ASSOC);
  }catch(Exception $e){
     return array();
  }
}



/*<td><?php echo strlen($artigo['Resumo']) >100 ? substr($artigo['Resumo'], 0, 100) : $artigo['Resumo'] ?></td>*/

?>