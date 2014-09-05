



<div id="main">
	<div class="width-container">
		
		<div id="featured-slider">
		<div class="flexslider">
          <ul class="slides">
				<?
				$i=0;
				
				$sql = "select * from tbbanners";
                $query = mysql_query($sql);
                while ($linha = mysql_fetch_array($query)) {$i++;
                ?>
				
				<li>
		  	     
				 <a href="<?=$linha['link'];?>"><img src="../banners/<?=$linha['foto'];?>"></a>
		  	    </li>
				
				<?
				}
				?>
				
            
  
          </ul>
        </div>
		</div>
		<div class="clearfix"></div>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
		    $('.flexslider').flexslider({
				animation: "fade",              //String: Select your animation type, "fade" or "slide"
				slideDirection: "horizontal",   //String: Select the sliding direction, "horizontal" or "vertical"
				slideshow: true,                //Boolean: Animate slider automatically
				slideshowSpeed: 7000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
				animationDuration: 500,         //Integer: Set the speed of animations, in milliseconds
				directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)
				controlNav: true,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
				keyboardNav: true,              //Boolean: Allow slider navigating via keyboard left/right keys
				mousewheel: false,              //Boolean: Allow slider navigating via mousewheel
				prevText: "Previous",           //String: Set the text for the "previous" directionNav item
				nextText: "Next",               //String: Set the text for the "next" directionNav item
				pausePlay: false,               //Boolean: Create pause/play dynamic element
				pauseText: 'Pause',             //String: Set the text for the "pause" pausePlay item
				playText: 'Play',               //String: Set the text for the "play" pausePlay item
				randomize: false,               //Boolean: Randomize slide order
				slideToStart: 0,                //Integer: The slide that the slider should start on. Array notation (0 = first slide)
				useCSS: true,
				animationLoop: true,            //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
				pauseOnAction: true,            //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
				pauseOnHover: false            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering

		    });
		});
		</script>
		
		
		<div id="container-sidebar">
			<div class="content-boxed">
				<h2 class="title-bg">Últimos imóveis</h2>
				
				<?
				$i=0;
				$SQL = "SELECT 
								tbgalerias.*, tbloja_categorias.*, tbcursos.*, tbestado_categorias.*, tbconteudo_categorias.* ,
								DATE_FORMAT(tbgalerias.data,'%d/%m/%Y')  as data1
							FROM 
								tbgalerias
								LEFT JOIN tbloja_categorias ON (tbloja_categorias.id_categoria = tbgalerias.cidade)
								LEFT JOIN tbcursos ON (tbcursos.id_curso = tbgalerias.id_curso)
								LEFT JOIN tbestado_categorias ON (tbestado_categorias.id_estado = tbgalerias.estado)
								LEFT JOIN tbconteudo_categorias ON (tbconteudo_categorias.id_finalidade = tbgalerias.finalidade)
							
							WHERE flag_status=1
							ORDER BY 
								tbgalerias.id_galeria DESC
								";
				$Lista = new Consulta($SQL,5,$PGATUAL);
				while ($linha = db_lista($Lista->consulta)) { $i++;
				?>

			 
				
					<div class="property-listing">

						<div class="property-listing-thumb">
							<div class="notification-listing"><?=$linha['curso'];?></div>
							<a href="<?=($quemsomos['vimeo']);?>/<?=$linha['id_galeria'];?>/<?=(nomeArquivo($linha['titulo']));?>"><img src="<?=($quemsomos['vimeo']);?>/arquivos/galeria/<?=($linha['codigo']);?>/capa.jpg" alt="<?=($linha['titulo']);?>"></a>
						</div>

						<div class="property-information">
							<div class="property-information-address"><a href="<?=($quemsomos['vimeo']);?>/<?=$linha['id_galeria'];?>/<?=(nomeArquivo($linha['titulo']));?>"><?=$linha['bairro'];?></a></div>
							<div class="property-information-location"><a href="<?=($quemsomos['vimeo']);?>/<?=$linha['id_galeria'];?>/<?=(nomeArquivo($linha['titulo']));?>"><?=$linha['categoria'];?> - <?=$linha['estado'];?></a></div>
							<div class="property-information-price"><a href="<?=($quemsomos['vimeo']);?>/<?=$linha['id_galeria'];?>/<?=(nomeArquivo($linha['titulo']));?>">R$ <?php echo number_format($linha['preco'],2,',','.');?></a></div>
							<div class="property-highlight">
								<div class="sq-highlight"><?=$linha['area'];?></div>
								<div class="bed-higlight"><?=$linha['quartos'];?> Dormitórios</div>
								<div class="bath-higlight"><?=$linha['suites'];?> Suítes</div>
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
								<div class="property-status">Imóvel disponível para: <a href="#"><?=$linha['finalidade'];?></a></div>
							</div>
							<div class="grid2column lastcolumn">
								<a href="<?=($quemsomos['vimeo']);?>/<?=$linha['id_galeria'];?>/<?=(nomeArquivo($linha['titulo']));?>" class="button secondary-button">Ver imóvel</a>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div><!-- close .property-listing-base -->
					</div>
				
				
				
				<?
				}
				?>
				
				
				
				
			
				
			 
				



				
				
				
			
			<div class="clearfix"></div>
			</div><!-- close .content-boxed -->
			
			
			
		 
			
			
			
		</div><!-- close #container-sidebar --> 
