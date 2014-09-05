<? 
	define('ID_MODULO',15,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
 

	$Config = array(
		'arquivo'=>'departamentos_fotos',
		'tabela'=>'tbdepartamentos_fotos',
		'titulo'=>'legenda',
		'id'=>'id_foto',
		'urlfixo'=>'&id_departamentos='.$_GET['id_departamentos'], 
		'pasta'=>'departamentos',
	);


	function departamentosConfigValor($s) {
		list($valor) = db_lista(db_consulta("SELECT valor FROM tbdepartamentos_config WHERE campo LIKE '".$s."' LIMIT 1;"));
		return $valor;
	}

	if ($_GET['id_departamentos']>0) {
		$dados2 = db_lista(db_consulta("SELECT *, DATE_FORMAT(data,'%d/%m/%Y') as data1 FROM tbdepartamentos WHERE id_departamentos=".(int)$_GET['id_departamentos']." LIMIT 1;"));
	}


?>
<?

?>
                 


		 <section>

		            	<header>
		                <a href="#menu" class="showmenu button">Menu</a>
						<h2 style="color:#fff; padding:0 20px">Adicionar Imagens Institucionais</h2>
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
include('../includes/Mensagem.php');

// -------------------------------------------------------------------------------
// Dados do Evento
// -------------------------------------------------------------------------------
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
           <!-- <input id="uploadType2" type="radio" name="uploadType" value="1" style="border:0" onclick="mudaUploadTipo(this.value);"> <label for="uploadType2">Ftp</label> -->
        </span>
    </legend>

<p class="paginaSubtitulo">
</p>

<table class="viewCampos" id="uploadForm">
  <form name="frm1" action="../app/departamentos.php?faz=fotosForm" method="post" enctype="multipart/form-data">
  <input maxlength="25" type="hidden" name="id_departamentos" value="<?=$dados2['id_departamentos'];?>" >
  <tr>
  <? for ($i=1;$i<=8;$i++) { ?>
  	<td align="right"><b>Imagem <?=$i;?>:</b> <input type="file" name="imagem<?=$i;?>" size="20"  /><br />Legenda: <input type="text" name="legenda[<?=$i;?>]" size="33"  /><br /></td>
  <?
  		if (($i%2)==0) echo '</tr><tr><td height=10></td></tr><tr>';
  	 } 
  ?>
  <tr>
  	<td colspan="2" align="right">
		<input type="submit"  type="submit" style="height:35px!important;" height="35px" id="btn" value="Enviar Fotos"  />&nbsp;
    	<input type="reset"  type="submit" style="height:35px!important;" height="35px" id="btnalt" value="Cancelar"  />
	</td>
  </tr>
  </form>
</table>

<table class="viewCampos" id="uploadFtp" style="display:none;">
 
</table>
</fieldset>






<?
// -------------------------------------------------------------------------------
// Fotos do sistema
// -------------------------------------------------------------------------------
?>
<fieldset class="adicionar"><legend>Fotos</legend>

<table >
  <form name="frm1" action="../app/departamentos.php?faz=photosAction" method="post" enctype="multipart/form-data">
  <input maxlength="25" type="hidden" name="id_departamentos" value="<?=$dados2['id_departamentos'];?>" >
  <tr>
  <?
  	$fotos = db_consulta("SELECT * FROM tbdepartamentos_fotos WHERE id_departamentos=".(int)$dados2['id_departamentos']." ORDER BY posicao ASC;");
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
  	<label><input value="1" type="checkbox" id="foto<?=$foto['id_foto'];?>" name="foto[<?=$foto['id_foto'];?>]" style="border:0"><a href="../../arquivos/departamentos/<?=$dados2['codigo'];?>/fotos/<?=$foto['imagem'];?>" class="zoom<?=$foto['id_foto'];?>"><img id="imagemver" alt="<?=(int)$foto['contador'];?> views" src="../../arquivos/departamentos/<?=$dados2['codigo'];?>/miniaturas/<?=$foto['imagem'];?>" /></a></label><br />
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