<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <title>Lista de TCC</title>
  </head>
  <body>
    

    <div class="container">
    <div class="col-sm-10 col-sm-offset-1">  
    <div class="page-header">
        <a class="btn btn-default" href="cadastrar.php" role="button">Cadastrar Novo</a>
        <h1>TCC</h1>
    </div>

    <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed">
      <thead>
        <th>Titulo:</th>
        <th>Autor:</th>
        <th>Orientador:</th>
        <th>Curso:</th>
        <th>Resumo:</th>
        <th>Ano de Publicação:</th>
        <th>Ação</th>
      </thead>
      <tbody>
        <?php
            include_once 'sql/query.php';
            include_once 'sql/conexao.php';

             if(!empty($_GET['id'])){
               excluir($_GET['id']);
             }

             $artigo = lista();

             foreach ($artigo as $artigo):
         ?>

         <tr>
           <td><?php echo $artigo['Titulo'] ?></td>
           <td><?php echo $artigo['Autor'] ?></td>
           <td><?php echo $artigo['Orientador'] ?></td>
           <td><?php echo $artigo['Curso'] ?></td>
           <td><textarea readonly rows="10" cols="150" type="text" name="resumo" class="form-control" value="" required >
                  <?php echo isset($artigo) ? $artigo['Resumo'] : '' ?>
                </textarea></td>
           <td><?php echo $artigo['AnoP'] ?></td>          
           <td>
              <div class="btn-group" role="group">
                <a class="btn btn-default btn-sm" href="cadastrar.php?id=<?php echo $artigo['IDArtigo'] ?>">Editar</a>
                <a class="btn btn-default btn-sm"href="?id=<?php echo $artigo['IDArtigo'] ?>" onclick="return confirm('Tem certeza que deseja excluir o artigo?')">Excluir</a>
              </div>
             
         </td>
         </tr>

       <?php endforeach; ?>
      </tbody>
  </table>
  </div>

  </div>
  </div>

  </body>
</html>
<script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="js/jquery-3.2.1.js"></script>
  <script src="js/script.js"></script>
  <script src="js/anima.js"></script>
