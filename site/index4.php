<html>

<head>
	<meta charset="utf-8">
	<title>Imobiliária 7 de Setembro</title>
<script>

$(document).ready(function(){
    $("a[rel=modal]").click( function(ev){
        ev.preventDefault();
 
        var id = $(this).attr("href");
 
        var alturaTela = $(document).height();
        var larguraTela = $(window).width();
     
        //colocando o fundo preto
        $('#mascara').css({'width':larguraTela,'height':alturaTela});
        $('#mascara').fadeIn(1000);
        $('#mascara').fadeTo("slow",0.8);
 
        var left = ($(window).width() /2) - ( $(id).width() / 2 );
        var top = ($(window).height() / 2) - ( $(id).height() / 2 );
     
        $(id).css({'top':top,'left':left});
        $(id).show();  
    });
 
    $("#mascara").click( function(){
        $(this).hide();
        $(".window").hide();
    });
 
    $('.fechar').click(function(ev){
        ev.preventDefault();
        $("#mascara").hide();
        $(".window").hide();
    });
});

</script>





	<?php

							




//Algoritmo p/ tratar os campos de busca no IE antigo:
							//Não alterar
						function verificaIE(){

							if(preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT']))
							{
   							 
   							
   							 echo "style='font-size: 11px; height: 30px; width: 111px;' ";
   							


   							 
								}
							else
							{



								echo "style='font-size: 11px; height: 30px; width: 111px;' ";
   							 
							}


}
							
							?>




<!--olhar essa linha depois:::-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?=($quemsomos['titulo']);?></title>
	<meta name="description" content="imóveis, imobiliaria, <?=($quemsomos['titulo']);?>, aluguel, casa, apartamento, temporada, venda, lancamentos, corretores">
	<meta name="viewport" content="width=device-width">
	
	
<!--
	<link href="site/imoveis/style.css" rel="stylesheet">
	<link href="site/imoveis/responsive.css" rel="stylesheet">

	<link href='http://fonts.googleapis.com/css?family=PT+Sans:700%7COpen+Sans:600' rel='stylesheet' type='text/css'> 
-->

	<style>


	<? 
		include ('../site/imoveis/style.css'); 
		include ('../site/imoveis/css/responsive.css'); 
		include ('../site/css/bootstrap.min.css'); 
		include ('../site/css/bootstrap.css'); 
		include ('../site/css/bootstrap-multiselect.css'); 




	?>
	</style> 




	<script src="<?=($quemsomos['vimeo']);?>/site/imoveis/js/libs/modernizr-2.0.6.min.js"></script>
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
	<script>window.jQuery || document.write('<script src="<?=($quemsomos['vimeo']);?>/site/imoveis/js/libs/jquery-1.7.1.min.js"><\/script>')</script>

	<script src="<?=($quemsomos['vimeo']);?>/site/imoveis/js/plugins.js"></script>
	<script src="<?=($quemsomos['vimeo']);?>/site/imoveis/js/script.js"></script>


<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/bootstrap.min.js"></script>




<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>





</head>


<? 
	include ('../includes/BancoDeDados.php'); 
	include ('../includes/Funcoes.php'); 
	include ('../includes/Config.php'); 
	include ('../includes/Imagens.php'); 
	include ('../includes/Validacoes.php');
	//include ('../admin/sys/CarregaBairros.class.php');
	



	echo "
	<script type=\"text/javascript\" language=\"javascript\">
	
	function CarregaBairros(id_cidade){
		//alert(id_cidade);
		$.post('../admin/sys/carrega_bairros.php',{id:id_cidade},
			function(data){
				$('#recebendo').html(data);

			});
	}
	</script>";


	
	$datavisita=date("d/m/Y");
	if ($consultavisita = db_dados( "SELECT * FROM visitantes WHERE data=".$datavisita."")) db_consulta('UPDATE visitantes SET contador=contador+1 WHERE data='.$datavisita." LIMIT 1");
	else { db_consulta("INSERT INTO visitantes (contador, data) VALUES (1, ".$datavisita.")"); }

?>
<?
# Configurações
$dadosconfig = db_dados( "SELECT * FROM tbconfiguracoes WHERE id_config=1");
$quemsomos = db_dados("SELECT * FROM tbdepartamentos WHERE id_departamentos=150 LIMIT 1");
?>


<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>  <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> 

<!-- 
	*
	* Suporte do IE para os elementos do HTML5:::::
	*
	*

HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


<!-- isso foi comentado:: 
<html class="no-js" lang="en"> -->     <!--<![endif]--> 




<!-- antigo head aqui-->

<body>	



	<div class="header-top">
		<div class="width-container">
			<div class="header-top-left">
				<span class="phone-header-top"><?=($quemsomos['youtube']);?></span>
				<a href="mailto:<?=($quemsomos['email']);?>" class="email-header-top"><?=($quemsomos['email']);?></a>
			</div><!-- close .header-top-left -->
			<div class="social-icons">
					<a class="facebook" href="<?=($quemsomos['facebook']);?>" target="_blank"><img src="<?=($quemsomos['vimeo']);?>/site/imoveis/images/face.png"></a>
					 
			</div><!-- close .social-icons -->
		<div class="clearfix"></div>
		</div><!-- close .width-container -->
	</div>
	
	<header>
		<div class="header-border-top"></div>
		<div class="width-container" style="width: 74%;">
			
			<h1 id="logo"><a href="http://imobiliaria7setembro.com.br/site/"><img src="<?=($quemsomos['vimeo']);?>/site/imoveis/images/logo.png" alt="<?=($quemsomos['titulo']);?>"></a></h1>
			
			<nav>
				<ul class="sf-menu">
					<li>
						<a href="<?=($quemsomos['vimeo']);?>/home" class="ajusteChrome">Inicial</a>
					</li>
					
					<li>
						<a href="#" class="ajusteChrome">Empresa</a>
					<ul>
					<?
					$i=0;
					$SQL = "SELECT * FROM tblinks ORDER BY titulo DESC";
					$Lista = new Consulta($SQL,99,$PGATUAL);
					while ($linha = db_lista($Lista->consulta)) { $i++;
					?>

					<li><a href="<?=($quemsomos['vimeo']);?>/pagina/<?=$linha['id_link'];?>/<?=(nomeArquivo($linha['titulo']));?>"><?=($linha['titulo']);?></a></li>
					<?
					}
					?>
					</ul>
				    </li>
					
					<li>
						<a href="<?=($quemsomos['vimeo']);?>/site/?p=imoveis" class="ajusteChrome">Imóveis</a>
					<ul>
							<?
							$i=0;
							$SQL = "SELECT * FROM tbconteudo_categorias ORDER BY finalidade DESC";
							$Lista = new Consulta($SQL,99,$PGATUAL);
						//	while ($linha = db_lista($Lista->consulta)) { $i++;
							?>

						<!-- 	<li><a href="<?=($quemsomos['vimeo']);?>/site/?p=imoveis&c=<?=$linha['id_finalidade'];?>"><?=($linha['finalidade']);?></a></li> p-->
						<li><a href="http://imobiliaria7setembro.com.br/site/?p=imoveis&g=1&c=1&f=&l=0&preco=&checkPost=normalquery&codigo=">Venda - Urbana</a></li>
						<li><a href="http://imobiliaria7setembro.com.br/site/?p=imoveis&g=2&c=1&f=&l=0&preco=&checkPost=normalquery&codigo=">Venda - Rural</a></li>
						<li><a href="http://imobiliaria7setembro.com.br/site/?p=imoveis&g=1&c=2&f=&l=0&preco=&checkPost=normalquery&codigo=">Aluguel - Urbana</a></li>
						<li><a href="http://imobiliaria7setembro.com.br/site/?p=imoveis&g=2&c=2&f=&l=0&preco=&checkPost=normalquery&codigo=">Aluguel - Rural</a></li>

							<?
						//	}
							?>
						<!--	<li><a href="<?=($quemsomos['vimeo']);?>/site/?p=imoveis">Todos</a></li> -->
							
					  	</ul>
					</li>
				
				     <li>
						<a href="<?=($quemsomos['vimeo']);?>/site/?p=servicos" class="ajusteChrome">Serviços</a>
						
						 <ul>
						    <li>
							  <a target = "blank" href="http://www.google.com.br">2ª Via do boleto</a>
							</li>
							<li>
							  <a href="<?=($quemsomos['vimeo']);?>/site/?p=documentos">Formulários e Documentos</a>
							</li>
							<li>
							  <a href="<?=($quemsomos['vimeo']);?>/site/?p=cadastre">Cadastre seu Imóvel</a>
							</li>
							<li>
							  <a href="<?=($quemsomos['vimeo']);?>/site/?p=solicite">Solicite um Imóvel</a>
							</li>
						 </ul>
					</li>
				
				
				
				
					<li>
						<a href="<?=($quemsomos['vimeo']);?>/site/?p=blog" class="ajusteChrome">Blog</a>
					</li>
					<li>
						<a href="<?=($quemsomos['vimeo']);?>/contato" class="ajusteChrome">Contato</a>
					</li>
				</ul>

				

			</nav>
			
		<div class="clearfix" style="width: 100%;">
	
<!-- ANTIGA BUSCA CODIGO


			<div id="lado-a-lado2" style="float: right; margin-left: 80%; margin-top: -2.8%; ">
			<form method="get" class="searchform" action="http://imobhaniger.com.br/site/">
				<input type="hidden" name="p" value="busca_codigo" style="float: right;" />

				<input type="submit" class="submit-advanced" id="searchsubmit" value="BUSCAR" class="ajusteChrome" style="float: right; margin-left: 4px; height: 31.1px; border: none; background-color: #04859D; font-family: 'Open Sans',sans-serif; font-size: 11px; 
 
webkit-transition-duration: 200ms;
-webkit-transition-property: color, background;
-webkit-transition-timing-function: ease-in-out;
-moz-transition-duration: 200ms;
-moz-transition-property: color, background;
-moz-transition-timing-function: ease-in-out;
-o-transition-duration: 200ms;
-o-transition-property: color, background;
-o-transition-timing-function: ease-in-out;

box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.35) inset; color: #fff; font-weight: bold;
text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4); 


				"/>
				<input type="text" class="field" name="codigo" id="c" placeholder="Código" style="float: right; height: 31px; widht: 73px; "/>
				
				
			
			 
			</form>
          </div> close lado-a-lado2 


-->
		</div>
		</div><!-- close .width-container -->
		<div class="header-border-bottom"></div>
		
		
	</header>
	
<div class="nav-container">
<div class="nav">
	
	<div id="bg-filtro">
						
							<div id="filtro-topo" style="margin-top: 24px; padding-top: 1px; border-radius: 4px; background-image: linear-gradient(to top, rgb(56, 99, 125), rgb(3, 59, 93)); height: 100%; box-shadow: 0.1px 0.1px 10px 10px rgb(144, 184, 211); width: 94%;margin-left: 0%!important;margin-right:0%!important;padding-left: 6%;">


							<form name="normalformis" id="normalformis" method="get" class="advanced-search-form" action="http://imobiliaria7setembro.com.br/site/" style="width: 100%; margin-left: 0.5%;">
<input type="hidden" name="p" value="imoveis" style="margin: 0 0 2px;" />
						 	
							<div id="ladodir">
								
						<!--		<select name="g" class="larg-select" <?php verificaIE() ?>>  -->
						<select name="g" id="zona" multiple="multiple">

								<!--	<option value="" selected="selected">Urbana &nbsp&nbsp</option> -->
								
									<!-- Novo algoritmo para tratar dos campos de busca com titulo vindo do BD: -->
									<?
/* ANTIGO ZONA
									$i=0;
									$SQL = "SELECT * FROM tbzoneamento ORDER BY tipo_zona DESC";
									$Lista = new Consulta($SQL,99,$PGATUAL);
									while ($linha = db_lista($Lista->consulta)) { $i++;
									
									if($i==1){
									echo " <option value='".$linha['id_zona']."' selected='selected'>".$linha['tipo_zona']."</option>   ";
									}

									else{
										echo " <option value='".$linha['id_zona']."'>".$linha['tipo_zona']."</option> ";
									}
*/

									 echo "<option value='1' selected='selected'>Urbana</option> ";
									 echo "<option value='2' >Rural</option> ";


									?>

									   
									

									<?
									
									//}
									?>
								</select>

							</div>
							
							
							
							<div id="ladodir">
							
							<!--	<select name="c" class="larg-select"  <?php verificaIE() ?>> -->

							<select name="c" id="finalidade" multiple="multiple">

								<!--	<option value="" selected="selected" >Finalidade</option> -->
									<?
									$i=0;
									$SQL = "SELECT * FROM tbconteudo_categorias ORDER BY finalidade DESC";
									$Lista = new Consulta($SQL,99,$PGATUAL);
									while ($linha = db_lista($Lista->consulta)) { $i++;
									
										if($i==1){
										echo " <option value='1' selected='selected'>".$linha['finalidade']."</option>   ";
									}

									else{
										echo " <option value='2'>".$linha['finalidade'] ."</option> ";
									}




									?>

								<!--	<option value="<?=$linha['id_finalidade'];?>"><?=($linha['finalidade']);?></option>  --> 
									<?
									}
									?>
								</select>

							</div>
							
							<div id="ladodir">
								

						<!--		<select name="f" class="larg-select" <?php verificaIE() ?>   > -->
							<select name="f" id="tipos" multiple="multiple">	

							<!--		<option value="" selected="selected">Todos os tipos</option>  -->
								 
								 <!-- <option value="<?=$linha['id_curso'];?>"><?=($linha['curso']);?></option> REMOVIDO DA LINHA 447-->
									
									<?/* ANTIGO TODOS OS TIPOS 
									$i=0;
									$SQL = "SELECT * FROM tbcursos ORDER BY curso ASC";
									$Lista = new Consulta($SQL,99,$PGATUAL);
									while ($linha = db_lista($Lista->consulta)) { $i++;
									
                                    
								 
                                     if($i==1){
										echo " <option value=' ' selected='selected'>Todos os tipos</option>  ";
									}

									else{
										echo " <option value='".$linha['id_curso']."'>".$linha['curso'] ."</option> ";
									}

									*/


									 echo "<option value='' selected='selected'>Todos os tipos</option> ";
									 echo "<option value='1' >Apartamento</option> ";
									 echo "<option value='3' >Casa</option> ";									 
									 echo "<option value='11' >Chácara</option> ";
									 echo "<option value='15' >Comercial</option> ";
									 echo "<option value='18' >Com./Resd.</option> ";
									 echo "<option value='14' >Empreendimento</option> ";
									 echo "<option value='19' >Fazenda</option> ";
									 echo "<option value='2' >Loja</option> ";
									 echo "<option value='16' >Prédio</option> ";
									 echo "<option value='17' >Sítio</option> ";
									 echo "<option value='10' >Terreno</option> ";
									?>





									<?
									//}
									?>
								</select>

							</div>
							<div id="ladodir">
							

							<!-- old funcao	<select name="l" id="selecione" class="larg-select" onchange="CarregaBairros(this.value)"  <?php verificaIE() ?>> -->
									
						<!--	<select name="l" id="selecione" class="larg-select" onchange="refresh(this.value)"  <?php verificaIE() ?>> -->
								<select name="l" id="selecione" multiple="multiple" >


								<!--	<option value="0" selected="selected" >Cidade</option> 

										<option value="<?=$linha['id_categoria'];?>"><?=($linha['categoria']);?></option>  MOVIDO DA LINHA 494
								-->
								 
									
									<?
									$i=0;
									$SQL = "SELECT * FROM tbloja_categorias ORDER BY categoria ASC";
									$Lista = new Consulta($SQL,99,$PGATUAL);
									while ($linha = db_lista($Lista->consulta)) { $i++;
									

								 
                                     if($i==1){
										echo " <option value='0' selected='selected'>Cidade</option>  ";
									}

									else{
										echo " <option value=".$linha['id_categoria'].">".$linha['categoria'] ."</option> ";
									}




									?>




                                    
								 
									<?
									}
									?>
								</select>


							




							</div>
							
							<div id="ladodir">
							




						<!--
								<select name="m" id="recebendo" class="larg-select"  <?php verificaIE() ?>> 
									<option value="" selected="selected"> Todos Bairros  </option> 
								</select>  -->










								<!-- MULTI SELECT DE BAIRROS -->
								<select name="m[]" id="recebendo" multiple="multiple"></select>









<script type="text/javascript">


function contaQuartos(quartos){

	var getQuartos = quartos;

	alert(getQuartos);

	return getQuartos;


}


var objetoDados = document.getElementById("recebendo");
var vetor = [];


$(document).ready(function() {



$('#recebendo').multiselect({

buttonClass: 'btn btn-info',
nonSelectedText: 'Todos Bairros',
enableFiltering: true,
filterPlaceholder: 'Busca',
enableCaseInsensitiveFiltering: false,
includeSelectAllOption: false,

onDropdownHide: function(option, checked, element) {

alert(option.val());

if(option.val()==null){

//se der merda. mudar esse recebendo para um #zona
$("#recebendo").multiselect('select', '');



}



}




	});


/*
$('#zona').multiselect({

buttonClass: 'btn btn-info',
includeSelectAllOption: false,
nonSelectedText: 'Urbana'



	});


 $('#zona').multiselect({
onChange: function(option, checked) {
var values = [];
$('#zona option').each(function() {
if ($(this).val() !== option.val()) {
values.push($(this).val());
}
});
$('#zona').multiselect('deselect', values);
}
});
*/



 $('#zona').multiselect({

nonSelectedText: 'Urbana',
includeSelectAllOption: false,

 




onChange: function(option, checked, element) {


//alert(option.val());

/*
if(checked == false) {
$("#zona").multiselect('select', element.val());
}*/


if(checked == true) {
// action taken here if true
}
else if (checked == false) {

$("#zona").multiselect('select', option.val());

}



var selected = 0;
$('option', $('#zona')).each(function() {
if ($(this).prop('selected')) {

selected++;
}
});
 
if (selected >= 1) {
$('#zona').siblings('div').children('ul').dropdown('toggle');
}


var values = [];
$('#zona option').each(function() {
if ($(this).val() !== option.val()) {
values.push($(this).val());
}
});

$('#zona').multiselect('deselect', values);


} // end função

}); // end Zona



$('#finalidade').multiselect({

nonSelectedText: 'Venda',
includeSelectAllOption: false,

 




onChange: function(option, checked, element) {


//alert(option.val());

/*
if(checked == false) {
$("#zona").multiselect('select', element.val());
}*/


if(checked == true) {
// action taken here if true
}
else if (checked == false) {

$("#finalidade").multiselect('select', option.val());

}



var selected = 0;
$('option', $('#finalidade')).each(function() {
if ($(this).prop('selected')) {

selected++;
}
});
 
if (selected >= 1) {
$('#finalidade').siblings('div').children('ul').dropdown('toggle');
}


var values = [];
$('#finalidade option').each(function() {
if ($(this).val() !== option.val()) {
values.push($(this).val());
}
});

$('#finalidade').multiselect('deselect', values);


}

}); // end Finalidade



$('#preco').multiselect({

nonSelectedText: 'Faixa de valor',
includeSelectAllOption: false,
maxHeight: 280,

 




onChange: function(option, checked, element) {


//alert(option.val());

/*
if(checked == false) {
$("#zona").multiselect('select', element.val());
}*/


if(checked == true) {
// action taken here if true
}
else if (checked == false) {

$("#preco").multiselect('select', option.val());

}



var selected = 0;
$('option', $('#preco')).each(function() {
if ($(this).prop('selected')) {

selected++;
}
});
 
if (selected >= 1) {
$('#preco').siblings('div').children('ul').dropdown('toggle');
}


var values = [];
$('#preco option').each(function() {
if ($(this).val() !== option.val()) {
values.push($(this).val());
}
});

$('#preco').multiselect('deselect', values);


}

}); // end Finalidade







$('#tipos').multiselect({

nonSelectedText: 'Todos os tipos',
includeSelectAllOption: false,
maxHeight: 200,


onChange: function(option, checked, element) {


//alert(option.val());

/*
if(checked == false) {
$("#zona").multiselect('select', element.val());
}*/


if(checked == true) {
// action taken here if true
}
else if (checked == false) {

$("#tipos").multiselect('select', option.val());

}



var selected = 0;
$('option', $('#tipos')).each(function() {
if ($(this).prop('selected')) {

selected++;
}
});
 
if (selected >= 1) {
$('#tipos').siblings('div').children('ul').dropdown('toggle');
}


var values = [];
$('#tipos option').each(function() {
if ($(this).val() !== option.val()) {
values.push($(this).val());
}
});

$('#tipos').multiselect('deselect', values);


}

}); // end Tipos





$('#selecione').multiselect({

nonSelectedText: 'Cidade',
includeSelectAllOption: false,
maxHeight: 200,



onChange: function(option, checked, element) {
/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////RECONSTRUÇÃO DA FUNÇÃO REFRESH//////////////////////////////////////////////////////


//alert(option.val());

/*
if(checked == false) {
$("#zona").multiselect('select', element.val());
}*/

$('#recebendo').empty();
$('#recebendo').multiselect('destroy');
$('#recebendo').multiselect({

buttonClass: 'btn btn-info',
includeSelectAllOption: true,
nonSelectedText: 'Todos Bairros',
enableFiltering: true,
filterPlaceholder: 'Busca',
enableCaseInsensitiveFiltering: true,
 maxHeight: 280,

onDropdownHide: function(option, checked, element) {

alert(option.val());
alert('teste');

if(option.val()==null){

//se der merda, mudar para #zona
$("#recebendo").multiselect('select', '');



}

}






	});


//alert('option val: '+ option.val() );


var id = option.val();

//alert(id);


if(id==18){ //Bairros porto alegre
        
                    var vetor = ['Agronomia',
'Anchieta',
'Arquipélago',
'Auxiliadora',
'Azenha',
'Bela Vista',
'Belém Novo',
'Belém Velho',
'Boa Vista',
'Bom Jesus',
'Bom Fim',
'Camaquã',
'Campo Novo',
'Cascata',
'Cavalhada',
'Centro',
'Chácara das Pedras',
'Chapéu do Sol',
'Cidade Baixa',
'Coronel Aparício Borges',
'Cristal',
'Cristo Redentor',
'Espírito Santo',
'Farrapos',
'Farroupilha',
'Floresta',
'Glória',
'Guarujá',
'Higienópolis',
'Hípica',
'Humaitá',
'Independência',
'Ipanema',
'Jardim Botânico',
'Jardim Carvalho',
'Jardim Floresta',
'Jardim Isabel',
'Jardim Itu-Sabará',
'Jardim Lindóia',
'Jardim do Salso',
'Jardim São Pedro',
'Lageado',
'Lami',
'Lomba do Pinheiro',
'Marcílio Dias',
'Mário Quintana',
'Medianeira',
'Menino Deus',
'Moinhos de Vento',
'Mont Serrat',
'Navegantes',
'Nonoai',
'Partenon',
'Passo D Areia',
'Pedra Redonda',
'Petrópolis',
'Ponta Grossa',
'Praia de Belas',
'Restinga',
'Rio Branco',
'Rubem Berta',
'Santa Cecília',
'Santa Maria Goretti',
'Santa Tereza',
'Santana',
'Santo Antônio',
'São Geraldo',
'São João',
'São José',
'São Sebastião',
'Sarandi',
'Serraria',
'Teresópolis',
'Três Figueiras',
'Tristeza',
'Vila Assunção',
'Vila Conceição',
'Vila Ipiranga',
'Vila Jardim',
'Vila João Pessoa',
'Vila Nova',
'Zona Indefinida'
];

                for(i=0;i<vetor.length;i++){
                    	


$('#recebendo').append( //adiciona os bairros no multi select

             $('<option></option>')
                        .text(vetor[i])
                        .val(vetor[i])

                      

); // fim do append




                    }  //fim do for combinatorio, add elementos
$('#recebendo').multiselect('rebuild'); //reconstroi o select                    

//TODO: for para selecionar tudo do vetor -OK

/*
 for(i=0;i<vetor.length;i++){
$('#recebendo').multiselect('select',' ');
$('#recebendo').multiselect('select', vetor[i]); //seta os bairros selecionados
}*/


}//fim if porto alegre



else if(id==14){ //Bairros guaíba
        
                    var vetor = ['Alegria','Altos da Alegria','Alvorada','Bela Vista','Bom Fim Novo','Bom Fim Velho','Centro','Chácara das Paineiras','Cohab','Colina','Columbia City','Coronel Nassuca','Engenho','Ermo','Fátima','Florida','Ipê','Jardim dos Lagos','Jardim Panorama','Laranjeiras','Neiva','Nova Guaíba','Parque 35','Parque Noli','Passo Fundo','Pedras Brancas','Primavera','Ramada','Ruy Coelho Gonçalves','Santa Rita','São Francisco','São Geraldo','São Jorge','Spagiari','Vera Cruz','Vila Elza','Vila Iolanda','Vila Jardim','Vila Nova'];

                for(i=0;i<vetor.length;i++){
                    


$('#recebendo').append( //adiciona os bairros no multi select

             $('<option></option>')
                        .text(vetor[i])
                        .val(vetor[i])

                      

); // fim do append




                    }  //fim do for combinatorio, add elementos
$('#recebendo').multiselect('rebuild'); //reconstroi o select                  
//TODO: for para selecionar tudo do vetor -OK

/*
 for(i=0;i<vetor.length;i++){
$('#recebendo').multiselect('select',' ');
$('#recebendo').multiselect('select', vetor[i]); //seta os bairros selecionados
}*/



}//fim if guaiba




else if(id==17){ //Bairros arroio
        
                    var vetor = ['Arroio Seco','Balneáreo Alfa','Balneáreo Atlântico','Balneáreo São Paulo','Bom Jesus','Centro','Jardim Olivia','Jardim Raiante','Praia Azul','Praia da Figueira','Praia de Areias Brancas','Praia de Miramar','Praia de Rondinha','Rondinha Nova','São Jorge','Vista Alegre'];

                for(i=0;i<vetor.length;i++){
                    


$('#recebendo').append( //adiciona os bairros no multi select

             $('<option></option>')
                        .text(vetor[i])
                        .val(vetor[i])

); // fim do append

                    }  //fim do for combinatorio, add elementos

$('#recebendo').multiselect('rebuild'); //reconstroi o select    

//TODO: for para selecionar tudo do vetor -OK

/*
 for(i=0;i<vetor.length;i++){
$('#recebendo').multiselect('select',' ');
$('#recebendo').multiselect('select', vetor[i]); //seta os bairros selecionados
}*/
     
}//fim if arroio


else if(id==16){ //Bairros barra
        
                    var vetor = ['Centro','Pavão','Passo Grande','Três Vendas','Zona Rural'];

                for(i=0;i<vetor.length;i++){
                    


$('#recebendo').append( //adiciona os bairros no multi select

             $('<option></option>')
                        .text(vetor[i])
                        .val(vetor[i])

); // fim do append

                    }  //fim do for combinatorio, add elementos
$('#recebendo').multiselect('rebuild'); //reconstroi o select

//TODO: for para selecionar tudo do vetor -OK

/*
 for(i=0;i<vetor.length;i++){
$('#recebendo').multiselect('select',' ');
$('#recebendo').multiselect('select', vetor[i]); //seta os bairros selecionados
}*/


}//fim if barra


else if(id==15){ //Bairros eldorado
        
                    var vetor = ['Bom Retiro','Centro','Chácara','Cidade Verde','Parque Eldorado','Picada','Sans Souci'];

                for(i=0;i<vetor.length;i++){
                    


$('#recebendo').append( //adiciona os bairros no multi select

             $('<option></option>')
                        .text(vetor[i])
                        .val(vetor[i])

); // fim do append

                    }  //fim do for combinatorio, add elementos
$('#recebendo').multiselect('rebuild'); //reconstroi o select                   

//TODO: for para selecionar tudo do vetor -OK

/*
 for(i=0;i<vetor.length;i++){
$('#recebendo').multiselect('select',' ');
$('#recebendo').multiselect('select', vetor[i]); //seta os bairros selecionados
}*/

}//fim if eldorado







/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
if(checked == true) {
// action taken here if true
}
else if (checked == false) {

$("#selecione").multiselect('select', option.val());

}



var selected = 0;
$('option', $('#selecione')).each(function() {
if ($(this).prop('selected')) {

selected++;
}
});
 
if (selected >= 1) {
$('#selecione').siblings('div').children('ul').dropdown('toggle');
}


var values = [];
$('#selecione option').each(function() {
if ($(this).val() !== option.val()) {
values.push($(this).val());
}
});

$('#selecione').multiselect('deselect', values);


}

}); // end Selecione






}); // end JQuery



</script>

						
					


							</div>
							

							



							<div id="ladodir">
							 <!--   <select name="preco" class="larg-select"  <?php verificaIE() ?>> -->
									
							    	<select name="preco" id="preco" multiple="multiple" >

									<option value="" selected="selected" >Faixa de Valor</option>
									<option value="1">Até 100 mil</option>
									<option value="2">De 100 a 200 mil</option>
									<option value="3">De 200 a 300 mil</option>
									<option value="4">De 300 a 400 mil</option>
									<option value="5">De 400 a 500 mil</option>
									<option value="6">De 500 a 600 mil</option>
									<option value="7">De 600 a 800 mil</option>
									<option value="8">De 800 a 1 milhão</option>
									<option value="9">De 1 a 1.2 milhão</option>
									<option value="10">De 1.2 a 1.4 milhão</option>
									<option value="11">De 1.4 a 1.5 milhão</option>
									<option value="12">Acima de 1.5 milhão</option>
								</select>
							</div>

							<!-- Antiga drop box dos dormitórios:
							<div id="ladodir">
							    <select name="quarto1" class="larg-select"  <?php verificaIE() ?>>
									<option value="" selected="selected" >Dormitórios</option>
									<option value="1" name="quarto1">1 quarto</option>
									<option value="2" name="quarto2">2 quartos</option>
									<option value="3" name="quarto3">3 quartos</option>
									<option value="4" name="quarto4">4 quartos</option>
	
								</select>
							</div>-->
						


					  
			<div id="ladodir">
		
<!-- ************************************* bootstrap  multi select -->


		<select name="quartos[]" id="dormitorios" multiple="multiple">

			<option value="1">1 quarto&nbsp&nbsp</option>
			<option value="2">2 quartos</option>
			<option value="3">3 quartos</option>
			<option value="4">4 quartos</option>

</select>


<style type="text/css">
	.nav ul li a:hover{text-decoration: none;}

</style>



<script type="text/javascript">


function contaQuartos(quartos){

	var getQuartos = quartos;

	alert(getQuartos);

	return getQuartos;


}


var objetoDados = document.getElementById("dormitorios");
var vetor = [];


$(document).ready(function() {
$('#dormitorios').multiselect({

buttonClass: 'btn btn-info',



	});
});

</script>


				</div>

			





	<!--						<script>
					//jquery para ajustar o botao de busca
					if ($.browser.mozilla) {
			$("#ladodir").css('top', '2px');
			</script>  -->



							<div id="ladodir">
<input type="hidden" name="checkPost" id="checkPost"  />

<form id="codigoform" name="codigoform" method="get" class="searchform" action="http://imobiliaria7setembro.com.br/site/">

							
							<input type="text" onkeypress="return Enviar(event)" class="field" name="codigo" id="c" placeholder="Código" style=" height: 31px; width: 60px; "/>
						<!-- antigo buscar	<input type="submit" class="submit-advanced" value="BUSCAR" -->

						<input onclick="verbusca()" type="button" class="submit-advanced" value="BUSCAR" id="busc"
							<?php

							//Algoritmo p/ tratar o botão de busca nos diferentes navegadores:
							//Não alterar pq deu trabalho...

							if(isset($_SERVER['HTTP_USER_AGENT'])){
    						$agent = $_SERVER['HTTP_USER_AGENT'];

    						if(strlen(strstr($agent,"Firefox")) > 0 ){      
    						$browser = 'firefox';
							}

							if($browser=='firefox'){
    					echo " style='font-size: 11px;height: 29px; margin-top: -39px;margin-left: 70px' ";
								}

							else{
								echo " style='padding-left: 13px; width: 70px; font-size: 11px; height: 29px; margin-top: -39px; margin-left: 70px; ' ";
							}
}


							
							?>/>
							</form>

							</div>


		<script>

/* Método para auxiliar na pesquisa, utilizandoo mesmo botao e alternando entre:
*
*
* Pesquisa normal: utiliza todos os filtros
* Pesquisa por código: anula todos os filtros, e pesquisa por código
*
* Data: 10/04/2014
* Inicio de produção: 08:00
* Término de produção: 11:38
*/

//Método para capturar o ENTER no campo de código, caso o usuário deseje buscar
//sem utilizar o botão:


function OnEnter(evt)
{
    var key_code = evt.keyCode  ? evt.keyCode  :
                       evt.charCode ? evt.charCode :
                       evt.which    ? evt.which    : void 0;
 
 
    if (key_code == 13)
    {
        return true;
    }
}


function Enviar(e)
{
    if(OnEnter(e)) {
    //   alert('O formulário pode ser enviado');
  

	var valor = document.getElementById('c').value;
//alert('valor do campo: '+ valor);


	if (valor != '') {

var campo = document.getElementById("checkPost");

campo.value = "codigoquery";

  //	alert('codigo definido');

 

document.forms['normalformis'].submit(); 

  //  alert('submit pass');
}

			else{
		//			alert('codigo indefinido');
			

var campo = document.getElementById("checkPost");
campo.value = "normalquery";

				document.forms['normalformis'].submit(); 
		
			//	alert('submit pass');
					
			}





        return false;
    }
    else  {
        return true;
    }
}








//ENVIO DO FORM PELO BOTAO:

			function verbusca(){
	
//atual -- ctrl f easy finder


//	alert('entrou func');

	var valor = document.getElementById('c').value;
//alert('valor do campo: '+ valor);


	if (valor != '') {

var campo = document.getElementById("checkPost");

campo.value = "codigoquery";

 // 	alert('codigo definido');
 // document.codigoform.submit();
 
 //document.forms['codigoform'].submit(); 

document.forms['normalformis'].submit(); 

//  alert('submit pass');
}

			else{
				//	alert('codigo indefinido');
				//	document.p.submit();

var campo = document.getElementById("checkPost");
campo.value = "normalquery";

				document.forms['normalformis'].submit(); 
		
			//	alert('submit pass');
					
			}


			}

		</script>				


<!--
<div class="checkBoxes">
                              <label>Dormitorios</label>
                              <label>&nbsp;1&nbsp;</label>
                              <label>&nbsp;2&nbsp;</label>
                              <label>&nbsp;3&nbsp;</label>
                              <label>&nbsp;4&nbsp;</label>
                              <div style="float:left; position:relative;"><input type="checkbox" name="quarto1" value="1"></div>
                              <div style="float:left; position:relative;"><input type="checkbox" name="quarto2" value="2">&nbsp;2&nbsp;</div>
                              <div style="float:left; position:relative;"><input type="checkbox" name="quarto3" value="3">&nbsp;3&nbsp;</div>
                              <div style="float:left; position:relative;"><input type="checkbox" name="quarto4" value="4">&nbsp;4&nbsp;</div>


							</div>  -->
							
		
				 

							<div class="clearfix"></div>

						</form>

						</div><!-- close .social-icons -->
<!--
<div class="checkBoxes">
                             
                              <input type="checkbox" name="quarto1" value="1"><label>&nbsp;1&nbsp;</label> 
                             <input type="checkbox" name="quarto2" value="2"> <label>&nbsp;2&nbsp;</label> 
                             <input type="checkbox" name="quarto3" value="3"> <label>&nbsp;3&nbsp;</label> 
                               <input type="checkbox" name="quarto4" value="4"><label>&nbsp;4 Dormitórios&nbsp;</label>
                             
                             </div> -->

					</div><!-- close .content-boxed -->
	
<!--	<div id="search-container" style='padding: 6px 0px;'>
		<div class="width-container">
          <div id="lado-a-lado1">
			<form method="get" class="searchform" action="<?=($quemsomos['vimeo']);?>/site/">
				<input type="hidden" name="p" value="busca" />
				<input type="text" class="field" name="palavra" id="s" placeholder="Ex. casa no centro" />
				<input type="submit" class="submit" id="searchsubmit" value="Buscar" class="ajusteChrome"/>

-->

<!--
<div id="lado-a-lado2">
			<form method="get" class="searchform" action="<?=($quemsomos['vimeo']);?>/site/">
				<input type="hidden" name="p" value="busca_codigo" />
				<input type="text" class="field" name="codigo" id="c" placeholder="Busca por Código do Imóvel" style/>
				<input type="submit" class="submit" id="searchsubmit" value="Buscar" class="ajusteChrome"/>
				
				<div class="clearfix"></div> 
			 
			</form>
          </div> close lado-a-lado2   -->

				
			<!--	<div class="clearfix"></div> -->




			</form>
          </div><!-- close lado-a-lado1 -->

		</div><!-- close width-container -->
		
		
		
	<div class="clearfix"></div>
	</div><!-- close #search-container -->

</div><!-- close class="nav-container" -->
</div><!-- close class="nav" -->

	
	



		<?
				// Inclusão das páginas do portal
				include ('secoes.php');
		?>







			
			<div id="sidebar">
								
				
				<!--
				<div class="content-boxed">
					<h2 class="title-bg">Encontre</h2>
					<ul>
						//<?
						//$i=0;
						//$SQL = "SELECT * FROM tbcursos ORDER BY curso ASC";
						//$Lista = new Consulta($SQL,99,$PGATUAL);
						//while ($linha = db_lista($Lista->consulta)) { $i++;
						//?>

						//<li><a href="<?=($quemsomos['vimeo']);?>/site/?p=imoveis&f=<?=$linha['id_curso'];?>"><?=($linha['curso']);?></a></li> 
						//<?
						//}
						//?>
					</ul>
				</div> close .content-boxed -->
				
				<div class="content-boxed">
					<h2 class="title-bg" class="ajusteChrome">Últimos</h2>
					<ul class="widget-listings">
							<?
							//ADD IF EM PHP PARA DETERMINAR A QUERY DE PESQUISA
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
							$Lista = new Consulta($SQL,15,$PGATUAL);
							while ($linha = db_lista($Lista->consulta)) { $i++;
							?>

							<li>
								<a href="<?=($quemsomos['vimeo']);?>/<?=$linha['id_galeria'];?>/<?=(nomeArquivo($linha['titulo']));?>">
								<div class="property-thumbnail">
									<img src="<?=($quemsomos['vimeo']);?>/arquivos/galeria/<?=($linha['codigo']);?>/capa.jpg" alt="<?=($linha['titulo']);?>">
								</div>
								<div class="property-meta">
									<div class="listings-address-widget"><?=$linha['bairro'];?></div>
									<div class="listings-street-widget"><?=$linha['categoria'];?> - <?=$linha['estado'];?></div>
									<div class="listings-price-widget">R$ <?php echo number_format($linha['preco'],2,',','.');?></div>
								</div>
								<div class="clearfix"></div>
								</a>
							</li>
 

							<?
							}
							?>
					</ul>
					
					
				</div><!-- close .content-boxed -->
				
				<div class="content-boxed">
				
					<h2 class="title-bg">Social</h2>


					<div class="social-icons-widget">

						<a  href="<?=($quemsomos['facebook']);?>" target="_blank" class="social-facebook">Facebook</a>
	 
						<div class="clearfix"></div>
						
					</div><!-- close .social-icons -->
				</div><!-- close .content-boxed -->
				

				
				<div class="content-boxed">
					<h2 class="title-bg">Blog</h2>
					<ul class="widget-listings">
								<?
		
			 

				$i=0;
				$SQL = " SELECT
						tbnoticias.*,
						DATE_FORMAT(tbnoticias.data,'%d/%m/%Y')  as data1 ,
						tbnoticias_categorias.*
					FROM 
						tbnoticias
						INNER JOIN tbnoticias_categorias ON (tbnoticias_categorias.id_categoria = tbnoticias.id_categoria)
				 
					ORDER BY 
						data DESC
						";	
						
			 
?>
<?

	$Lista = new Consulta($SQL,3,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) { $i++;
?>

							<li>
								<a href="<?=utf8_decode($dadosconfig['url']);?>/site/?p=blog&id=<?=$linha['id_noticia'];?>"> 
								<div class="property-thumbnail">
									<? if (strlen($linha['imagem'])>0)  { ?>  
							         <a href="<?=utf8_decode($dadosconfig['url']);?>/site/?p=blog&id=<?=$linha['id_noticia'];?>"><img src="<?=utf8_decode($dadosconfig['url']);?>/img.php?img=arquivos/noticias/<?=$linha['imagem'];?>&x=60&y=60&corta=0"/>
							    <? } else {  } ?>
								</div> </a> 
								<div class="property-meta">
								<a href="<?=utf8_decode($dadosconfig['url']);?>/site/?p=blog&id=<?=$linha['id_noticia'];?>">	<p><?=($linha['titulo']);?></p></a>
								</div>
								<div class="clearfix"></div>
								
							</li>
 

							
					 	<?
						}
						?>

						 
					</ul>
					
					
				</div><!-- close .content-boxed -->

				
				
				
				<div class="clearfix"></div>
				
			</div><!-- close #sidebar -->
			
			
			
			
			
			
		<div class="clearfix"></div>
		</div><!-- close .width-container -->
	</div><!-- close #main -->


	<footer>
		<div class="width-container">
				
				<div class="grid4column">
					<h4><?=($quemsomos['titulo']);?></h4>
					<span><?=($quemsomos['texto']);?></span>
					
				</div>
				
				<div class="grid4column">
					<h4>Catálogo de imóveis</h4>
					<ul>
						<?
						$i=0;
						$SQL = "SELECT * FROM tbcursos ORDER BY curso ASC";
						$Lista = new Consulta($SQL,99,$PGATUAL);
						while ($linha = db_lista($Lista->consulta)) { $i++;
						?>

						<li><a href="<?=($quemsomos['vimeo']);?>/site/?p=imoveis&f=<?=$linha['id_curso'];?>"><?=($linha['curso']);?></a></li> 
						<?
						}
						?>
					</ul>
				</div>
				
				<div class="grid4column">
					<h4>Empresa</h4>
					<ul>
						<?
						$i=0;
						$SQL = "SELECT * FROM tblinks ORDER BY titulo DESC";
						$Lista = new Consulta($SQL,99,$PGATUAL);
						while ($linha = db_lista($Lista->consulta)) { $i++;
						?>

						<li><a href="<?=($quemsomos['vimeo']);?>/pagina/<?=$linha['id_link'];?>/<?=(nomeArquivo($linha['titulo']));?>"><?=($linha['titulo']);?></a></li>
						<?
						}
						?>
						
					<li>
						<a href="<?=($quemsomos['vimeo']);?>/site/?p=blog">Blog</a>
					</li>
					<li>
						<a href="<?=($quemsomos['vimeo']);?>/contato">Contato</a>
					</li>
					</ul>
				</div>
				
				<div class="grid4column lastcolumn">
					<h4>Atendimento</h4>
					<div class="location-widget">
						<span>Telefone</span>: <div id="fone"><?=($quemsomos['youtube']);?></div>
						<br><span>E-mail</span>: <a href="mailto:<?=($quemsomos['email']);?>" ><?=($quemsomos['email']);?></a>
					</div>
				</div>
			
		<div class="clearfix"></div>
		</div><!-- close .width-container -->
		<div id="copyright">
			<div class="width-container">
				<span class="copyright-left"><?=($quemsomos['titulo']);?>
			    - Todos os direitos reservados. Desenvolvido por <a href="http://www.haniger.com.br" target="_blank">Haniger</a></span></div>
		  <!-- close .width-container -->	
		</div><!-- close #copyright -->

	</footer>

</body>
</html>
