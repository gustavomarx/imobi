<section id="title" class="container clearfix">
	<!-- Título -->
	<div class="ten columns">
	
		<h1></h1>
		<h2></h2>
		
	</div>
	<!-- fim do título -->
	
	 
</section> 

<section id="filters">
	<div class="container clearfix">
	
		<div class="sixteen columns">	
			<h1>Produtos</h1>
			<h2>Encontre o que precisa em nosso catálogo</h2>
		</div>

 
	</div>

</section>
		
		
		<section id="work" class="container clearfix">


			<!-- Thumbnails -->
			<ul id="portfolio">
				
				
				<?
				$i=0;
				$SQL = "SELECT * FROM tbgalerias  WHERE id_curso=2 ORDER BY titulo DESC";
				$Lista = new Consulta($SQL,99,$PGATUAL);
				while ($linha = db_lista($Lista->consulta)) { $i++;
				?>

 
					<li class="thumb four columns">
							<a class="screen-roll" href="<?=($dadosconfig['url']);?>/<?=$linha['id_galeria'];?>/<?=(nomeArquivo($linha['titulo']));?>">	
				 
						<span></span>
						<img src="<?=utf8_decode($dadosconfig['url']);?>/arquivos/galeria/<?=$linha['codigo'];?>/capa.jpg" alt="<?=($linha['titulo']);?>" />
					</a>	
					<a href="<?=($dadosconfig['url']);?>/<?=$linha['id_galeria'];?>/<?=(nomeArquivo($linha['titulo']));?>"><h3><?=($linha['titulo']);?></h3></a>
					<p class="meta"><?=($linha['sobre']);?></p>
					</li>
					
					

				<?
				}
				?>
				
				
				
			

			 
			</ul>
			<!-- Fim dos produtos da galeria -->	


		</section><!-- Fim do conteudo -->