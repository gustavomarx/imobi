
<head>

<style>


	<? 
		include ('http://imobiliaria7setembro.com.br/site/imoveis/style.css'); 
		include ('http://imobiliaria7setembro.com.br/site/imoveis/css/responsive.css'); 
		include ('http://imobiliaria7setembro.com.br/site/css/bootstrap.min.css'); 
		include ('http://imobiliaria7setembro.com.br/site/css/bootstrap.css'); 
		include ('http://imobiliaria7setembro.com.br/site/css/bootstrap-multiselect.css'); 




	?>
	</style> 





	<script src="<?=($quemsomos['vimeo']);?>/site/imoveis/js/libs/modernizr-2.0.6.min.js"></script>
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
	<script>window.jQuery || document.write('<script src="<?=($quemsomos['vimeo']);?>/site/imoveis/js/libs/jquery-1.7.1.min.js"><\/script>')</script>

	<script src="<?=($quemsomos['vimeo']);?>/site/imoveis/js/plugins.js"></script>
	<script src="<?=($quemsomos['vimeo']);?>/site/imoveis/js/script.js"></script>



<link rel="stylesheet" href="http://imobiliaria7setembro.com.br/site/css/bootstrap.min.css">
<link rel="stylesheet" href="http://imobiliaria7setembro.com.br/site/css/bootstrap.css">
<script src="http://imobiliaria7setembro.com.br/site/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="http://imobiliaria7setembro.com.br/site/css/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="http://imobiliaria7setembro.com.br/site/js/bootstrap-multiselect.js"></script>

</head>







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









<div id="alinha-voltar">
  <div id="voltar">
    <a href="javascript:window.history.go(-1)"><img src="<?=($quemsomos['vimeo']);?>/voltar.png"></a>
  </div>
</div>

<?

if ($_GET['id']>0) {
	$busca = " AND id_galeria=".(int)$_GET['id'];
} else if ($_GET['categoria']>0) {
	$busca = " AND tbgalerias.id_galeria=".(int)$_GET['categoria'];
}

$dados = db_dados("
	SELECT 
		tbgalerias.*, tbloja_categorias.*, tbcursos.*, tbestado_categorias.*, tbconteudo_categorias.* ,
		DATE_FORMAT(tbgalerias.data,'%d/%m/%Y')  as data1
	FROM 
		tbgalerias
		LEFT JOIN tbloja_categorias ON (tbloja_categorias.id_categoria = tbgalerias.cidade)
		LEFT JOIN tbcursos ON (tbcursos.id_curso = tbgalerias.id_curso)
		LEFT JOIN tbestado_categorias ON (tbestado_categorias.id_estado = tbgalerias.estado)
		LEFT JOIN tbconteudo_categorias ON (tbconteudo_categorias.id_finalidade = tbgalerias.finalidade)
	WHERE 1
		".$busca." AND flag_status=1
	ORDER BY 
		data DESC
	LIMIT 1;
		");
	$dados['titulo']=str_replace('\\','',$dados['titulo']);
	$dados['texto']=str_replace('\\','',$dados['texto']);
	
	db_consulta('UPDATE tbgalerias SET contador=contador+1 WHERE id_galeria='.(int)$dados['id_galeria']." LIMIT 1");
	
?>
	
	
	
	
	
	
	<div id="main">
		<div class="width-container">

			<div id="container-sidebar">
				
				
				<div class="content-boxed">
					<h2 class="title-bg"><?=$dados['finalidade'];?> de <?=$dados['titulo'];?> <span>R$ <?=$dados['preco'];?></span></h2>
					
					
					
					
					<div class="property-listing-single">
						
						
					
						<div id="property-single-slider">
						<div id="slider" class="flexslider">
				          <ul class="slides">
				            

								<?
								  	$fotos = db_consulta("SELECT * FROM tbgalerias_fotos WHERE 1 ".$busca." AND flag_status=1 ORDER BY posicao ASC;");
									$i=0;
									if (db_linhas($fotos)>0) {
									while ($foto = db_lista($fotos)) { $i++;
								?>
								<li>
					  	    	    <a href="<?=utf8_decode($dadosconfig['url']);?>/arquivos/galeria/<?=$dados['codigo'];?>/fotos/<?=$foto['imagem'];?>" rel="prettyPhoto[gallery]">
										<img src="<?=utf8_decode($dadosconfig['url']);?>/arquivos/galeria/<?=$dados['codigo'];?>/fotos/<?=$foto['imagem'];?>" />
									</a>
					  	    	</li>
								 
								<?
								if (($i%7)==0) echo '';
								}
								?>
								<?
								} else echo '';

								  ?>
				
							
							
				          </ul>
				        </div>
						
						<div id="carousel" class="flexslider">
				          <ul class="slides">
								<?
								  	$fotos = db_consulta("SELECT * FROM tbgalerias_fotos WHERE 1 ".$busca." AND flag_status=1 ORDER BY posicao ASC;");
									$i=0;
									if (db_linhas($fotos)>0) {
									while ($foto = db_lista($fotos)) { $i++;
								?>
									<li>

											<img src="<?=utf8_decode($dadosconfig['url']);?>/arquivos/galeria/<?=$dados['codigo'];?>/miniaturas/<?=$foto['imagem'];?>" />

						  	    	</li>

								<?
								if (($i%7)==0) echo '';
								}
								?>
								<?
								} else echo '';

								  ?>
							 
							 
				          </ul>
				        </div>
				
						</div>
						<div class="clearfix"></div>
						<script type="text/javascript">
						jQuery(document).ready(function($) {
						    $(window).load(function(){
						      $('#carousel').flexslider({
						        animation: "slide",
						        controlNav: false,
						        animationLoop: false,
						        slideshow: false,
						        itemWidth: 145,
						        itemMargin: 15,
						        asNavFor: '#slider'
						      });

						      $('#slider').flexslider({
						        animation: "fade",
						        controlNav: false,
						        animationLoop: false,
						        slideshow: false,
						        sync: "#carousel",
						        start: function(slider){
						          $('body').removeClass('loading');
						        }
						      });
						    });
						});
						</script>
						
						
					</div>
					
					
					
					
					<p><?=($dados['conteudo']);?></p>


					<h5 class="additional-features-headline">Informações</h5>

					<br />
								
											<div class="listings-street-widget"><?=$dados['bairro'];?>, <?=$dados['categoria'];?> - <?=$dados['estado'];?></div>
											
											<div class="listings-price-widget"><?=$dados['finalidade'];?>: R$ <?=$dados['preco'];?></div>
											<div class="property-information-price">Código:<?=$dados['id_galeria'];?></div>

												<div class="clearfix"></div>

				
					
					
					<h5 class="additional-features-headline">Adicionais</h5>
					<ul class="additional-features">
								<?
								$i=0;
								$SQL = "SELECT 
												tbmaterias.*, liga_prof.* 
											FROM 
												tbmaterias
												LEFT JOIN liga_prof ON (liga_prof.id_materia = tbmaterias.id_materia) 
											WHERE liga_prof.id_galeria = ".(int)$_GET['id']."
											ORDER BY 
												tbmaterias.nome DESC
												";
								$Lista = new Consulta($SQL,999,$PGATUAL);
								while ($linha = db_lista($Lista->consulta)) { $i++;
								?>



			<li><?=($linha['nome']);?></li>



								<?
								}
								?>
					</ul>
					
					<div class="clearfix"></div>


				
					<div class="share-section-listing">
						<span class="share-text">Compartilhe este im&oacute;vel:</span>
						<script type="text/javascript">var switchTo5x=true;</script>
						<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
						<script type="text/javascript">stLight.options({publisher: "b779a7d6-8947-431e-8a89-abe575e1b4b0"}); </script>
						<span class='st_facebook' displayText='Facebook'></span>
						<span class='st_twitter' displayText='Twitter'></span>
						<span class='st_pinterest' displayText='Pinterest'></span>
						<span class='st_email' displayText='E-mail'></span>
						<span class="st_print"><a href="javascript:window.print()">Imprimir</a></span>
						<div class="clearfix"></div>
					</div>

					
					
					
				
				<div class="clearfix"></div>
				</div><!-- close .content-boxed -->
				
				
		</div>		
				
				
				
					<div id="sidebar">


						<div class="content-boxed">
							<h2 class="title-bg">Informa&ccedil;&otilde;es gerais</h2>
							<div id="sidebar-map">

							 <a href="<?=$dados['mapa'];?>&output=embed?iframe=true&width=90%25&height=90%25" rel="prettyPhoto"><img src="<?=($quemsomos['vimeo']);?>/mapa.png"></a>

								</div>
								<div id="more-map">
									<a href="https://maps.google.com.br/?ll=-16.337941,-48.951001&spn=0.008607,0.016522&t=h&z=17&output=embed?iframe=true&width=90%25&height=90%25" rel="prettyPhoto">Ver mapa &uarr;</a><!-- just plug in the address and leave other options alone -->
								</div>
								<div class="clearfix"></div>

								<div class="property-meta-single">
									
									<div class="listings-address-widget"><?=$dados['bairro'];?>, <?=$dados['categoria'];?> - <?=$dados['estado'];?></div>
									
									<div class="listings-price-widget"><?=$dados['finalidade'];?>: R$ <?=$dados['preco'];?></div>
									<div class="listings-price-widget">Código: <?=$dados['id_galeria'];?></div>				
								</div>

								<ul id="house-details-sidebar">
									<li>Finalidade: <span><?=$dados['finalidade'];?></span></li>
									<li>Banheiros:	<span><?=$dados['banho'];?></span></li>
									<li>Su&iacute;tes:	<span><?=$dados['suites'];?></span></li>
									<li>Dormitórios:	<span><?=$dados['quartos'];?></span></li>
									<li>Vagas:	<span><?=$dados['garagens'];?></span></li>
									<li>&Aacute;rea &uacute;til:	<span><?=$dados['area'];?></span></li>
						
								</ul>	
						</div><!-- close .content-boxed -->
				
				
				</div>
				 