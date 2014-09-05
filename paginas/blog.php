 	<div id="main">
		<div class="width-container">

			<div id="container-sidebar">
				<div class="content-boxed">
					
							<?
		
				if ($_GET['id']>0) {
					$busca = " AND id_noticia=".(int)$_GET['id'];
				} else if ($_GET['categoria']>0) {
					$busca = " AND tbnoticias.id_categoria=".(int)$_GET['categoria'];
				}

				$i=0;
				$SQL = " SELECT
						tbnoticias.*,
						DATE_FORMAT(tbnoticias.data,'%d/%m/%Y')  as data1 ,
						tbnoticias_categorias.*
					FROM 
						tbnoticias
						INNER JOIN tbnoticias_categorias ON (tbnoticias_categorias.id_categoria = tbnoticias.id_categoria)
					WHERE 1
						".$busca."
					ORDER BY 
						data DESC
						";	
						
			if ($_GET['categoria']>0) {
?>
<?

	$Lista = new Consulta($SQL,1,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) { $i++;
?>

	
					<h2 class="title-bg">Blog - <a <?=utf8_decode($dadosconfig['url']);?>/site/?p=blog&categoria=<?=$linha['id_categoria'];?>"><?=($linha['categoria']);?></h1></a></h2>
					<?
					}
					?>


				<?
							} else {
								?><h2 class="title-bg">Blog</h1></a></h2><?
							}
						?>
					
						<?


							$Lista = new Consulta($SQL,20,$PGATUAL);
							while ($linha = db_lista($Lista->consulta)) { $i++;

						?>






					 


						<div class="type-post">
							<h3>	<a href="<?=utf8_decode($dadosconfig['url']);?>/site/?p=blog&id=<?=$linha['id_noticia'];?>"><h1><?=($linha['titulo']);?></h1></a></h3>
							<h3><?=($linha['subtitulo']);?></h3>
							<div class="post-data">Publicado <a href="#"><?=($linha['data1']);?></a> por <a href="#"><?=($linha['creditos']);?></a> em <a href="#"><?=($linha['categoria']);?></a></div>
							
							<div class="featured-image">
								<? if (strlen($linha['imagem'])>0)  { ?>  
							         <a href="<?=utf8_decode($dadosconfig['url']);?>/site/?p=blog&id=<?=$linha['id_noticia'];?>"><img src="<?=utf8_decode($dadosconfig['url']);?>/img.php?img=arquivos/noticias/<?=$linha['imagem'];?>&x=600&y=600&corta=0"/></a> 
							    <? } else {  } ?>
							</div>

							
<p>
							<?
								if ($_GET['id']>0) {
								 echo $linha['texto'];
								} else {
									?>
									<p><a href="<?=utf8_decode($dadosconfig['url']);?>/site/?p=blog&id=<?=$linha['id_noticia'];?>">Continue lendo &rarr;</a></p>		<div class="clearfix"></div>
									
								 <?
								}
							?>
</p>
							 
	<div class="share-section">
		<div class="tags"><!-- AddThis Button BEGIN -->
		<div class="addthis_toolbox addthis_default_style ">
		<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
		<a class="addthis_button_tweet"></a>
		<a class="addthis_button_pinterest_pinit"></a>
		<a class="addthis_counter addthis_pill_style"></a>
		</div>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50d52bf74384885f"></script>
		<!-- AddThis Button END --></div>
		
		<div class="clearfix"></div>
	</div>




							<div class="clearfix"></div>

						</div><!-- close .type-post -->
						
						
					 	<?
						}
						?>

							<?
								if ($_GET['id']>0) {

								} else {
									?><?
								}
							?>
					
					
					
</div><div class="pagination"><?=$Lista->geraPaginacao();?></div></div>					
					
					
	<div id="sidebar">
		
 
		
		<div class="content-boxed">
			<h2 class="title-bg">Categorias</h2>
			<ul>
					<?
					$i=0;
					$SQL = "SELECT * FROM tbnoticias_categorias ORDER BY categoria DESC";
					$Lista = new Consulta($SQL,99,$PGATUAL);
					while ($linha = db_lista($Lista->consulta)) { $i++;
					?>

					<li><a href="<?=utf8_decode($dadosconfig['url']);?>/site/?p=blog&categoria=<?=$linha['id_categoria'];?>"><?=($linha['categoria']);?></a></li>
					<?
					}
					?>
 
			</ul>
		</div> 			
					
 </div>