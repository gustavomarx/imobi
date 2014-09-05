<? 
	define('ID_MODULO',15,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
 

	$Config = array(
		'arquivo'=>'configuracoes',
		'tabela'=>'tbconfiguracoes',
		'titulo'=>'titulo',
		'id'=>'id_config',
		'urlfixo'=>'', 
		'pasta'=>'configuracoes',
	);


	if ($_GET['ID']>0) $dados = db_dados("SELECT * FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$_GET['ID']." LIMIT 1;");

?>
<?
include('../includes/Mensagem.php');
?>

<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js' type='text/javascript'/>
<script type='text/javascript'>
//<![CDATA[
this.imagePreview = function(){ 
 /* CONFIG */

  xOffset = 200;  // distancia do topo //
  yOffset = 30;   // distancia a esquerda //

  // estas duas variáveis determinam a distância popup a partir do cursor
  // se precisar ajuste para obter o resultado correto

 /* END CONFIG */
 $("a.preview").hover(function(e){
  this.t = this.title;
  this.title = ""; 
  var c = (this.t != "") ? "<br/>" + this.t : "";
  $("body").append("<p id='preview'><img src='"+ this.href +"' alt='Pre-visualização' />"+ c +"</p>");        
  $("#preview")
   .css("top",(e.pageY - xOffset) + "px")
   .css("left",(e.pageX + yOffset) + "px")
   .fadeIn("fast");      
   },
 function(){
  this.title = this.t; 
  $("#preview").remove();
   }); 
 $("a.preview").mousemove(function(e){
  $("#preview")
   .css("top",(e.pageY - xOffset) + "px")
   .css("left",(e.pageX + yOffset) + "px");
 });   
};



$(document).ready(function(){
 imagePreview();
});
//]]>
</script>

<style>

ul#imagepreview li {
list-style:none;
float:left;
display:inline;
margin-right:10px;
}
#preview{
position:absolute;
border:1px solid #ccc;  /*---Edite cor da borda---*/
background:#fff;   /*---Edite cor de fundo---*/
padding:5px;
display:none;
Cor:#000;   /*---Edite cor da fonte---*/
}
</style>


                	<div class="conthead">
                        <h2>Configurações gerais do site</h2>
                    </div>
<div id="conteudo" style="overflow:hidden;">
<?

 
	if ($dados['corsite']=='') $dados['corsite']='pizza';


 # Montando os Dados
	$campos = array(
		#	0=>Tipo			1=>Titulo		2=>Nome Campo		3=>Tamanho(px)	4=>CampoExtra		5=>Comentário								6=>Atributos
		array('text',		'Nome da empresa',		'nomesite',			'255',			'',					'',											''),
		array('text',		'Slogan',		'slogansite',			'255',			'',					'',											''),
		array('text',		'Email',		'emailsite',			'255',			'',					'',											''),
		array('text',		'Telefone 1',		'telefone1',			'255',			'',					'',											''),
		array('text',		'Telefone 2',		'telefone2',			'255',			'',					'',											''),
		array('text',		'Telefone 3',		'telefone3',			'255',			'',					'',											''),
		array('text',		'Facebook',		'produtoservico',			'255',			'',					'Apenas o final: /suafanpage sem a barra',											''),
		array('text',		'Twitter',		'youtube',			'255',			'',					'Apenas o final: /seutwitter sem a barra',											''),
		//array('text',		'Youtube',		'youtube',			'255',			'',					'',											''),

		array('file',		'Logomarca',		'imagem',			'350',			0,					'',											''),
		array('textarea',	'Endereço',	'endereco',		array(80,10),	'',					'',											''),


		array('text',		'Cor do site',		'corsite',		'100',			'',					'',											''),
		array('text',		'URL do site',		'url',		'350',			'',					'',											''),

	);


	# Exibindo os campos
	echo adminCampos($campos,$Config,$dados);






?>

<style>.Cor_table {float:left; display:block;  margin:0 30px;} tr {margin:2px 0;}</style>


<table id="sortable_table_id_0" class="Cor_table sortable" cellpadding="2" cellspacing="2" width="200px">

<tbody><tr class="even">

<td bgcolor="#eceae1"> <b>Código</b>

&nbsp;

</td><td bgcolor="#eceae1" width="85"> <b>Cor</b>

&nbsp;

</td></tr>

<tr class="odd">

<td> #FFFFFF

</td><td bgcolor="#ffffff">

</td></tr>

<tr class="even">

<td> #FFFFCC



</td><td bgcolor="#ffffcc">

</td></tr>

<tr class="odd">

<td> #FFFF99

</td><td bgcolor="#ffff99">

</td></tr>

<tr class="even">

<td> #FFFF66

</td><td bgcolor="#ffff66">

</td></tr>

<tr class="odd">

<td> #FFFF33

</td><td bgcolor="#ffff33">

</td></tr>



<tr class="even">

<td> #FFFF00

</td><td bgcolor="#ffff00">

</td></tr>

<tr class="odd">

<td> #FFCCFF

</td><td bgcolor="#ffccff">

</td></tr>

<tr class="even">

<td> #FFCCCC

</td><td bgcolor="#ffcccc">

</td></tr>

<tr class="odd">

<td> #FFCC99



</td><td bgcolor="#ffcc99">

</td></tr>

<tr class="even">

<td> #FFCC66

</td><td bgcolor="#ffcc66">

</td></tr>

<tr class="odd">

<td> #FFCC33

</td><td bgcolor="#ffcc33">

</td></tr>

<tr class="even">

<td> #FFCC00

</td><td bgcolor="#ffcc00">

</td></tr>



<tr class="odd">

<td> #FF99FF

</td><td bgcolor="#ff99ff">

</td></tr>

<tr class="even">

<td> #FF99CC

</td><td bgcolor="#ff99cc">

</td></tr>

<tr class="odd">

<td> #FF9999

</td><td bgcolor="#ff9999">

</td></tr>

<tr class="even">

<td> #FF9966



</td><td bgcolor="#ff9966">

</td></tr>

<tr class="odd">

<td> #FF9933

</td><td bgcolor="#ff9933">

</td></tr>

<tr class="even">

<td> #FF9900

</td><td bgcolor="#ff9900">

</td></tr>

<tr class="odd">

<td> #FF66FF

</td><td bgcolor="#ff66ff">

</td></tr>



<tr class="even">

<td> #FF66CC

</td><td bgcolor="#ff66cc">

</td></tr>

<tr class="odd">

<td> #FF66CC

</td><td bgcolor="#ff66cc">

</td></tr>

<tr class="even">

<td> #FF6666

</td><td bgcolor="#ff6666">

</td></tr>

<tr class="odd">

<td> #FF6633



</td><td bgcolor="#ff6633">

</td></tr>

<tr class="even">

<td> #FF6600

</td><td bgcolor="#ff6600">

</td></tr>

<tr class="odd">

<td> #FF33FF

</td><td bgcolor="#ff33ff">

</td></tr>

<tr class="even">

<td> #FF33CC

</td><td bgcolor="#ff33cc">

</td></tr>



<tr class="odd">

<td> #FF3399

</td><td bgcolor="#ff3399">

</td></tr>

<tr class="even">

<td> #FF3399

</td><td bgcolor="#ff3399">

</td></tr>

<tr class="odd">

<td> #FF3333

</td><td bgcolor="#ff3333">

</td></tr>

<tr class="even">

<td> #FF3300



</td><td bgcolor="#ff3300">

</td></tr>

<tr class="odd">

<td> #FF00FF

</td><td bgcolor="#ff00ff">

</td></tr>

<tr class="even">

<td> #FF00CC

</td><td bgcolor="#ff00cc">

</td></tr>

<tr class="odd">

<td> #FF0099

</td><td bgcolor="#ff0099">

</td></tr>



<tr class="even">

<td> #FF0066

</td><td bgcolor="#ff0066">

</td></tr>

<tr class="odd">

<td> #FF0033

</td><td bgcolor="#ff0033">

</td></tr>

<tr class="even">

<td> #FF0000

</td><td bgcolor="#ff0000">

</td></tr>

<tr class="odd">

<td> <br />



</td></tr>

<tr class="even">

<td bgcolor="#eceae1"> <b>Código</b>

</td><td bgcolor="#eceae1" width="85"> <b>Cor</b>

</td></tr>

<tr class="odd">

<td> #66FFFF

</td><td bgcolor="#66ffff">

</td></tr>

<tr class="even">

<td> #66FFCC



</td><td bgcolor="#66ffcc">

</td></tr>

<tr class="odd">

<td> #66FF99

</td><td bgcolor="#66ff99">

</td></tr>

<tr class="even">

<td> #66FF66

</td><td bgcolor="#66ff66">

</td></tr>

<tr class="odd">

<td> #66FF33

</td><td bgcolor="#66ff33">

</td></tr>



<tr class="even">

<td> #66FF00

</td><td bgcolor="#66ff00">

</td></tr>

<tr class="odd">

<td> #66CCFF

</td><td bgcolor="#66ccff">

</td></tr>

<tr class="even">

<td> #66CCCC

</td><td bgcolor="#66cccc">

</td></tr>

<tr class="odd">

<td> #66CC99



</td><td bgcolor="#66cc99">

</td></tr>

<tr class="even">

<td> #66CC66

</td><td bgcolor="#66cc66">

</td></tr>

<tr class="odd">

<td> #66CC33

</td><td bgcolor="#66cc33">

</td></tr>

<tr class="even">

<td> #66CC00

</td><td bgcolor="#66cc00">

</td></tr>



<tr class="odd">

<td> #6699FF

</td><td bgcolor="#6699ff">

</td></tr>

<tr class="even">

<td> #6699CC

</td><td bgcolor="#6699cc">

</td></tr>

<tr class="odd">

<td> #669999

</td><td bgcolor="#669999">

</td></tr>

<tr class="even">

<td> #669966



</td><td bgcolor="#669966">

</td></tr>

<tr class="odd">

<td> #669933

</td><td bgcolor="#669933">

</td></tr>

<tr class="even">

<td> #669900

</td><td bgcolor="#669900">

</td></tr>

<tr class="odd">

<td> #6666FF

</td><td bgcolor="#6666ff">

</td></tr>



<tr class="even">

<td> #6666CC

</td><td bgcolor="#6666cc">

</td></tr>

<tr class="odd">

<td> #666699

</td><td bgcolor="#666699">

</td></tr>

<tr class="even">

<td> #666666

</td><td bgcolor="#666666">

</td></tr>

<tr class="odd">

<td> #666633



</td><td bgcolor="#666633">

</td></tr>

<tr class="even">

<td> #666600

</td><td bgcolor="#666600">

</td></tr>

<tr class="odd">

<td> #6633FF

</td><td bgcolor="#6633ff">

</td></tr>

<tr class="even">

<td> #6633CC

</td><td bgcolor="#6633cc">

</td></tr>



<tr class="odd">

<td> #663399

</td><td bgcolor="#663399">

</td></tr>

<tr class="even">

<td> #663366

</td><td bgcolor="#663366">

</td></tr>

<tr class="odd">

<td> #663333

</td><td bgcolor="#663333">

</td></tr>

<tr class="even">

<td> #663300



</td><td bgcolor="#663300">

</td></tr>

<tr class="odd">

<td> #6600FF

</td><td bgcolor="#6600ff">

</td></tr>

<tr class="even">

<td> #6600CC

</td><td bgcolor="#6600cc">

</td></tr>

<tr class="odd">

<td> #660099

</td><td bgcolor="#660099">

</td></tr>



<tr class="even">

<td> #660066

</td><td bgcolor="#660066">

</td></tr>

<tr class="odd">

<td> #660033

</td><td bgcolor="#660033">

</td></tr>

<tr class="even">

<td> #660000

</td><td bgcolor="#660000">

</td></tr></tbody></table>

</td><td valign="top">

<table class="Cor_table" cellpadding="2" cellspacing="2" width="200px">



<tbody><tr>

<td bgcolor="#eceae1"> <b>Código</b>

</td><td bgcolor="#eceae1" width="85"> <b>Cor</b>

</td></tr>

<tr>

<td> #CCFFFF

</td><td bgcolor="#ccffff">

</td></tr>

<tr>

<td> #CCFFCC

</td><td bgcolor="#ccffcc">



</td></tr>

<tr>

<td> #CCFF99

</td><td bgcolor="#ccff99">

</td></tr>

<tr>

<td> #CCFF66

</td><td bgcolor="#ccff66">

</td></tr>

<tr>

<td> #CCFF33

</td><td bgcolor="#ccff33">

</td></tr>

<tr>



<td> #CCFF00

</td><td bgcolor="#ccff00">

</td></tr>

<tr>

<td> #CCCCFF

</td><td bgcolor="#ccccff">

</td></tr>

<tr>

<td> #CCCCCC

</td><td bgcolor="#cccccc">

</td></tr>

<tr>

<td> #CCCC99



</td><td bgcolor="#cccc99">

</td></tr>

<tr>

<td> #CCCC66

</td><td bgcolor="#cccc66">

</td></tr>

<tr>

<td> #CCCC33

</td><td bgcolor="#cccc33">

</td></tr>

<tr>

<td> #CCCC00

</td><td bgcolor="#cccc00">

</td></tr>



<tr>

<td> #CC99FF

</td><td bgcolor="#cc99ff">

</td></tr>

<tr>

<td> #CC99CC

</td><td bgcolor="#cc99cc">

</td></tr>

<tr>

<td> #CC9999

</td><td bgcolor="#cc9999">

</td></tr>

<tr>

<td> #CC9966



</td><td bgcolor="#cc9966">

</td></tr>

<tr>

<td> #CC9933

</td><td bgcolor="#cc9933">

</td></tr>

<tr>

<td> #CC9900

</td><td bgcolor="#cc9900">

</td></tr>

<tr>

<td> #CC66FF

</td><td bgcolor="#cc66ff">

</td></tr>



<tr>

<td> #CC66CC

</td><td bgcolor="#cc66cc">

</td></tr>

<tr>

<td> #CC6699

</td><td bgcolor="#cc6699">

</td></tr>

<tr>

<td> #CC6666

</td><td bgcolor="#cc6666">

</td></tr>

<tr>

<td> #CC6633



</td><td bgcolor="#cc6633">

</td></tr>

<tr>

<td> #CC6600

</td><td bgcolor="#cc6600">

</td></tr>

<tr>

<td> #CC33FF

</td><td bgcolor="#cc33ff">

</td></tr>

<tr>

<td> #CC33CC

</td><td bgcolor="#cc33cc">

</td></tr>



<tr>

<td> #CC3399

</td><td bgcolor="#cc3399">

</td></tr>

<tr>

<td> #CC3366

</td><td bgcolor="#cc3366">

</td></tr>

<tr>

<td> #CC3333

</td><td bgcolor="#cc3333">

</td></tr>

<tr>

<td> #CC3300



</td><td bgcolor="#cc3300">

</td></tr>

<tr>

<td> #CC00FF

</td><td bgcolor="#cc00ff">

</td></tr>

<tr>

<td> #CC00CC

</td><td bgcolor="#cc00cc">

</td></tr>

<tr>

<td> #CC0099

</td><td bgcolor="#cc0099">

</td></tr>



<tr>

<td> #CC0066

</td><td bgcolor="#cc0066">

</td></tr>

<tr>

<td> #CC0033

</td><td bgcolor="#cc0033">

</td></tr>

<tr>

<td> #CC0000

</td><td bgcolor="#cc0000">

</td></tr>

<tr>

<td> <br />



</td></tr>

<tr>

<td bgcolor="#eceae1"> <b>Código</b>

</td><td bgcolor="#eceae1" width="85"> <b>Cor</b>

</td></tr>

<tr>

<td> #33FFFF

</td><td bgcolor="#33ffff">

</td></tr>

<tr>

<td> #33FFCC



</td><td bgcolor="#33ffcc">

</td></tr>

<tr>

<td> #33FF99

</td><td bgcolor="#33ff99">

</td></tr>

<tr>

<td> #33FF66

</td><td bgcolor="#33ff66">

</td></tr>

<tr>

<td> #33FF33

</td><td bgcolor="#33ff33">

</td></tr>



<tr>

<td> #33FF00

</td><td bgcolor="#33ff00">

</td></tr>

<tr>

<td> #33CCFF

</td><td bgcolor="#33ccff">

</td></tr>

<tr>

<td> #33CCCC

</td><td bgcolor="#33cccc">

</td></tr>

<tr>

<td> #33CC99



</td><td bgcolor="#33cc99">

</td></tr>

<tr>

<td> #33CC66

</td><td bgcolor="#33cc66">

</td></tr>

<tr>

<td> #33CC33

</td><td bgcolor="#33cc33">

</td></tr>

<tr>

<td> #33CC00

</td><td bgcolor="#33cc00">

</td></tr>



<tr>

<td> #3399FF

</td><td bgcolor="#3399ff">

</td></tr>

<tr>

<td> #3399CC

</td><td bgcolor="#3399cc">

</td></tr>

<tr>

<td> #339999

</td><td bgcolor="#339999">

</td></tr>

<tr>

<td> #339966



</td><td bgcolor="#339966">

</td></tr>

<tr>

<td> #339933

</td><td bgcolor="#339933">

</td></tr>

<tr>

<td> #339900

</td><td bgcolor="#339900">

</td></tr>

<tr>

<td> #3366FF

</td><td bgcolor="#3366ff">

</td></tr>



<tr>

<td> #3366CC

</td><td bgcolor="#3366cc">

</td></tr>

<tr>

<td> #336699

</td><td bgcolor="#336699">

</td></tr>

<tr>

<td> #336666

</td><td bgcolor="#336666">

</td></tr>

<tr>

<td> #336633



</td><td bgcolor="#336633">

</td></tr>

<tr>

<td> #336600

</td><td bgcolor="#336600">

</td></tr>

<tr>

<td> #3333FF

</td><td bgcolor="#3333ff">

</td></tr>

<tr>

<td> #3333CC

</td><td bgcolor="#3333cc">

</td></tr>



<tr>

<td> #333399

</td><td bgcolor="#333399">

</td></tr>

<tr>

<td> #333366

</td><td bgcolor="#333366">

</td></tr>

<tr>

<td> #333333

</td><td bgcolor="#333333">

</td></tr>

<tr>

<td> #333300



</td><td bgcolor="#333300">

</td></tr>

<tr>

<td> #3300FF

</td><td bgcolor="#3300ff">

</td></tr>

<tr>

<td> #3300CC

</td><td bgcolor="#3300cc">

</td></tr>

<tr>

<td> #330099

</td><td bgcolor="#330099">

</td></tr>



<tr>

<td> #330066

</td><td bgcolor="#330066">

</td></tr>

<tr>

<td> #330033

</td><td bgcolor="#330033">

</td></tr>

<tr>

<td> #330000

</td><td bgcolor="#330000">

</td></tr></tbody></table>

</td><td valign="top">

<table class="Cor_table" cellpadding="2" cellspacing="2" width="200px">



<tbody><tr>

<td bgcolor="#eceae1"> <b>Código</b>

</td><td bgcolor="#eceae1" width="85"> <b>Cor</b>

</td></tr>

<tr>

<td> #99FFFF

</td><td bgcolor="#99ffff">

</td></tr>

<tr>

<td> #99FFCC

</td><td bgcolor="#99ffcc">



</td></tr>

<tr>

<td> #99FF99

</td><td bgcolor="#99ff99">

</td></tr>

<tr>

<td> #99FF66

</td><td bgcolor="#99ff66">

</td></tr>

<tr>

<td> #99FF33

</td><td bgcolor="#99ff33">

</td></tr>

<tr>



<td> #99FF00

</td><td bgcolor="#99ff00">

</td></tr>

<tr>

<td> #99CCFF

</td><td bgcolor="#99ccff">

</td></tr>

<tr>

<td> #99CCCC

</td><td bgcolor="#99cccc">

</td></tr>

<tr>

<td> #99CC99



</td><td bgcolor="#99cc99">

</td></tr>

<tr>

<td> #99CC66

</td><td bgcolor="#99cc66">

</td></tr>

<tr>

<td> #99CC33

</td><td bgcolor="#99cc33">

</td></tr>

<tr>

<td> #99CC00

</td><td bgcolor="#99cc00">

</td></tr>



<tr>

<td> #9999FF

</td><td bgcolor="#9999ff">

</td></tr>

<tr>

<td> #9999CC

</td><td bgcolor="#9999cc">

</td></tr>

<tr>

<td> #999999

</td><td bgcolor="#999999">

</td></tr>

<tr>

<td> #999966



</td><td bgcolor="#999966">

</td></tr>

<tr>

<td> #999933

</td><td bgcolor="#999933">

</td></tr>

<tr>

<td> #999900

</td><td bgcolor="#999900">

</td></tr>

<tr>

<td> #9966FF

</td><td bgcolor="#9966ff">

</td></tr>



<tr>

<td> #9966CC

</td><td bgcolor="#9966cc">

</td></tr>

<tr>

<td> #996699

</td><td bgcolor="#996699">

</td></tr>

<tr>

<td> #996666

</td><td bgcolor="#996666">

</td></tr>

<tr>

<td> #996633



</td><td bgcolor="#996633">

</td></tr>

<tr>

<td> #996600

</td><td bgcolor="#996600">

</td></tr>

<tr>

<td> #9933FF

</td><td bgcolor="#9933ff">

</td></tr>

<tr>

<td> #9933CC

</td><td bgcolor="#9933cc">

</td></tr>



<tr>

<td> #993399

</td><td bgcolor="#993399">

</td></tr>

<tr>

<td> #993366

</td><td bgcolor="#993366">

</td></tr>

<tr>

<td> #993333

</td><td bgcolor="#993333">

</td></tr>

<tr>

<td> #993300



</td><td bgcolor="#993300">

</td></tr>

<tr>

<td> #9900FF

</td><td bgcolor="#9900ff">

</td></tr>

<tr>

<td> #9900CC

</td><td bgcolor="#9900cc">

</td></tr>

<tr>

<td> #990099

</td><td bgcolor="#990099">

</td></tr>



<tr>

<td> #990066

</td><td bgcolor="#990066">

</td></tr>

<tr>

<td> #990033

</td><td bgcolor="#990033">

</td></tr>

<tr>

<td> #990000

</td><td bgcolor="#990000">

</td></tr>

<tr>

<td> <br />



</td></tr>

<tr>

<td bgcolor="#eceae1"> <b>Código</b>

</td><td bgcolor="#eceae1" width="85"> <b>Cor</b>

</td></tr>

<tr>

<td> #00FFFF

</td><td bgcolor="#00ffff">

</td></tr>

<tr>

<td> #00FFCC



</td><td bgcolor="#00ffcc">

</td></tr>

<tr>

<td> #00FF99

</td><td bgcolor="#00ff99">

</td></tr>

<tr>

<td> #00FF66

</td><td bgcolor="#00ff66">

</td></tr>

<tr>

<td> #00FF33

</td><td bgcolor="#00ff33">

</td></tr>



<tr>

<td> #00FF00

</td><td bgcolor="#00ff00">

</td></tr>

<tr>

<td> #00CCFF

</td><td bgcolor="#00ccff">DeepSkyBlue

</td></tr>

<tr>

<td> #00CCCC

</td><td bgcolor="#00cccc">

</td></tr>

<tr>

<td> #00CC99



</td><td bgcolor="#00cc99">

</td></tr>

<tr>

<td> #00CC66

</td><td bgcolor="#00cc66">

</td></tr>

<tr>

<td> #00CC33

</td><td bgcolor="#00cc33">

</td></tr>

<tr>

<td> #00CC00

</td><td bgcolor="#00cc00">

</td></tr>



<tr>

<td> #0099FF

</td><td bgcolor="#0099ff">

</td></tr>

<tr>

<td> #0099CC

</td><td bgcolor="#0099cc">

</td></tr>

<tr>

<td> #009999

</td><td bgcolor="#009999">DarkCyan

</td></tr>

<tr>

<td> #009966



</td><td bgcolor="#009966">Teal

</td></tr>

<tr>

<td> #009933

</td><td bgcolor="#009933">

</td></tr>

<tr>

<td> #009900

</td><td bgcolor="#009900">Green

</td></tr>

<tr>

<td> #0066FF

</td><td bgcolor="#0066ff">

</td></tr>



<tr>

<td> #0066CC

</td><td bgcolor="#0066cc">

</td></tr>

<tr>

<td> #006699

</td><td bgcolor="#006699">

</td></tr>

<tr>

<td> #006666

</td><td bgcolor="#006666">

</td></tr>

<tr>

<td> #006633



</td><td bgcolor="#006633">

</td></tr>

<tr>

<td> #006600

</td><td bgcolor="#006600">Dark Green

</td></tr>

<tr>

<td> #0033FF

</td><td bgcolor="#0033ff">

</td></tr>

<tr>

<td> #0033CC

</td><td bgcolor="#0033cc">

</td></tr>



<tr>

<td> #003399

</td><td bgcolor="#003399">

</td></tr>

<tr>

<td> #003366

</td><td bgcolor="#003366">

</td></tr>

<tr>

<td> #003333

</td><td bgcolor="#003333">

</td></tr>

<tr>

<td> #003300



</td><td bgcolor="#003300">

</td></tr>

<tr>

<td> #0000FF

</td><td bgcolor="#0000ff">Blue

</td></tr>

<tr>

<td> #0000CC

</td><td bgcolor="#0000cc">Med. Blue

</td></tr>

<tr>

<td> #000099

</td><td bgcolor="#000099">Dark Blue

</td></tr>



<tr>

<td> #000066

</td><td bgcolor="#000066">Navy

</td></tr>

<tr>

<td> #000033

</td><td bgcolor="#000033">

</td></tr>

<tr>

<td> #000000

</td><td style="Cor: white;" bgcolor="#000000">Black

</td></tr></tbody></table>



</div>
<?
	include('../includes/Rodape.php');
?>
