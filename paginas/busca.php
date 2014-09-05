 
<?
	list($buscado,) = pesquisaQuery(array('teste'),$_GET['palavra']);
	
  
 
?>



<div id="main">
	<div class="width-container">
		
	<div id="container-sidebar">
		<div class="content-boxed">
			<h2 class="title-bg">Busca por &quot;<?=utf8_encode(trim($buscado));?>&quot;</h2>
			
				<?
		 		$busca = '';
				if (strlen($_GET['palavra'])>0) {
					list($buscado,$tmp) = pesquisaQuery(array('tags'),utf8_encode($_GET['palavra']));
					$busca .= $tmp;

				}

				$consulta = db_consulta("SELECT 
								tbgalerias.*, tbloja_categorias.*, tbcursos.*, tbestado_categorias.*, tbconteudo_categorias.* ,
								DATE_FORMAT(tbgalerias.data,'%d/%m/%Y')  as data1
							FROM 
								tbgalerias
								LEFT JOIN tbloja_categorias ON (tbloja_categorias.id_categoria = tbgalerias.cidade)
								LEFT JOIN tbcursos ON (tbcursos.id_curso = tbgalerias.id_curso)
								LEFT JOIN tbestado_categorias ON (tbestado_categorias.id_estado = tbgalerias.estado)
								LEFT JOIN tbconteudo_categorias ON (tbconteudo_categorias.id_finalidade = tbgalerias.finalidade)

						 		WHERE 1
									".$busca."
									".$busca2."  AND flag_status=1


							ORDER BY 
								tbgalerias.titulo DESC
								LIMIT 99
								");
							if (db_linhas($consulta)>0) {
							while ($linha = db_lista($consulta)) {
				?>



					<div class="property-listing">

						<div class="property-listing-thumb">
							<div class="notification-listing"><?=$linha['curso'];?></div>
							<a href="<?=($quemsomos['vimeo']);?>/<?=$linha['id_galeria'];?>/<?=(nomeArquivo($linha['titulo']));?>"><img src="<?=($quemsomos['vimeo']);?>/arquivos/galeria/<?=($linha['codigo']);?>/capa.jpg" alt="<?=($linha['titulo']);?>"></a>
						</div>

						<div class="property-information">
							<div class="property-information-address"><a href="<?=($quemsomos['vimeo']);?>/<?=$linha['id_galeria'];?>/<?=(nomeArquivo($linha['titulo']));?>"><?=$linha['bairro'];?></a></div>
							<div class="property-information-location"><a href="<?=($quemsomos['vimeo']);?>/<?=$linha['id_galeria'];?>/<?=(nomeArquivo($linha['titulo']));?>"><?=$linha['categoria'];?> - <?=$linha['estado'];?></a></div>
							<div class="property-information-price"><a href="<?=($quemsomos['vimeo']);?>/<?=$linha['id_galeria'];?>/<?=(nomeArquivo($linha['titulo']));?>">R$ <?=$linha['preco'];?></a></div>
							<div class="property-highlight">
								<div class="sq-highlight"><?=$linha['area'];?></div>
								<div class="bed-higlight"><?=$linha['quartos'];?> Dormitórios</div>
								<div class="bath-higlight"><?=$linha['suites'];?> Su&iacute;tes</div>
							</div>
							<div class="property-highlight">
								<div class="garage-higlight"><?=$linha['garagens'];?> Vagas</div>
								<div class="time-higlight">Atualizado: <?=$linha['data1'];?></div>
							</div>
							<div class="property-highlight">
								<div class="property-information-price">Código:<?=$linha['id_galeria'];?></div>
							</div>
							<div class="clearfix"></div>
						</div><!-- close property-information-->

						<div class="clearfix"></div>

						<div class="property-listing-base">
							<div class="grid2column">
								<div class="property-status">Im&oacute;vel dispon&iacute;vel para: <a href="#"><?=$linha['finalidade'];?></a></div>
							</div>
							<div class="grid2column lastcolumn">
								<a href="<?=($quemsomos['vimeo']);?>/<?=$linha['id_galeria'];?>/<?=(nomeArquivo($linha['titulo']));?>" class="button secondary-button">Ver im&oacute;vel</a>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div><!-- close .property-listing-base -->
					</div>



				<?
				}
				} else {

					echo 'Nenhum im&oacute;vel encontrado.';

				}
				?>
				
			 
		
			
		 
			



			
			
			
		
		<div class="clearfix"></div>
		</div><!-- close .content-boxed -->
		
		
 
		
		
		</div>
		
	 
		
		
		
	 
 