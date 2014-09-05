

<script language= "JavaScript">
//location.href="busca_codigo.php"
</script>



<?


//echo "valor checkPost> ".$_GET['checkPost'];

$checkPost = $_GET['checkPost'];
$codigo = strip_tags( $_GET['codigo'] );
$finder = $_GET['finder'];


//DEBUG 
/*
echo "id do preço: ".$_GET['preco']."<br>";
echo "get finalidade = ".$_GET['c']."<br>";
echo "get 'curso' = ".$_GET['f']."<br>";
echo "get zona = ".$_GET['g']."<br>";
echo "get cidade = ".$_GET['l']."<br>";
echo "get bairos vetor = ".$_GET['m'];

*/

//NOVAS BUSCAS:



if ($_GET['f']>0) {
	$busca = " AND tbgalerias.id_curso=".(int)$_GET['f'];
}
/*else{
	$busca = " AND tbgalerias.id_curso LIKE %%";
	/* /////////////  echo "caiu no else do curso/Tipos ";
} */
	
if ($_GET['c']>0) {
		$busca1 = "AND tbgalerias.finalidade=".(int)$_GET['c'];
	}
	
if ($_GET['l']>0) {
	
		$busca2 = "AND tbgalerias.cidade=".(int)$_GET['l'];
	//	echo "Busca 2: ".$busca2;
}
if ($_GET['g']==1) {
	$tipo = "AND tbgalerias.id_zona=1";
} 

else{
	$tipo = "AND tbgalerias.id_zona=2";
}

/*
else{
	$tipo = "tbgalerias.id_zona LIKE %%";
	/* /////////////  echo "caiu no else da zona ";
} */



/*
ob_start();

if(isset($_GET['codigo'])){
	header('location:busca_codigo.php');
}*/


//echo $_GET['checkPost'];


/*GET Dos bairros e construção dinâmica da query do MySQL
*
* Data da elaboração: 07/04/2014
* Lucas Tavares
*
*/
//echo "<br>Get vindo cidade: ".(int)$GET_['l']."<br>";

if($_GET['m'] != null){

$allbairros = $_GET['m'];



/*
for($i=0;$i<count($allquartos);$i++){
	echo "<br> quarto ".$i." =";
	$foo[$i] = $allquartos;
}  */

$power = true;

foreach($allbairros as $position){
	if($position  != " "){
	$foo[]=$position;
}

else{
	break;
	$power = false;
	$busca3 = "";
}

if($power != false){
$resultadobairros = implode("%' OR tbgalerias.bairro LIKE '%" ,$foo);

//echo "<br> resultado bairros: ".$resultadobairros;
$busca3 = "AND tbgalerias.bairro LIKE '%".$resultadobairros."%' ";
}



}//end foreach



}//end null

//echo $busca3;




/*ALGORITMO PARA CAPTURAR O VETOR JQUERY E TRANSFORMAR EM PHP
*
*
* Tempo para resolução do problema: 8 horas
* Nivel de dificuldade: hardcore
* Bug: (x.x)
*
*/

if($_GET['quartos'] != null){

$allquartos = $_GET['quartos'];

/*
for($i=0;$i<count($allquartos);$i++){
	echo "<br> quarto ".$i." =";
	$foo[$i] = $allquartos;
}  */

foreach($allquartos as $position){
	$foo[]=$position;
}

$resultado = implode(',' ,$foo);

//echo "<br> resultado quartos: ".$resultado;

//POG -> combinação ->quarto<- "melhorar" no futuro com um FOR-combinatorio
//1, 2, 3 e 4
// ATUALIZADO : 29/03/2014 - Trabalhando com filtro Multi Select:



if($resultado == '1,2,3,4'){
	$busca = " AND tbgalerias.quartos=1 OR tbgalerias.quartos=2 OR tbgalerias.quartos=3 OR tbgalerias.quartos=4";
}
elseif($resultado == ' ,1,2,3,4'){
	$busca = " AND tbgalerias.quartos=1 OR tbgalerias.quartos=2 OR tbgalerias.quartos=3 OR tbgalerias.quartos=4";
}	

//1, 2 e 3
elseif($resultado == '1,2,3') {
	$busca = " AND tbgalerias.quartos=1 OR tbgalerias.quartos=2 OR tbgalerias.quartos=3";
	

//1, 2 e 4
}elseif($resultado == '1,2,4') {
	$busca = " AND tbgalerias.quartos=1 OR tbgalerias.quartos=2 OR tbgalerias.quartos=4";
	
//2, 3 e 4
}elseif($resultado == '2,3,4') {
	$busca = " AND tbgalerias.quartos=2 OR tbgalerias.quartos=3 OR tbgalerias.quartos=4";
//1 e 2
}elseif($resultado == '1,2'){
	$busca = " AND tbgalerias.quartos=1 OR tbgalerias.quartos=2";
//1 e 3
}elseif($resultado == '1,3') {
	$busca = " AND tbgalerias.quartos=1 OR tbgalerias.quartos=3";
//1 e 4
}elseif($resultado == '1,4') {
	$busca = " AND tbgalerias.quartos=1 OR tbgalerias.quartos=4";
//2 e 3
}elseif($resultado == '2,3') {
	$busca = " AND tbgalerias.quartos=2 OR tbgalerias.quartos=3";
//3 e 4
}elseif($resultado == '3,4'){
	$busca = " AND tbgalerias.quartos=3 OR tbgalerias.quartos=4";
//2 e 4
}elseif($resultado == '2,4') {
	$busca = " AND tbgalerias.quartos=2 OR tbgalerias.quartos=4";
//1
}elseif($resultado == '1'){
	$busca = " AND tbgalerias.quartos=1";
}
//2
elseif($resultado == '2'){
	$busca = " AND tbgalerias.quartos=2";
//3
}elseif($resultado == '3') {
	$busca = " AND tbgalerias.quartos=3";
//4
}elseif($resultado == '4') {
	$busca = " AND tbgalerias.quartos=4";
}else{
	//echo "<script>alert('null');</script>";
}




}

	//fim do if GET





$dados0 = db_dados( "SELECT * FROM tbzoneamento WHERE id_zona=".(int)$_GET['g']);	
$dados = db_dados( "SELECT * FROM tbconteudo_categorias WHERE id_finalidade=".(int)$_GET['c']);
$dados1 = db_dados( "SELECT * FROM tbcursos WHERE id_curso=".(int)$_GET['f']);
$dados2 = db_dados( "SELECT * FROM tbloja_categorias WHERE id_categoria=".(int)$_GET['l']);
?>
<div id="main">
	<div class="width-container">
		
	 
	 
		
		
		<div id="container-sidebar">
			<div class="content-boxed">
				<h2 class="title-bg" style="font-size: 14px;">Imóveis: 
				
				<?php
				
					//zona
					echo $dados0['tipo_zona'];
					if ($_GET['c']>0) {echo "/";}
					
					//finalidade
					echo $dados['finalidade'];
					if ($_GET['f']>0) {echo "/";}
					
					//tipo
					echo $dados1['curso'];
					if ($_GET['c']>0) {echo "/";}
					
					//cidade
					if($dados2['categoria']!=""){
						echo $dados2['categoria']."/";
					}
					
					//bairro
				/*	if (isset($_GET['m']) AND !empty($_GET['m'])){
							echo "/"; 
							echo $_GET['m']; 
					} */


					if($allbairros !=0){

					foreach($allbairros as $position){
					$bair[]=$position;

						}

			$bairrosbarra = implode("/" ,$bair);
			echo $bairrosbarra;
}
					
					//faixa de valor
					switch($_GET['preco']){
						case '1';
							echo $valorPRECO = '/At&eacute; 100 mil';
							$valor = 'AND preco < 100000';
							break;
						case '2';
							echo $valorPRECO = '/De 100 a 200 mil';
							$valor = 'AND preco BETWEEN 100000 AND 200000';
							break;
						case '3';
							echo $valorPRECO = '/De 200 a 300 mil';
							$valor = 'AND preco BETWEEN 200000 AND 300000';
							break;
						case '4';
							echo $valorPRECO = '/De 300 a 400 mil';
							$valor = 'AND preco BETWEEN 300000 AND 400000';
							break;
						case '5';
							echo $valorPRECO = '/De 400 a 500 mil';
							$valor = 'AND preco BETWEEN 400000 AND 500000';
							break;
						case '6';
							echo $valorPRECO = '/De 500 a 600 mil';
							$valor = 'AND preco BETWEEN 500000 AND 600000';
							break;
						case '7';
							echo $valorPRECO = '/De 600 a 800 mil';
							$valor = 'AND preco BETWEEN 600000 AND 800000';
							break;
						case '8';
							echo $valorPRECO = '/De 800 a 1 milh?o';
							$valor = 'AND preco BETWEEN 800000 AND 1000000';
							break;
						case '9';
							echo $valorPRECO = '/De 1 a 1.2 milh?o';
							$valor = 'AND preco BETWEEN 1000000 AND 1200000';
							break;
						case '10';
							echo $valorPRECO = '/De 1.2 a 1.4 milh?o';
							$valor = 'AND preco BETWEEN 1200000 AND 1400000';
							break;
						case '11';
							echo $valorPRECO = '/De 1.4 milh?o a 1.5 milh?o';
							$valor = 'AND preco BETWEEN 1400000 AND 1500000';
							break;
						case '12';
							echo $valorPRECO = '/Acima de 1.5 milh?o';
							$valor = 'AND preco > 1500000';
							break;
					}
					


					?>
				
				</h2>
				
				<?
				
/* PARTE DAS QUERYS REFEITA PARA FILTRAR O QUE O BOTÃO IRA MANDAR PARA O MSYSQL
*
*Ou busca normal
*Ou busca por código
*
*
*/


				$i=0;
				
				if($checkPost == "normalquery" || $checkPost == ""){
/* ANTIGA BUSCA
				
				$SQL = "SELECT 
								tbgalerias.*, tbloja_categorias.*, tbcursos.*, tbestado_categorias.*, tbconteudo_categorias.* ,
								DATE_FORMAT(tbgalerias.data,'%d/%m/%Y')  as data1
							FROM 
								tbgalerias
								LEFT JOIN tbloja_categorias ON (tbloja_categorias.id_categoria = tbgalerias.cidade)
								LEFT JOIN tbcursos ON (tbcursos.id_curso = tbgalerias.id_curso)
								LEFT JOIN tbestado_categorias ON (tbestado_categorias.id_estado = tbgalerias.estado)
								LEFT JOIN tbconteudo_categorias ON (tbconteudo_categorias.id_finalidade = tbgalerias.finalidade)
								WHERE 

									
									".$tipo."
									".$busca1."
									".$busca."
									".$valor."
									".$busca2."
																	
									
								 AND flag_status=1
								 ".$busca3."
							
							ORDER BY 
								tbgalerias.titulo DESC
								"; */


if ($_GET['g']==1) {
	$tipo = "AND tbgalerias.id_zona=1";
} 

else{
	$tipo = "AND tbgalerias.id_zona=2";
}


$SQL = "SELECT 
								tbgalerias.*, tbloja_categorias.*, tbcursos.*, tbestado_categorias.*, tbconteudo_categorias.* ,
								DATE_FORMAT(tbgalerias.data,'%d/%m/%Y')  as data1
							FROM 
								tbgalerias
								LEFT JOIN tbloja_categorias ON (tbloja_categorias.id_categoria = tbgalerias.cidade)
								LEFT JOIN tbcursos ON (tbcursos.id_curso = tbgalerias.id_curso)
								LEFT JOIN tbestado_categorias ON (tbestado_categorias.id_estado = tbgalerias.estado)
								LEFT JOIN tbconteudo_categorias ON (tbconteudo_categorias.id_finalidade = tbgalerias.finalidade)
								WHERE 1
								    ".$tipo."
									".$busca."
									".$busca1."
									".$busca3."
									".$busca2."
									".$valor."
																	
									
								 AND flag_status=1
			
							
							ORDER BY 
								tbgalerias.titulo DESC
								"; 
							



							}





							elseif($checkPost == "codigoquery"){
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
							
							WHERE flag_status=1 AND tbgalerias.id_galeria = $codigo ORDER BY tbgalerias.titulo DESC	";
							}

										


/*
								echo "<br>********Testes Implantação Novo Sistema********<br>";
								echo "SQL Query: ".$SQL;
								echo "<br>qt: ".$_GET['quartos'];
								echo "<br>bc: ".$busca;

								echo "<br>********Testes Implantação Novo Sistema********";
								
								echo "<br>VALOR: ".$valor;
								echo "<br>TIPO: ".$tipo;

								
							*/

							if($Lista->pagAtual()=='1'){

								$teste = new Consulta($SQL,99999999,$PGATUAL);
				while ($linhaa = db_lista($teste->consulta)) { $i++;
				
					$finder++;

}

								if($finder !=0 && $finder !=1){
						    echo "<h4>Foram encontrados ".$finder." imóveis</h4>";
						     }
						     elseif($finder ==1){
						     	echo "<h4>".$finder." imóvel foi encontrado</h4>";
						     }
						    else{
						    echo "<h4>Nenhum imóvel foi encontrado</h4>";				  
						      }

							}


				$Lista = new Consulta($SQL,5,$PGATUAL);
				while ($linha = db_lista($Lista->consulta)) { $i++;
				
			//		$finder++;
					//echo "valor lista: ".$Lista->;
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
				}// end while
				//echo finder
				//echo $Lista->pagAtual();
				if($Lista->pagAtual()=='1'){


$teste = new Consulta($SQL,99999999,$PGATUAL);
				while ($linhaa = db_lista($teste->consulta)) { $i++;
				
					$finder++;

}

			//	$finder = 5 * $Lista->totalPaginas();
}
				//echo "FINDER: ".$finder;




			
				?>
				
				
				
				
			
				
			 
				



				
				
				
			
			<div class="clearfix"></div>
			</div><!-- close .content-boxed -->
			
			
			<div class="pagination"><?=$Lista->geraPaginacao();?></div>
		 
			
			
			
		</div><!-- close #container-sidebar --> 
