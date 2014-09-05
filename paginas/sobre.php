<?

if ($_GET['id']>0) {
	$busca = " AND id_link=".(int)$_GET['id'];
} else if ($_GET['hfd7as89fhdfffffffff']>0) {
	$busca = " AND tbdepartamentos.id_departamento=".(int)$_GET['categoria'];
}

$dados = db_dados("
	SELECT *
		 
	FROM 
		tblinks
	WHERE 1
		".$busca."
	 
	LIMIT 1;
		");
	$dados['titulo']=str_replace('\\','',$dados['titulo']);
	$dados['texto']=str_replace('\\','',$dados['texto']);
	
 
	
?>
	
 	
	<div id="main">
		<div class="width-container">

			<div id="container-sidebar">
				<div class="content-boxed">
					<h2 class="title-bg"><?=$dados['titulo']?></h2>
					
					
					
					<div class="type-post">
					 
						 
						<div class="featured-image">
							<a href="#"><img src="<?=($quemsomos['vimeo']);?>/arquivos/links/<?=$dados['imagem']?>" alt=""></a>
						</div>
						
						<p><?=$dados['descricao']?></p>
						
				 
						
						<div class="clearfix"></div>
						
					</div><!-- close .type-post -->
					
</div></div> 