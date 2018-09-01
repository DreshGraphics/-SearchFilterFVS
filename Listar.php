<!DOCTYPE HTML>
<html lang="pt-br">  
    <head>  
      <meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Buscar TCC</title>
      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="css/estilo.css" rel="stylesheet">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </head>
    <body>

	<div class="container">
    <div class="col-sm-10 col-sm-offset-1">  
    <div class="page-header">
        <h1>Buscar TCC</h1>     
    </div>

    <form action="" method="post">
    <div class="table-responsive">

      <div class="row col-sm-12">
        <div class="form-group col-sm-5">
          <input type="text" name="campo" placeholder="busca" class="form-control">
        </div>

        <div class="form-group col-sm-3">
          <select class="form-control" name="valorCampo">
            <option value="Autor">Autor</option>
            <option value="Titulo">Titulo</option>
            <option value="Orientador">Orientador</option>
            <option value="PalavraP">Palavra Chave</option>
          </select>
        </div>

        <div class="input-group col-sm-4">
          <select class="form-control" name="curso">
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
          <span class="input-group-btn">
              <button class="btn btn-default" type="submit" method="POST">
                <span class="glyphicon glyphicon-search"></span>
              </button> 
          </span>
        </div>
      </div>
      </form>
		
		<script>
			var qnt_result_pg = 10; //quantidade de registro por página
			var pagina = 1; //página inicial
			$(document).ready(function () {
				listarArtigo(pagina, qnt_result_pg); //Chamar a função para listar os registros
			});
			
			function listarArtigo(pagina, qnt_result_pg){
				var dados = {
					pagina: pagina,
					qnt_result_pg: qnt_result_pg
				}
				$.post('listarArtigo.php', dados , function(retorna){
					//Subtitui o valor no seletor id="conteudo"
					$("#conteudo").html(retorna);
				});
			}
		</script>
		<span id="conteudo"></span>
		</div>
	</div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<!-- Include all compiled plugins (below), or include individual files as needed -->
  	<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
