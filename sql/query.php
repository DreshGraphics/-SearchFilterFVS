<?php

require_once 'conexao.php';


function listaPorFiltro($campo, $valorCampo,$curso){	
  try {

    $con = getConexao(); 
    
    if($campo == "PalavraP" && $curso == "default"){
    	$prepare = $con->prepare('SELECT * FROM artigo WHERE (Curso LIKE "%'.$valorCampo.'%" OR Titulo LIKE"%'.$valorCampo.'%" OR Autor LIKE"%'.$valorCampo.'%" OR Orientador LIKE"%'.$valorCampo.'%") ORDER BY IDArtigo DESC');
    }else if($campo == "PalavraP" && $curso != "default"){
    	$prepare = $con->prepare('SELECT * FROM artigo WHERE (Curso LIKE "%'.$curso.'%" AND (Titulo LIKE"%'.$valorCampo.'%" OR Autor LIKE"%'.$valorCampo.'%" OR Orientador LIKE"%'.$valorCampo.'%")) ORDER BY IDArtigo DESC');
    }
    if($campo != "PalavraP" && $curso != "default"){
    	$prepare = $con->prepare('SELECT * FROM artigo WHERE '.$campo.' LIKE "%'.$valorCampo.'%" AND Curso ="'.$curso.'"ORDER BY IDArtigo DESC');
    }else if($campo != "PalavraP" && $curso = "default"){
    	$prepare = $con->prepare('SELECT * FROM artigo WHERE '.$campo.' LIKE "%'.$valorCampo.'%" ORDER BY IDArtigo DESC');
    }
    
    $prepare->execute();

    return $prepare->fetchAll(PDO::FETCH_ASSOC);
  }catch(Exception $e){
     return array();
  }
}

function listaTodos(){	
  try {

    $con = getConexao(); 

    $prepare = $con->prepare('SELECT * FROM artigo ORDER BY IDArtigo DESC');
	
    $prepare->execute();

    return $prepare->fetchAll(PDO::FETCH_ASSOC);
  }catch(Exception $e){
     return array();
  }
}



/*<td><?php echo strlen($artigo['Resumo']) >100 ? substr($artigo['Resumo'], 0, 100) : $artigo['Resumo'] ?></td>*/

?>