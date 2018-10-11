<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <title>Cadastro</title>
  </head>
  <body>
    <!-- <a href="listagem.php">Listar usuários</a>
    <a href="form-cadastrar-atualizar.php">Cadastrar novo usuário</a> -->

    <?php
        include_once 'sql/query.php';
        include_once 'sql/conexao.php';

        if(!empty($_POST)){
           if(!empty($_POST['id'])){
              alterar($_POST['id'], $_POST['titulo'], $_POST['autor'], $_POST['orientador'], $_POST['cursos'], $_POST['resumo'], $_POST['anop'], $_POST['palavrac']);
           }else{
              cadastrar($_POST['titulo'], $_POST['autor'], $_POST['orientador'], $_POST['cursos'], $_POST['resumo'], $_POST['anop'], $_POST['palavrac']);
           }
        }

        if(!empty($_GET['id'])){
          $artigo = getById($_GET['id']);
        }
     ?>
    
    <div class="container"> 
      <div class="col-sm-8 col-sm-offset-2">
        <form action="" method="post">
          <fieldset>
              <input type="hidden" name="id" value="<?php echo isset($artigo) ? $artigo['IDArtigo'] : '' ?>">
            <div class="page-header">
              <h1>Cadastro</h1>
            </div>
            <div class="row">
              <div class="form-group">
                <label for="titulo">Titulo:</label>
                <input type="text" name="titulo" class="form-control" value="<?php echo isset($artigo) ? $artigo['Titulo'] : '' ?>" required>
              </div>
               <hr>
              <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" name="autor" class="form-control" value="<?php echo isset($artigo) ? $artigo['Autor'] : '' ?>" required>
              </div>
                <hr>
              <div class="form-group">
                <label for="orientador">Orientador:</label>
                <input type="text" name="orientador" class="form-control" value="<?php echo isset($artigo) ? $artigo['Orientador'] : '' ?>" required>
             </div>
             <div class="form-group">
                <label for="curso">Curso:</label>
                <div class="input-group col-sm-4">
                <select class="form-control" name="cursos">
                <option value="<?php echo isset($artigo) ? $artigo['Curso'] : '' ?>"><?php echo isset($artigo) ? $artigo['Curso'] : '' ?></option>
                <option value="Administracao">Administração</option>
                <option value="Análise e Desenvolvimento de Sistemas">Análise</option>
                <option value="Ciências Contábeis">Contábeis</option>
                <option value="Direito">Direito</option>
                <option value="Educação Fisica">Educação Fisica</option>
                <option value="Enfermagem">Enfermagem</option>
                <option value="Fisioterapia">Fisioterapia</option>
                <option value="Psicologia">Psicologia</option>
                <option value="Serviço Social">Serviço Social</option>
          </select>
             </div>
             <div class="form-group">
                <label for="resumo">Resumo:</label>
                <textarea rows="10" cols="50" type="text" name="resumo" class="form-control" value="" required><?php echo isset($artigo) ? $artigo['Resumo'] : '' ?></textarea>
             </div>
             <div class="form-group">
                <label for="anop">Ano:</label>
                <input type="text" name="anop" class="form-control" value="<?php echo isset($artigo) ? $artigo['AnoP'] : '' ?>" required>
             </div>
             <div class="form-group">
                <label for="palavrac">Palavra Chave:</label>
                <input type="text" name="palavrac" class="form-control" value="<?php echo isset($artigo) ? $artigo['PalavraC'] : '' ?>" required>
             </div>
                <hr>
              <div class="btn-group" role="group">
              <button type="submit" class="btn btn-default">Salvar</button>
              <a class="btn btn-default" href="listagem.php" role="button">Listar</a>
              </div>
          </fieldset>
        </form>
      </div>
    </div>

  </body>
</html>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/script.js"></script>
	<script src="js/anima.js"></script>