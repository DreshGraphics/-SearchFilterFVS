<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buscar TCC</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
</head>
<body>

  <div class="container">
    <div class="col-sm-10 col-sm-offset-1">  
    <div class="page-header">
        <h1>Buscar TCC</h1>
    </div>
<form action="pesquisar.php" method="GET">
    <div class="table-responsive">
      <div class="row col-sm-12">
        <div class="form-group col-sm-5">
          <input type="text" name="search" placeholder="busca" class="form-control">
        </div>

        <div class="form-group col-sm-3">
          <select class="form-control" name="autor">
            <option value="Autor">Autor</option>
            <option value="Titulo">Titulo</option>
            <option value="Orientador">Orientador</option>
            <option value="PalavraP">Palavra Chave</option>
          </select>
        </div>

        <div class="input-group col-sm-4">
          <select class="form-control" name="cursos">
            <option value="default">Todos</option>
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
          <span class="input-group-btn">
              <button class="btn btn-default" type="submit" method="GET">
                <span class="glyphicon glyphicon-search"></span>
              </button> 
          </span>    
        </div>
      </div>
    </form>
    <table class="table table-striped table-hover table-condensed">
      <thead>
        <th width="40%">Titulo:</th>
        <th width="15%">Autor:</th>
        <th width="25%">Curso:</th>
        <th width="10%"></th>
      </thead>
      <tbody>
        <?php   
        //$tabela, $campo, $valorCampo  
            include_once 'sql/query.php';  
           
            $Artigos = listaTodos();
               
            foreach ($Artigos as $artigo):

         ?>

         <tr>
           <td width="40%"><?php echo strlen($artigo['Titulo']) >100 ? substr($artigo['Titulo'], 0, 100) : $artigo['Titulo'] ?></td>
           <td width="15%"><?php echo $artigo['Autor'] ?></td>
           <td width="25%"><?php echo strlen($artigo['Curso']) >26 ? substr($artigo['Curso'], 0, 26) : $artigo['Curso'] ?></td>
           <td width="10%">
             <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $artigo['IDArtigo']; ?>">
             <span class="glyphicon glyphicon-info-sign"></span>
             Detalhes
             </button>
           </td>
         </tr>

         <!-- Inicio Modal -->
                <div class="modal fade" id="myModal<?php echo $artigo['IDArtigo']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class="modal-body">
                        <p><strong>Titulo:</strong></p>
                        <p><?php echo $artigo['Titulo']; ?></p>
                        <p><strong>Autor:</strong></p>
                        <p><?php echo $artigo['Autor']; ?></p>
                        <p><strong>Orientador:</strong></p>
                        <p><?php echo $artigo['Orientador']; ?></p>
                        <p><strong>Curso:</strong></p>
                        <p><?php echo $artigo['Curso']; ?></p>
                        <p><strong>Resumo:</strong></p>
                        <p align="justify"><?php echo $artigo['Resumo']; ?></p>
                        <p><strong>Ano da Publicação:</strong></p>
                        <p><?php echo $artigo['AnoP']; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Fim Modal -->

       <?php endforeach; ?>
      </tbody>
  </table>
  </div>

  <div class="row">
    <nav aria-label="Navegação de página exemplo">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Anterior">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Anterior</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">4</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Próximo">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Próximo</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>


  </div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>