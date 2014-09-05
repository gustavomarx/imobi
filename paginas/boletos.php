<div id="main">
	<div class="width-container">

	
		
		<div id="container-sidebar">
			<div class="content-boxed">
				<h2 class="title-bg">Onde você está? </h2>
				
			 
				
						
					
				
		
				<br />
				<h4>Envie uma mensagem!</h4>

				<div id="contact-wrapper">
					<script type="text/javascript">
						jQuery(document).ready(function(){
							jQuery("#contactform").validate();
						});
					</script>


					
					
					<form method="post" action="<?=($quemsomos['vimeo']);?>/enviando" id="contactform">
							<div><input type="text" size="28" name="nome" id="contactname" value="" class="required" placeholder="Nome*" /></div>

							<div><input type="text" size="28" name="email" id="email" value="" class="required email" placeholder="E-mail*" /></div>
							
							<div><input type="text" size="28" name="telefone" id="" value="" class="" placeholder="Telefone*" /></div>

							<div><textarea rows="12" cols="38" name="mensagem" id="message" placeholder="Digite sua mensagem"></textarea></div>

							<div><input type="submit" value="Enviar mensagem" name="Enviar" class="submit" /></div>
					</form>

				</div><!-- close #contact-wrapper -->
				
			
			<div class="clearfix"></div>
			</div><!-- close .content-boxed -->

			
			
			
		</div><!-- close #container-sidebar -->
		
		<div id="sidebar">
			
			
			<div class="content-boxed">
				<h2 class="title-bg">Onde estamos</h2>
				<div class="location-widget">
					<?
					$i=0;
					$SQL = "SELECT * FROM  tbdestaque WHERE 1
						".$busca." ORDER BY id_destaque ASC";
					$Lista = new Consulta($SQL,1,$PGATUAL);
					while ($linha = db_lista($Lista->consulta)) { $i++; ?>

 <span>Endere&ccedil;o: </span> <?=($linha['endereco']);?> 
	<br><span>Cidade: </span> <?=($linha['cidade']);?> 
	<br><span>Cep: </span> <?=($linha['cep']);?> 
	<br><span>E-mail local: </span> <?=($linha['email']);?> 
 
					<?
					}
					?>
				 
					<br><span>E-mail Geral</span>: <a href="#"><?=($quemsomos['email']);?></a>
					
								 
								<?
								$i=0;
								$SQL = "SELECT * FROM  tbdestaque WHERE 1
									".$busca." ORDER BY id_destaque ASC";
								$Lista = new Consulta($SQL,1,$PGATUAL);
								while ($linha = db_lista($Lista->consulta)) { $i++;
								?>
			<br><span>Tel: </span> <?=($linha['telefone']);?>

								<?
								}
								?>


							 
				 
									
					
					
					
				</div>
			</div><!-- close .content-boxed -->
			
			
		 
			
			
			
			
			
			
		</div><!-- close #sidebar -->