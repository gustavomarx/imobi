<? 
	define('ID_MODULO',9,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
	include('../includes/tinyMCE_advanced.php');

	$Config = array(
		'arquivo'=>'cursos_fotos',
		'tabela'=>'tbgalerias_fotos',
		'titulo'=>'legenda',
		'id'=>'id_foto',
		'urlfixo'=>'&id_galeria='.$_GET['id_galeria'], 
		'pasta'=>'galeria',
	);


	function GaleriaConfigValor($s) {
		list($valor) = db_lista(db_consulta("SELECT valor FROM tbgalerias_config WHERE campo LIKE '".$s."' LIMIT 1;"));
		return $valor;
	}

	if ($_GET['id_galeria']>0) {
		$dados2 = db_lista(db_consulta("SELECT *, DATE_FORMAT(data,'%d/%m/%Y') as data1 FROM tbgalerias WHERE id_galeria=".(int)$_GET['id_galeria']." LIMIT 1;"));
	}


?>
<?

?>
            

				 

								 <section>

								            	<header>
								                <a href="#menu" class="showmenu button">Menu</a>
												<h2 style="color:#fff; padding:0 20px">Adicionar Fotos em <?=$dados2['titulo'];?></h2>
												</header>

							<div id="conteudo">
								        <section style="min-height:600px">



<script language="javascript">
	function mudaUploadTipo(t) {
		if (t==1) {
			document.getElementById('uploadForm').style.display='none'; 
			document.getElementById('uploadFtp').style.display='block'; 
		} else {
			document.getElementById('uploadForm').style.display='block'; 
			document.getElementById('uploadFtp').style.display='none'; 
		}
	}
	
	
	function fotoSeleciona(cod) {
		if (cod > 0 && document.getElementById('foto'+cod)) {
			document.getElementById('foto'+cod).checked = 'checked';
		}
	}

</script>






<?
// -------------------------------------------------------------------------------
// Dados do Evento
// -------------------------------------------------------------------------------
include('../includes/Mensagem.php');
?>





<script type="text/javascript" src="../js/easyzoom/easyzoom.js"></script>

<style>
#easy_zoom{
	width:600px;
	height:400px;	
	border:5px solid #f4f4f4;
	background:#fff;
	color:#333;
	position:absolute;
	top:290px;
	left:270px;
	overflow:hidden;
	-moz-box-shadow:0 0 10px #f4f4f4;
	-webkit-box-shadow:0 0 10px #f4f4f4;
	box-shadow:0 0 10px #f4f4f4;
	/* vertical and horizontal alignment used for preloader text */
	line-height:400px;
	text-align:center;
	}
	
	#imagemver{
		width:150px;
		height:150px;	
		border:3px solid #f4f4f4;
		background:#fff;
		color:#333;
		
		overflow:hidden;
		-moz-box-shadow:0 0 10px #f4f4f4;
		-webkit-box-shadow:0 0 10px #f4f4f4;
		box-shadow:0 0 10px #f4f4f4;
		/* vertical and horizontal alignment used for preloader text */
	
		text-align:center;
		}
</style>







<?
// -------------------------------------------------------------------------------
// Fazendo UPLOAD (ftp ou formulario)
// -------------------------------------------------------------------------------
?>
<fieldset class="adicionar">
	<legend>
		Upload 
        <span style="font-size:15px;">
            <input id="uploadType1" type="radio" name="uploadType" value="2" style="border:0" onclick="mudaUploadTipo(this.value);" checked="checked"> <label for="uploadType1">Formulário</label>
             
        </span>
    </legend>

<p class="paginaSubtitulo">
</p>

<table class="viewCampos" id="uploadForm">
  <form name="frm1" action="../app/galeria.php?faz=fotosForm" method="post" enctype="multipart/form-data">
  <input maxlength="25" type="hidden" name="id_galeria" value="<?=$dados2['id_galeria'];?>" >
  <tr>
  <? for ($i=1;$i<=8;$i++) { ?>
  	<td align="right"><b>Imagem <?=$i;?>:</b> <input type="file" name="imagem<?=$i;?>" size="20"  /><br />Legenda: <input type="text" name="legenda[<?=$i;?>]" size="33"  /><br /></td>
  <?
  		if (($i%2)==0) echo '</tr><tr><td height=10></td></tr><tr>';
  	 } 
  ?>
  <tr>
  	<td colspan="2" align="right">
    	<input type="reset" name="reset" value="cancelar"  style="height:35px!important;" height="35px" id="btnalt" />&nbsp;
        <input type="submit" name="submit" value="enviar fotos"  style="height:35px!important;" height="35px" id="btn"/>
	</td>
  </tr>
  </form>
</table>

<table class="viewCampos" id="uploadFtp" style="display:none;">
  <form name="frm1" action="../app/galeria.php?faz=fotosFtp" method="post" enctype="multipart/form-data">
  <input maxlength="25" type="hidden" name="id_galeria" value="<?=$dados2['id_galeria'];?>" >
  <tr><td>Baixar as fotos de <font face="Courier New, Courier, monospace">/arquivos/galeria/ftp/</font></td></tr>
  <tr><td><select name="pasta" style="width:100%"><?
  
  	$PastasFTP = ListaDiretorio('../../arquivos/ftp/', 'dir');
	foreach ($PastasFTP as $pasta) {

		echo '<option value="'.$pasta.'">'.$pasta.'</option>';

	}

  ?></select></td></tr>
  <tr><td align="right"><input  style="height:35px!important;" height="35px" id="btn" type="submit" name="submit" value="enviar fotos" /></td></tr>
  </form>
</table>
</fieldset>






<?
// -------------------------------------------------------------------------------
// Fotos do sistema
// -------------------------------------------------------------------------------
?>
<fieldset class="adicionar"><legend>Fotos</legend>

<table >
  <form name="frm1" action="../app/galeria.php?faz=photosAction" method="post" enctype="multipart/form-data">
  <input maxlength="25" type="hidden" name="id_galeria" value="<?=$dados2['id_galeria'];?>" >
  <tr>
  <?
  	$fotos = db_consulta("SELECT * FROM tbgalerias_fotos WHERE id_galeria=".(int)$dados2['id_galeria']." ORDER BY posicao ASC;");
	$i=0;
	if (db_linhas($fotos)>0) {
	while ($foto = db_lista($fotos)) { $i++;
  ?>
<script type="text/javascript">
jQuery(function($){
	$('a.zoom<?=$foto['id_foto'];?>').easyZoom();
});
</script>

		<td width="80" align="center">
        	<label><input value="1" type="checkbox" id="foto<?=$foto['id_foto'];?>" name="foto[<?=$foto['id_foto'];?>]" style="border:0"><br /><a href="../../arquivos/galeria/<?=$dados2['codigo'];?>/fotos/<?=$foto['imagem'];?>" class="zoom<?=$foto['id_foto'];?>"><img id="imagemver" alt="<?=(int)$foto['contador'];?> views" src="../../arquivos/galeria/<?=$dados2['codigo'];?>/miniaturas/<?=$foto['imagem'];?>" /></a></label><br />
            Posição: <input name="posicao[<?=$foto['id_foto'];?>]" type="text" value="<?=$foto['posicao'];?>" style="width:42px" onkeyup="fotoSeleciona(<?=(int)$foto['id_foto'];?>);" onchange="fotoSeleciona(<?=(int)$foto['id_foto'];?>);" /><br />
            <input type="text" style="width:150px" name="legenda[<?=$foto['id_foto'];?>]" value="<?=$foto['legenda'];?>" onkeyup="fotoSeleciona(<?=(int)$foto['id_foto'];?>);" onchange="fotoSeleciona(<?=(int)$foto['id_foto'];?>);" />
		</td>
  <?
		if (($i%7)==0) echo '</tr><tr>';
	}
  ?>
  </tr>
  <tr><td height="10"></td></tr>
  <tr>
  	<td colspan="10" width="400">
    	<img src="../img/arrow_ltr.png" /> Com selecionados: 
    	<select name="opcao">
        	<option value="update">Atualizar</option>
        	<option value="delete">Excluir</option>
        </select>
        <input type="submit" name="submit" value="salvar"  style="height:35px!important;" height="35px" id="btn"/>
    </td>
  </tr>
<?
	} else echo '<tr><td><font color=red><b>Nenhuma foto encontrada.</b></font></td></tr>';
?>
  </form>
</table>
</fieldset>











</div>
<?
	include('../includes/Rodape.php');
?>