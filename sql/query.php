<?php

require_once 'conexao.php';


function listaPorFiltro($campo,$valorCampo,$curso,$inicio,$qnt_result_pg){	

  try {
    $con = getConexao(); 
    
    if($campo == "PalavraP" && $curso == "default"){
    	$prepare = $con->prepare('SELECT * FROM artigo WHERE (Curso LIKE "%'.$valorCampo.'%" OR Titulo LIKE "%'.$valorCampo.'%" OR Autor LIKE "%'.$valorCampo.'%" OR Orientador LIKE "%'.$valorCampo.'%") ORDER BY IDArtigo DESC LIMIT '.$inicio.','.$qnt_result_pg);
    }else if($campo == "PalavraP" && $curso != "default"){//Muuuito estranho :/tipo ta fazendo a query problema ta no foreach n ?
    	$prepare = $con->prepare('SELECT * FROM artigo WHERE (Curso LIKE "%'.$curso.'%" AND (Titulo LIKE"%'.$valorCampo.'%" OR Autor LIKE"%'.$valorCampo.'%" OR Orientador LIKE"%'.$valorCampo.'%")) ORDER BY IDArtigo DESC LIMIT '.$inicio.','.$qnt_result_pg);
    }
    if($campo != "PalavraP" && $curso != "default"){
    	$prepare = $con->prepare('SELECT * FROM artigo WHERE '.$campo.' LIKE "%'.$valorCampo.'%" AND Curso ="'.$curso.'"ORDER BY IDArtigo DESC LIMIT '.$inicio.','.$qnt_result_pg);
    }else if($campo != "PalavraP" && $curso = "default"){
    	$prepare = $con->prepare('SELECT * FROM artigo WHERE '.$campo.' LIKE "%'.$valorCampo.'%" ORDER BY IDArtigo DESC LIMIT '.$inicio.','.$qnt_result_pg);
    }
    
    $prepare->execute();

    return $prepare->fetchAll(PDO::FETCH_ASSOC);
  }catch(Exception $e){
     return array();
  }
}

function listaPorFiltroQtd($campo,$valorCampo,$curso){  

  try {
    $con = getConexao();
    
    if($campo == "PalavraP" && $curso == "default"){
      $prepare = $con->prepare('SELECT * FROM artigo WHERE (Curso LIKE "%'.$valorCampo.'%" OR Titulo LIKE "%'.$valorCampo.'%" OR Autor LIKE "%'.$valorCampo.'%" OR Orientador LIKE "%'.$valorCampo.'%") ORDER BY IDArtigo DESC');
    }else if($campo == "PalavraP" && $curso != "default"){
      $prepare = $con->prepare('SELECT * FROM artigo WHERE (Curso LIKE "%'.$curso.'%" AND (Titulo LIKE"%'.$valorCampo.'%" OR Autor LIKE"%'.$valorCampo.'%" OR Orientador LIKE"%'.$valorCampo.'%")) ORDER BY IDArtigo DESC');
    }
    if($campo != "PalavraP" && $curso != "default"){
      $prepare = $con->prepare('SELECT * FROM artigo WHERE '.$campo.' LIKE "%'.$valorCampo.'%" AND Curso ="'.$curso.'"ORDER BY IDArtigo DESC');
    }else if($campo != "PalavraP" && $curso = "default"){
      $prepare = $con->prepare('SELECT * FROM artigo WHERE '.$campo.' LIKE "%'.$valorCampo.'%" ORDER BY IDArtigo DESC');
    }
    
    $prepare->execute();

    return $prepare->rowCount();
  }catch(Exception $e){
     return 0;
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
function cadastrar($Titulo, $Autor, $Orientador, $Curso, $Resumo, $AnoP, $PalavraC){
  try {
    $con = getConexao();

    $prepare = $con->prepare('INSERT INTO artigo(Titulo, Autor, Orientador, Curso, Resumo, AnoP, PalavraC) VALUES (?,?,?,?,?,?,?)');

    $prepare->bindValue(1, $Titulo);
    $prepare->bindValue(2, $Autor);
    $prepare->bindValue(3, $Orientador);
    $prepare->bindValue(4, $Curso);
    $prepare->bindValue(5, $Resumo);
    $prepare->bindValue(6, $AnoP);
    $prepare->bindValue(7, $PalavraC);

    $prepare->execute();
    echo "<script>alert('Cliente cadastrado com sucesso!')</script>";
  } catch (Exception $e) {
    echo "<script>alert('Ocorreu um erro ao cadastrar o cliente')</script>";
  }

}

function alterar($IDArtigo,$Titulo, $Autor, $Orientador, $Curso, $Resumo, $AnoP, $PalavraC){
  try {
    $con = getConexao();

  $prepare = $con->prepare('UPDATE artigo SET Titulo=?, Autor=?, Orientador=? , Curso=? , Resumo=?, AnoP=?, PalavraC=?WHERE IDArtigo=?');

    $prepare->bindValue(1, $Titulo);
    $prepare->bindValue(2, $Autor);
    $prepare->bindValue(3, $Orientador);
    $prepare->bindValue(4, $Curso);
    $prepare->bindValue(5, $Resumo);
    $prepare->bindValue(6, $AnoP);
    $prepare->bindValue(7, $PalavraC);
    $prepare->bindValue(8, $IDArtigo);

    $prepare->execute();
    echo "<script>alert('Cliente alterado com sucesso!'); window.location = 'listagem.php';</script>";
  } catch (Exception $e) {
    echo "<script>alert('Ocorreu um erro ao alterar o cliente')</script>";
  }

}

function excluir($IDArtigo){
  try {
    $con = getConexao();

    $prepare = $con->prepare('DELETE FROM artigo WHERE IDArtigo=?');

    $prepare->bindValue(1, $IDArtigo);

    $prepare->execute();
    echo "<script>alert('Cliente excluido com sucesso'); window.location = 'listagem.php';</script>";
  }catch(Exception $e){
     echo "<script>alert('Ocorreu um erro ao excluir o cliente')</script>";
  }
}

function getById($id){
  try {
    $con = getConexao();

    $prepare = $con->prepare('SELECT * FROM artigo WHERE IDArtigo=? LIMIT 1');

    $prepare->bindValue(1, $id);

    $prepare->execute();

    return $prepare->fetch(PDO::FETCH_ASSOC);
  }catch(Exception $e){
     return null;
  }
}

function lista(){
  try {
    $con = getConexao();

    $prepare = $con->prepare('SELECT * FROM artigo');

    $prepare->execute();

    return $prepare->fetchAll(PDO::FETCH_ASSOC);
  }catch(Exception $e){
     return array();
  }
}
?>