<?php

define('BANCO', 'SearchFilterFVS');
define('USUARIO', 'root');
define('SENHA', '');
	
function getConexao(){
  $conexao = new PDO('mysql:host=localhost;dbname='.BANCO.';charset=utf8', USUARIO, SENHA);
  return $conexao;
}