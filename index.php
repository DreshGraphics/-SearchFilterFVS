<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Busca</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
</head>
<body>

	<div class="container">
    <div class="col-sm-10 col-sm-offset-1">  
    <div class="page-header">
        <h1>Usuários</h1>
    </div>

    <div class="table-responsive">

      <div class="row">
        <div class="form-group col-sm-5">
          <input type="text" name="search" placeholder="busca" class="form-control">
        </div>

        <div class="form-group col-sm-2">
          <select class="form-control">
            <option value="Autor">Autor</option>
            <option value="Titulo">Titulo</option>
            <option value="Orientador">Orientador</option>
            <option value="PalavraP">Palavra Chave</option>
          </select>
        </div>

        <div class="form-group col-sm-3">
          <select class="form-control">
            <option value="default">Todos</option>
            <option value="Administração">Administração</option>
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
      </div>

    <table class="table table-striped table-bordered table-hover table-condensed">
      <thead>
        <th>Titulo:</th>
        <th>Autor:</th>
        <th>Curso:</th>
      </thead>
      <tbody>
        <?php
             include_once 'sql/query.php';

             $Artigos = lista();

             foreach ($Artigos as $artigo):


         ?>

         <tr>
           <td><?php echo $artigo['Titulo'] ?></td>
           <td><?php echo $artigo['Autor'] ?></td>
           <td><?php echo $artigo['Curso'] ?></td>
         </tr>

       <?php endforeach; ?>
      </tbody>
  </table>
  </div>

  </div>
  </div>

</body>
</html>