<?php
include_once "sql/conexao.php";

//transformando em inteiro
$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT); 
$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);

//calcular o inicio visualização
$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

//consultar no banco de dados
    $con = getConexao();

    $resultArtigo = $con->prepare('SELECT * FROM Artigo ORDER BY IDArtigo DESC LIMIT '.$inicio.','.$qnt_result_pg.''); //OFFSET é o Inicio, E o LIMIT é o max
    
    $resultArtigo->execute();

    $resultadoArtigo = $resultArtigo->fetchAll(PDO::FETCH_ASSOC); 

    $resultArtigo->closeCursor();


//Verificar se encontrou resultado na tabela "Artigo"
if(count($resultadoArtigo) > 0){
	?>
	<table class="table table-striped table-hover table-condensed">
		<thead>
			<tr>
				<th width="40%">Titulo:</th>
        		<th width="15%">Autor:</th>
        		<th width="25%">Curso:</th>
        		<th width="10%"></th>
			</tr>
		</thead>
		<tbody>
			<?php

			include_once 'sql/query.php';
	          	if(!empty($_POST)){ 
		            $valor = $_POST['search'];     
		            $tCampo = $_POST['autor'];
		            $tCurso = $_POST['cursos'];

		            $Artigos = listaPorFiltro($tCampo,$valor,$tCurso,$inicio,$qnt_result_pg);
		        }else{
		        	$Artigos = listaTodos(); 
		        }


			foreach($Artigos as $artigo){
				?>
				<tr>
					<td><?php echo strlen($artigo['Titulo']) >110 ? substr($artigo['Titulo'], 0, 110) : $artigo['Titulo'];?></td>
					<td><?php echo $artigo['Autor']; ?></td>
					<td><?php echo $artigo['Curso']; ?></td>
					<td width="10%">
             			<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $artigo['IDArtigo']; ?>">
             			<span class="glyphicon glyphicon-info-sign"></span>
            		 		Detalhes
             			</button>
           			</td>

				</tr>

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
				
				<?php
			}?>
		</tbody>
	</table>
<?php

//Paginação - Somar a quantidade de artigos
    $con = getConexao();

    $result_pg = $con->prepare('SELECT COUNT(IDArtigo) AS num_result FROM Artigo'); 

    $result_pg->execute();

    $num_result = $result_pg->fetch(PDO::FETCH_ASSOC);

    $result_pg->closeCursor();


//Quantidade de pagina
$quantidade_pg = ceil(listaPorFiltroQtd($tCampo,$valor,$tCurso) / $qnt_result_pg);

//Limitar os link antes depois
$max_links = 2;

	echo '<nav aria-label="paginacao">';
	echo '<ul class="pagination">';
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='listarArtigo(1, $qnt_result_pg)'>Primeira</a> </span>";
	echo '</li>';
	for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
		if($pag_ant >= 1){
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listarArtigo($pag_ant, $qnt_result_pg)'>$pag_ant </a></li>";
		}
	}
	echo '<li class="page-item active">';
	echo '<span class="page-link">';
	echo "$pagina";
	echo '</span>';
	echo '</li>';

	for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
		if($pag_dep <= $quantidade_pg){
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listarArtigo($pag_dep, $qnt_result_pg)'>$pag_dep</a></li>";
		}
	}
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='listarArtigo($quantidade_pg, $qnt_result_pg)'>Última</a></span>";
	echo '</li>';
	echo '</ul>';
	echo '</nav>';
}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum artigo encontrado!</div>";
}
